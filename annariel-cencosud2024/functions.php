<?php

// error_reporting(E_ALL);
// ini_set('display_errors',1);
// ini_set('error_reporting', E_ALL);
// ini_set('display_startup_errors',1);
// error_reporting(-1);
error_reporting(0);

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );
@ini_set( 'upload_max_size' , '64M' ); 
@ini_set( 'post_max_size', '64M'); 
@ini_set( 'max_execution_time', '300' );

/** Variables */
setlocale(LC_TIME, 'es_PE');
    
define('THEME_NAME','cencosud');
define('THEME_VERSION','1.0.'.uniqid());
define('THEME_URL',get_template_directory_uri());
define('THEME_PATH', __DIR__ );
define('THEME_IMGS',THEME_URL.'/imgs/');

define('PAGE_URL',site_url());

define('MAP_API','AIzaSyA3jPiaXGVK3IfsYKmwv16QvXOqk6Hk67k');
//define('MAP_API','AIzaSyCu_M917rSXjbfLzkFWXCg_tkXIoj0S0M0');
//define('MAP_API','AIzaSyAkoy2tpPqGdE3BzXc6jKs_9q5lr2t8UCI');
//define('MAP_API','AIzaSyA3jPiaXGVK3IfsYKmwv16QvXOqk6Hk67k'); //prod

define("RECAPTCHA_V2_SECRET_KEY", '6Ld_S6gZAAAAAEh4gwE-Bf0XO4XB9rnfiCkOBwhX'); //cencosud scotiabank v3
define("RECAPTCHA_V2_PUBLIC_KEY", '6Ld_S6gZAAAAAB-r173wqgcam_RJgLLZrgibTcEO'); //cencosud scotiabank v3

define("RECAPTCHA_V3_SECRET_KEY", '6LcuVKsZAAAAAEYqb26b8pDJlIkr0cpVNF9sxHBO'); //cencosud scotiabank v3
define("RECAPTCHA_V3_PUBLIC_KEY", '6LcuVKsZAAAAAJ3g8YB9H-Dde1V9NCnmNEjJMPdx'); //cencosud scotiabank v3

//walker
include_once 'inc/Cencosud_Walker_Nav_Menu.php';

global $themeScope;
if(!$themeScope) {
    $themeScope=array();
    if(is_file(__DIR__.'/theme.json')) {
        $themeScope['config']=json_decode(file_get_contents(__DIR__.'/theme.json'),ARRAY_A);
    }
}

// remove junk from head
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

/** functions and definitions */
function theme_starter_setup() {
    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary', THEME_NAME ),
        'footer' => esc_html__( 'Footer Menu', THEME_NAME ),
        'footer-social' => esc_html__( 'Footer Social', THEME_NAME ),
        'footer-store' => esc_html__( 'Footer Store', THEME_NAME )
    ) );

    //add support images
    add_theme_support( 'post-thumbnails' );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    function wp_boostrap_starter_add_editor_styles() {
        add_editor_style( 'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.14.0/css/all.min.css' );
        add_editor_style( THEME_URL . '/style.css' );
        add_editor_style( 'css/editor-style.css' );
    }
    add_action( 'admin_init', 'wp_boostrap_starter_add_editor_styles' );
}


add_action( 'after_setup_theme', 'theme_starter_setup' );


/**
 * Add Title Tag Support with Regular Title Tag injection Fall back.
 */

function custom_title_tag() {
    add_theme_support( 'title-tag' );
}

add_action( 'after_setup_theme', 'custom_title_tag' );

if(!function_exists( '_wp_render_title_tag')) {

    function custom_render_title() {
        ?><title><?php wp_title( '|', 'right' ); ?></title><?php
    }
    add_action( 'wp_head', 'custom_render_title' );

}

/**
 * Register widget area.
 */
