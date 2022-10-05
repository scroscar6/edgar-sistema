<?php include('Modulos/Recibo/Clases/ClsRecibo.php'); ?>
<?php $ClsRecibo =  new ClsRecibo(); ?>
<?php $ListaCiclos = $ClsRecibo->ListarCicloRecibo();?>
<?php if (count($ListaCiclos) == 0): ?>
    <div class="row">
        <div class="col-md-12">
            <center>
                <h3>NO EXISTEN CICLOS/VARIABLES GENERADOS </h3>
            </center>
        </div>
    </div>
<?php else: ?>
    <style type="text/css" media="screen">
        .form-horizontal .has-feedback .form-control-feedback{right: -20px}
        .bs-select .btn{padding-bottom: 4px !important;padding-top: 4px !important;}
    </style>
    <div class="col-md-12">
        <div class="portlet" id="portlet">
            <div class="portlet-title">
                <div class="actions btn-set">
                    <div class="btn-group">
                        <input class="form-control input-sm" id="busqueda" placeholder="Busqueda" type="text">
                    </div>
                    <div class="btn-group">
                        <select class="bs-select form-control input-sm" id="limite">
                            <option value="200">200</option>
                            <option value="300">300</option>
                            <option value="500">500</option>
                        </select>
                    </div>
                    <div class="btn-group">
                        <select class="select2 form-control input-sm" id="categoria">
                            <?php foreach ($ListaCiclos as $value): ?>
                <option value="<?php echo $value['id_ciclo'];?>"><?php echo $value['mes_texto'].' '.$value['anio'];?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <button type="button" id="buscar" class="btn btn-primary"><i class="fa fa-check"></i> Buscar</button>
                </div>
            </div>
        </div>
    </div>
    <div id="Registros_rows"></div>
    <script type="text/javascript">
        $(document).ready(function(){
            Validacion.Init();
        });
    </script>
<?php endif ?>
