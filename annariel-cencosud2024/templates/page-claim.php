<?php 
/**
 * Template Name: Cencosud 2023 - Libro de Reclamaciones
 *
 * @package annariel-cencosud2023
 * @subpackage page
 */

wp_enqueue_script('recaptcha-js', 'https://www.google.com/recaptcha/api.js');
    

get_header(); 

if ( have_posts() ) : 
    while ( have_posts() ) : 
        the_post();
        $content=get_fields();
        
        $product=preg_split('/\r\n|[\r\n]/',$content['product']);
        $subject=preg_split('/\r\n|[\r\n]/',$content['claim']);
        
?>
    <div class="page-content page-claim" >    
        <section class="page-banner" >
            <div class="container">
                <div class="row h-100 align-items-center">                                
                    <div class="col-md-6">
                        <div class="block">
                            <?php echo $content['banner']['content'] ?>
                        </div>
                    </div>   
                    <div class="col-md-6">
                        <div class="icon">
                            <?php echo get_image($content['banner']['image_desktop']['url'],'banner-icon')?>
                        </div>
                    </div>                        
                </div>
            </div>
        </section>

        <section class="page-body" >
            <div class="container">
                <div class="info">
                    <?php the_content() ?>
                </div>

                <form action="" id="claimForm" class="form mt-5 mb-5" enctype="multipart/form-data" >
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group label-side">
                                <label for="document-type">Tipo de documento <span>*</span></label>
                                <select name="document-type" class="form-control form-select" id="document-type" data-validation="document">
                                    <option value="DNI">DNI</option>
                                    <option value="CE">Carné de Extranjería</option>
                                </select>
                                <div class="error" data-error="document-type">Debes seleccionar un tipo de documento</div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group label-side">
                                <label for="document-number">Nro. documento <span>*</span></label>
                                <input type="text" class="form-control " name="document-number" id="document-number" placeholder="Completa tu nro. de documento" inputmode="numeric" maxlength="12" data-validation="document">
                                <div class="error" data-error="document-number">Debes ingresar un número válido</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Nombres <span>*</span></label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Completa tu(s) nombre(s)" data-validation="name">
                                <div class="error" data-error="name">Debes ingresar un nombre válido</div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="lastname">Apellidos <span>*</span></label>
                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Completa tu(s) apellido(s)" data-validation="name">
                                <div class="error" data-error="lastname">Debes ingresar un apellido válido</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Enviar respuesta a <span>*</span></label>
                        <br>     
                        <div class="input-radio">
                            <label><input type="radio" class="form-radio" name="response" required value="Correo electrónico"> Correo electrónico</label>
                        </div>                           
                        <div class="input-radio">
                        <label><input type="radio" class="form-radio" name="response" required value="Entrega a domicilio"> Entrega a domicilio</label>
                        </div>                           
                        <div class="input-radio">
                        <label><input type="radio" class="form-radio" name="response" required value="Recojo en agencia"> Recojo en agencia</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Correo electrónico </label>
                                <input type="email" class="form-control form-optional" name="email" id="email" placeholder="Ejemplo: micorreo@electronico.com" data-validation="name">
                                <div class="error" data-error="email">Debes ingresar un correo electrónico válido</div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" style="padding-top: 1.5rem;" >
                                <label for="customer-cencosud">Cliente Caja Cencosud <span>*</span></label>
                                <label class="form-group-radio ps-5">
                                    <input type="radio" class="form-radio" name="customer-cencosud" id="customer-cencosud" value="Si" > Si 
                                    <i></i>
                                </label>
                                <label class="form-group-radio ps-3 ps-lg-5">
                                    <input type="radio" class="form-radio" name="customer-cencosud" id="customer-cencosud"  value="No" checked > No 
                                    <i></i>
                                </label>
                                
                                <div class="error" data-error="customer-cencosud">Debes ingresar un nombre válido</div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="phone">Teléfono <span>*</span></label>
                                <input type="text" class="form-control" name="phone" maxlength="9" id="phone" placeholder="Completa tu teléfono" inputmode="numeric" data-validation="name">
                                <div class="error" data-error="phone">Debes ingresar un teléfono válido</div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="address">Dirección</label>
                                <input type="text" class="form-control form-optional" name="address" id="address" placeholder="Completa tu dirección" data-validation="name">
                                <div class="error" data-error="address">Debes ingresar una dirección válido</div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="departamento">Departamento </label>
                                <select name="departamento" class="form-control form-select form-ubigeo form-optional" id="departamento" >
                                    <option value="">Seleccione</option>
                                </select>
                                <div class="error" data-error="departamento">Debes ingresar un departamento válido</div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="provincia">Provincia </label>
                                <select name="provincia" class="form-control form-select form-ubigeo form-optional" id="provincia" >
                                    <option value="">Seleccione</option>
                                </select>
                                <div class="error" data-error="provincia">Debes ingresar un provincia válido</div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="distrito">Distrito </label>
                                <select name="distrito" class="form-control form-select form-ubigeo form-optional" id="distrito" >
                                    <option value="">Seleccione</option>
                                </select>
                                <div class="error" data-error="distrito">Debes ingresar un distrito válido</div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="product">Producto <span>*</span></label>
                                <select name="product" class="form-control form-select" id="product" >
                                    <?php foreach($product as $prod){ ?>
                                    <option><?php echo $prod ?></option>
                                    <?php } ?>
                                </select>
                                <div class="error" data-error="product">Debes ingresar un producto válido</div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="claim">Motivo del reclamo <span>*</span></label>
                                <select name="claim" class="form-control form-select" id="claim" >
                                    <?php
                                    if($subject) {
                                        foreach($subject as $s) {
                                            echo '<option>'.$s.'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="error" data-error="claim">Debes ingresar un reclamo válido</div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="amount">Monto del reclamo<span>*</span></label>
                                <input type="text" class="form-control input-amount" name="amount" id="amount" inputmode="numeric" maxlength="10" placeholder="Escribe el monto con dos decimales" data-validation="amount">                                
                                <div class="error" data-error="amount">Debes ingresar un monto válido con no más de 2 decimales</div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="detail">Detalle del reclamo<span>*</span></label>
                                <textarea name="detail" id="detail" class="form-control form-textarea" cols="30" rows="10" placeholder="Escribe el detalle de lo solicitado"></textarea>
                                <div class="error" data-error="detail">Debes ingresar un detalle válido</div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="request">Solicitud del reclamo<span>*</span></label>
                                <textarea name="request" id="request" class="form-control form-textarea" cols="30" rows="10" placeholder="Escribe el pedido concreto de lo solicitado"></textarea>
                                <div class="error" data-error="request">Debes ingresar un detalle válido</div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="attached">Adjuntar información</label>
                                <div class="input-attached file-trigger">
                                    <div class="input text">1 achivo máximo de 2MB</div>
                                    <div class="button">Adjuntar</div>
                                </div>    
                                
                                <div class="file-trigger">
                                    *Los formatos permitidos son: PNG, JPEG, GIF, DOCX, DOC, XLS, XLSX o PDF menor a 2MB
                                </div>

                                <input type="file" class="input-file" name="attached" id="attached" >                                
                                
                                <div class="error" data-error="attached">Debes ingresar un archivo de tipo PNG, JPEG, GIF, DOCX, DOC, XLS, XLSX o PDF menor a 2MB </div>
                            </div>
                        </div>
                    </div>

                   
                    
                    <div class="required">
                        *Datos obligatorios
                    </div>

                    <div class="row control">
                        <div class="col-lg-8 pt-3 button-block">
                            <input type="hidden" class="form-radio" name="action" id="action" value="claim_process" > 
                            <button type="submit" class="btn-pri-orange ">Enviar</button>
                            <button type="reset" class="btn-pri-gray">Cancelar</button>
                        </div>

                    </div>
                </form>
            </div>
        </section>
        
    </div>
    <?php endwhile; ?>
<?php else: ?>
    <?php get_404_template(); ?>
<?php endif; ?>
<?php get_footer(); 
