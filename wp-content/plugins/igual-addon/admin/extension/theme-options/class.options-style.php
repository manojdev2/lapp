<?php
class Igual_Theme_Styles {
   
   	public $igual_options;
	private $exists_fonts = array();
	public static $igual_gf_array = array();
   
    function __construct() {
		$this->igual_options = get_option( 'igual_options' );
    }

	function igual_get_option($field){
		$igual_options = $this->igual_options;
		return isset( $igual_options[$field] ) && $igual_options[$field] != '' ? $igual_options[$field] : '';
	}
	
	function igual_dimension_settings($field, $property = 'width'){
		$igual_options = $this->igual_options;
		$units = 'px'; $dimension = '';
		if( isset( $igual_options[$field] ) ){
			$units = isset( $igual_options[$field]['units'] ) ? $igual_options[$field]['units'] : $units;
			$dimension = isset( $igual_options[$field][$property] ) && $igual_options[$field][$property] != '' ? absint( $igual_options[$field][$property] ) . $units : '';
		}
		return $dimension;
	}

	function igual_image_settings($field){
		$igual_options = $this->igual_options;
		$img_arr = array(
			'id' => null,
			'url' => null
		);
		$image = isset( $igual_options[$field] ) && isset( $igual_options[$field]['image'] ) ? $igual_options[$field]['image'] : '';
		if( !empty( $image ) ){
			$img_arr['id'] = isset( $image['id'] ) ? $image['id'] : null;
			$img_arr['url'] = isset( $image['url'] ) ? $image['url'] : null;
		}
		return $img_arr;
	}
	
	function igual_border_settings($field, $class_names = null){
		$igual_options = $this->igual_options;

		if( isset( $igual_options[$field] ) ):

			$stat = false;
			$position = array( 'top', 'right', 'bottom', 'left' );
			foreach( $position as $key ){
				if( isset( $igual_options[$field][$key] ) && $igual_options[$field][$key] != NULL && !$stat ) $stat = true;
			}
		
			$boder_style = isset( $igual_options[$field]['style'] ) && $igual_options[$field]['style'] != '' ? $igual_options[$field]['style'] : '';
			$border_color = isset( $igual_options[$field]['color'] ) && $igual_options[$field]['color'] != '' ? $igual_options[$field]['color'] : '';

			if( $class_names && $stat ) echo $class_names . ' {';
			
			if( isset( $igual_options[$field]['top'] ) && $igual_options[$field]['top'] != NULL ):
				echo 'border-top-width: '. $igual_options[$field]['top'] .'px;';
				if( $boder_style ) echo 'border-top-style: '. $boder_style .';';
				if( $border_color ) echo 'border-top-color: '. $border_color .';';
			endif;
			
			if( isset( $igual_options[$field]['right'] ) && $igual_options[$field]['right'] != NULL ):
				echo 'border-right-width: '. $igual_options[$field]['right'] .'px;';
				if( $boder_style ) echo 'border-right-style: '. $boder_style .';';
				if( $border_color ) echo 'border-right-color: '. $border_color .';';
			endif;
			
			if( isset( $igual_options[$field]['bottom'] ) && $igual_options[$field]['bottom'] != NULL ):
				echo 'border-bottom-width: '. $igual_options[$field]['bottom'] .'px;';
				if( $boder_style ) echo 'border-bottom-style: '. $boder_style .';';
				if( $border_color ) echo 'border-bottom-color: '. $border_color .';';
			endif;
			
			if( isset( $igual_options[$field]['left'] ) && $igual_options[$field]['left'] != NULL ):
				echo 'border-left-width: '. $igual_options[$field]['left'] .'px;';
				if( $boder_style ) echo 'border-left-style: '. $boder_style .';';
				if( $border_color ) echo 'border-left-color: '. $border_color .';';
			endif;

			if( $class_names && $stat ) echo '}';
			
		endif;
	}
	
