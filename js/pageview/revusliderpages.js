// revolution Slider
				
				var tpj=jQuery;
				
				
				var revapi1;
				
				tpj(document).ready(function() {
				
				if (tpj.fn.cssOriginal != undefined)
					tpj.fn.css = tpj.fn.cssOriginal;
				
				if(tpj('#rev_slider_1_1').revolution == undefined)
					revslider_showDoubleJqueryError('#rev_slider_1_1',"joomla");
				else	
					revapi1 = tpj('#rev_slider_1_1').show().revolution(
					 {
						delay:9000,
						startwidth:1417,
						startheight:560,
						hideThumbs:200,
						
						thumbWidth:100,
						thumbHeight:50,
						thumbAmount:3,
						
						navigationType:"bullet",
						navigationArrows:"verticalcentered",
						navigationStyle:"round",
						
						touchenabled:"on",
						onHoverStop:"on",
						
						shadow:0,
						fullWidth:"on",

						navigationHAlign:"center",
						navigationVAlign:"bottom",
						navigationHOffset:0,
						navigationVOffset:20,
								
						stopLoop:"off",
						stopAfterLoops:-1,
						stopAtSlide:-1,
								
						shuffle:"off",
						
						hideSliderAtLimit:0,
						hideCaptionAtLimit:0,
						hideAllCaptionAtLilmit:0					});
				
				});	//end