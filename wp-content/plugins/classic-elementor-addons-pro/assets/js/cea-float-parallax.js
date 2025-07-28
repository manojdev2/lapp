(function ( $ ) {
 
    $.fn.ceaparallax = function( options ) {
		
        // This is the easiest way to have default options.
        var settings = $.extend({
            left: this.offset().left,
			t_top: 100,
			t_left: 100,
			y_level: 20,
			x_level: 40,
			mouse_animation: 0,
			ele_width: '20px'
        }, options );
		
		this.css({ 'width': settings.ele_width, 'top': settings.t_top + '%', 'left': settings.t_left + '%' });
		
		
		var ele = this;
		var parent_section = ele.parents("section");
		
		if( settings.mouse_animation != '1' ){
			if( !parent_section.hasClass('float-parallax-started') ) parent_section.addClass("float-parallax-started");
		}else{
		
			var last_X = this.offset().left - 50;
		
			$( window ).mousemove( function( e ) {
				var change;
				
				if( !parent_section.hasClass('float-parallax-started') ) parent_section.addClass("float-parallax-started");
				
				var xpos = e.clientX;
				var ypos = e.clientY;
				
				xpos = xpos * 2; ypos = ypos * 2;
				
				var last_x = ( last_X + ( xpos / settings.x_level ) );
				var last_y = ( ( ypos / settings.y_level ) + settings.t_top/2 );
				
				ele.css('top',( last_y + "px" ) );
				ele.css('left',( last_x + "px" ) );

			});
		}
 
    };
 
}( jQuery ));