	function igual_padding_settings($field, $class_names = null){
		$igual_options = $this->igual_options;
		$stat = false;
		$position = array( 'top', 'right', 'bottom', 'left' );
		foreach( $position as $key ){
			if( isset( $igual_options[$field][$key] ) && $igual_options[$field][$key] != NULL && !$stat ) $stat = true;
		}
		if( isset( $igual_options[$field] ) ):
			if( $class_names && $stat ) echo $class_names . ' {';	
			echo isset( $igual_options[$field]['top'] ) && $igual_options[$field]['top'] != NULL ? 'padding-top: '. $igual_options[$field]['top'] .'px;' : '';
			echo isset( $igual_options[$field]['right'] ) && $igual_options[$field]['right'] != NULL ? 'padding-right: '. $igual_options[$field]['right'] .'px;' : '';
			echo isset( $igual_options[$field]['bottom'] ) && $igual_options[$field]['bottom'] != NULL ? 'padding-bottom: '. $igual_options[$field]['bottom'] .'px;' : '';
			echo isset( $igual_options[$field]['left'] ) && $igual_options[$field]['left'] != NULL ? 'padding-left: '. $igual_options[$field]['left'] .'px;' : '';
			if( $class_names && $stat ) echo '}';
		endif;
	}
	
	function igual_margin_settings($field, $class_names = null){
		$igual_options = $this->igual_options;
		$stat = false;
		$position = array( 'top', 'right', 'bottom', 'left' );
		foreach( $position as $key ){
			if( isset( $igual_options[$field][$key] ) && $igual_options[$field][$key] != NULL && !$stat ) $stat = true;
		}
		if( isset( $igual_options[$field] ) ):	
			if( $class_names && $stat ) echo $class_names . ' {';	
			echo isset( $igual_options[$field]['top'] ) && $igual_options[$field]['top'] != NULL ? 'margin-top: '. $igual_options[$field]['top'] .'px;' : '';
			echo isset( $igual_options[$field]['right'] ) && $igual_options[$field]['right'] != NULL ? 'margin-right: '. $igual_options[$field]['right'] .'px;' : '';
			echo isset( $igual_options[$field]['bottom'] ) && $igual_options[$field]['bottom'] != NULL ? 'margin-bottom: '. $igual_options[$field]['bottom'] .'px;' : '';
			echo isset( $igual_options[$field]['left'] ) && $igual_options[$field]['left'] != NULL ? 'margin-left: '. $igual_options[$field]['left'] .'px;' : '';
			if( $class_names && $stat ) echo '}';
		endif;
	}

	function igual_color($field, $class_names = null){
		$igual_options = $this->igual_options;
		if( isset( $igual_options[$field] ) && $igual_options[$field] != '' ) {
			if( $class_names ) echo $class_names . '{';
			echo 'color: '. $igual_options[$field] .';';
			if( $class_names ) echo '}';
		}
	}
	
	function igual_link_color($field, $fun, $class_names = null){
		$igual_options = $this->igual_options;
		if( isset( $igual_options[$field][$fun] ) && $igual_options[$field][$fun] != '' ) {
			if( $class_names ) echo $class_names . '{';
			echo 'color: '. $igual_options[$field][$fun] .';';
			if( $class_names ) echo '}';
		}
	}
	
	function igual_button_color($field, $fun, $class_names = null){
		$igual_options = $this->igual_options;
		if( isset( $igual_options[$field][$fun] ) && $igual_options[$field][$fun] != '' ) {
			if( $class_names ) echo $class_names . '{';
				switch( $fun ){
					case "hfore":
					case "fore":
						echo 'color: '. $igual_options[$field][$fun] .';';
					break;
					case "hbg":
					case "bg":
						echo 'background-color: '. $igual_options[$field][$fun] .';';
					break;
					case "hborder":
					case "border":
						echo 'border-color: '. $igual_options[$field][$fun] .';';
					break;
				}
			if( $class_names ) echo '}';
		}
	}
		
