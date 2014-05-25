<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MenuTemplate
 *
 * @author ANGEL
 */
require_once('Components/Config.conf'); 
class Class_MenuTemplateClass {
    //put your code here
    public function  getMenuByFkMenu($fkMenu){
        $objDataBase = new Cpu_DataBase();
        $sql = "CALL ecart_get_listMenuTemplateByFk('".$fkMenu."')";
        return $objDataBase->executeQueryStoreProcedure($sql);
    }
    
    public function createMenu(){
      $scrip ='<div class="navbar-collapse nav-main-collapse collapse">
			 <nav class="nav-main mega-menu main_menu">
             <ul class="nav nav-pills nav-main" id="rox-main-menu">
             <li class="rox-submenu-item active">
             <a href="index.html"><i class="fa fa-home"></i></a></li>';
       
            $objMenuTemplate  = new Class_MenuTemplateClass();
            $result  =  $objMenuTemplate->getMenuByFkMenu('_');
            while($row = $result->fetch_array()){
            $scrip =$scrip.'<li class="dropdown rox-submenu-item">'.
                    '<a href="'.$row['urlMenu']."'>".$row['menuName'].'</a><ul class="dropdown-menu">';
                  
            $subitems  =  $objMenuTemplate->getMenuByFkMenu($row['pkMenuTemplate']);
            while($rowItems = $subitems->fetch_array()){
              $scrip=$scrip.'<div class="rox-menu-wrapper"><li><a href="'.$rowItems['urlMenu'].">".$rowItems['menuName'].'</a></li></div>';
               }
			 $scrip=$scrip.'</ul></li>';
            } 
			 $scrip=$scrip.'</ul></nav></div>';
             return $scrip;     
    }

   
}