function theme_starter_widgets_init() {

    register_sidebar( array(
        'name'          => esc_html__( 'Social', THEME_NAME ),
        'id'            => 'widget-social',
        'description'   => esc_html__( 'Widget de Social.', THEME_NAME ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>'
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', THEME_NAME ),
        'id'            => 'widget-sidebar',
        'description'   => esc_html__( 'Widget de Barra Lateral.', THEME_NAME ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widgettitle"><span>',
        'after_title'   => '</span></h2>'
    ) );
        
    register_sidebar( array(
        'name'          => esc_html__( 'Footer', THEME_NAME ),
        'id'            => 'widget-footer',
        'description'   => esc_html__( 'Widget de Footer.', THEME_NAME ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>'
    ) );
}
add_action( 'widgets_init', 'theme_starter_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function theme_starter_scripts() {

    #### fonts
    wp_enqueue_style( THEME_NAME.'-font-montserrat', 'https://fonts.googleapis.com/css?family=Poppins:400,800,900&display=swap' );
    
    #### jquery       
	wp_enqueue_script('jquery');

    #### Internet Explorer HTML5 support
    wp_enqueue_script( 'html5hiv','https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js');
    wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );
    
    ##fontawesome
    //wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.2.0/css/all.css' );
    wp_enqueue_style( 'fontawesome', 'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.14.0/css/all.min.css' );
    
    #### bootstrap4 
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' );    
    wp_enqueue_script('popper-js', 'https://cdn.jsdelivr.net/npm/popper.js@1.15.0/dist/umd/popper.min.js' , array('jquery'), THEME_VERSION   );
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js' , array('jquery'), THEME_VERSION   );
        
    //owlcarusel
    wp_enqueue_style('owlcarusel-css', 'https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.carousel.css' );
    wp_enqueue_style('owlcarusel-theme', 'https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.theme.default.min.css' );
    wp_enqueue_script('owlcarusel-js', 'https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/owl.carousel.min.js' , array('jquery'), THEME_VERSION );


    wp_enqueue_script('disableAutoFill-js', 'https://cdn.jsdelivr.net/npm/disableautofill/src/jquery.disableAutoFill.min.js' , array('jquery'), THEME_VERSION );
        
    wp_enqueue_script('purify-js', "https://cdnjs.cloudflare.com/ajax/libs/dompurify/3.0.6/purify.min.js" , array('jquery'), THEME_VERSION  );

    #### custom ccs+js
    wp_enqueue_script(THEME_NAME.'-js', THEME_URL . '/assets/main.js' , array('jquery'), THEME_VERSION  );
    wp_enqueue_style(THEME_NAME.'-css', THEME_URL . '/style.css' );
    
    wp_enqueue_script( THEME_NAME.'-js' );
    wp_localize_script( THEME_NAME.'-js' , 'scope', 
        array( 
            'site_url' => site_url(),
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'theme_imgs' => THEME_IMGS,
            'MAP_API' => MAP_API,
            'theme_url' => THEME_URL,
            'help_central' => get_help_central(),
            'recaptchaV3'=>RECAPTCHA_V3_PUBLIC_KEY
        ) 
    );
    
}
add_action( 'wp_enqueue_scripts', 'theme_starter_scripts' );



add_action( 'wp_ajax_claim_process', 'claim_process' );
add_action( 'wp_ajax_nopriv_claim_process', 'claim_process' );
function claim_process($request){
    global $wpdb;

    $result=array(
        'status'=>true
    );

    try {
        
        if(!$_POST) {
            throw new Exception('Acceso incorrecto');
        }

        //recaptchav2_valid($_POST['g-recaptcha-response']); //captcha v2
        
        $label=array(
            'address'=> "Dirección",
            'amount'=> "Monto de reclamo",
            'claim'=> "Motivo de reclamo",
            'customer-cencosud'=> "Cliente Caja Cencosud",
            'departamento'=> "Departamento",
            'detail'=> "Detalle de reclamo",
            'distrito'=> "Distrito",
            'document-number'=> "Nro. documento",
            'document-type'=> "Tipo de documento",
            'email'=> "Correo electrónico",
            'lastname'=> "Apellidos",
            'name'=> "Nombres",
            'phone'=> "Teléfono",
            'product'=> "Producto",
            'provincia'=> "Provincia",
            'request'=> "Solicitud de reclamo",
            'response'=> "Enviar la respuesta a"
        );

        $email_body = "<html><body><table>";
        $dataPost=array();
        foreach($_POST as $k=>$v) {

            if( !array_key_exists(
                $k,
                $label
            ) ) {
                continue;
            }

            $dataPost[$k]= nl2br(filter_var($v, FILTER_SANITIZE_STRING));
            $email_body .= "<tr><th>{$label[$k]}</th><td>{$dataPost[$k]}</td></tr>";
        }
        $email_body .= "</body></html>";

        $result['code']='LR'.current_time('YmdHi').'-'.$dataPost['document-number'];
        $code=$result['code'];
        $dateY=substr($code,2,4);
        $dateM=substr($code,6,2);
        $dateD=substr($code,8,2);
        $dateH=substr($code,10,2);
        $dateI=substr($code,12,2);

        $email_customer = "Estimado Señor(a):<br> 
        Su caso fue ingresado con código <strong>".$result['code']."</strong> presentado el día $dateD/$dateM/$dateY a las $dateH:$dateI de forma correcta.
        <br><br>
        La constancia de su solicitud le será remitida al correo electrónico señalado en la hoja de reclamación. De no haber indicado una dirección electrónica, la constancia se encontrará disponible para usted en cualquiera de nuestras oﬁcinas a nivel nacional.
        <br><br>
        Asimismo, podrá realizar el seguimiento de su caso a través de nuestros canales de atención:
        <br>
        1. Central Telefónica marcando <a href='tel:016107900'><b>01-6107900</b></a> en Lima o al <a href='tel:080100420'><b>0-801-00420</b></a> en provincia.
        <br>
        2. Centros de Tarjeta ubicados en Wong y Metro.
        <br>
        3. Agencia Principal ubicada en Av. Paseo de la República S/N C.C. Plaza Lima Sur, en el distrito de Chorrillos, Lima.                                        
        <br><br> 
        Atentamente
        <br>
        Experiencia al Cliente – Caja Cencosud Scotiabank
        <br><br> 
        PD: Este buzón es exclusivamente para el envío de Hojas de Reclamaciones. Las consultas enviadas no serán atendidas.";
        
        $filetemp=$attachments=$fileattached=null;
        if(isset($_FILES['attached']) && $_FILES['attached']['name']!='') {
            $fileinfo=str_replace(array('\n','\r','<','>'),'',basename($_FILES['attached']['name']));
            $fileinfo=pathinfo($fileinfo);
            $fileattached=$dataPost['document-number'].'_'.uniqid().'.'.$fileinfo['extension'] ;
            $filetemp= WP_CONTENT_DIR . '/uploads/claims/'.$fileattached ;
            
            if($_FILES['attached']['size'] > 2097152 ) { #2MB
                throw new Exception('Solo se admiten adjuntos de hasta 2MB');
            }
            else if( $_FILES['attached']['error']!='0' ) {
                throw new Exception('Error al subir archivo, inténtelo nuevamente.');
            }
            else if( !in_array( $_FILES['attached']['type'], array('image/jpeg','image/jpg','image/png','image/gif','image/pdf','application/pdf','application/msword','application/vnd.openxmlformats-officedocument.wordprocessingml.document','application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') )  ) {
                throw new Exception('Error al subir archivo, solo se permiten archivo PNG, JPEG, GIF, DOCX, DOC, XLS, XLSX o PDF '.$_FILES['attached']['type']);
            } 
            else if( !move_uploaded_file( $_FILES['attached']['tmp_name'], $filetemp ) ) {
                throw new Exception('Error al subir archivo.');
            } #filter_var($_POST['recaptcha'], FILTER_SANITIZE_STRING)
            $attachments = array($filetemp);
        }

        $email_to = $dataPost['email'];

        $page=get_page_by_path('libro-reclamaciones');
        $page_info=get_fields($page);
        
        $admin_email = $page_info['email_receptor'];
        $email_subject = 'Tarjeta Cencosud :: Libro de Reclamaciones - '.$result['code'];
        $result['mail_admin']= wp_mail($admin_email, $email_subject, $email_body,'',$attachments);
        if($email_to) {
            $result['mail_user']= wp_mail($email_to, $email_subject, $email_customer);
        }
        
        if($filetemp) {
            //@unlink($filetemp);
        }     
        
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        $dbData=array( 
            'code' => $result['code'],  
            'form' => 'book',  
            'name' => $dataPost['name'],  
            'email' => $dataPost['email'],  
            'content' => json_encode($dataPost), 
            'ip' => $ip, 
            'attached' => $fileattached,
            'dateCreate'=>date('Y-m-d H:i:s')
        );
        $wpdb->insert( 'message', $dbData );
        
        #$result['dataPost']=$dataPost;
        #$result['email_body']=$email_body;
    }
    catch(Exception $e) {
        $result['status']=false;
        $result['message']=$e->getMessage();
        $result['attached']=@$_FILES['attached'];        
    }
    
    output_json($result);
}

/*
Settear API de Google MAP
*/
function my_acf_init() {
    acf_update_setting('google_api_key', MAP_API);
}
add_action('acf/init', 'my_acf_init');


function custom_editor_styles() {
    add_editor_style( 'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css' );
	add_editor_style( THEME_URL . '/css/editor-styles.css' );
}
add_action('init', 'custom_editor_styles');


add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);


function theme_nav_menu_objects( $items, $args ) {
	
	// loop
	foreach( $items as &$item ) {		
		// vars
		$item->customAttr = get_fields($item);		
	}
	
	// return
	return $items;
	
}
add_filter('wp_nav_menu_objects', 'theme_nav_menu_objects', 10, 2);


##rewrite rules
function custom_rewrite_basic() {
    flush_rewrite_rules();
    //add_rewrite_tag('%ticket%', '([^&]+)');
    add_rewrite_rule('^promociones/([^/]*)/([^/]*)/?', 'index.php?pagename=promociones&promotion_cat=$matches[1]&place=$matches[2]', 'top');
    add_rewrite_rule('^promociones/([^/]*)/?', 'index.php?pagename=promociones&promotion_cat=$matches[1]', 'top');
}
add_action('init', 'custom_rewrite_basic');


#hide admin bar
show_admin_bar(false);


###Database funtions
function get_scope($group, $limit=10){
    global $wpdb;
    global $themeScope;

    if( !array_key_exists($group,$themeScope) ) {

        $result=null;
        switch($group) {

            case 'experts':
                $cat=pll_get_category_by_slug('experts');
                $args=array(
                    'post_type' => 'post', 
                    'category' => $cat->term_id, 
                    'posts_per_page' => $limit,
                    'orderby'	=> 'date',
                    'order'	=> 'DESC'
                ); 
                $result=get_posts($args);
                break;


            case 'help_ubigeo':     
                //$result=get_help_ubigeo();
                $result=get_product_ubigeo();
            break;
            
            case 'help_central':    
                $result=get_help_central();break;
            
            case 'product_ubigeo':  
                $result=get_product_ubigeo();break;
                
            case 'faqs': 
                $result=get_page_faqs();break;

            case 'products': 
                $result=get_page_products([]);break;    
                
            default: 
                $themeScope[$group]=array();
                
        }

        $themeScope[$group]=$result;
    }

    return array_key_exists($group,$themeScope)?$themeScope[$group]:null;
    
}


add_action( 'wp_ajax_get_scope', 'get_scope_json' );
add_action( 'wp_ajax_nopriv_get_scope', 'get_scope_json' );
function get_scope_json($request){

    $result=array(
        'status'=>true
    );

    try {

        if(!$_POST || !$_POST['scope']) {
            throw new Exception('Acceso incorrecto');
        }

        if( is_array($_POST['scope'])) {
            foreach($_POST['scope'] as $s) {
                $result[$s] = get_scope($s);
            }
        }
        else{
            $result[$_POST['scope']] = get_scope($_POST['scope']);
        }
        
        
    
    }
    catch(Exception $e) {
        $result=array(
            'status'=>true,
            'message'=>$e->getMessage()
        );
    }
    
    
    output_json($result);
}


function output_json($output){
    header('Cache-Control: no-cache, must-revalidate'); 
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
    header('Content-type: application/json; charset=utf-8');
    echo json_encode($output);
    wp_die();
}


/**
* Tiny MCE Advance BR fix.
*/
function change_mce_options($init){
    $init["forced_root_block"] = false;
    $init["force_br_newlines"] = true;
    $init["force_p_newlines"] = false;
    $init["convert_newlines_to_brs"] = true;
    return $init;       
}
add_filter('tiny_mce_before_init','change_mce_options');

//generate link
function get_calendar_link($post) {
    $params = array(
        '&text='=>$post->post_title, 
        '&dates='=> get_field('date_ini',$post->ID), 
        '/'=> get_field('date_end',$post->ID), 
        '&details='=>get_permalink($post->ID),
        '&location='=>get_field('event_location',$post->ID), 
        '&sf=true&output=xml'=>''
    );
    $url = 'https://www.google.com/calendar/render?action=TEMPLATE';
    
    foreach($params as $key=>$current) {
        if(is_int($current)) {
    		$t = new DateTime('@' . $current, new DateTimeZone('UTC'));
    		$current = $t->format('Ymd\THis\Z');
    		unset($t);
    	}
    	else {
    		$current = urlencode($current);
        }
        
        $url .= (string) $key . $current ;
    }   
    
    return $url;
}

//generate facebook
function get_facebook_link($url) {
    return 'http://www.facebook.com/sharer.php?u='.$url;
}


///polilang
function pll_get_page_by_path($path){
    $page= get_page_by_path($path);
    
    if(isset($page->ID)){
        $postTran=pll_get_post($page->ID);
        if($postTran){
            $page= get_page($postTran);
        }
    }
    
    return $page;
}
function pll_get_category_by_slug($slug){ 
    
    global $themeScope;
    
    if(!array_key_exists('category', $themeScope) ) {                
        $lang_slugs = pll_languages_list(array('fields' => 'slug'));
        
        $themeScope['category']=array();
        foreach($lang_slugs as $lang){
            $terms = get_terms(array(
              'taxonomy' => 'category'
              ,'lang' => $lang
              ,'hide_empty' => false
            ));

            $themeScope['category']= array_merge($themeScope['category'],$terms);
        }
    }
    
    
    $cat=null;
    if( $themeScope['category'] ){
        foreach( $themeScope['category'] as $catObj ) {
            if( $catObj->slug == $slug ) {
                $cat= $catObj;
            }
        }
    }
    
    return $cat;
}

function get_card_grid($content) {

    $result='<div class="card-body">';
    
    $content=explode(PHP_EOL, trim($content));
    if($content) {
        foreach($content as $c) {
            if($c) {
                $line=explode(':', trim($c) );            
                $result.='<div class="row mb-2"><strong class="col-5">'.$line[0].'</strong><div class="col-7">'.$line[1].'</div></div><hr>';
            }
        }
    }
    $result.='</div>';

    return $result;
}

function get_card_list($content) {

    $result='<ul class="list-group list-group-flush">';
    
    $content=explode(PHP_EOL, trim($content));
    if($content) {
        foreach($content as $c) {
            if($c) {
                $line=explode(':', trim($c) );            
                $result.='<li class="list-group-item"><strong>'.$line[0].'</strong><br>'.($line[1]?$line[1]:'--').'</li>';
            }
        }
    }
    $result.='</ul>';

    return $result;
}

function form_select_option($list, $value=null) {
    if($list) {
        foreach($list as $val => $label) {
            echo '<option value="'.$val.'" '.($val==$value?'selected':'').' >'.$label.'</option>';
        }
    }
}


//include_once 'widgets/widget-events.php';


function format_date($date,$format='%d/%m/%y %H:%M'){ 
    $time= strtotime($date);
    //return utf8_encode(strftime($format,$time));
    return strftime($format,$time);    
}

function get_icon_image($icon,$path='icons') {
    $icon=strstr($icon,'.')?$icon:$icon .'.svg';
    return '<img class="icon-img" src="'.THEME_IMGS .($path?$path.'/':''). $icon .'" alt="'.$icon.'" />';
}

function get_image($url, $class='', $width=null, $height=null) {
    $params=explode('/',$url);
    return '<img class="'.$class.'" src="'.$url .'" alt="'.end($params).'" '.($width?'width="'.$width.'"':'').' '.($height?'height="'.$height.'"':'').' />';
}

function get_image_bg($url) {
    return $url?'style="background-image: url('.$url.')"':'';
}


function get_video($video, $cover='', $class='') {

    if( strstr($video,'.gif') ) {
        ?>
        <div class="<?php echo $class ?>">
            <img src="<?php echo $video ?>" alt="animated-gif" class="animated-gif" />
        </div>
        <?php
    }
    else {
        ?>
        <div class="<?php echo $class ?>">
            <video width="100%" loop muted playsinline autoplay >
                <source src="<?php  echo $video ?>" type="video/mp4">
            </video>        
        </div>
        <?php
    }
}


function get_media_block($url) {    
    if (preg_match('/\.(jpg|png|jpeg)$/', $url)) {
        ?><div class="image" <?php echo get_image_bg($url) ?> ></div><?php
    } else {
        get_video($url, null, 'video-call2action');
    }
}


function get_banner_block($class='page-banner',$banner) {

    $video = $banner['video_desktop']['url'];

    ?>
    <section class="<?php echo $class ?>" <?php echo $banner['color_bg'] ? 'style="background-color: '.$banner['color_bg'].';"' :'' ?> >
        <?php 
        if($video){
            get_video($video,  null, 'video-banner');
        }else{?>
            <div class="desktop" style="background-image:url(<?php echo $banner['image_desktop']['url'] ?>);"></div>
        <?php }?>
        <div class="mobile" style="background-image:url(<?php echo $banner['image_mobile']['url'] ?>);"></div>
        <div class="container">
            <div class="block">
                <?php echo $banner['content'] ?>
            </div>
        </div>
    </section>  
    <?php
}

function get_page_banner($PAGE_ID) {

    $result=array(
        'banner-desktop'=>'',
        'banner-mobile'=>'',
        'banner-title'=>'',
        'banner-button'=>''
    );

    $content=get_fields( $PAGE_ID );
    
    if($content) {
        $header_button_text='';
        $header_button_text.=@$content['header_button_color_text']?'color:'.$content['header_button_color_text'].';':'';
        $header_button_text.=@$content['header_button_color']?'background-color:'.$content['header_button_color'].';':'';        
        $header_button_text=$header_button_text?'style="'.$header_button_text.'"':'';
        $header_button_text='<a '.$header_button_text.' href="'.(@$content['header_button_url']?:'#').'" '.link_is_blank(@$content['header_button_blank'],true).'  class="btn-pri-blue">'.$content['header_button_text'].'</a>';

        $header_link_text='';
        $header_link_text.=@$content['header_link_color']?'color:'.$content['header_link_color'].';':'';        
        $header_link_text=$header_link_text?'style="'.$header_link_text.'"':'';
        $header_link_text='<a '.$header_link_text.' href="'.(@$content['header_link_url']?:'#').'" '.link_is_blank(@$content['header_link_blank'],true).' class="link">'.$content['header_link_text'].' <i class="fas fa-arrow-right icon"></i></a>';

        $banner_subtitle='';        
        if( isset($content['header_subtitle']) && $content['header_subtitle'] ) {
            $banner_subtitle=$content['header_subtitle'];
        }
        
        $result=array(
            'content'           => $content,
            'banner-mobile'     => @$content['header_mobile']?'style="background-image: url('.$content['header_mobile'].')"':'',
            'banner-desktop'    => @$content['header_desktop']?'style="background-image: url('.$content['header_desktop'].')"':'',
            'banner-subtitle'   => $banner_subtitle,
            'banner-title'      => @$content['header_title']?"<h1>".nl2br($content['header_title'])."</h1>":"",
            'banner-button'     => (@$content['header_button_text']?$header_button_text:''),
            'banner-link'       => (@$content['header_link_text']?$header_link_text:'')
        );
    } 

    return $result;
}

add_action( 'wp_ajax_insurance_load', 'insurance_load' );
add_action( 'wp_ajax_nopriv_insurance_load', 'insurance_load' );
function insurance_load($request){

    $result=array(
        'status'=>true
    );

    try {

        if(!$_POST) {
            throw new Exception('Acceso incorrecto');
        }

        $rows = get_posts(array(
            'post_type' => 'insurance',
            'numberposts' => -1,
            'tax_query' => array(
              array(
                'taxonomy' => 'insurance_cat',
                'field' => 'term_id', 
                'terms' => $_POST['item'],
                'include_children' => false
              )
            )
        ));

        $result['category']= get_fields( 'term_'.$_POST['item'] );

        $items=array();
        if($rows) {
            foreach($rows as $i => $r) {
                $items[$i]=$r;

                $link=explode($_SERVER['SERVER_NAME'], get_the_permalink($r->ID));
                $items[$i]->link=$link[1];               

                $fields=get_fields($r->ID);
                // if($fields) {
                //     foreach($fields as $j=>$f) {
                //         $fields[$j]= is_array($f) ? $f : nl2br($f);
                //     }
                // }
                $items[$i]->fields=$fields;
            }
        }
        $result['items']= $items;
    
    }
    catch(Exception $e) {
        $result=array(
            'status'=>true,
            'message'=>$e->getMessage()
        );
    }
    
    
    output_json($result);
}


function get_promo(){

    $items=get_post(array(
        'post_type' => 'promo',
        'numberposts' => -1,
        'tax_query' => array(
          array(
            'taxonomy' => 'insurance_cat',
            'field' => 'term_id', 
            'terms' => $_POST['item'],
            'include_children' => false
          )
        )
    ));

    return $items;

}

function get_link_by_path($path) {

    $page=get_page_by_path( $path );
    return get_the_permalink($page);
}

function get_date_days($date) {
    $dStart = new DateTime( date('Y-m-d') );
    $dEnd  = new DateTime( $date );
    $dDiff = $dStart->diff($dEnd);
    return $dDiff->format('%r%a');
}

function get_product_ubigeo() {

    global $wpdb;
    $result=array();

    $query='SELECT cod_dep_reniec, desc_dep_reniec, cod_prov_reniec, desc_prov_reniec, cod_ubigeo_reniec, desc_ubigeo_reniec '.
            'FROM ubigeo '.
            'WHERE cod_dep_reniec <> "NA"'.
            'ORDER BY desc_dep_reniec ASC, desc_prov_reniec ASC, desc_ubigeo_reniec ASC';


    $regs=$wpdb->get_results($query,ARRAY_A);
    if($regs) {
        foreach($regs as $r) {
            $cod_dep_reniec=intval($r['cod_dep_reniec']);
            $cod_prov_reniec=intval($r['cod_prov_reniec']);

            if( !array_key_exists($r['desc_dep_reniec'], $result) ) {
                $result[ $r['desc_dep_reniec'] ]=array(
                    'name' => $r['desc_dep_reniec'],
                    'provincias'=>array()
                );
            }

            if( !array_key_exists($r['desc_prov_reniec'], $result[ $r['desc_dep_reniec'] ]['provincias']) ) {
                $result[ $r['desc_dep_reniec'] ]['provincias'][ $r['desc_prov_reniec'] ]=array(
                    'name' => $r['desc_prov_reniec'],
                    'distritos'=>array()
                );
            }
        
            $result[ $r['desc_dep_reniec'] ]['provincias'][ $r['desc_prov_reniec'] ][ 'distritos' ][ $r['desc_ubigeo_reniec'] ] = array(
                'code' => $r['cod_ubigeo_reniec'],
                'name' => $r['desc_ubigeo_reniec']
            );
        }
    }

    return $result;
}

function get_help_ubigeo() {

    global $wpdb;
    $result=array();

    $query='SELECT cod_dep_reniec, desc_dep_reniec, cod_prov_reniec, desc_prov_reniec, cod_ubigeo_reniec, desc_ubigeo_reniec '.
            'FROM ubigeo '.
            'WHERE cod_dep_reniec <> "NA"'.
            'ORDER BY desc_dep_reniec ASC, desc_ubigeo_reniec ASC';


    $regs=$wpdb->get_results($query,ARRAY_A);
    $key=0;
    if($regs) {
        foreach($regs as $r) {
            $cod_dep_reniec=intval($r['cod_dep_reniec']);
            if( !array_key_exists($r['desc_dep_reniec'], $result) ) {
                $result[ $r['desc_dep_reniec'] ]=array(
                    'code' => $cod_dep_reniec,
                    'name' => $r['desc_dep_reniec'],
                    'distritos'=>array()
                );
            }
            $result[ $r['desc_dep_reniec'] ][ 'distritos' ][ $r['desc_ubigeo_reniec'] ] = array(
                'code'=>$r['cod_ubigeo_reniec'],
                'name'=>$r['desc_ubigeo_reniec'],
            );
        }
    }

    return $result;
}

function get_help_central() {
    
    $locations=array();
    $central= get_posts(array(
        'post_type' => 'help_center',
        'numberposts' => -1
    ));
    if($central) {
        foreach($central as $c) {
            $info=get_fields($c->ID);

            $stores=array();
            $regs=wp_get_post_terms( $c->ID, 'store' );
            if($regs) {
                foreach($regs as $r) {
                    $stores[]=$r->slug;
                }
            }

            $locations[]=array(
                'lat'=>$info['location']['lat'],
                'lng'=>$info['location']['lng'],
                'title'=>$c->post_title,
                'content'=>'<h3>'.$c->post_title.'</h3>'.apply_filters('the_content', $c->post_content),
                'stores'=> $stores
            );
        }
    }

    return $locations;
}


add_action( 'wp_ajax_newsletter_process', 'newsletter_process' );
add_action( 'wp_ajax_nopriv_newsletter_process', 'newsletter_process' );
function newsletter_process() {

    global $wpdb;

    $result=array(
        'status'=>true,
        'error'=>0
    );

    try {
        if(!$_POST ) { //PHP/PHP_High_Risk/SQL_Injection
            throw new Exception('Acceso incorrecto');
        } 
        else if( !isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
            throw new Exception('El correo ingresado no es válido.');
        }

        
        //buscanr anteriores
        $reg=$wpdb->get_row($wpdb->prepare("SELECT * FROM form_subscriber WHERE textEmail='%s'",array($_POST['email']))); //PHP/PHP_High_Risk/SQL_Injection
        if(!$reg) {  
            $conf=get_scope('config');

            $dataPost=array( 
                "eventName" => $conf['emblueevent'], //aca va el nombre del evento predefinido en emBlue        
                "email" => $_POST['email'],        
                "attributes" => array(
                    'event_items' => []
                ) 
            );
            
            $dataPost=json_encode($dataPost);
            
            $apiToken=$conf['embluemail'];
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,"https://track.embluemail.com/contacts/event");
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataPost); 
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization: Basic '.$apiToken,
                'Content-Type: application/json'
            ));
            $result['response']=$output = curl_exec($ch);

            if(!$output) {
                throw new Exception("Intenta ingresar tus datos nuevamente, al parecer algo no salió bien al enviar tu solicitud.");
            }
            
            $response=json_decode($output,ARRAY_A);
            if($response['result']=='Authentication Failed.') {
                throw new Exception("Hubo un error al registrar tu correo inténtalo nuevamente más tarde.");
            }

              
            $dbData=array( 
                'textEmail' => $_POST['email'],  
                'textResult' => $output,
                'dateRegister'=>date('Y-m-d H:i:s'),
                'dateUpdate'=>date('Y-m-d H:i:s'),
                'charSt'=>1            
            );
            $wpdb->insert( 'form_subscriber', $dbData );

            $result['title']="Gracias por suscribirte.";
            $result['message']="Pronto conocerás todas nuestras promociones.";
            
        }
        else {   
            $result['title']="Tu correo ya estaba registrado en nuestra base de datos.";
            $result['message']="Gracias por seguirnos, mantente atento a nuestras promociones.";
        }
    }
    catch(Exception $e) {
        $result['status']=false;
        $result['title']='Gracias por suscribirte.';
        $result['message']=$e->getMessage();
    }
    
    output_json($result);    
}