	function igual_bg_settings($field, $class_names = null){
		$igual_options = $this->igual_options;
		if( isset( $igual_options[$field] ) ):

			$stat = false;
			$keys = array( 'bg_color', 'bg_repeat', 'bg_position', 'bg_size', 'bg_attachment' );
			foreach( $keys as $key ){
				if( isset( $igual_options[$field][$key] ) && !empty( $igual_options[$field][$key] ) && !$stat ) $stat = true;
			}
			if( isset( $igual_options[$field]['image']['url'] ) && !empty( $igual_options[$field]['image']['url'] ) && !$stat ) $stat = true;

			if( $class_names && $stat ) echo $class_names . '{';
			echo '
			'. ( isset( $igual_options[$field]['bg_color'] ) && !empty( $igual_options[$field]['bg_color'] ) ?  'background-color: '. $igual_options[$field]['bg_color'] .';' : '' ) .'
			'. ( isset( $igual_options[$field]['image']['url'] ) && !empty( $igual_options[$field]['image']['url'] ) ?  'background-image: url('. $igual_options[$field]['image']['url'] .');' : '' ) .'
			'. ( isset( $igual_options[$field]['bg_repeat'] ) && !empty( $igual_options[$field]['bg_repeat'] ) ?  'background-repeat: '. $igual_options[$field]['bg_repeat'] .';' : '' ) .'
			'. ( isset( $igual_options[$field]['bg_position'] ) && !empty( $igual_options[$field]['bg_position'] ) ?  'background-position: '. $igual_options[$field]['bg_position'] .';' : '' ) .'
			'. ( isset( $igual_options[$field]['bg_size'] ) && !empty( $igual_options[$field]['bg_size'] ) ?  'background-size: '. $igual_options[$field]['bg_size'] .';' : '' ) .'
			'. ( isset( $igual_options[$field]['bg_attachment'] ) && !empty( $igual_options[$field]['bg_attachment'] ) ?  'background-attachment: '. $igual_options[$field]['bg_attachment'] .';' : '' ) .'
			';
			if( $class_names && $stat ) echo '}';
		endif;
	}
	
	function igual_custom_font_face_create( $font_family, $font_slug, $cf_names ){	
		$upload_dir = wp_upload_dir();
		$f_type = array('eot', 'otf', 'svg', 'ttf', 'woff');		
		$font_path = $upload_dir['baseurl'] . '/custom-fonts/' . str_replace( "'", "", $font_family .'/'. $font_slug );
		echo ' @font-face { font-family: '. $font_family .';';
		echo " src: url('". esc_url( $font_path ) .".eot') format('embedded-opentype'), url('". esc_url( $font_path ) .".woff2') format('woff2'), url('". esc_url( $font_path ) .".woff') format('woff'), url('". esc_url( $font_path ) .".ttf')  format('truetype'), url('". esc_url( $font_path ) .".svg') format('svg');}";		
	}
	
	function igual_custom_font_check($field){
		$igual_options = $this->igual_options;
		$cf_names = get_option( 'igual_custom_fonts' );
		$font_family = isset( $igual_options[$field]['font_family'] ) ? $igual_options[$field]['font_family'] : '';
		$font_slug = $font_family ? sanitize_title( $font_family ) : '';
		if ( !empty( $cf_names ) && is_array( $cf_names ) && array_key_exists( $font_slug, $cf_names ) ){	
			if ( !empty( $cf_names ) && !in_array( $font_slug, $this->exists_fonts ) ){
				$this->igual_custom_font_face_create( $font_family, $font_slug, $cf_names );
				array_push( $this->exists_fonts, $igual_options[$field]['font-family'] );
				return 1;
			}
		}
		return 0;
	}
	
	function igual_get_custom_google_font_frame( $font_family ){	
		$family = isset( $font_family['family'] ) ? $font_family['family'] : '';
		$weight = isset( $font_family['weight'] ) ? $font_family['weight'] : '';
		$subset = isset( $font_family['subset'] ) ? $font_family['subset'] : '';		
		if( !empty( $family ) ){
			if( isset( self::$igual_gf_array[$family] ) ){
				array_push( self::$igual_gf_array[$family]['weight'], $weight );
				array_push( self::$igual_gf_array[$family]['subset'], $subset );
			}else{
				self::$igual_gf_array[$family] = array( 'weight' => array( $weight ), 'subset' => array( $subset ) );
			}
		}
	}
	
	function igual_typo_generate($field){
		$igual_options = $this->igual_options;
		$font_family = isset( $igual_options[$field]['font_family'] ) ? $igual_options[$field]['font_family'] : '';
		$standard_fonts = Igual_Google_Fonts_Function::$_standard_fonts;
		if( !array_key_exists( $font_family, $standard_fonts ) ){			
			$font_weight = isset( $igual_options[$field]['font_weight'] ) && $igual_options[$field]['font_weight'] != '' ? $igual_options[$field]['font_weight'] : '';
			$font_sub = isset( $igual_options[$field]['font_sub'] ) && $igual_options[$field]['font_sub'] != '' ? $igual_options[$field]['font_sub'] : '';
			$gf_arr = array( 'family' => $font_family, 'weight' => $font_weight, 'subset' => $font_sub );	
			$this->igual_get_custom_google_font_frame( $gf_arr );
		}
	}
	
