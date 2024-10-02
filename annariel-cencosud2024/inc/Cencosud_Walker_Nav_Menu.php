<?php
class Cencosud_Walker_Nav_Menu extends Walker_Nav_Menu {
    
    public function start_lvl( &$output, $depth = 0, $args = null ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat( $t, $depth );
 
        // Default class.
        $classes = array( 'sub-menu' );
        $letters = range('a','z');

        $class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . ' menu-lv-'.$letters[$depth].'"' : '';
        

        $output .= "{$n}{$indent}<ul$class_names data-level='{$letters[$depth]}' >{$n}";
    }

    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
    	$object = $item->object;
    	$type = $item->type;
    	$title = $item->title;
    	$description = $item->description;
        $permalink = $item->url;

        $itemClasses=$item->classes;
        if(is_array($item->classes)) {
            $itemClasses=implode(" ", $item->classes);
        }
               
        $letters = range('a','z');

        $itemLv="item-lv-{$letters[$depth]}"; 

        $isBanner='';
        if($letters[$depth]=='c' && $item->customAttr['banner']) {
            $isBanner='is-banner';
        }

        $output .= "<li class='" .  $itemClasses .' '. $itemLv .' '. $isBanner . "' data-level='{$letters[$depth]}' >";
        
        //Add SPAN if no Permalink
        if( $permalink && $permalink != '#' ) {
            $output .= '<a href="' . $permalink . '" '.(isset($item->target) && $item->target ?'target="'.$item->target.'"':'').' >';
        } else {
            $output .= '<label>';
        }
        
        if( isset($item->customAttr['image']) && $item->customAttr['image']) {
            $output .= '<div class="image" style="background-image: url('.$item->customAttr['image'].')"></div>';
        }

        if( isset($item->customAttr['icon']) && $item->customAttr['icon']) {
            $output .= '<i class="icon '.$item->customAttr['icon'].'"></i>';
        }
       
        $output .= '<span>'.$title.'</span>';
        //echo array_search('is_banner', $item->classes) .'&&'. $item->customAttr['detail'];
        if( @$item->customAttr['detail'] ) {
            $output .= '<small class="description">' . $item->customAttr['detail'] . '</small>';
        }

        if( strstr($itemClasses, 'menu-item-has-children') ) {
            $output .= '<i class="icon fas fa-angle-down    "></i>';
        }

        if( $permalink && $permalink != '#' ) {
            $output .= '</a>';
        } else {
            $output .= '</label>';
        }
    }
 
 
} // Cencosud_Walker_Nav_Menu