add_action( 'wp_ajax_product_process', 'product_process' );
add_action( 'wp_ajax_nopriv_product_process', 'product_process' );
function product_process($request){
    error_reporting(E_ALL);
    ini_set('display_errors',1);
    ini_set('error_reporting', E_ALL);
    ini_set('display_startup_errors',1);

    global $wpdb;

    $result=array(
        'status'=>true,
        'error'=>0
    );

    try {
        $Origen_ID=12; //AddAction Origen
        $Medio_ID=7; //AddAction Origen

        if(!$_POST || !isset($_POST['data']) ) {
            throw new Exception('Acceso incorrecto');
        }

        if(isset($_POST['recaptcha']) && !empty($_POST['recaptcha'])):
            // Your site secret key obtained from Google
            $secret = "6Ld_S6gZAAAAAEh4gwE-Bf0XO4XB9rnfiCkOBwhX"; //6Ld_S6gZAAAAAB-r173wqgcam_RJgLLZrgibTcEO
        
            $grResponse=filter_var($_POST['recaptcha'], FILTER_SANITIZE_STRING);
            // Verify with Google Servers
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$grResponse);
            $responseData = json_decode($verifyResponse);
            if(!$responseData->success):
                throw new Exception('Error al validar catcha, inténtelo nuevamente');
            endif;
        else:
            throw new Exception('Error al validar formulario, inténtelo nuevamente');
        endif;

        $postData=array();
        foreach($_POST['data'] as $d) {
            $postData[ $d['name'] ]=trim(filter_var($d['value'], FILTER_SANITIZE_STRING));
        }
        
        if( !$postData['term'] ) {
            throw new Exception('Debe aceptar los términos y condiciones');
        }

        ##vaidaciones docs
        if($postData['docType']=='DNI' && !preg_match('/^[0-9]{8}$/', $postData['docNumber']) ) {
            throw new Exception('DNI no es válido');
        }
        else if($postData['docType']=='CE' && !preg_match('/^[a-zA-Z0-9]{11,12}$/', $postData['docNumber']) ) {
            throw new Exception('Carnet de Extranjería no es válido');
        }
        else if( !in_array($postData['docType'], array('DNI','CE') ) ) {
            throw new Exception('Tipo de documento no permitido');
        }

        // $query='SELECT cod_ubigeo_reniec '.
        //     'FROM ubigeo '.
        //     'WHERE '.
        //     'desc_dep_reniec = "'.$postData['departamento'].'" AND '.
        //     'desc_prov_reniec = "'.$postData['provincia'].'" AND '.
        //     'desc_ubigeo_reniec = "'.$postData['distrito'].'" ';
        // $regUBG=$wpdb->get_var($query);
       
        $product=explode('-',$postData['product']);
        
        $utm_tracker='';
        if( isset($_POST['utm_tracker']) && $_POST['utm_tracker'] ) { 
            
            $utm_tracker=array();
            foreach( $_POST['utm_tracker'] as $k=>$v ) {
                $utm_tracker[$k]='{
                    "IdCampo": "'.$k.'",
                    "DescripcionCampo": "UTM tipo '.$k.'",
                    "ValorCampo": "'.$v.'"
                }';

                if($k=='utm_source') {
                    switch( strtolower($v) ) {

                        case 'mama-adquisicion-cpc-fb': 
                        case 'mama-efectivo-cencosud-cpc-fb': 
                        case 'mama-seguros-cpc-fb': 
                        case 'facebook':        $Origen_ID=3; break;
                        case 'instagram':       $Origen_ID=9; break;
                        case 'google_search':   $Origen_ID=11; break;
                        case 'sms':             $Origen_ID=1; break;

                        case 'PPFF_compra_deuda_Banners_cpc': 
                        case 'PPFF_disposicion_efectivo_Banners_cpc': 
                        case 'PPFF_efectivo_cencosud_Banners_cpc': 
                        case 'DDM-Efectivo-Cencosud-CPC-banners': 
                        case 'DDM_ADQUISICION-CPC-BANNER': 
                        case 'DDM-SEGUROS-CPC-banners': 
                            $Origen_ID=7; break;
                    }
                }
            }
            $utm_tracker = implode(',',$utm_tracker);          
        }

        $raw='{
            "Prospecto": {
                "Email": "'.$postData['email'].'",
                "TelefonoMovil": "'.$postData['phone'].'",
                "Origen": '.$Origen_ID.'.0,
                "Medio": '.$Medio_ID.'.0,
                "Canal": 1.0,
                "PersonaExpuestaPolitcamente": null,
                "TipoPersona": null,
                "TipoDocumento": "'.$postData['docType'].'",
                "NumeroDocumento": "'.$postData['docNumber'].'",
                "PrimerApellido": ""
            },
            "Productos": [
                {
                    "TipoProducto": '.$product[0].'.0,
                    "Producto": "'.$product[1].'",
                    "Moneda": null
                }
            ],
            "CamposExtras": [
                '.$utm_tracker.'
            ],
            "Estatus": 1.0,
            "Formulario": "Formulario web solicitar producto",
            "TipoValidacionLead": "D"
        }';        
        $result['raw']=$raw;
        $result['raw_2']=json_decode($raw, ARRAY_A);
        //output_json($result);

        $themeConfig=get_scope('config');

        $apiUser=$themeConfig['addaccion_user'];
        $apiPass=$themeConfig['addaccion_pass'];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://addaccion.net/CencosudCEM/api/LeadApi.svc/SendLead");
        //curl_setopt($ch, CURLOPT_URL,"https://cencosudqa.addaccion.net/api/LeadApi.svc/SendLead");        
                                      
        curl_setopt($ch, CURLOPT_USERPWD, $apiUser . ":" . $apiPass);  
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $raw); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $output = curl_exec ($ch);
        curl_close ($ch);
                
        //$result['json_decode']=json_decode($raw);
        //$result['json_encode']=json_encode($raw);
        $result['output']=$output;
        $result['screen']='error';
        if(!$output) {
            throw new Exception("Intenta ingresar tus datos nuevamente, al parecer algo no salió bien al enviar tu solicitud.");
        }

        $output=json_decode($output, ARRAY_A);
        $result['output']=$output;
        
        if(!$output['status']) {
            throw new Exception("Intenta ingresar tus datos nuevamente, al parecer algo no salió bien.");
        }

        $result['click2call']=0;
        $result['sendToC2C']=$output['sendToC2C'];
        
        if(strstr($output['message'],'Felicidades')) {
            if(strstr($output['message'],'en proceso tu aplicación')) {
                $result['screen']='pending';
            }
            else {
                $result['screen']='success';
                $text=$output['message'];

                //hay producto llama a Atento
                if($output['sendToC2C']==true) {
                    click2call_atento(
                        $postData['email'],
                        $postData['docNumber'],
                        $postData['phone']
                    );
                    $result['click2call']=1;
                }

                if(strstr($output['message'],'Te contamos')) {
                    $temp=explode('Te contamos',$output['message']);
                    $text=$temp[1];
                    
                    $text='Te contamos'.$text;
                    
                }
                else if(strstr($output['message'],'Por el momento')) {
                    $temp=explode('Por el momento',$output['message']);
                    $text='Por el momento'.$temp[1];
                }

                $temp2=explode(':',$text);
                if(count($temp2)>1 ) {
                    $text=$temp2[0].':<ul><li>'.str_replace(',','</li><li>', $temp2[1]).'</li></ul>';
                }
                
                $result['info']=$text;

            }            
        }     
        else if( strstr($output['message'],'solicitud fue procesada') ) {
            $result['screen']='ready';
            $result['info']=$output['message'];
        }      
        else if( strstr($output['message'],'solicitud en proceso') ) {
            $result['screen']='pending';
            $result['info']=$output['message'];
        }  
        else {
            $result['screen']='fail';
            $result['info']=$output['message'];
        }

        //setcookie('product_form_response', $output['message'], (time()+60*60*24), '/');
        //setcookie('product_form_message', $result['info'], (time()+60*60*24), '/');
                
        $result['message']=$output['message'];

        $dbData=array( 
            'textData' => json_encode($postData),  
            'textResult' => $result['message'],
            'dateRegister'=>date('Y-m-d H:i:s'),
            'dateUpdate'=>date('Y-m-d H:i:s'),
            'charSt'=>$result['screen']            
        );
        $wpdb->insert( 'form_product', $dbData );
    }
    catch(Exception $e) {
        $result['status']=false;
        $result['screen']='error';
        $result['info']=$result['message']=$e->getMessage();
    }
    
    output_json($result);
}

