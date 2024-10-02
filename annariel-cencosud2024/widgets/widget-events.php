<?php
// Register and load the widget
function wpb_load_widget() {
    register_widget( 'widget_sidebar_events' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
 
// Creating the widget 
class widget_sidebar_events extends WP_Widget {
    
    var $domain_info='widget_sidebar_events_domain';
 
    function __construct() {
        parent::__construct(
            // Base ID of your widget
            'widget_sidebar_events', 
            // Widget name will appear in UI
            ___('Sidebar Events Widget', $this->domain_info), 
            // Widget description
            array( 'description' => ___( 'Sidebar widget for events', $this->domain_info ), ) 
        );
    }

    // Creating widget front-end 
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );

        // before and after widget arguments are defined by themes
        echo $args['before_widget'];

        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];

        // This is where you run the code and display the output
        
        $regs=get_scope('events',5);
        
        if($regs) {
            echo '<ul class="sidebar_events_list">';
            foreach($regs as $r) {
                $dateIni= strtotime( get_field('date_ini',$r->ID) );
                
                echo '<li><div class="row">';
                    echo '<div class="col-4"><div class="date" >';
                        echo '<div class="day">'.strftime('%d',$dateIni).'</div>';
                        echo '<div class="month">'.strftime('%b',$dateIni).'</div>';
                    echo '</div></div>';
                    echo '<div class="col-8 title"><a href="'. get_the_permalink($r) .'">'.$r->post_title.'</a></div>';
                echo '</div></li>';
            }
            echo '</ul>';
            
            $page=pll_get_category_by_slug('eventos');
            if($page) { 
                echo '<a href="'. get_category_link($page->term_id).'" class="btn btn-block">'.___('Ver eventos').'</a>';
            }
        }
        
        echo $args['after_widget'];
    }
         
    // Widget Backend 
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = ___( 'Eventos', $this->domain_info );
        }
        
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php __e( 'Title:' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php 
    }
     
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
} // Class wpb_widget ends here