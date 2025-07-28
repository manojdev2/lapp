( function( $ ) {
	/**
 	 * @param $scope The Widget wrapper element as a jQuery element
	 * @param $ The jQuery alias
	 */ 
	 
	/* Typing Text Handler */
	var WidgetAnimateTextHandler = function( $scope, $ ) {
		$scope.find('.cea-typing-text').each(function( index ) {
			ceaAnimatedTextSettings( this, index );
		});
	};
	
	/* Isotope Handler */
	var WidgetIsotopeHandler = function( $scope, $ ) {
		$scope.find('.isotope').each(function() {
			ceaIsotopeLayout( this );
		});		
	};
	
	/* Owl Carousel Handler */
	var WidgetOwlCarouselHandler = function( $scope, $ ) {
		$scope.find('.owl-carousel').each(function() {
			ceaOwlSettings( this );
		});
	};
	
	/* Popup Handler */
	var WidgetPoupHandler = function( $scope, $ ) {
		if( $scope.find('.image-gallery').length ){
			$scope.find('.image-gallery').each(function() {
				ceaPopupGallerySettings( this );
			});
		}
	};
	
	/* Circle Progress Handler */
	var WidgetCircleProgressHandler = function( $scope, $ ) {
		if( $scope.find('.circle-progress-circle').length ){
			var circle_ele = $scope.find('.circle-progress-circle');
			ceaCircleProgresSettings(circle_ele);
		}		
	};
	
	/* Counter Handler */
	var WidgetCounterUpHandler = function( $scope, $ ) {
		if( $scope.find('.counter-up').length ){
			var counter_ele = $scope.find('.counter-up');
			ceaCounterUpSettings(counter_ele);
		}		
	};
	
	/* Image Before After Handler */
	var WidgetImageBeforeAfterHandler = function( $scope, $ ) {
		if( $scope.find('.cea-imgc-wrap').length ){
			var img_ba_ele = $scope.find('.cea-imgc-wrap');
			ceaImageBeforeAfterSettings(img_ba_ele);
		}		
	};
	
	/* Mailchimp Handler */
	var WidgetMailchimpHandler = function( $scope, $ ) {
		if( $scope.find(".cea-mailchimp-wrapper").length ){
			$scope.find('.cea-mailchimp-wrapper').each(function( index ) {
				ceaMailchimp( this );
			});
		}
	};
	
	/* Day Counter Handler */
	var WidgetDayCounterHandler = function( $scope, $ ) {
		$scope.find('.day-counter').each(function() {
			ceaDayCounterSettings( this );
		});		
	};
	
	/* Chart Handler */
	var WidgetChartHandler = function( $scope, $ ) {
		$scope.find('.pie-chart').each(function() {
			ceaPieChartSettings( this );
		});		
		$scope.find('.line-chart').each(function() {
			ceaLineChartSettings( this );
		});		
	};
	
	/* Modal Popup Handler */
	var WidgetModalPopupHandler = function( $scope, $ ) {
		if( $scope.find('.modal-popup-wrapper.page-load-modal').length ){
			var modal_id = $scope.find('.modal-popup-wrapper.page-load-modal .modal').attr("id");
			$('#'+modal_id).modal('show');
		}
	};

	/* Agon Handler */
	var WidgetAgonHandler = function( $scope, $ ) {
		if( $scope.find(".canvas_agon").length ){
			$scope.find( '.canvas_agon' ).each(function() {
				ceaAgon( this );
			});
		}
	};
	
	/* Cloud9 Carousel Handler */
	var WidgetCloud9CarouselHandler = function( $scope, $ ) {
		if( $scope.find(".cloud9-carousel").length ){
			$scope.find( '.cloud9-carousel' ).each(function() {
				ceaCloud9Carousel( this );
			});
		}
	};
	
	/* CEAMap Handler */
	var WidgetCEAMapHandler = function( $scope, $ ) {
		if( $scope.find(".ceagmap").length ){
			initCEAGmap();
		}
	};
	
	/* Timeline Slider Handler */
	var WidgetTimelineSliderHandler = function( $scope, $ ) {
		if( $scope.find('.cd-horizontal-timeline').length ){
			//var cur_ele = $scope.find('.cd-horizontal-timeline');
			var line_dist = $scope.find('.cd-horizontal-timeline').data("distance") ? $scope.find('.cd-horizontal-timeline').data("distance") : 60;
			$scope.find('.cd-horizontal-timeline').zozotimeline({
				distance: line_dist
			});
		}
	};
	
	/* Modal Popup Handler */
	var WidgetModalPopupHandler = function( $scope, $ ) {
		if( $scope.find(".cea-modal-box-trigger").length ){
			$scope.find( '.cea-modal-box-trigger' ).each(function() {
				ceaModalPopup( this );
			});
		}
		if( $scope.find('.cea-page-load-modal').length ){
			var modal_id = $scope.find('.cea-page-load-modal .white-popup-block').attr("id");
			$.magnificPopup.open({
			items: {
					src: '#'+modal_id
				},
				type: 'inline'
			});
		}
		$(document).on( 'click', '.cea-popup-modal-dismiss', function (e) {
			e.preventDefault();
			$.magnificPopup.close();
		});
	};
	
	/* Popup Anything Handler */
	var WidgetPopupAnythingHandler = function( $scope, $ ) {
		if( $scope.find(".cea-popup-anything").length ){
			$scope.find( '.cea-popup-anything' ).each(function() {
				ceaPopupAnything( this );
			});
		}
	};
	
	/* Popover Handler */
	var WidgetPopoverHandler = function( $scope, $ ) {
		if( $scope.find(".cea-popover-trigger").length ){
			$scope.find( '.cea-popover-trigger' ).each(function() {
				ceaPopover( this );
			});
		}
	};
	
	/* Recent/Popular Toggle Handler */
	var WidgetRecentPopularToggleHandler = function( $scope, $ ) {
		if( $scope.find(".cea-toggle-post-trigger").length ){
			$scope.find(".cea-toggle-post-trigger .switch-checkbox").change(function(){
				ceaSwitchTabToggle( this );
			});
		}
	};
	
	/* Rain Drops Handler */
	var WidgetRainDropsHandler = function( $scope, $ ) {
		if( $scope.find(".cea-rain-drops").length ){
			$scope.find('.cea-rain-drops').each(function( index ) {
				ceaRainDrops( this );
			});
		}
	};
	
	/* Rain Drops and Parallax Handler */
	var SectionCustomOptionsHandler = function( $scope, $ ) {
	if ( $scope.is('section')){
			if ( $scope.is('section[data-cea-float]' ) ){
				console.log("data-cea-float");
				ceaSectionFloatParallax( $scope );
			}
			if ( $scope.is('section[data-cea-raindrops]' ) ){
				console.log("Section Float");
				ceaSectionRainDrops( $scope );
			}
			if ( $scope.is('section[data-cea-parallax-data]' ) ){
				console.log("section Parallax");
				ceaSectionParallax( $scope );
			}
		}
	};
	
	/* Rain Drops and Parallax Handler */
	var SectionContainerOptionsHandler = function( $scope, $ ) {
	if ( $scope.is('div')){
			if ( $scope.is('div[data-cea-float]' ) ){
				console.log("Container float");
				ceaSectionFloatParallax( $scope );
			}
			if ( $scope.is('div[data-cea-raindrops]' ) ){
				console.log("Container raindrop");
				ceaSectionRainDrops( $scope );
			}
			if ( $scope.is('div[data-cea-parallax-data]' ) ){
				console.log("Container parallax");
				ceaSectionParallax( $scope );
			}
		}
	};
	
	/* Content Slider Handler */
	var ColumnCustomOptionsHandler = function( $scope, $ ) {
		if ( $scope.is('.elementor-element.elementor-column' ) ){
			if ( $scope.is('.elementor-element.elementor-column[data-cea-slide]' ) ){
				ceaContentSlider( $scope );
			}
		}
	};
	
	/* Toggle Content Handler */
	var WidgetToggleContentHandler = function( $scope, $ ) {
		if( $scope.find(".toggle-content-wrapper").length ){
			$scope.find('.toggle-content-wrapper').each(function( index ) {
				ceaToggleContent( this );
			});
			$( window ).resize(function() {
				setTimeout( function() {
					$scope.find('.toggle-content-wrapper').each(function( index ) {
						ceaToggleContent( this );
					});
				}, 100 );
			});
		}
	};
	
	/* Tabs Handler */
	var WidgetCeaTabHandler = function( $scope, $ ) {
		if( $scope.find(".cea-tab-elementor-widget").length ){
			$scope.find('.cea-tab-elementor-widget').each(function( index ) {
				ceaTabContent( this );
			});
			
			//Call Every Element
			CeaCallEveryElement($scope)
		}
	};
	
	/* Accordion Handler */
	var WidgetCeaAccordionHandler = function( $scope, $ ) {
		if( $scope.find(".cea-accordion-elementor-widget").length ){
			$scope.find('.cea-accordion-elementor-widget').each(function( index ) {
				ceaAccordionContent( this );
			});
			
			//Call Every Element
			CeaCallEveryElement($scope)
		}
	};
	
	/* Switcher Content Handler */
	var WidgetSwitcherContentHandler = function( $scope, $ ) {
		if( $scope.find(".switcher-content-wrapper").length ){
			$scope.find('.switcher-content-wrapper').each(function( index ) {
				ceaSwitcherContent( this );
			});
			
			//Call Every Element
			CeaCallEveryElement($scope)
		}
	};
	
	/* Offcanvas Handler */
	var WidgetCeaOffcanvasHandler = function( $scope, $ ) {
		if( $scope.find(".cea-offcanvas-elementor-widget").length ){
			$scope.find('.cea-offcanvas-elementor-widget').each(function( index ) {
				ceaOffcanvasContent( this );
			});
						
			$(document).find(".cea-offcanvas-close").on( "click", function(){
				$("body").removeClass("cea-offcanvas-active");	
				$(this).parent(".cea-offcanvas-wrap").removeClass("active");
				var ani_type = $(this).parent(".cea-offcanvas-wrap").data("canvas-animation");
				if( ani_type == 'left-push' ){
					$("body").css({"margin-left":"", "margin-right":""});
				}else if( ani_type == 'right-push' ){
					$("body").css({"margin-left":"", "margin-right":""});
				}	
				return false;
			});
		}
	};
	
	/* Tilt Handler */
	var WidgetTiltHandler = function( $scope, $ ) {
		if( $scope.find(".cea-tilt").length ){
			$scope.find( '.cea-tilt' ).each(function() {
				ceaTilt( this );
			});
		}
	};
	
	/* All in One Handler */
	var WidgetAllInOneHandler = function( $scope, $ ) {		
		CeaCallEveryElement($scope);			
	};
	
	// Make sure you run this code under Elementor.
	$( window ).on( 'elementor/frontend/init', function() {
		
		// Common Shortcodes
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceaanimatedtext.default', WidgetAnimateTextHandler );		
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceacircleprogress.default', WidgetCircleProgressHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceacounter.default', WidgetCounterUpHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceadaycounter.default',
		WidgetDayCounterHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/imagebeforeafter.default', WidgetImageBeforeAfterHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceamailchimp.default', WidgetMailchimpHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceaimagegrid.default', WidgetOwlCarouselHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceaimagegrid.default', WidgetPoupHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceamodalpopup.default', WidgetModalPopupHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceatimeline.default', WidgetAgonHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceagooglemap.default', WidgetCEAMapHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceatimelineslide.default', WidgetTimelineSliderHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceachart.default', WidgetChartHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/carousel3d.default', WidgetCloud9CarouselHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/raindrops.default', WidgetRainDropsHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceapopover.default', WidgetPopoverHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceapopupanything.default', WidgetPopupAnythingHandler );	
		//elementorFrontend.hooks.addAction( 'frontend/element_ready/ceamodalpopup.default', WidgetModalPopupHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/togglecontent.default', WidgetToggleContentHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceatab.default', WidgetCeaTabHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceaaccordion.default', WidgetCeaAccordionHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceaswitchercontent.default', WidgetSwitcherContentHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceaoffcanvas.default', WidgetCeaOffcanvasHandler );
		
		// Post Type Shortcodes
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceaposts.default', WidgetIsotopeHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceaposts.default', WidgetOwlCarouselHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/cearecentpopular.default', WidgetRecentPopularToggleHandler );
		
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceafeaturebox.default', WidgetTiltHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceacounter.default', WidgetTiltHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceaimagegrid.default', WidgetTiltHandler );
		
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceaevent.default', WidgetTiltHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceateam.default', WidgetTiltHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceaservice.default', WidgetTiltHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceatestimonial.default', WidgetTiltHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceaportfolio.default', WidgetTiltHandler );
		
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceateam.default', WidgetOwlCarouselHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceaevent.default', WidgetOwlCarouselHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceatestimonial.default', WidgetOwlCarouselHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceaportfolio.default', WidgetIsotopeHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceaportfolio.default', WidgetOwlCarouselHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceaportfolio.default', WidgetPoupHandler );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/ceaservice.default', WidgetOwlCarouselHandler );
		
		// Container Related Shortcodes
		elementorFrontend.hooks.addAction( 'frontend/element_ready/section', SectionCustomOptionsHandler ); // parallax, rain drops, floating images
		elementorFrontend.hooks.addAction( 'frontend/element_ready/container', SectionContainerOptionsHandler ); 
		elementorFrontend.hooks.addAction( 'frontend/element_ready/column', ColumnCustomOptionsHandler );
	
		
		//All in one handler		
		elementorFrontend.hooks.addAction( 'frontend/element_ready/contentcarousel.default', WidgetAllInOneHandler );
		
	} );
	
	$( window ).on( 'load', function() {
		if( !$("body.elementor-editor-active").length ){
			//WidgetAllInOneHandler($("body"));
			//elementor.reloadPreview();			
		}
	} );
	
	function CeaCallEveryElement($scope){
		$(document).find('.cea-typing-text').each(function( index ) {
			ceaAnimatedTextSettings( this, index );
		});
		
		$(document).find('.isotope').each(function() {
			ceaIsotopeLayout( this );
		});
		
		if( $(document).find('.circle-progress-circle').length ){
			var circle_ele = $(document).find('.circle-progress-circle');
			ceaCircleProgresSettings(circle_ele);
		}
		
		$(document).find('.owl-carousel').each(function() {
			ceaOwlSettings( this );
		});
		
		if( $(document).find('.counter-up').length ){
			var counter_ele = $(document).find('.counter-up');
			ceaCounterUpSettings(counter_ele);
		}
		
		$(document).find('.day-counter').each(function() {
			ceaDayCounterSettings( this );
		});	
		
		/* Chart Handler */
		$(document).find('.pie-chart').each(function() {
			ceaPieChartSettings( this );
		});		
		$(document).find('.line-chart').each(function() {
			ceaLineChartSettings( this );
		});		

		if( $(document).find('.modal-popup-wrapper.page-load-modal').length ){
			var modal_id = $(document).find('.modal-popup-wrapper.page-load-modal .modal').attr("id");
			$('#'+modal_id).modal('show');
		}
		
		if( $(document).find(".cloud9-carousel").length ){
			$(document).find( '.cloud9-carousel' ).each(function() {
				ceaCloud9Carousel( this );
			});
		}
		
		if( $(document).find(".canvas_agon").length ){
			$(document).find( '.canvas_agon' ).each(function() {
				ceaAgon( this );
			});
		}
		
		if( $(document).find('.cd-horizontal-timeline').length ){
			var cur_ele = $(document).find('.cd-horizontal-timeline');
			var line_dist = cur_ele.data("distance") ? cur_ele.data("distance") : 60;
			cur_ele.zozotimeline({
				distance: line_dist
			});
		}
		
		if( $(document).find(".ceagmap").length ){
			initCEAGmap();
		}
	}
	
	function cea_scroll_animation(c_elem){
		setTimeout( function() {
			var anim_time = 300;
			$(c_elem).find('.cea-animate:not(.run-animate)').each( function() {
				
				var elem = $(this);
				var bottom_of_object = elem.offset().top;
				var bottom_of_window = $(window).scrollTop() + $(window).height();
				
				if( bottom_of_window > bottom_of_object ){
					setTimeout( function() {
						elem.addClass("run-animate");
					}, anim_time );
				}
				anim_time += 300;
				
			});
		}, 300 );
	}
	
	/*function ceaDataTableFieldstoText( tbl_ele ){
		var tbl_ele = $(tbl_ele);
		$(tbl_ele).find("th, td").each(function( index ) {
			$(this).append('<textarea class="cea-table-input" rows="1"></textarea>');
		});			
	}*/
	
	function ceaOffcanvasContent( offcanvas_ele ){
		var offcanvas_ele = $(offcanvas_ele);	

		if( $(document).find(".cea-offcanvas-id-to-element").length && ! $("body.elementor-editor-active").length ){
			$(document).find(".cea-offcanvas-id-to-element").each(function( index ) {
				var offcanvas_id_ele = $(this).data("id");
				var clone_offcanvas = $("#"+offcanvas_id_ele).clone();
				$(document).find("#"+offcanvas_id_ele).remove();
				$(this).replaceWith(clone_offcanvas);
			});
		}
		
		$(offcanvas_ele).find(".cea-offcanvas-trigger").on( "click", function(){
			$("body").toggleClass("cea-offcanvas-active");
			var offcanvas_id = $(this).data("offcanvas-id");
			if( $('#'+offcanvas_id).length ){
				$('#'+offcanvas_id).addClass("active");
				var ani_type = $('#'+offcanvas_id).data("canvas-animation");
				if( ani_type == 'left-push' ){
					$("body").css({"margin-left": $('#'+offcanvas_id).outerWidth() +"px", "margin-right": "-"+ $('#'+offcanvas_id).outerWidth() +"px"});
				}else if( ani_type == 'right-push' ){
					$("body").css({"margin-left": "-"+ $('#'+offcanvas_id).outerWidth() +"px", "margin-right": $('#'+offcanvas_id).outerWidth() +"px"});
				}
			}
			setTimeout( function() {
				CeaCallEveryElement(document);
			}, 350 );
			return false;
		});
	}
	
	function ceaSwitcherContent( switcher_ele ){
		var switcher_ele = $(switcher_ele);
		
		if( switcher_ele.find(".cea-switcher-id-to-element").length && ! $("body.elementor-editor-active").length ){
			switcher_ele.find(".cea-switcher-id-to-element").each(function( index ) {
				var switcher_id_ele = $(this).data("id");
				var clone_tab = $("#"+switcher_id_ele).clone();
				$(document).find("#"+switcher_id_ele).remove();
				$(this).replaceWith(clone_tab);
			});
		}
		
		$(switcher_ele).find(".switch-checkbox").on( "change", function(){
			$(switcher_ele).find(".cea-switcher-content > div").fadeOut(0);
			if( this.checked ){
				$(this).parents("ul").find("li").removeClass("switcher-active");
				$(this).parents("ul").find(".cea-secondary-switch").addClass("switcher-active");
				$(switcher_ele).find(".cea-switcher-content > div.cea-switcher-secondary").fadeIn(350);
			}else{
				$(this).parents("ul").find("li").removeClass("switcher-active");
				$(this).parents("ul").find(".cea-primary-switch").addClass("switcher-active");
				$(switcher_ele).find(".cea-switcher-content > div.cea-switcher-primary").fadeIn(350);
			}
		});	
	}
	
	function ceaAccordionContent( accordion_ele ){
		var accordion_ele = $(accordion_ele);
		if( accordion_ele.find(".cea-accordion-id-to-element").length && ! $("body.elementor-editor-active").length ){
			accordion_ele.find(".cea-accordion-id-to-element").each(function( index ) {
				var accordion_id_ele = $(this).data("id");
				var clone_tab = $("#"+accordion_id_ele).clone();
				$(document).find("#"+accordion_id_ele).remove();
				$(this).replaceWith(clone_tab);			
			});
		}
		
		$(accordion_ele).find(".cea-accordion-header a").on( "click", function(){
			var cur_tab = $(this);
			var accordion_id = $(cur_tab).attr("href");
			var accordion_wrap = $(cur_tab).parents(".cea-accordion-elementor-widget");
			
			if( $(accordion_wrap).data("toggle") == 1 ){
				$(accordion_wrap).find(".cea-accordion-header a").toggleClass("active");
				$(accordion_wrap).find(accordion_id).slideToggle(350);
			}else{			
				if( !cur_tab.hasClass("active") ){				
					$(accordion_wrap).find(".cea-accordion-header a").removeClass("active");
					$(cur_tab).addClass("active");
					$(accordion_wrap).find(".cea-accordion-content").slideUp(350);
					$(accordion_wrap).find(accordion_id).slideDown(350);
				}else{
					$(cur_tab).removeClass("active");
					$(accordion_wrap).find(".cea-accordion-content").slideUp(350);
				}
			}
			
			return false;
		});
	}
	
	function ceaTabContent( tabs_ele ){
		var tabs_ele = $(tabs_ele);
		
		if( tabs_ele.find(".cea-tab-id-to-element").length && ! $("body.elementor-editor-active").length ){
			tabs_ele.find(".cea-tab-id-to-element").each(function( index ) {
				var tab_id_ele = $(this).data("id");
				var clone_tab = $("#"+tab_id_ele).clone();
				$(document).find("#"+tab_id_ele).remove();
				$(this).replaceWith(clone_tab);			
			});
		}
		
		$(tabs_ele).find(".cea-tabs a").on( "click", function(){
			var cur_tab = $(this);
			var tab_id = $(cur_tab).attr("href");
			$(cur_tab).parents(".cea-tabs").find("a").removeClass("active");
			$(cur_tab).addClass("active");
			var tab_content_wrap = $(cur_tab).parents(".cea-tabs").next(".cea-tab-content");
			$(tab_content_wrap).find(".cea-tab-pane").fadeOut(0);
			$(tab_content_wrap).find(".cea-tab-pane").removeClass("active");
			$(tab_content_wrap).find(tab_id).fadeIn( 350, function(){
				$(tab_content_wrap).find(tab_id).addClass("active");
			});
			
			return false;
		});
	}
	
	function ceaToggleContent( toggle_ele ){
		var toggle_ele = $(toggle_ele).find(".toggle-content");	
		$(toggle_ele).css('max-height', '');
		$(toggle_ele).removeClass("toggle-content-shown");
		
		var c = parseFloat($(toggle_ele).css("line-height"));
		var line_height = c.toFixed(2);
		var data_hght = $(toggle_ele).data("height");
		data_hght = data_hght ? data_hght : 5;
		var toggle_hgt = data_hght * line_height;
		toggle_hgt = toggle_hgt.toFixed(2);
		toggle_hgt = toggle_hgt + 'px';
		
		var org_hgt = $(toggle_ele).height();
		$(toggle_ele).css('max-height', toggle_hgt);
		$(toggle_ele).addClass("toggle-content-shown");
		var btn_txt_wrap = $(toggle_ele).parents(".toggle-content-inner").find( ".toggle-btn-txt" );
		var btn_org_txt = $(btn_txt_wrap).text();
		var btn_atl_txt = $(toggle_ele).parents(".toggle-content-inner").find( ".toggle-content-trigger" ).data("less");
		$(toggle_ele).parents(".toggle-content-inner").find( ".toggle-content-trigger" ).unbind( "click" );
		$(toggle_ele).parents(".toggle-content-inner").find( ".toggle-content-trigger" ).bind( "click", function(e){			
			event.preventDefault();
			$(toggle_ele).toggleClass("height-expandable");

			$(toggle_ele).parent(".toggle-content-inner").find('.toggle-content-trigger .button-inner-down').fadeToggle(0);
			$(toggle_ele).parent(".toggle-content-inner").find('.toggle-content-trigger .button-inner-up').fadeToggle(0);
			if( $(toggle_ele).hasClass("height-expandable") ){
				$(toggle_ele).css('max-height', org_hgt);
				$(btn_txt_wrap).text(btn_atl_txt);				
			}else{
				$(toggle_ele).css('max-height', toggle_hgt);
				$(btn_txt_wrap).text(btn_org_txt);
			}			
		});
	}

	function ceazozotimeline(cur_ele){
		var cur_ele = $(cur_ele);
		var line_dist = cur_ele.data("distance") ? cur_ele.data("distance") : 60;
		cur_ele.zozotimeline({
			distance: line_dist
		});
	}
		
	function ceaContentSlider( slide_ele ){
		var slide_ele = $(slide_ele);
		var slide_json = JSON.parse(decodeURIComponent(slide_ele.attr("data-cea-slide")));
		var children_ele = slide_ele.children(".elementor-column-wrap").children(".elementor-widget-wrap");
		$(children_ele).addClass("owl-carousel");
		ceaOwlJsonSettings(children_ele, slide_json);
	}
	
	function ceaSectionRainDrops( rd_ele ){
		rd_ele.addClass("section-raindrops-actived");
		var rd_json = JSON.parse(decodeURIComponent(rd_ele.attr("data-cea-raindrops")));
		rd_ele.append('<div class="cea-raindrops-wrap"></div>');
		
		var rd_color = rd_json.rd_color;
		var rd_height = rd_json.rd_height;
		var rd_speed = rd_json.rd_speed;
		var rd_freq = rd_json.rd_freq;
		var rd_density = rd_json.rd_density;
		var rd_id = rd_json.id;
		var rd_pos = rd_json.rd_pos;
		
		if( rd_pos == "top" ){
			rd_ele.find(".cea-raindrops-wrap").css({"top" : "-"+ rd_height +"px"});
		}else{
			rd_ele.find(".cea-raindrops-wrap").css({"bottom" : "0"});
		}
		
		rd_ele.find(".cea-raindrops-wrap").css("height", rd_height + "px");
		
		var rain_ele = rd_ele.find(".cea-raindrops-wrap").raindrops({
			color: rd_color,
			canvasHeight: rd_height,
			rippleSpeed: rd_speed,
			frequency: rd_freq,
			density: rd_density,
			positionBottom: '0'
		});
	}
	
	function ceaSectionParallax( pr_ele ){
		
		var pr_ele = $(pr_ele);
		var pr_json = JSON.parse(decodeURIComponent(pr_ele.attr("data-cea-parallax-data")));
		
		var parallax_ratio = pr_json.parallax_ratio;
		var parallax_img = pr_json.parallax_image;

		pr_ele.prepend('<div class="cea-parallax" data-cea-parallax data-speed="'+ parallax_ratio +'" style="background-image:url('+ parallax_img +')"></div>');
		
		// create variables
		var $fwindow = $(window);
		var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

		// on window scroll event
		$fwindow.on('scroll resize', function() {
			scrollTop = window.pageYOffset || document.documentElement.scrollTop;
		}); 

		// for each of background parallax element
		$(pr_ele).find('.cea-parallax').each(function(){
			var $backgroundObj = $(this);
			var bgOffset = parseInt($backgroundObj.offset().top);
			var yPos;
			var coords;
			var speed = ($backgroundObj.data('speed') || 0 );

			$fwindow.on('scroll resize', function() {
				yPos = - ((scrollTop - bgOffset) / speed);
				coords = '10% '+ yPos + 'px';

				$backgroundObj.css({ backgroundPosition: coords });
			}); 
		}); 

		// triggers winodw scroll for refresh
		$fwindow.trigger('scroll');
		
	}
	
	function ceaSectionFloatParallax( pr_ele ){
		
		var pr_ele = $(pr_ele);
		var pr_json = JSON.parse(decodeURIComponent(pr_ele.attr("data-cea-float")));
		var data_id = pr_ele.attr("data-id");
		var fload_id = data_id;

		$.each( pr_json, function(idx, obj) {
			
			var float_title = obj.float_title;
			var float_img = obj.float_img;
			var float_left = obj.float_left;
			var float_top = obj.float_top;
			var float_distance = obj.float_distance;
			var float_animation = obj.float_animation;
			var float_mouse = obj.float_mouse;
			var float_width = obj.float_width;
			
			var classname = float_animation != '0' ? ' floating-animate-model-' + float_animation : '';
			
			pr_ele.prepend('<div id="float-parallax-'+ fload_id +'" class="float-parallax'+  classname  +'" data-mouse="'+  float_mouse  +'" data-left="'+  float_left  +'" data-top="'+  float_top  +'" data-distance="'+  float_distance  +'"><img alt="'+  float_title  +'" src="'+ float_img  +'" /></div>');

			$("#float-parallax-"+fload_id).ceaparallax({
				t_top: float_top,
				t_left: float_left,
				x_level: float_distance,
				mouse_animation: float_mouse,
				ele_width: float_width
			});

			fload_id++;
		}); // each end
		
	}
	
	function ceaModalPopup( popup_ele ){
		var popup_ele = $(popup_ele);
		popup_ele.magnificPopup({
			type: 'inline',
			preloader: false,
			modal: true,
			mainClass: 'mfp-fade',
			removalDelay: 300
		});
	}
	
	function ceaTilt( tilt_ele ){
		var tilt_ele = $(tilt_ele);
		var _max_tilt = tilt_ele.data("max_tilt") ? tilt_ele.data("max_tilt") : 20;
		var _tilt_perspective = tilt_ele.data("tilt_perspective") ? tilt_ele.data("tilt_perspective") : 500;
		var _tilt_scale = tilt_ele.data("tilt_scale") ? tilt_ele.data("tilt_scale") : 1.1;
		var _tilt_speed = tilt_ele.data("tilt_speed") ? tilt_ele.data("tilt_speed") : 400;
		var _tilt_transition = tilt_ele.data("tilt_trans") ? tilt_ele.data("tilt_trans") : false;
		
		const cea_tilt = $(tilt_ele).tilt({
			maxTilt: _max_tilt,
			perspective: _tilt_perspective,
			scale: _tilt_scale,
			speed: _tilt_speed,
			transition: _tilt_transition
		});
	}
	
	function ceaPopupAnything( popup_ele ){
		var popup_ele = $(popup_ele);
		popup_ele.magnificPopup({
			disableOn: 700,
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,
			fixedContentPos: false,
			/*callbacks: {
				open: function() {
					$($(this.items).find('video')[0]).each(function(){this.player.load()});
				},
				close: function() {
					$($(this.items).find('video')[0]).each(function(){this.player.pause()});
				}
			}*/
			iframe: {
			  markup: '<div class="mfp-iframe-scaler">'+
						'<div class="mfp-close"></div>'+
						'<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
					  '</div>', // HTML markup of popup, `mfp-close` will be replaced by the close button

			  patterns: {
				youtube: {
				  index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).

				  id: 'v=', // String that splits URL in a two parts, second part should be %id%
				  // Or null - full URL will be returned
				  // Or a function that should return %id%, for example:
				  // id: function(url) { return 'parsed id'; }

				  src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe.
				},
				vimeo: {
				  index: 'vimeo.com/',
				  id: '/',
				  src: '//player.vimeo.com/video/%id%?autoplay=1'
				},
				gmaps: {
				  index: '//maps.google.',
				  src: '%id%&output=embed'
				}

				// you may add here more sources

			  },

			  srcAction: 'iframe_src', // Templating object key. First part defines CSS selector, second attribute. "iframe_src" means: find "iframe" and set attribute "src".
			}
		});
	}
	
	function ceaPopover( popover_ele ){
		var popover_ele = $(popover_ele);
		var evnt_name = popover_ele.attr("data-event") ? popover_ele.attr("data-event") : 'hover';
		if( evnt_name == 'hover' ){ 
			popover_ele.on( 'mouseover', function ( e ) {
				e.preventDefault();
				$(this).parents(".popover-wrapper").addClass("popover-active");
			}).on( 'mouseout', function ( e ) {
				e.preventDefault();
				$(this).parents(".popover-wrapper").removeClass("popover-active");
			});
		}else{
			popover_ele.on( 'click', function ( e ) {
				e.preventDefault();
				$(this).parents(".popover-wrapper").toggleClass("popover-active");
			})
		}
	}
	
	function ceaSwitchTabToggle( toggle_ele ){
		if( toggle_ele.checked ) {
			var toggle_ele = $(toggle_ele);
            toggle_ele.parents(".cea-toggle-post-wrap").addClass("cea-active-post");
        }else{
			var toggle_ele = $(toggle_ele);
			toggle_ele.parents(".cea-toggle-post-wrap").removeClass("cea-active-post");
		}
	}
		
	function ceaAgon( canvas_ele ){
		var canvas_ele = $(canvas_ele);
		var canvas = canvas_ele[0];
		var cxt = canvas.getContext("2d");
		var agon_size = canvas_ele.attr( "data-size" );
		var agon_side = canvas_ele.attr( "data-side" );
		var agon_color = canvas_ele.attr( "data-color" );
		var div_val = 1;

		switch( parseInt( agon_side ) ){
			case 3:
				div_val = 6;
			break;
			case 4:
				div_val = 4;
			break;
			case 5:
				div_val = 3.3;
			break;
			case 6:
				div_val = 3;
			break;
			case 7:
				div_val = 2.8;
			break;
			case 8:
				div_val = 2.7;
			break;
			case 9:
				div_val = 2.6;
			break;
			case 10:
				div_val = 2.5;
			break;
		}

		// hexagon
		var numberOfSides = parseInt( agon_side ),
			size = parseInt( agon_size ),
			Xcenter = parseInt( agon_size ),
			Ycenter = parseInt( agon_size ),
			step  = 2 * Math.PI / numberOfSides,//Precalculate step value
			shift = (Math.PI / div_val);//(Math.PI / 180.0);// * 44;//Quick fix ;)

		cxt.beginPath();

		for (var i = 0; i <= numberOfSides;i++) {
			var curStep = i * step + shift;
		   cxt.lineTo (Xcenter + size * Math.cos(curStep), Ycenter + size * Math.sin(curStep));
		}

		/* Direct Output */
		cxt.fillStyle = agon_color;
		cxt.fill();
	}
	
	function initCEAGmap() {
		
		var map_styles = '{ "Aubergine" : [	{"elementType":"geometry","stylers":[{"color":"#1d2c4d"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#8ec3b9"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#1a3646"}]},{"featureType":"administrative.country","elementType":"geometry.stroke","stylers":[{"color":"#4b6878"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"color":"#64779e"}]},{"featureType":"administrative.province","elementType":"geometry.stroke","stylers":[{"color":"#4b6878"}]},{"featureType":"landscape.man_made","elementType":"geometry.stroke","stylers":[{"color":"#334e87"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#023e58"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#283d6a"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#6f9ba5"}]},{"featureType":"poi","elementType":"labels.text.stroke","stylers":[{"color":"#1d2c4d"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#023e58"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#3C7680"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#304a7d"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#98a5be"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#1d2c4d"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#2c6675"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#255763"}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#b0d5ce"}]},{"featureType":"road.highway","elementType":"labels.text.stroke","stylers":[{"color":"#023e58"}]},{"featureType":"transit","elementType":"labels.text.fill","stylers":[{"color":"#98a5be"}]},{"featureType":"transit","elementType":"labels.text.stroke","stylers":[{"color":"#1d2c4d"}]},{"featureType":"transit.line","elementType":"geometry.fill","stylers":[{"color":"#283d6a"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#3a4762"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#0e1626"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#4e6d70"}]}], "Silver" : [{"elementType":"geometry","stylers":[{"color":"#f5f5f5"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#f5f5f5"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"color":"#bdbdbd"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#eeeeee"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#e5e5e5"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#dadada"}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"color":"#e5e5e5"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#eeeeee"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#c9c9c9"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]}], "Retro" : [{"elementType":"geometry","stylers":[{"color":"#ebe3cd"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#523735"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#f5f1e6"}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#c9b2a6"}]},{"featureType":"administrative.land_parcel","elementType":"geometry.stroke","stylers":[{"color":"#dcd2be"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"color":"#ae9e90"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#dfd2ae"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#dfd2ae"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#93817c"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#a5b076"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#447530"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#f5f1e6"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#fdfcf8"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#f8c967"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#e9bc62"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry","stylers":[{"color":"#e98d58"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry.stroke","stylers":[{"color":"#db8555"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#806b63"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"color":"#dfd2ae"}]},{"featureType":"transit.line","elementType":"labels.text.fill","stylers":[{"color":"#8f7d77"}]},{"featureType":"transit.line","elementType":"labels.text.stroke","stylers":[{"color":"#ebe3cd"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#dfd2ae"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#b9d3c2"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#92998d"}]}], "Dark" : [{"elementType":"geometry","stylers":[{"color":"#212121"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#212121"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"color":"#757575"}]},{"featureType":"administrative.country","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]},{"featureType":"administrative.land_parcel","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"color":"#bdbdbd"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#181818"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"featureType":"poi.park","elementType":"labels.text.stroke","stylers":[{"color":"#1b1b1b"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#2c2c2c"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#8a8a8a"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#373737"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#3c3c3c"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry","stylers":[{"color":"#4e4e4e"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"featureType":"transit","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#3d3d3d"}]}], "Night" : [{"elementType":"geometry","stylers":[{"color":"#242f3e"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#746855"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#242f3e"}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"color":"#d59563"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#d59563"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#263c3f"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#6b9a76"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#38414e"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#212a37"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#9ca5b3"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#746855"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#1f2835"}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#f3d19c"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#2f3948"}]},{"featureType":"transit.station","elementType":"labels.text.fill","stylers":[{"color":"#d59563"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#17263c"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#515c6d"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"color":"#17263c"}]}] }';
		
		var map_style_obj = JSON.parse(map_styles);
		
		var map_style_mode = [];
		var map_mode = '';
		var map_lang = '';
		var map_lat = '';
		var map_marker = '';
		var map_options = '';
		
		$( ".ceagmap" ).each(function( index ) {
			
			var gmap = this;

			if( $( gmap ).attr( "data-map-style" ) ){
				map_mode = $( gmap ).data("map-style");
				map_lang = $( gmap ).data("map-lang");
				map_lat = $( gmap ).data("map-lat");
				map_marker = $( gmap ).data("map-marker");
				if( map_mode === 'aubergine' )
					map_style_mode = map_style_obj.Aubergine;
				else if( map_mode === 'silver' )
					map_style_mode = map_style_obj.Silver;
				else if( map_mode === 'retro' )
					map_style_mode = map_style_obj.Retro;
				else if( map_mode === 'dark' )
					map_style_mode = map_style_obj.Dark;
				else if( map_mode === 'night' )
					map_style_mode = map_style_obj.Night;
				else if( map_mode === 'custom' ){
					var c_style = $( gmap ).attr( "data-custom-style" ) && $( gmap ).attr( "data-custom-style" ) != '' ? JSON.parse( $( gmap ).attr( "data-custom-style" ) ) : '[]';
					map_style_mode = c_style;
				}else{
					map_style_mode = "[]";
				}
			}
			
			if( $( gmap ).attr( "data-multi-map" ) && $( gmap ).attr( "data-multi-map" ) == 'true' ){
				
				var map_values = JSON.parse( $( gmap ).attr( "data-maps" ) );
				var map_wheel = $( gmap ).attr( "data-wheel" ) && $( gmap ).attr( "data-wheel" ) == 'true' ? true : false;
				var map_zoom = $( gmap ).attr( "data-zoom" ) && $( gmap ).attr( "data-zoom" ) != '' ? parseInt( $( gmap ).attr( "data-zoom" ) ) : 14;
				var map;

				var map_stat = 1;

				map_values.forEach( function( map_value ) {
					map_lat = map_value.map_latitude;
					map_lang = map_value.map_longitude;
					var LatLng = new google.maps.LatLng( map_lat, map_lang );
					var mapProp= {
						center: LatLng,
						scrollwheel: map_wheel,
						zoom: map_zoom,
						styles: map_style_mode
					};
					
					//Create Map
					if( map_stat ){
						var t_gmap = $( gmap );
						map = new google.maps.Map( t_gmap[0], mapProp );
						
						google.maps.event.addDomListener( window, 'resize', function() {
							var center = map.getCenter();
							google.maps.event.trigger( map, "resize" );
							map.setCenter( LatLng );
						});
						
						map_stat = 0;
					}
					
					//Map Marker
					var marker = new google.maps.Marker({
						position: LatLng,
						icon: map_value.map_marker,
						map: map
					});
					
					//Info Window
					if( map_value.map_info_opt == 'on' ) {
						var info_title = map_value.map_info_title;
						var info_addr = map_value.map_info_address;
						var contentString = '<div class="gmap-info-wrap"><h3>'+ info_title +'</h3><p>'+ info_addr +'</p></div>';
						var infowindow = new google.maps.InfoWindow({
						  content: contentString
						});
						marker.addListener( 'click', function() {
						  infowindow.open( map, marker );
						});
					}
				});
				
			}else{
			
				var LatLng = {lat: parseFloat(map_lat), lng: parseFloat(map_lang)};
				
				var map_wheel = $( gmap ).attr( "data-wheel" ) && $( gmap ).attr( "data-wheel" ) == 'true' ? true : false;
				var map_zoom = $( gmap ).attr( "data-zoom" ) && $( gmap ).attr( "data-zoom" ) != '' ? parseInt( $( gmap ).attr( "data-zoom" ) ) : 14;
				
				var mapProp= {
					center: LatLng,
					scrollwheel: map_wheel,
					zoom: map_zoom,
					styles: map_style_mode
				};
				var t_gmap = $( gmap );
				var map = new google.maps.Map( t_gmap[0], mapProp );
				
				var marker = new google.maps.Marker({
				  position: LatLng,
				  icon: map_marker,
				  map: map
				});
				
				if( $( gmap ).attr( "data-info" ) == 1 ){
					var info_title = $( gmap ).attr( "data-info-title" ) ? $( gmap ).attr( "data-info-title" ) : '';
					var info_addr = $( gmap ).attr( "data-info-addr" ) ? $( gmap ).attr( "data-info-addr" ) : '';
					var contentString = '<div class="gmap-info-wrap"><h3>'+ info_title +'</h3><p>'+ info_addr +'</p></div>';
					var infowindow = new google.maps.InfoWindow({
					  content: contentString
					});
					marker.addListener( 'click', function() {
					  infowindow.open( map, marker );
					});
				}
				
				google.maps.event.addDomListener( window, 'resize', function() {
					var center = map.getCenter();
					google.maps.event.trigger(map, "resize");
					map.setCenter(LatLng);
				});
				
			}// data multi map false part end
			
		}); // end map each
		
	}
	
	function ceaCounterUpSettings( counterup ){
		counterup.appear(function() {
			var $this = $(this),
			countTo = $this.attr( "data-count" ),
			duration = $this.attr( "data-duration" );
			$({ countNum: $this.text()}).animate({
					countNum: countTo
				},
				{
				duration: parseInt( duration ),
				easing: 'swing',
				step: function() {
					$this.text( Math.floor( this.countNum ) );
				},
				complete: function() {
					$this.text( this.countNum );
				}
			});  
		});
	}
	
	function ceaDayCounterSettings( day_counter ){
		var day_counter = $( day_counter );
		var c_date = day_counter.attr('data-date');
		day_counter.countdown( c_date, function(event) {
			if( day_counter.find('.counter-day').length ){
				day_counter.find('.counter-day h3').text( event.strftime('%D') );
			}
			if( day_counter.find('.counter-hour').length ){
				day_counter.find('.counter-hour h3').text( event.strftime('%H') );
			}
			if( day_counter.find('.counter-min').length ){
				day_counter.find('.counter-min h3').text( event.strftime('%M') );
			}
			if( day_counter.find('.counter-sec').length ){
				day_counter.find('.counter-sec h3').text( event.strftime('%S') );
			}
			if( day_counter.find('.counter-week').length ){
				day_counter.find('.counter-week h3').text( event.strftime('%w') );
			}
		});
	}
	
	function ceaPieChartSettings( chart_ele ){
		var chart_ele = $( chart_ele );
		var c_chart = $('#' + chart_ele.attr("id") );
		var chart_labels = c_chart.attr("data-labels");
		var chart_values = c_chart.attr("data-values");
		var chart_bgs = c_chart.attr("data-backgrounds");
		var chart_responsive = c_chart.attr("data-responsive");
		var chart_legend = c_chart.attr("data-legend-position");
		var chart_type = c_chart.attr("data-type");
		var chart_zorobegining = c_chart.attr("data-yaxes-zorobegining");
		
		chart_labels = chart_labels ? chart_labels.split(",") : [];
		chart_values = chart_values ? chart_values.split(",") : [];
		chart_bgs = chart_bgs ? chart_bgs.split(",") : [];
		chart_responsive = chart_responsive ? chart_responsive : 1;
		chart_legend = chart_legend ? chart_legend : 'none';
		chart_type = chart_type ? chart_type : 'doughnut';
		
		if( chart_zorobegining ){
			chart_zorobegining = {
				yAxes: [{
					ticks: {
						beginAtZero: parseInt( chart_zorobegining )
					}
				}]
			}
		}
		
		var ctx = c_chart[0].getContext('2d');
		var myChart = new Chart(ctx, {
			type: chart_type,
			data: {
				labels: chart_labels,
				datasets: [{
					label: '# of Votes',
					data: chart_values,
					backgroundColor: chart_bgs,
					borderWidth: 1
				}]
			},
			options: {
				scales: chart_zorobegining,
				responsive: parseInt( chart_responsive ),
				legend: {
					position: chart_legend,
				}
			}
		});
	}
	
	function ceaLineChartSettings( chart_ele ){
		var chart_ele = $( chart_ele );
		var c_chart = $('#' + chart_ele.attr("id") );
		var chart_labels = c_chart.attr("data-labels");
		var chart_values = c_chart.attr("data-values");
		var chart_bg = c_chart.attr("data-background");
		var chart_border = c_chart.attr("data-border");
		var chart_fill = c_chart.attr("data-fill");
		var chart_zorobegining = c_chart.attr("data-yaxes-zorobegining");
		var chart_title = c_chart.attr("data-title-display");
		var chart_responsive = c_chart.attr("data-responsive");
		var chart_legend = c_chart.attr("data-legend-position");
		
		chart_labels = chart_labels ? chart_labels.split(",") : [];
		chart_values = chart_values ? chart_values.split(",") : [];
		chart_bg = chart_bg ? chart_bg : '';
		chart_border = chart_border ? chart_border : '';
		chart_fill = chart_fill ? chart_fill : 0;
		
		chart_zorobegining = chart_zorobegining ? chart_zorobegining : 1;
		chart_title = chart_title ? chart_title : 1;
		chart_responsive = chart_responsive ? chart_responsive : 1;
		chart_legend = chart_legend ? chart_legend : 'none';
		
		var ctx = c_chart[0].getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: chart_labels,
				datasets: [{
					label: '# of Votes',
					data: chart_values,
					fill: parseInt( chart_fill ),
					backgroundColor: chart_bg,
					borderColor: chart_border,
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: parseInt( chart_zorobegining )
						}
					}]
				},
				responsive: parseInt( chart_responsive ),
				legend: {
					position: chart_legend,
				},
				title: {
					display: parseInt( chart_title ),
				}
			}
		});
	}
	
	function ceaAnimatedTextSettings( cur_ele, index ){
		var cur_ele = $(cur_ele);
		var typing_text = cur_ele.attr("data-typing") ? cur_ele.attr("data-typing") : [];
		if( typing_text ){
			typing_text = typing_text.split(",");
			
			var type_speed = cur_ele.data("typespeed") ? cur_ele.data("typespeed") : 100;
			var back_speed = cur_ele.data("backspeed") ? cur_ele.data("backspeed") : 100;
			var back_delay = cur_ele.data("backdelay") ? cur_ele.data("backdelay") : 1000;
			var start_delay = cur_ele.data("startdelay") ? cur_ele.data("startdelay") : 1000;
			var cur_char = cur_ele.data("char") ? cur_ele.data("char") : '|';
			var loop = cur_ele.data("loop") ? cur_ele.data("loop") : false;

			var typed = new Typed(cur_ele[index], {
				typeSpeed: type_speed,
				backSpeed: back_speed,
				backDelay: back_delay,
				startDelay: start_delay,
				strings: typing_text,
				loop: loop,
				cursorChar: cur_char
			});

		}
	}
	
	function ceaCircleProgresSettings( circle_ele ){
		circle_ele.appear(function() {						  
			var c_circle = $( this );
			var c_value = c_circle.attr( "data-value" );
			var c_size = c_circle.attr( "data-size" );
			var c_thickness = c_circle.attr( "data-thickness" );
			var c_duration = c_circle.attr( "data-duration" );
			var c_empty = c_circle.attr( "data-empty" ) != '' ? c_circle.attr( "data-empty" ) : 'transparent';
			var c_scolor = c_circle.attr( "data-scolor" );
			var c_ecolor = c_circle.attr( "data-ecolor" ) != '' ? c_circle.attr( "data-ecolor" ) : c_scolor;
								
			c_circle.circleProgress({
				value: Math.floor( c_value ) / 100,
				size: Math.floor( c_size ),
				thickness: Math.floor( c_thickness ),
				emptyFill: c_empty,
				animation: {
					duration: Math.floor( c_duration )
				},
				lineCap: 'round',
				fill: {
					gradient: [c_scolor, c_ecolor]
				}
			}).on( 'circle-animation-progress', function( event, progress ) {
				$( this ).find( '.progress-value' ).html( Math.round( c_value * progress ) + '%' );
			});
		});
	}
	
	function ceaImageBeforeAfterSettings( c_imgc ){
		
		var c_imgc = $( c_imgc );	
		var _offset = c_imgc.attr("data-offset") ? c_imgc.attr("data-offset") : 0.5;
		var _orientation = c_imgc.attr("data-orientation") ? c_imgc.attr("data-orientation") : 'horizontal';
		var _before = c_imgc.attr("data-before") ? c_imgc.attr("data-before") : '';
		var _after = c_imgc.attr("data-after") ? c_imgc.attr("data-after") : '';
		var _noverlay = c_imgc.attr("data-noverlay") ? c_imgc.attr("data-noverlay") : false;
		var _hover = c_imgc.attr("data-hover") ? c_imgc.attr("data-hover") : false;
		var _swipe = c_imgc.attr("data-swipe") ? c_imgc.attr("data-swipe") : false;
		var _move = c_imgc.attr("data-move") ? c_imgc.attr("data-move") : false;
		
		c_imgc.zozoimgc({
			default_offset_pct: _offset,
			orientation: _orientation,
			before_label: _before,
			after_label: _after,
			no_overlay: _noverlay,
			move_slider_on_hover: _hover,
			move_with_handle_only: _swipe,
			click_to_move: _move
		});
		
	}
	
	function ceaMailchimp( mc_wrap ){
		var mc_wrap = $( mc_wrap );
		mc_wrap.on( "keyup", ".cea-mc", function ( e ) {
			mc_wrap.find('input').removeClass("must-fill");
		});
		
		mc_wrap.on( "click", ".cea-mc", function ( e ) {
			e.preventDefault();
			var c_btn = $(this);
			var mc_form = $( this ).parents('.zozo-mc-form');
			mc_wrap.find('.mc-notice-msg').removeClass("mc-success mc-failure");
			mc_wrap.find('input').removeClass("must-fill");
			if( mc_form.find('input[name="cea_mc_email"]').val() == '' ){
				mc_form.find('input[name="cea_mc_email"]').addClass("must-fill");
			}else{
				
				var mc_nounce = mc_wrap.find('input[name="cea_mc_nonce"]').val();
				
				c_btn.attr( "disabled", "disabled" );
				$.ajax({
					type: "POST",
					url: cea_ajax_var.ajax_url,
					data: 'action=cea_mailchimp&nonce='+ mc_nounce +'&'+ mc_form.serialize(),
					success: function (data) {
						//Success
						c_btn.removeAttr( "disabled" );
						if( data == 'success' ){
							mc_wrap.find('.mc-notice-msg').addClass("mc-success");
							mc_wrap.find('.mc-notice-msg').text( mc_wrap.find('.mc-notice-group').attr('data-success') );
						}else{
							mc_wrap.find('.mc-notice-msg').addClass("mc-failure");
							mc_wrap.find('.mc-notice-msg').text( mc_wrap.find('.mc-notice-group').attr('data-fail') );
						}
					},error: function(xhr, status, error) {
						c_btn.removeAttr( "disabled" );
						mc_wrap.find('.mc-notice-msg').text( mc_wrap.find('.mc-notice-group').attr('data-fail') );
					}
				});
			}
		});
	}
	
	function ceaIsotopeLayout( c_elem ){
		var c_elem = $(c_elem);
		var parent_width = c_elem.width();
		var gutter_size = c_elem.data( "gutter" );
		var grid_cols = c_elem.data( "cols" );
		var filter = '';

		var layoutmode = c_elem.is('[data-layout]') ? c_elem.data( "layout" ) : '';
		var lazyload = c_elem.is('[data-lazyload]') ? c_elem.data( "lazyload" ) : '';
		layoutmode = layoutmode ? layoutmode : 'masonry';
		lazyload = lazyload ? '0s' : '0.4s';
		
		if( $(window).width() < 768 ) grid_cols = 1;
		
		var net_width = Math.floor( ( parent_width - ( gutter_size * ( grid_cols - 1 ) ) ) / grid_cols );
		c_elem.find( ".isotope-item" ).css({'width':net_width+'px', 'margin-bottom':gutter_size+'px'});
		
		var cur_isotope;		
		cur_isotope = c_elem.isotope({
			itemSelector: '.isotope-item',
			layoutMode: layoutmode,
			filter: filter,
			transitionDuration: lazyload,
			masonry: {
				gutter: gutter_size
			},
			fitRows: {
			  gutter: gutter_size
			}
		});
		
		/* Isotope filter item */
		var filter_wrap = '';
		if( $(c_elem).parent(".woocommerce").length ){
			filter_wrap = $(c_elem).parent(".woocommerce").prev(".isotope-filter");	
		}else{
			filter_wrap = $(c_elem).prev(".isotope-filter");
		}
		$(filter_wrap).find( ".isotope-filter-item" ).on( 'click', function() {
			$( this ).parents("ul.nav").find("li").removeClass("active");
			$( this ).parent("li").addClass("active");
			filter = $( this ).attr( "data-filter" );
			if( c_elem.find( ".isotope-item" + filter ).hasClass( "cea-animate" ) ){
				if( filter ){
					c_elem.find( ".isotope-item" + filter ).removeClass("run-animate");
				}else{
					c_elem.find( ".isotope-item" ).removeClass("run-animate");
				}
				cea_scroll_animation(c_elem);
			}
			cur_isotope.isotope({ 
				filter: filter
			});
			
			return false;
		});
		
		//Animate isotope items
		if( c_elem.find( ".isotope-item" ).hasClass( "cea-animate" ) ){
			cea_scroll_animation(c_elem);
			$(window).on('scroll', function(){
				cea_scroll_animation(c_elem);
			});
		}else{
			c_elem.children(".isotope-item").addClass("item-visible");
		}
		
		/* Isotope infinite */
		if( c_elem.data( "infinite" ) == 1 && $("ul.post-pagination").length ){
			
			var loadmsg = c_elem.data( "loadmsg" );
			var loadend = c_elem.data( "loadend" );
			var loadimg = c_elem.data( "loadimg" );
			
			let msnry = cur_isotope.data('isotope');
			
			cur_isotope.infiniteScroll({
				path: 'a.next-page',
				status: '.page-load-status',
				history: false
			});
			
			cur_isotope.on( 'load.infiniteScroll', function( event, response, path ) {				
				var $items = $( response ).find('.isotope-item');
				$items.css({'width':net_width+'px', 'margin-bottom':gutter_size+'px'});
				$items.imagesLoaded( function() {
					cur_isotope.append( $items );
					cur_isotope.isotope( 'insert', $items );
					cea_scroll_animation(c_elem);
					if( $items.hasClass( "cea-animate" ) ){
						cea_scroll_animation(c_elem);
					}else{
						$items.addClass("item-visible");
					}
				});
			});
			
		}

		/* Isotope resize */
		$( window ).resize(function() {
			setTimeout(function(){ 
				grid_cols = c_elem.data( "cols" );
				if( $(window).width() < 768 ) grid_cols = 1;
				
				var parent_width = c_elem.width();
				net_width = Math.floor( ( parent_width - ( gutter_size * ( grid_cols - 1 ) ) ) / grid_cols );
				c_elem.find( ".isotope-item" ).css({'width':net_width+'px'});
				var $isot = c_elem.isotope({
					itemSelector: '.isotope-item',
					isotope: {
						gutter: gutter_size
					}
				});
				
			}, 200);			
		});
		
		$( window ).load(function() {
			$( window ).trigger("resize");
		});

	}
		
	function ceaPopupGallerySettings( c_popup ){
		//var c_popup = $(c_popup);
		$(c_popup).magnificPopup({
			delegate: '.image-gallery-link',
			type: 'image',
			closeOnContentClick: false,
			closeBtnInside: false,
			mainClass: 'mfp-with-zoom mfp-img-mobile',
			gallery: {
				enabled: true
			},
		});
	}

	function ceaOwlSettings(c_owlCarousel){
		var c_owlCarousel = $(c_owlCarousel);
		// Data Properties
		var loop = c_owlCarousel.data( "loop" );
		var margin = c_owlCarousel.data( "margin" );
		var center = c_owlCarousel.data( "center" );
		var nav = c_owlCarousel.data( "nav" );
		var dots_ = c_owlCarousel.data( "dots" );
		var items = c_owlCarousel.data( "items" );
		var items_tab = c_owlCarousel.data( "items-tab" );
		var items_mob = c_owlCarousel.data( "items-mob" );
		var duration = c_owlCarousel.data( "duration" );
		var smartspeed = c_owlCarousel.data( "smartspeed" );
		var scrollby = c_owlCarousel.data( "scrollby" );
		var autoheight = c_owlCarousel.data( "autoheight" );
		var autoplay = c_owlCarousel.data( "autoplay" );
		var rtl = $( "body.rtl" ).length ? true : false;

		$( c_owlCarousel ).owlCarousel({
			rtl : rtl,
			loop	: loop,
			autoplayTimeout	: duration,
			smartSpeed	: smartspeed,
			center: center,
			margin	: margin,
			nav		: nav,
			dots	: dots_,
			autoplay	: autoplay,
			autoheight	: autoheight,
			slideBy		: scrollby,
			navText		: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
			responsive:{
				0:{
					items: items_mob
				},
				544:{
					items: items_tab
				},
				992:{
					items: items
				}
			}
		});	
	}
	
	function ceaOwlJsonSettings(c_owlCarousel, data_json){
		var c_owlCarousel = $(c_owlCarousel);
		// Data Properties
		var loop = data_json.loop == '1' ? true : false;
		var margin = parseInt( data_json.margin );
		var center = data_json.center == '1' ? true : false;
		var nav = data_json.navigation == '1' ? true : false;
		var dots_ = data_json.pagination == '1' ? true : false;
		var items = parseInt( data_json.items );
		var items_tab = parseInt( data_json.tab_items );
		var items_mob = parseInt( data_json.mobile_items );
		var duration = parseInt( data_json.duration );
		var smartspeed = parseInt( data_json.smart_speed );
		var scrollby = parseInt( data_json.scrollby );
		var autoheight = data_json.auto_height == '1' ? true : false;
		var autoplay = data_json.autoplay == '1' ? true : false;
		var rtl = $( "body.rtl" ).length ? true : false;

		$( c_owlCarousel ).owlCarousel({
			rtl : rtl,
			loop	: loop,
			autoplayTimeout	: duration,
			smartSpeed	: smartspeed,
			center: center,
			margin	: margin,
			nav		: nav,
			dots	: dots_,
			autoplay	: autoplay,
			autoheight	: autoheight,
			slideBy		: scrollby,
			responsive:{
				0:{
					items: items_mob
				},
				544:{
					items: items_tab
				},
				992:{
					items: items
				}
			}
		});	
	}
	
	jQuery.fn.redraw = function() {
		return this.hide(0, function() {
			$(this).show();
		});
	};
	
} )( jQuery );