add_action( 'wp_ajax_join_process', 'join_process' );
add_action( 'wp_ajax_nopriv_join_process', 'join_process' );
function join_process($request){

    global $wpdb;

    $result=array(
        'status'=>true,
        'error'=>0,
        'screen'=>'error'
    );
    
    try {

        if(!$_POST || !isset($_POST['data']) ) {
            throw new Exception('Acceso incorrecto');
        }

        if(isset($_POST['recaptcha']) && !empty($_POST['recaptcha'])):
            // Your site secret key obtained from Google
            $secret = "6Ld_S6gZAAAAAEh4gwE-Bf0XO4XB9rnfiCkOBwhX"; //6Ld_S6gZAAAAAB-r173wqgcam_RJgLLZrgibTcEO
        
            $grResponse=filter_var($_POST['recaptcha'], FILTER_SANITIZE_STRING);
            // Verify with Google Servers
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$grResponse);
            $responseData = json_decode($verifyResponse);
            if(!$responseData->success):
                throw new Exception('Error al validar catcha, inténtelo nuevamente');
            endif;
        else:
            throw new Exception('Error al validar formulario, inténtelo nuevamente');
        endif;

        $postData=array();
        foreach($_POST['data'] as $d) {
            $postData[ $d['name'] ]=trim(filter_var($d['value'], FILTER_SANITIZE_STRING));
        }

        if( !$postData['term'] ) {
            throw new Exception('Debe aceptar los términos y condiciones');
        }

        //check if exists
        $reg=$wpdb->get_row($wpdb->prepare("SELECT * FROM form_subscriber_join WHERE textEmail='%s",array($postData['email'])));
        if( $reg && $reg->id ) {
            $result['screen']='reply';
            output_json($result);
        }

        $reg=$wpdb->get_row($wpdb->prepare("SELECT * FROM form_subscriber_join WHERE textDocumentType='%s' AND textDocument='%s'",array($postData['document-type'],$postData['document'])));
        if( $reg && $reg->id ) {
            $result['screen']='reply';
            output_json($result);
        }
             
        $dataPost=array( 
            "eventName" => "cencosud_landing",//aca va el nombre del evento predefinido en emBlue        
            "email" => $postData['email'],        
            "attributes" => array(
                'document-type' => $postData['document-type'],
                'document' => $postData['document']
            )  
        );
        $dataPost=json_encode($dataPost);

        $result['response']=$output='success';
        
        ///*
        $apiToken="NDc0ZDA3NjU4MTY5NGUyNTllNjM3NjdhODc2M2Y1YjA=";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://track.embluemail.com/contacts/event");
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataPost); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Basic '.$apiToken,
            'Content-Type: application/json'
        ));
        $result['response']=$output = curl_exec($ch);

        if(!$output) {
            throw new Exception("Intenta ingresar tus datos nuevamente, al parecer algo no salió bien al enviar tu solicitud.");
        }
        
        $response=json_decode($output,ARRAY_A);
        if($response['result']=='Authentication Failed.') {
            throw new Exception("Hubo un error al registrar tu correo inténtalo nuevamente más tarde.");
        }
        //*/

        $dbData=array( 
            'textEmail' => $postData['email'],  
            'textDocumentType' => $postData['document-type'], 
            'textDocument'=> $postData['document'], 
            'textResult' => $output,
            'dateRegister'=>date('Y-m-d H:i:s'),
            'dateUpdate'=>date('Y-m-d H:i:s'),
            'charSt'=>1            
        );
        $wpdb->insert( 'form_subscriber_join', $dbData );

        $output=json_decode($output, ARRAY_A);
        
        $result['screen']='success';
    
    }
    catch(Exception $e) {
        $result['status']=false;
        $result['info']=$e->getMessage();
    }
    
    output_json($result);
}

