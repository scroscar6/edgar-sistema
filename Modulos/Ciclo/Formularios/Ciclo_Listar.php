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
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="40">40</option>
                        <option value="80">80</option>
                        <option value="150">150</option>
                    </select>
                </div>
                <button type="button" id="buscar" class="btn btn-primary"><i class="fa fa-check"></i> Buscar</button>
                <a href="javascript:void(0);" id="btn_agregar_ciclo" class="btn btn-primary green"><i class="fa fa-plus"></i> Agregar</a>
            </div>
        </div>
    </div>
</div>
<div id="Registros_rows"></div>
<script type="text/javascript">
    $(document).ready(function(){
        Validacion.Init();
        Validacion.AgregarCiclo();
    });
</script>