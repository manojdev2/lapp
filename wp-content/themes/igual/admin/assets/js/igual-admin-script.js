/*
 * Zozo woo base addon sctipts
 */ 

(function( $ ) {

	"use strict";
	
	$( document ).ready(function() {		
		
		$("a.custom-sidebar-create").on( "click", function(){
			$(this).prev("form").submit();
		});
		
		$( document ).on( "click", ".custom-sidebar-export", function() {
			$.ajax({
				type: "post",
				url: ajaxurl,
				data: "action=igual-custom-sidebar-export&nonce="+ $("#igual_custom_sidebar_nonce").val() ,
				success: function( data ){
					$("<a />", {
						"download": "custom-sidebars.json",
						"href" : "data:application/json," + encodeURIComponent( data )
					}).appendTo("body").on( "click", function() {
						$(this).remove();
					})[0].click ();
				}
			});
			return false;
		});
		
		$(".igual-custom-sidebar-table a.igual-sidebar-remove").on( "click", function(){
			$("#igual-sidebar-remove-name").val( $(this).data("sidebar") );
			$(this).parents("form").submit();
		});
		
		$(".igual-custom-font-table a.igual-font-remove").on( "click", function(){
			$("#igual-font-remove-name").val( $(this).data("font") );
			$(this).parents("form").submit();
		});
		
		$( document ).on( "click", ".igual-custom-fonts-upload", function() {
			if( $('#igual-custom-fonts').get(0).files.length ) {
				$(this).prev("form").submit();
			}
			return false;
		});
		
		$( document ).on( "click", ".bulk-activator", function(e) {
			$("#multi-plugins-active-form").find("input.igual-bulk-plugins").remove();
			$( document ).find(".bulk-activator").each(function(){
				if( $(this).is(":checked") ){
					$("#multi-plugins-active-form").append('<input type="hidden" class="igual-bulk-plugins" name="igual_bulk_plugins['+ $(this).val() +']" value="'+ $(this).val() +'" />');		
				}
			});
		});
		
		$( document ).on( "click", ".igual-bulk-action", function(e) {
			e.preventDefault();
			if( $( document ).find(".igual-bulk-plugins").length ){
				$("#multi-plugins-active-form").submit();
			}else{
				alert("!You have to choose atleast 1 plugin to make bulk action.");
			}
		});
		
		$("#multi-plugins-active-form").on( "submit", function(e) {
			e.preventDefault();
			var form_data = $("#multi-plugins-active-form").serializeArray();
			var form_data_n = {};
			$.each( form_data, function( key, value ) {
				form_data_n[value.name] = value.value;
			});
			form_data_n.plugins = igual_admin_ajax_var.tgm_plugins;
			$(document).find(".igual-plugins-box").addClass("overlay");
			$(document).find("p.igual-settings-msg > img.bulk-process-loader").fadeIn(200);
			$.ajax({
				type: 'POST',
				url: ajaxurl,
				data: form_data_n,
				success: function(data){
					console.log(data);
					window.location = location.href;
					$(document).find(".igual-plugins-box").removeClass("overlay");
					$(document).find("p.igual-settings-msg > img.bulk-process-loader").fadeOut(200);
				},
				error: function(response, errorThrown){
					window.location = location.href;
					$(document).find(".igual-plugins-box").removeClass("overlay");
					$(document).find("p.igual-settings-msg > img.bulk-process-loader").fadeOut(200);
				}
			});
		});
		
		if( $("#zozo-envato-deactivation-form").length ){
			$("#zozo-envato-deactivation-form").on( "submit", function(e) {
				e.preventDefault();
				var _form = $("#zozo-envato-deactivation-form");
				//enable loader
				$(_form).find('input[type="submit"]').attr("disabled", "disabled");
				$(_form).find(".process-loader").addClass("active");
				
				var form_data = $(_form).serialize();
				$.ajax({
					type: 'POST',
					url: ajaxurl,
					data: "action=igual_theme_deactivate&"+form_data,
					success: function(data){
						console.log(data);
						$(_form).find('input[type="submit"]').removeAttr("disabled");
						$(_form).find(".process-loader").removeClass("active");
						window.location = location.href;
					},
					error: function(response, errorThrown){
						window.location = location.href;
					}
				});
				
			});
		}
		
		if( $("#zozo-envato-registration-form").length ){
			$("#zozo-envato-registration-form").on( "submit", function(e) {
				e.preventDefault();
				var _form = $("#zozo-envato-registration-form");
				
				//enable loader
				$(_form).find('input[type="submit"]').attr("disabled", "disabled");
				$(_form).find(".process-loader").addClass("active");
				$(_form).find(".verfication-txt").removeClass("active");
				
				var form_data = $(_form).serialize();
				$.ajax({
					type: 'POST',
					url: ajaxurl,
					data: "action=igual_theme_verify&"+form_data,
					success: function(data){
						$(_form).find('input[type="submit"]').removeAttr("disabled");
						$(_form).find(".process-loader").removeClass("active");
						console.log(data);
						if( data.error_message ){
							if( data.error_message == 'already' ){
								$(_form).find(".verfication-txt").html(igual_admin_ajax_var.already_used);
								$(_form).find(".verfication-txt").addClass("active");
							}else{							
								$(_form).find(".verfication-txt").html(data.error_message);
								$(_form).find(".verfication-txt").addClass("active");
							}
						}else if( data.status && data.status == 'success' ){
							window.location = location.href;
						}
					},
					error: function(response, errorThrown){
						window.location = location.href;
					}
				});
			});
		}
		
	});	
	
	$( window ).load(function() {
		if( $( ".admin-box-slide-wrap .owl-carousel" ).length ){
			$( ".admin-box-slide-wrap .owl-carousel" ).owlCarousel({
				loop: true,
				margin: 0,
				autoplay: true,
				autoplayTimeout: 4000,
				items: 1
			});
		}
	});
	
})( jQuery );