/** 
 * Función de Atento para regiatar datos de cliente para llamar y ofrecer servicios
 */
function click2call_atento(    
    $email,
    $document,
    $phone
) {
    
    $campaign='16884';
    $cluster='';

    $result=array();
    $serviceUrl='https://service1.atento.com.pe:8002/WS/webservices_atento_c2c.php';
    
    $context = stream_context_create([
        'ssl' => [
            // set some SSL/TLS specific options
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        ]
    ]);

    $themeConfig=get_scope('config');

    $options = array(
        'exceptions'=>true,
        'cache_wsdl'=>WSDL_CACHE_NONE,
        'trace' => true,
        'encoding'=>'utf-8',
        "login" => $themeConfig['atento_user'], 
        "password" => $themeConfig['atento_pass'], 
        'stream_context' => $context
    );
    $client = new SOAPClient($serviceUrl.'?wsdl', $options);
    
    try { 

        $result = $client->leadExtended(
            $campaign, 
            $phone, 
            $phone, 
            $cluster, //cluster
            '', //nombre
            '', //apellido
            $document,
            $email
        );
        
    } 
    catch (Exception $e) {
       $result['error']=$e->getMessage();
    }

    return $result;
}




function get_menu_items($menu_name) {
    $result=array();  
    $locations = get_nav_menu_locations();
    if( isset( $locations[ $menu_name ]) ) {
        $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
        $result = wp_get_nav_menu_items($menu->term_id);
        if($result) {
            foreach($result as $k=>$r) {
                $result[$k]->content=get_fields($r);
            }
        }
    }
    return $result;
}