	function igual_typo_settings($field, $class_names = null){
		
		//Custom font check and google font generate
		$cf_stat = $this->igual_custom_font_check($field);
		if( !$cf_stat ) $this->igual_typo_generate($field);		
		$igual_options = $this->igual_options;
		if( isset( $igual_options[$field] ) ):

			$stat = false;
			$keys = array( 'font_color', 'font_family', 'font_weight', 'font_style', 'font_size', 'line_height', 'letter_spacing', 'text_align', 'text_transform' );
			foreach( $keys as $key ){
				if( isset( $igual_options[$field][$key] ) && !empty( $igual_options[$field][$key] ) && !$stat ) $stat = true;
			}
			echo $class_names && $stat ? esc_attr( $class_names ) . '{' : '';
			
			$font_weight = isset( $igual_options[$field]['font_weight'] ) ? $igual_options[$field]['font_weight'] : '';
			$font_style = '';
			if( !empty( $font_weight ) && strpos( $font_weight, 'italic' ) ){
				$font_style = 'italic';
				$font_weight = str_replace( 'italic', '', $font_weight );
			}

			echo '
			'. ( isset( $igual_options[$field]['font_color'] ) && $igual_options[$field]['font_color'] != '' ?  'color: '. $igual_options[$field]['font_color'] .';' : '' ) .'
			'. ( isset( $igual_options[$field]['font_family'] ) && $igual_options[$field]['font_family'] != '' ?  'font-family: '. stripslashes_deep( $igual_options[$field]['font_family'] ) .';' : '' ) .'
			'. ( $font_weight ?  'font-weight: '. $font_weight .';' : '' ) .'
			'. ( $font_style ?  'font-style: '. $font_style .';' : '' ) .'
			'. ( isset( $igual_options[$field]['font_size'] ) && $igual_options[$field]['font_size'] != '' ?  'font-size: '. $igual_options[$field]['font_size'] .'px;' : '' ) .'
			'. ( isset( $igual_options[$field]['line_height'] ) && $igual_options[$field]['line_height'] != '' ?  'line-height: '. $igual_options[$field]['line_height'] .'px;' : '' ) .'
			'. ( isset( $igual_options[$field]['letter_spacing'] ) && $igual_options[$field]['letter_spacing'] != '' ?  'letter-spacing: '. $igual_options[$field]['letter_spacing'] .'px;' : '' ) .'
			'. ( isset( $igual_options[$field]['text_align'] ) && $igual_options[$field]['text_align'] != '' ?  'text-align: '. $igual_options[$field]['text_align'] .';' : '' ) .'
			'. ( isset( $igual_options[$field]['text_transform'] ) && $igual_options[$field]['text_transform'] != '' ?  'text-transform: '. $igual_options[$field]['text_transform'] .';' : '' ) .'
			';
		endif;
		echo $class_names && $stat ? '}' : '';
	}
	
	function igual_hex2rgba($color, $opacity = 1) {
	 
		$default = '';
		//Return default if no color provided
		if(empty($color))
			  return $default; 
		//Sanitize $color if "#" is provided 
			if ($color[0] == '#' ) {
				$color = substr( $color, 1 );
			}
			//Check if color has 6 or 3 characters and get values
			if (strlen($color) == 6) {
					$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
			} elseif ( strlen( $color ) == 3 ) {
					$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
			} else {
					return $default;
			}
			//Convert hexadec to rgb
			$rgb =  array_map('hexdec', $hex);
	 
			//Check if opacity is set(rgba or rgb)
			if( $opacity == 'none' ){
				$output = implode(",",$rgb);
			}elseif( $opacity ){
				if(abs($opacity) > 1)
					$opacity = 1.0;
				$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
			}else {
				$output = 'rgb('.implode(",",$rgb).')';
			}
			//Return rgb(a) color string
			return $output;
	}

}