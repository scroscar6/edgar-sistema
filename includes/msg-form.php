<?php 
defined('_SSADMACCESO_') or die;
	$VAP_I = isset($_GET['dx'])?(int)$_GET['dx']:''; 
	if($VAP_I == 1){
		$msg_r = '<strong>Éxito!</strong> El registro ha sido <strong>añadido</strong> correctamente';
	}else{
		if($VAP_I == 2){
			$msg_r = '<strong>Éxito!</strong> El registro ha sido <strong>editado</strong> correctamente';
		}
	}
	if($VAP_I == 1 || $VAP_I == 2){
?>
    <script type="text/javascript">
	$(document).ready(function(){
		$(".popup-exito").fadeIn(500);
		setTimeout("$('.popup-exito').hide();", 5000);
		$(".popup-exito .close").click(function(e){
			$(".popup-exito").fadeOut(500, function (){
				$(this).remove()
			});
		});
	});</script>
    <div class="row">
    	<div class="col-md-12 popup-exito">
			<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
				<?php echo $msg_r;?>
			</div>
    	</div>
	</div>
<?php
	}
?>