add_action( 'wp_ajax_promotion_views', 'promotion_views' );
add_action( 'wp_ajax_nopriv_promotion_views', 'promotion_views' );
function promotion_views($request){

    $result=array(
        'status'=>true
    );

    try {

        if(!$_POST) {
            throw new Exception('Acceso incorrecto');
        }

        $item=get_post($_POST['item']);
        if(!$item) {
            throw new Exception('Promoción no disponible');
        }

        $fields=get_fields($item->ID);
        $qty_view= isset($fields['qty_view']) ? $fields['qty_view'] : 0;

        $result['data']=update_field('qty_view', ($qty_view+1) ,$item->ID);
    
    }
    catch(Exception $e) {
        $result=array(
            'status'=>true,
            'message'=>$e->getMessage()
        );
    }
    
    
    output_json($result);
}


add_action( 'wp_ajax_simulator_load', 'simulator_load' );
add_action( 'wp_ajax_nopriv_simulator_load', 'simulator_load' );
function simulator_load($request){
    $result=array(
        'status'=>true
    );

    try {

        if(!$_POST) {
            throw new Exception('Acceso incorrecto');
        }

        $result['info']=simulator_load_info();
    
    }
    catch(Exception $e) {
        $result['status']=false;
        $result['message']=$e->getMessage();
    }
    
    output_json($result);
}

function simulator_load_info(){

    $result=array();

    $cards=get_posts(array(
        'post_type'=>'simulator-card',
        'numberposts' => -1
    ));

    if($cards) {
        foreach($cards as $key=>$c) {
            $info=get_fields( $c );

            $result[ $key ]['name'] = $c->post_title;
            $result[ $key ]['slug'] = $c->post_name;

            $result[ $key ]['tea'] = preg_split('/\r\n|[\r\n]/', $info['tea']);
            
            $result[ $key ]['payment']=array();

            $days=explode(PHP_EOL, $info['day']);
            $cuts=explode(PHP_EOL, $info['cut']);

            foreach($days as $k=>$d) {
                $result[ $key ]['payment'][]=array(
                    'day'=>trim($d),
                    'cut'=>trim($cuts[$k])
                );
            }
        }
    }

    return $result;
}

//add_action( 'wp_ajax_promo_users_process', 'promo_users_process' );
add_action( 'wp_ajax_nopriv_promo_users_process', 'promo_users_process' );
function promo_users_process($request){
    $result=array(
        'status'=>true
    );

    try {

        $records=promo_users_import( ABSPATH.'/assets/promo_dni.csv' );
        $result['message']='Se han importado '.$records.' registros';

    }
    catch(Exception $e) {
        $result['status']=false;
        $result['message']=$e->getMessage();
    }
    
    output_json($result);
}

function promo_users_import($file) {
    global $wpdb;

    if(!$file || !is_file($file)) {
        throw new Exception("Archivo no válido");
    }

    $fileinfo=pathinfo($file);
    if($fileinfo['extension']!='csv') {
        throw new Exception("Extensión no válida");
    }

    $csvFile = file($file); //PHP/PHP_High_Risk/Second_Order_SQL_Injection
    if(!$csvFile) {
        throw new Exception("Archivo vacío");            
    }

    $records=0;

    foreach ($csvFile as $line) {

        $data = str_getcsv($line);

        if(!is_numeric($data[0])) {
            continue;
        }

        $user_doc_tipe=array_shift($data);
        $user_doc_code=array_shift($data);

        if($user_doc_tipe==1 && strlen($user_doc_code)<8 ) {
            $user_doc_code=document_add_zeros($user_doc_code, 8); 
        }

        if($data) {
            foreach($data as $d) {
                if($d) {
                    $row = $wpdb->get_row($wpdb->prepare('SELECT * FROM cencosud_promo_user WHERE user_doc_tipe="%s" AND user_doc_code="%s" AND promo_id="%s"',array($user_doc_tipe,$user_doc_code,$d)));//PHP/PHP_High_Risk/Second_Order_SQL_Injection
                    if(!$row) {
                        $dataDB=array(
                            'user_doc_tipe'  =>$user_doc_tipe,
                            'user_doc_code'  =>$user_doc_code,
                            'promo_id'  =>$d,
                            'dateCreate'=>date('Y-m-d H:i:s'),
                            'dateUpdate'=>date('Y-m-d H:i:s'),
                            'charSt'    =>1
                        );
                        //print_r($dataDB);echo '<hr>';
                        $wpdb->insert('cencosud_promo_user',$dataDB);
            
                        $records++;
                        // if($records>100) {
                        //     exit;
                        // }
                    }
                }
            }
        }        
    }

    return $records;
}


function document_add_zeros($code, $qty) {
    $result=$code;
    for( $i=0 ; $i < ($qty - strlen($code) ) ; $i++ ) {
        $result='0'.$result;
    }

    return $result;
}

