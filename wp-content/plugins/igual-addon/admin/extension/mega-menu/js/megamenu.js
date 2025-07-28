/*
 * Zozo Megamenu Framework
 * 
 */
( function( $ ) {
	"use strict";
	
	var _cur_menu = '';
	var _cur_json = '';
	var _cur_depth = '';
	var _parent_0 = '';
	var _t_cur_json = '';

	$(document).ready(function() {
		
		$(document).find('.igual-general-settings-form').magnificPopup({
			type: 'inline',
			preloader: false,
			callbacks: {
				close: function() {
					$("#igual-general-settings-form").removeClass("megamenu-actived menu-depth-"+_cur_depth);
				},
				beforeOpen: function() {

					_cur_menu = _cur_json = _cur_depth = _t_cur_json = '';

					_cur_menu = "#edit-menu-item-igual-" + $(this.st.el).data("menu");
					_cur_depth = $(this.st.el).data("depth");
					_cur_json = JSON.parse($(_cur_menu).val());

					if( _cur_json.icon ) $("select.igual-menu-icons").val(_cur_json.icon);
					else $("select.igual-menu-icons").val(null);

					if( _cur_json.megamenu ) $("input.igual-megamenu-option").prop( "checked", true );
					else $("input.igual-megamenu-option").prop( "checked", false );

					if( _cur_json.megamenucol ) $("select.igual-megamenu-col").val(_cur_json.megamenucol);
					else $("select.igual-megamenu-col").val('12');

					if( _cur_json.megamenuwidget ) $("select.igual-megamenu-widget").val(_cur_json.megamenuwidget);
					else $("select.igual-megamenu-widget").val(null);

					$("#igual-general-settings-form").addClass("menu-depth-"+_cur_depth);
					if( _cur_depth !== 0 ) {
						_cur_json.megamenu = 0;
						_parent_0 = $(this.st.el).parents("li.menu-item");
						do{
							_parent_0 = $(_parent_0).prev("li.menu-item");
						}while( !$(_parent_0).hasClass("menu-item-depth-0") );
						_t_cur_json = JSON.parse($("#edit-menu-item-igual-" + $(_parent_0).find(".igual-general-settings-form").data("menu")).val());
						if( _t_cur_json.megamenu === 1 ) $("#igual-general-settings-form").addClass("megamenu-actived");
					}

					$("select.igual-menu-icons").on("change", function(){
						_cur_json.icon = $(this).val();
						$(_cur_menu).val(JSON.stringify(_cur_json));
					});

					$("input.igual-megamenu-option").on("click", function(){
						_cur_json.megamenu = $(this).prop("checked") ? 1 : 0;
						$(_cur_menu).val(JSON.stringify(_cur_json));
					});

					$("select.igual-megamenu-col").on("change", function(){
						_cur_json.megamenucol = $(this).val();
						$(_cur_menu).val(JSON.stringify(_cur_json));
					});

					$("select.igual-megamenu-widget").on("change", function(){
						_cur_json.megamenuwidget = $(this).val();
						$(_cur_menu).val(JSON.stringify(_cur_json));
					});
				}
			}
		});

		var _menu_icons = igual_object.icons;
		$.each(_menu_icons, function( index, value ) {
			let _icon_code = value[2].replace( "\\", "&#x" );
			$(".igual-menu-icons").append( '<option value="'+ value[1] +'">'+ value[1].replace('ti-','') + ' - '+ _icon_code +';</option>' );
		});
	});

	/*var zozo_megamenu = {
		menu_item_move: function() {
			$(document).on( 'mouseup', '.menu-item-bar', function( event, ui ) {
				if( ! $(event.target).is('a') ) {
					setTimeout( zozo_megamenu.update_megamenu_fields, 200 );
				}
			});
		},
		update_megamenu_status: function() {
			
			$(document).on( 'click', '.edit-menu-item-submegamenu', function() {
				var submegamenu = $( this ).parents( '.menu-item' );
				if( $( this ).is( ':checked' ) ) {
					submegamenu.addClass( 'zozo-submegamenu-active' );
				} else 	{
					submegamenu.removeClass( 'zozo-submegamenu-active' );
				}
			});
			$(document).on( 'click', '.edit-menu-item-megamenu', function() {
				var parent_menu_item = $( this ).parents( '.menu-item:eq(0)' );
				if( $( this ).is( ':checked' ) ) {
					parent_menu_item.addClass( 'zozo-megamenu-active' );
				} else 	{
					parent_menu_item.removeClass( 'zozo-megamenu-active' );
				}
				zozo_megamenu.update_megamenu_fields();
			});
		},
		
		update_megamenu_fields: function() {
			var menu_items = $( '.menu-item');
			
			menu_items.each( function( i ) 	{
				var zozo_megamenu_status = $( '.edit-menu-item-megamenu', this );
				if( ! $(this).is( '.menu-item-depth-0' ) ) {
					var check_against = menu_items.filter( ':eq('+(i-1)+')' );
					if( check_against.is( '.zozo-megamenu-active' ) ) {
						zozo_megamenu_status.attr( 'checked', 'checked' );
						$(this).addClass( 'zozo-megamenu-active' );
					} else {
						zozo_megamenu_status.removeAttr( "checked" );
						$(this).removeClass( 'zozo-megamenu-active' );
					}
				} else {
					if( zozo_megamenu_status.attr( 'checked' ) ) {
						$(this).addClass( 'zozo-megamenu-active' );
					}
				}
			});
			
			$( ".menu-item" ).not( ".menu-item-depth-0" ).each(function() {
				$(this).find('input.edit-menu-item-megamenu').removeAttr( 'checked' );						
			});
			
			setTimeout(function(){
				$( ".menu-item.menu-item-depth-0.zozo-megamenu-active" ).each(function() {
					if( ! $(this).find('input.edit-menu-item-megamenu:checked').length ){
						$(this).removeClass('zozo-megamenu-active');
					}
				});				
			}, 100);
			
			$( ".edit-menu-item-submegamenu" ).each(function() {
				var submegamenu = $( this ).parents( '.menu-item' );
				if( $( this ).is( ':checked' ) ) {
					submegamenu.addClass( 'zozo-submegamenu-active' );
				} else 	{
					submegamenu.removeClass( 'zozo-submegamenu-active' );
				}
			});
			
		}
	};
	
	$(document).ready(function(){
	
		zozo_megamenu.menu_item_move();
		zozo_megamenu.update_megamenu_status();
		zozo_megamenu.update_megamenu_fields();
		
	});*/
	
})( jQuery );