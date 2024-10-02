<?php 

/*Plugin Promo*/
function cencosud_report_menu() {
    add_menu_page(
        __( 'Reporte de Mensajes', 'cencosud_report_manager' ), 
        __( 'Reporte de Mensajes', 'cencosud_report_manager' ),
        'manage_options',
        'cencosud_report_manager',
        'cencosud_report_manager',
        null,
        2
    );
}
add_action( 'admin_menu', 'cencosud_report_menu' );

function cencosud_report_manager($args) {
    include_once(THEME_PATH.'/admin/view/cencosud_report_manager.php');
}


add_action( 'wp_ajax_censosud_message_report', 'censosud_message_report' );
add_action( 'wp_ajax_nopriv_censosud_message_report', 'censosud_message_report' );
function censosud_message_report($request){
    global $wpdb;

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $filter=filter_var($_POST['export'], FILTER_SANITIZE_STRING);
    $report=filter_var($_POST['report'], FILTER_SANITIZE_STRING);
    $date=explode('-',$report);

    $label=array();

    if($filter=='contact') {
        $label=array(
            'code'=> "Código",        
            'name'=> "Nombres y Apellidos",
            'document-type'=> "Tipo de documento",
            'document-number'=> "Nro. documento",
            'email'=> "Correo electrónico",
            'cellphone'=> "Teléfono",
            'ip'=> "IP",
            'dateCreate'=> "Fecha de registro"
        );
    }
    else {
        $label=array(
            'document-number'=> "Nro. documento",
            'document-type'=> "Tipo de documento",
            'name'=> "Nombres",
            'lastname'=> "Apellidos",
            'response'=> "Enviar la respuesta a",
            'email'=> "Correo electrónico",
            'phone'=> "Teléfono",
            'address'=> "Dirección",
            'departamento'=> "Departamento",
            'provincia'=> "Provincia",
            'distrito'=> "Distrito",            
            'product'=> "Producto",
            'claim'=> "Motivo del reclamo",
            'amount'=> "Monto de reclamo",
            'detail'=> "Detalle de reclamo",
            'request'=> "Solicitud de reclamo",
            'attached'=> "Adjunto",
            'ip'=> "IP",
            'dateCreate'=> "Fecha de registro"
        );
    }

    $result=array(
        $label
    );

    $query='SELECT * FROM message WHERE form = "'.$filter.'" AND MONTH(dateCreate)="'.$date[1].'" AND YEAR(dateCreate)="'.$date[0].'" ORDER BY dateCreate DESC';
    $regs=$wpdb->get_results($query,ARRAY_A);
    if($regs) {
        foreach($regs as $r) {

            $dataJson=json_decode($r['content'], ARRAY_A);

            $row=array();

            //$row[]=$r['code'];

            foreach($label as $k => $l) {
                if( array_key_exists($k,$dataJson) ) {
                    $row[]=$dataJson[$k];
                }
                else if($k=='ip') {
                    $row[]=$r['ip'];
                }
                else if($k=='dateCreate') {
                    $row[]=$r['dateCreate'];
                }
                else if($filter=='book' && $k=='attached') {
                    $row[]= $r['attached'] ? site_url('wp-content/uploads/claims/') . $r['attached'] :'';
                }
                else {
                    $row[]='';
                }
            }

            $result[]=$row;
        }
    }
        
    //$tmp_file = 'reporte_'.$filter.'.csv';
    $tmp_file = 'reporte_'.$filter.'_'.date('YmdHis').'.csv';
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