add_action( 'wp_ajax_simulator_process', 'simulator_process' );
add_action( 'wp_ajax_nopriv_simulator_process', 'simulator_process' );
function simulator_process($request){

    $result=array(
        'status'=>true
    );

    try {

        //recaptchav3_valid(); //captcha v3

        if(!$_POST) {
            throw new Exception('Acceso incorrecto');
        }

        $cards=simulator_load_info();
        $info=array();
        foreach($cards as $i) {
            $info[ $i['slug'] ]=$i;
        }

        foreach($_POST as $k=>$v) {
            $_POST[$k]= filter_var($v, FILTER_SANITIZE_STRING);
        }

        $page=get_page_by_path( 'simula-tus-compras' );
        $paramSim=get_fields($page);

        $business_day=intval($_POST['business_day']);
        $business_day=$business_day<10?'0'.$business_day:$business_day;
        $business_month=intval($_POST['business_month']);
        $business_month=$business_month<10?'0'.$business_month:$business_month;
        $business_year=intval($_POST['business_year']);
        $business_time=strtotime($business_year.'-'.$business_month.'-'.$business_day);
        $business_date=date('Y-m-d',$business_time);
        $payment_day=intval($_POST['payment_day']);
        $quote_date=$business_year.'-'.$business_month.'-'.$payment_day;
        $quote_time=strtotime($quote_date);

        //$result['debug']=$info;

        //valid lists
        if( !$_POST['code'] || !array_key_exists( $_POST['code'], $info ) ) {
            throw new Exception('Tarjeta no identificada.');
        }

        $cardParam=$info[ $_POST['code'] ]; //filtros por tipo
        $result['cardParam']=$cardParam;

        #$max_quote=$paramSim['max_quote'];
        $max_quote=36;
        
        $amount=intval($_POST['amount']);
        $quota=intval($_POST['quota']);
        

        if( !$_POST['card'] || $_POST['card']!=$cardParam['name'] ) {
            throw new Exception('Tipo de tarjeta no identificado.');
        } 
        else if( $amount<1 ) {
            throw new Exception('Monto no es válido.');
        }
        else if( $quota<2 || $quota>$max_quote ) {
            throw new Exception('Cuota a financiar no es válida.');
        }
        else if(!$_POST['tea'] || !in_array( $_POST['tea'], $cardParam['tea'] ) ) {
            throw new Exception('Tasa de interés anual TEA no es válida.');
        }
        else if(!$_POST['payment_day']) {
            throw new Exception('Fecha de pago no es válida.');
        }
        else if( !checkdate( $business_month, $business_day, $business_year  ) ) {
            throw new Exception('Debe ser una fecha de compra válida.');
        }        
        else if( $business_date<date('Y-m-d') ) {
            throw new Exception('Recuerda que la fecha de compra que elijas debe ser de hoy en adelante.');
        }

        //valida fecha
        $paymentValid=false;
        foreach($cardParam['payment'] as $p ) {
            if( $p['day']==$_POST['payment_day']) {
                $paymentValid=true;
                break;
            }
        }
        if( !$paymentValid ) {
            throw new Exception('Día de pago no disponible.');
        }

        $quota=intval($_POST['quota']);
        $tea=floatval($_POST['tea'])/100;
        $amount=intval($_POST['amount']);

        $TED = pow( (1+$tea) , (1 / 360) ) - 1 ;
        $TED = round($TED,8);
        
        $cutDay=array();
        foreach($paramSim['payment_day'] as $day) {
            $cutDay[ $day['name'] ] = $day['cut'];
        }
        
        //$result['business_day']=$business_day;
        $f_time = $business_day > $cutDay[ $payment_day ] ? strtotime('+2 month',$quote_time) : strtotime('+1 month',$quote_time) ;
        $result['date']=date('d/m/Y',$f_time);

        $d14_sum=0;
        for($i=1;$i<=$quota;$i++) {
            $quote_date = date('Y-m-d', $f_time);
            
            $qtyDays= $f_time - $business_time;
            $qtyDays= $qtyDays / (60 * 60 * 24);
            
            $dCol = 1/( pow( (1+$TED) , $qtyDays ) );
            $result['cuota'][$i]=round($dCol, 6);
            $d14_sum += $dCol;

            $f_time= strtotime('next month',$f_time);
        }

        $d14 = $d14_sum ? (1 / $d14_sum) : 0;
        $d14 = round($d14,6);

        $amount=floatval($_POST['amount']) * $d14;
        $amount=$amount * 10;
        $amount=ceil($amount)/10;///redonde superior
        $amount="S/. ".number_format($amount,2);
        $result['amount']=$amount;
    
    }
    catch(Exception $e) {
        $result['status']=false;
        $result['message']=$e->getMessage();
    }
    
    output_json($result);
}

function recaptchav2_valid($recaptcha) {

    if($recaptcha):        
        // Your site secret key obtained from Google
        $secret = RECAPTCHA_V2_SECRET_KEY; 
        
        // Verify with Google Servers
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$recaptcha);
        $responseData = json_decode($verifyResponse);
        if(!$responseData->success):
            throw new Exception('Error al validar catcha, inténtelo nuevamente');
        endif;
    else:
        throw new Exception('Error al validar formulario, inténtelo nuevamente');
    endif;
}

function recaptchav3_valid() {

    $token=trim(@$_POST['token']);
    $action=trim(@$_POST['action']);
    

    // call curl to POST request
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $token)));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $arrResponse = json_decode($response, true);
    
    // verify the response
    if($arrResponse["success"] == '1' && $arrResponse["action"] == $action && $arrResponse["score"] >= 0.5) {
        
    } else {
        throw new Exception('Identificador de proceso no identificado, inténtalo de nuevo.<br>'.$response);
    }
}

function link_is_blank($blank, $return=false) {
    $target=$blank?'target="_blank"':'';
    if(!$return) {
        echo $target;
    }
    else {
        return $target;
    }
}

/** 
 * Enables the HTTP Strict Transport Security (HSTS) header in WordPress. 
 */
function add_security_headers() {
    header( 'X-Content-Type-Options: nosniff' );
    header( 'X-Frame-Options: SAMEORIGIN' );
    header( 'X-XSS-Protection: 1;mode=block' );
    header( 'Strict-Transport-Security: max-age=10886400' );
    //header( 'Content-Security-Policy: default-src self' );
}
add_action( 'send_headers', 'add_security_headers' );



/** 
 * Enables page Banner
 */
function get_header_popup() {

    $popup=null;

    //buscat popup de home si existe
    $pageHome=get_page_by_path( 'home' );
    $pageHome_content=get_fields($pageHome->ID);

    if(
        isset($pageHome_content['popup']['config']['enable'])
            &&
        $pageHome_content['popup']['config']['enable']
    ) {
        $popup=$pageHome_content['popup'];
    }

    //obtener primero actual
    if( !is_front_page() ) {
        //buscar si tiene uno propio
        
        $popupPage=get_field('popup', get_the_ID() );

        if( $popupPage && $popupPage['config']['enable'] ) {
            $popup=$popupPage;
        }     
        else if( @$popup['config']['only_home'] ) {
            //si solo es para home se elimin en otra página
            $popup=null;
        }       
    }

    
    //mostar
    if( $popup ){ 
        
        $popupTime=intval(@$popup['config']['time']);

        $bannersS=array(
            'banner_a',
            'banner_b',
            'banner_c',
            'banner_d',
            'banner_e'
        );
        $popupB=array();
        if($bannersS) {
            foreach($bannersS as $bi => $breg) {
                if( array_key_exists($breg,$popup) && $popup[$breg]['imagen'] ) {
                    $popupB[]=$popup[$breg];
                }
            }
        }

        if($popupB) {
            //shuffle($popupB);
            
            $banner=array_shift($popupB);

            //exit($banner_popup_id);
            ?>
            <div class="header-popup" data-time="<?php echo $popupTime ?>" >
                <?php if( isset($banner['link']) && $banner['link'] ) {
                    echo '<a href="'.$banner['link'].'" class="link"></a>';
                }?>
                <?php if( $banner['imagen'] ) {
                    $image=null;
                    if( is_array($banner['imagen']) ) {
                        $image = $banner['imagen']['url'];
                    }
                    else {
                        $image = wp_get_attachment_image_src($banner['imagen'], 'full'); 
                        $image = $image[0];
                    }

                    echo '<img src="'.$image.'" class="bg" alt="Cencosud Popup"  />';

                }?>
                <?php if( $banner['button']['text'] ) {
                    echo '<div class="button" '.($banner['button']['color']?'style="background-color:'.$banner['button']['color'].'"':'').'>'.$banner['button']['text'].'</div>';
                }?>
                <i class="hide fas fa-times-circle"></i>
                <div class="content h-100">
                    <div class="row h-100  align-items-center justify-content-end">
                        <div class="col-6">                    
                            <div class="text"><?php echo $banner['content'] ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
        }
    }
}

/** 
 * Agregar boton a tabla admin
 */
// Display an action button in admin order list header

