<?php
$GET_form = $GET_form;
$GET_opc = $GET_opc;
$pagina = $main;
$pag = $GET_pag;

	if(!isset($pag) || $pag==''){ $pag=1; }
	$numpag = 20;
	$aux = $pag * $numpag;
	$tregistros = count($zArrayList);	
	$variable = $aux - $tregistros;			
										
	if($variable>0){
		$fin = $aux - $variable;
			if($pag<>1){
			 	$inicio = $fin - ($numpag-$variable);
			}else{
				$inicio = 0;
			}
	}else{
		$fin = $aux;
		$inicio = $fin - $numpag;
	}						
														  
	$cant_paginas = ceil(count($zArrayList)/$numpag);
	switch($Type){
		case 1://Formulario con Categorias
			$tot = count($zArrayList);  
			$paginar = paginar($pag,count($zArrayList),$numpag);
			$inicio = $paginar['inicio'];
			$fin = $paginar['fin'];
			$pag = $paginar['pag'];
			$cant_paginas = $paginar['cant_paginas'];
			$ig = $inicio; 
?>	
            <!--INICION DE LA PAGINACI&oacute;N-->
            <div class="pagination" align="left">
               <span  class="current">Mostrando <?php if($tot>0){echo $pag;}else{echo $ig;}?> - <?php echo $fin;?> de <?php echo $tot;?> registros</span>
                <span class="EPaginacion">Pag. <?php echo $pag;?>  </span>
                <?php
                if($pag>1){
                    echo '<a class="EPaginacion" href="'.$pagina.'?option='.$GET_form.'&amp;task='.$GET_opc.'&amp;p='.($pag-1).'&amp;cat='.$GET_cat.'">';
                    echo '<font face="verdana" size="-2">&#171; Anterior</font>';
                }else{
                    echo '<span class="disabled">&#171; Anterior</span>';
                }
        
                for($i=1;$i<=$cant_paginas;$i++){
                    if ($pag == $i){
                        echo '<span class="current">'.$pag.'</span>';
                   }else{
                        echo '<a  href="'.$pagina.'?option='.$GET_form.'&amp;task='.$GET_opc.'&amp;p=' . $i . '&amp;cat='.$GET_cat.'">' . $i . '</a> ';
                   }
                }
                
                if($pag<$cant_paginas){
                    echo '&nbsp;<a class="next" href="'.$pagina.'?option='.$GET_form.'&amp;task='.$GET_opc.'&amp;p='.($pag+1).'&amp;cat='.$GET_cat.'"><span class="t">Siguiente &#187;</span>';
                }else{
                    echo '<span class="disabled">Siguiente &#187;</span>';	
                } //////////fin de la paginacion
?>
</div> 
<?php
		break;
	}
	
	$i = $inicio;
	$f = $fin;
?>