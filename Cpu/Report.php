<?PHP
/**
 * Description of Cpu_Report
 * Esta Clase Cpu_Report,llama y ejecuta aquellos
 * reporte hechos en Birt.
 * @author SPENCER.
 */
class Cpu_Report {
    //Atributos de mi Clase
    private  $_nameReport;
    private  $_fileType;
    private  $_parameters;
    private  $_autoDownloaded;
    private  $_reportURL;
    private  $_imageURL;
    private  $_imageDirectory;
    
    /**
     * Constructor de mi Clase.
     * @param type string $nameReport:Nombre del Reporte a Ejecutar. 
     * @param type string $fileType:Tipo de Formato para el reporte a Mostrar.
     * ejemplo:[html,pdf,doc,xls]
     * @param type boolean $autoDownloaded: True,Si se Descargara o False,Si solo se 
     * Mostrara  el Reporte.
     */
    public function __construct($nameReport,$fileType,$autoDownloaded = true) {
        $this->setNameReport($nameReport);
        $this->setFileType($fileType);
        $this->setAutoDownloaded($autoDownloaded);
        $here = getcwd();
        $this->setReportURL("${here}/Public/Reports/".$this->getNameReport().".rptdesign");
        $pth = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"];
        $path_parts = pathinfo($pth);
        $this->setImageURL($path_parts['dirname'] ."/Public/Images/");
        $this->setImageDirectory($here . "/Public/Images/");
    }
    
    /**
     * Metodo Magico de php 5.
     * @param type string $name:Nombre del Metodo Invocado
     * @param type  $arguments: Array de Parametros pasados por el Metodo Invocado
     * @return type
     */
     public function __call($name, $arguments) {
        $methodType = substr($name, 0,3);
        $attribName  = substr($name, 3,  strlen($name));
        $attribName = strtolower($attribName[0]).substr($attribName, 1,strlen($name));
        $attribName = '_'.$attribName;
        switch ($methodType){
            case 'set':
                $this->$attribName = $arguments[0];
                break;
            case 'get':
                return $this->$attribName;
                break;
            default:
                die("Metodo  Incorrecto");
                break;
        }
    }
    /**
     * Retorna True si el Reporte Existe en caso
     * contrario.
     * False: Si el Reporte No Existe
     * @return boolean
     */
    public function reportExists(){
        return file_exists($this->getReportURL())?true:false;
    }
    /**
     * Retorna True  si El Formato Seteado para el Reporte 
     * se encuentra en la lista de estos formatos:[pdf,html,xls,doc],
     * en caso Contrario.
     * False: Si  el Formato No  esta en la Lista.
     * @return boolean
     */
    public function  isCorrectFormat(){
        $value = false;
        switch ($this->getFileType()){
           case 'pdf':
           case 'xls':
           case 'doc':
           case 'html':
              $value = true;
               break;
       }
       return $value;
    }
    /**
     * Ejecuta el Reporte 
     */
    public function  run(){
        
        if(!$this->reportExists()){
            die('El Nombre de Este  Reporte '.$this->getNameReport().' No Existe');
            exit();
        }
        if(!$this->isCorrectFormat()){
            die('Este  Formato: ' .$this->getFileType().' No esta entre los Formatos:[pdf,doc,xls,html]');
            exit();
        }
        require_once("java/Java.inc");
        if($this->getFileType()!="html")
        header("Content-type: application/".$this->getFileType());
        if($this->getAutoDownloaded()&& $this->getFileType()!="html" )
            header("Content-Disposition: attachment; filename=".$this->getNameReport().'.'.$this->getFileType());
       session_start();
       $ctx = java_context()->getServletContext();
       $birtReportEngine = java("org.eclipse.birt.php.birtengine.BirtEngine")->getBirtEngine($ctx);
       java_context()->onShutdown(java("org.eclipse.birt.php.birtengine.BirtEngine")->getShutdownHook());
       
       try{
       $report = $birtReportEngine->openReportDesign($this->getReportURL());
       $task = $birtReportEngine->createRunAndRenderTask($report);
       if(!is_null($this->getParameters())){
           
           foreach ($this->getParameters() as $parameterName => $parameterValue) {
               $task->setParameterValue($parameterName,$parameterValue);
           }
       }
       $taskOptions = new java("org.eclipse.birt.report.engine.api.RenderOption");
       if($this->getFileType() == "html"){
       $taskOptions = new java("org.eclipse.birt.report.engine.api.HTMLRenderOption");
       $ih = new java( "org.eclipse.birt.report.engine.api.HTMLServerImageHandler");
       $taskOptions->setImageHandler($ih);
       $taskOptions->setEnableAgentStyleEngine(true);
       $taskOptions->setBaseImageURL($this->getImageURL() . session_id());
       $taskOptions->setImageDirectory($this->getImageDirectory() . session_id());
       }
       $outputStream = new java("java.io.ByteArrayOutputStream");
       $taskOptions->setOutputStream($outputStream);
       $taskOptions->setOutputFormat($this->getFileType());
       $task->setRenderOption($taskOptions);
       $task->run();
       $task->close();
       }catch (JavaException $e) {
           echo $e;
       }
       switch ($this->getFileType()){
           case 'pdf':
           case 'xls':
           case 'doc':
               echo java_values($outputStream->toByteArray());
               break;
           case 'html':
               echo $outputStream;
               break;
       }
    }
}
