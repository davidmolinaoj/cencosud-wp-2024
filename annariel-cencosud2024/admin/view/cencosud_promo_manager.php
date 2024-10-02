<?php 
global $wpdb;

if($_FILES['import_sample']['name']) {
   
    try {

        $records=promo_users_import($_FILES['import_sample']['tmp_name']);
        $message='Se han importado '.$records.' registros';

    } catch (Exception $e) {
        $error=$e->getMessage();
    }
    
}


?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<h2 class="mt-3">Gestor de Promociones Exclusivas</h2>

<div class="row">
    <div class="col">
        <div class="cards">
            <div class="card-header">
                <h4>Importar Lista de Promociones de usuarios manualmente</h4>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                    <label for="" class="form-label">Archivo CSV</label>
                    <input type="file" class="form-control" name="import_sample" id="" placeholder="" aria-describedby="fileHelpId">
                    <small id="fileHelpId" class="form-text text-muted">Se debe subir un archivo CSV segun el <a href="<?php echo THEME_URL.'/admin/view/import_sample.csv' ?>">formato del sistema</a></small>
                    </div>

                    <?php if($message){?>
                    <div class="alert alert-info" role="alert"><?php echo $message ?></div>
                    <?php }?>
                    <?php if($error){?>
                    <div class="alert alert-danger" role="alert"><?php echo $error ?></div>
                    <?php }?>

                    <div class="mb-3">
                        <button type="submit" name="import_manual" value="import_manual" class="btn btn-primary">Importar Archivo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col">        
        <div class="cards">
            <div class="card-header">
                <h4>Importar Lista de Promociones de usuarios automáticamente</h4>
            </div>
            <div class="card-body">
                <ol>
                    <li><p>Para automatizar el proceso, se debe actualizar el archivo en la siguiente ruta: <br><?php echo site_url('assets/promo_dni.csv')?></p>
                    </li>
                    <li><p>Luego se debe agregar un cronjob que llame regularmente a la URL: <br><?php echo site_url('wp-admin/admin-ajax.php?action=promo_users_process')?> </p>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
