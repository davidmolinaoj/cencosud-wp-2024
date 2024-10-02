<?php 
global $wpdb;

$regsContact=$regsBook=array();
$query='SELECT DISTINCT MONTH(dateCreate) as m, YEAR(dateCreate) as y FROM message WHERE form = "contact"';
$regs=$wpdb->get_results($query,ARRAY_A);
if($regs) {
    foreach($regs as $r) {
        $regsContact[]=$r['y'].'-'.($r['m']>9?$r['m']:'0'.$r['m']);
    }
}

$query='SELECT DISTINCT MONTH(dateCreate) as m, YEAR(dateCreate) as y FROM message WHERE form = "book"';
$regs=$wpdb->get_results($query,ARRAY_A);
if($regs) {
    foreach($regs as $r) {
        $regsBook[]=$r['y'].'-'.($r['m']>9?$r['m']:'0'.$r['m']);
    }
}

sort($regsContact,SORT_DESC);
sort($regsBook,SORT_DESC);

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<h2 class="mt-3">Reportes de Mensajes</h2>

<div class="row">
    <!-- <div class="col">
        <div class="cards">
            <div class="card-header">
                <h4>Exportar mensajes de contacto</h4>
            </div>
            <div class="card-body">
                <form id="reportContact" action="<?php echo admin_url( 'admin-ajax.php?action=censosud_message_report') ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Mes</label>
                        <select
                            class="form-select form-select-lg"
                            name="report"
                            id="report"
                        >
                        <?php if($regsContact){
                            foreach($regsContact as $r){
                            ?>
                            <option><?php echo $r ?></option>
                        <?php }
                        }?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="export" value="contact" class="btn btn-primary">Descargar reporte</button>
                    </div>
                </form>
            </div>
        </div>
    </div> -->
    <div class="col">        
        <div class="cards">
            <div class="card-header">
                <h4>Exportar mensajes de libro de reclamaciones</h4>
            </div>
            <div class="card-body">
                <form id="reportBook" action="<?php echo admin_url( 'admin-ajax.php?action=censosud_message_report') ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Mes</label>
                        <select
                            class="form-select form-select-lg"
                            name="report"
                            id="report"
                        >
                        <?php if($regsBook){
                            foreach($regsBook as $rb){
                            ?>
                            <option><?php echo $rb ?></option>
                        <?php }
                        }?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <button type="submit" name="export" value="book" class="btn btn-primary">Descargar reporte</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>