add_action( 'manage_posts_extra_tablenav', 'admin_table_button_headertop', 20, 1 );
function admin_table_button_headertop( $which ) {
    global $pagenow, $typenow;

    $banner_top_total   =get_option('bannertop_count',1);
    $banner_top_time    =get_option('bannertop_seconds',0);

    if( $which=='bottom' && $typenow=='banner_top' && $pagenow=='edit.php'  ) {
    ?>
    <div class="alignright actions custom" style="padding-left: 1rem">
        <table bgcolor="#ddd">
            <tr>
                <td>
                    <label>Total Tirillas</label><br>
                    <input type="number" name="bannertop_count" value="<?php echo $banner_top_total ?>" placeholder="Total Tirillas" style="width: 5rem" />
                </td>
                <td>
                    <label>Tiempo (segs.)</label><br>
                    <input type="number" name="bannertop_seconds" value="<?php echo $banner_top_time ?>"  placeholder="Tiempo (segs.)" style="width: 5rem" />
                </td>
                <td>
                    <br>
                    <button type="submit" name="bannertop_config" value="yes" class="button" value="yes"><?php echo __( 'Actualizar Configuración' ); ?></button>
                </td>
            </tr>
        </table>        
    </div>
    <?php
    }
}

// Trigger an action (or run some code) when the button is pressed
add_action( 'restrict_manage_posts', 'admin_table_button_headertop_save' );
function admin_table_button_headertop_save() {
    global $pagenow, $typenow;

    if ( 'banner_top' === $typenow && 'edit.php' === $pagenow && isset($_GET['bannertop_config']) && $_GET['bannertop_config'] === 'yes' ) {
        update_option( 'bannertop_count', intval($_REQUEST['bannertop_count']) );
        update_option( 'bannertop_seconds', intval($_REQUEST['bannertop_seconds']) );
    }
}


function wpse27856_set_content_type(){
    return "text/html";
}
add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );


/*Plugin Promo*/
function cencosud_promo_menu() {
    add_menu_page(
        __( 'Promociones Exclusivas', 'cencosud_promo_manager' ), 
        __( 'Promociones Exclusivas', 'cencosud_promo_manager' ),
        'manage_options',
        'cencosud_promo_manager',
        'cencosud_promo_manager',
        null,
        2
    );
}

add_action( 'admin_menu', 'cencosud_promo_menu' );

function cencosud_promo_manager() {
    include_once(THEME_PATH.'/admin/view/cencosud_promo_manager.php');
}


add_action('admin_head','admin_head_post_listing');
function admin_head_post_listing() {
	global $current_screen;

    if($current_screen->post_type!='promotion') {
        return;
    }
	?>
        <script type="text/javascript">
            jQuery(document).ready( function($)
            {
                jQuery(".wp-header-end").before("<a href='<?php echo admin_url( 'admin-ajax.php' )  ?>?action=cencosud_promo_exportar_action' class='add-new-h2'>Exportar Promociones</a>");
            });
        </script>
    <?php
}

add_action( 'wp_ajax_cencosud_promo_exportar_action', 'cencosud_promo_exportar_action' );
function cencosud_promo_exportar_action() {
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);

    $result=array(
        array(
            'CODPROM',
            'GIRO',
            'CATEGORIA',
            'PRODUCTO',
            'TIPO_OFERTA',
            'NIVEL_OFERTA',
            'FECHA_VIGENCIA'
        )
    );

    
    $promo=get_posts(array(
        'post_type'=>'promotion',
        'numberposts' => -1,
        //'numberposts' => 10
    ));
    
    if($promo) {
        foreach($promo as $p) {
            $fields=get_fields($p->ID);

            $cats=array();
            $terms=get_the_terms($p->ID,'promotion_cat');
            if($terms) {
                foreach($terms as $t) {
                    $cats[]=$t->name;
                }
            }

            $brand=array();
            $terms=get_the_terms($p->ID,'store');
            if($terms) {
                foreach($terms as $t) {
                    $brand[]=$t->name;
                }
            }

            $type_promo='';
            $promo=$fields['promo'];
            if( strstr($fields['promo'],'%') ) {
                $type_promo='%';
                $promo=str_replace('%','',$fields['promo']);
            }
            else if( strstr($fields['promo'],'S/') ) {
                $type_promo='S/';
                $promo=str_replace('S/','',$fields['promo']);
            }

            $result[]=array(
                $p->ID,
                implode(' / ',$brand),
                implode(' / ',$cats),
                $p->post_title,
                $type_promo,
                floatval($promo),
                date('d/m/Y', strtotime($fields['expire']))
            );
        }
    }
    
    $tmp_file = 'promo_exportar_'.date('YmdHis').'.csv';
    $delimiter=';';

    $f = fopen('php://memory', 'w'); 
    foreach ($result as $line) { 
        fputcsv($f, $line, $delimiter); 
    }
    fseek($f, 0);
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="'.$tmp_file.'";');
    fpassthru($f);

    exit;
}

function get_page_products($prods_id) {
    $results=array();
    
    $posts=  get_posts(array(
        'post_type'=>'faq',
        'numberposts' => 0,
        'post__in' => $prods_id
    ));
    
    $results=$posts;

    return $results;
}

function get_page_faqs() {

    $results=array();
    
    $faq_category= get_terms( 'faq_category', array(
        'parent'       => 0,
        'hide_empty'    => true,
        'meta_query' => array(
            array(
                'key'       => 'page',
                'value'     => get_the_ID(),
                'compare'   => '='
            )
        )
    ));
    if($faq_category) {
        $term=$faq_category[0];

        $results['term']=get_term_link($faq_category[0]);

        $posts=  get_posts(array(
            'post_type'=>'faq',
            'numberposts' => 5,
            'tax_query' => array(
                array(
                    'taxonomy' => 'faq_category',
                    'field' => 'term_id',
                    'terms' => $term->term_id,
                )
            )
        ));

        $results['posts']=$posts;

    }

    return $results;

}


add_action( 'wp_ajax_promotions_list', 'promotions_list' );
add_action( 'wp_ajax_nopriv_promotions_list', 'promotions_list' );
function promotions_list($request){

    $result=array(
        'status'=>true
    );

    try {
        
        if(!$_POST) {
            throw new Exception('Acceso incorrecto');
        }

        $filter=filter_var($_POST['filter'], FILTER_SANITIZE_STRING);
        $filter_loop=array();
        $filter_sort=null;
        $filter_month=null;
        if($filter) {
            foreach($filter as $f) {
                $item=explode('_',$f);  
                if($item[0]=='sort') {   
                    $filter_sort=$item[1]; 
                }   
                else if($item[0]=='month') {    
                    $filter_month = true;
                } 
                else if($item[0]=='cat') {    
                    $filter_loop[ 'promotion_cat' ][] = $item[1];
                }
                else {
                    $filter_loop[ $item[0] ][] = $item[1];
                }       
            }
        }

        $tax_query=array(
            'relation' => 'OR'
        );
        if($filter_loop) {
            foreach($filter_loop as $term => $term_f) {
                $tax_query[]=array(
                    'taxonomy' => $term,
                    'field' => 'slug', 
                    'terms' => $term_f,
                    'include_children' => true,
                    'operator' => 'IN'
                );
            }
        }

        $result['tax_query']=$filter_loop;
        $result['tax_query']=$tax_query;
        $result['tax_sort']=$filter_sort;

        $promo = get_posts(array(
            'post_type' => 'promotion',
            'numberposts' => -1,
            'tax_query' => $tax_query
        ));

        $promo_items=array();
        $promo_items_sp=array();

        if($promo) {
            foreach($promo as $item) { 
                $item->info=get_fields($item->ID);  
                
                if( isset($item->info['expire']) && get_date_days($item->info['expire']) <= -1 ) {
                    continue;
                }
                else if($filter_month && !$item->info['month'] ) {
                    continue; 
                }
                
                $image_desktop=$item->info['image'];
                $image_mobile=get_the_post_thumbnail_url( $item->ID, 'full');
                
                $item->link=get_permalink($item->ID);
                $item->image_desktop=get_image($image_desktop);
                $item->image_mobile=get_image($image_mobile);


                //special
                if( $item->info['special'] && $filter_sort=='featured' ) {
                    $promo_items_sp[] = $item;
                }
                else {
                    $promo_items[] = $item;
                }
            }
            $promo_items = array_merge($promo_items_sp, $promo_items);
        }

        $result['items']=$promo_items;
        
    }
    catch(Exception $e) {
        $result['status']=false;
        $result['message']=$e->getMessage();       
    }
    
    output_json($result);
}

function get_link_content($link,$class='') {   
    ?><a href="<?php echo $link['url'] ?>" <?php echo $link['target']?'targert="'.$link['target'].'"':'' ?> class="<?php echo $class ?>"><?php echo $link['title'] ?></a><?php
}

include_once 'admin/function.php';