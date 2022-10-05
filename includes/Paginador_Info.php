<?php
defined('_SSADMACCESO_') or die;

$NavPages = '';
if(isset($zArrayList) && $zArrayList!=NULL){
	$numpag = 20;
	$zTotal = count($zArrayList);

	$pagreal = $zTotal/$numpag;
	$pagreal = ceil($pagreal);

	if(!ValidarId($GET_pag) || $GET_pag > $pagreal){
		$GET_pag = 1;
	}else{
		$GET_pag = $GET_pag;
	}

	$paginar = paginar($GET_pag,$zTotal,$numpag);
	$inicio = $paginar['inicio'];
	$fin = $paginar['fin'];
	$pag = $paginar['pag'];
	$cant_paginas = $paginar['cant_paginas'];
	$inicial = $inicio; //inicio
	$final = $fin;		//final

	// Parametros a ser usados por el Paginador.
	$cantidadRegistrosPorPagina	= $numpag ;
	$cantidadEnlaces            = 10; // Cantidad de enlaces que tendra el paginador.
	$totalRegistros             = $zTotal;
	$pagina                     = $GET_pag==0?'1':$GET_pag;

	// Comenzamos incluyendo el Paginador.
	require_once 'Paginador.php';

	// Instanciamos la clase Paginador
	$paginador = new Paginador();//?option='.$GET_form.'&amp;task='.$GET_opc.'&amp;p='.($pag-1).'&amp;cat='.$GET_cat
	$GET_ypage = isset($GET_y)?'&amp;y='.$GET_y:'';
	$paginador->setUrlDestino($main.'?option='.$GET_form.'&amp;task='.$GET_opc.'&amp;cat='.$GET_cat.$GET_ypage.'&amp;p=');
	// Configuramos cuanto registros por pagina que debe ser igual a el limit de la consulta mysql
	$paginador->setCantidadRegistros($cantidadRegistrosPorPagina);
	// Cantidad de enlaces del paginador sin contar los no numericos.
	$paginador->setCantidadEnlaces($cantidadEnlaces);
	$paginador->setOmitir(array('bloqueAnterior', 'bloqueSiguiente'));
	// Agregamos estilos al Paginador
	$paginador->setClass('primero',         'previous');
	//$paginador->setClass('bloqueAnterior',  'previous');
	$paginador->setClass('anterior',        'previous');
	$paginador->setClass('siguiente',       'next');
	//$paginador->setClass('bloqueSiguiente', 'next');
	$paginador->setClass('ultimo',          'next');
	$paginador->setClass('numero',          '<>');
	$paginador->setClass('actual',          'active');

	// Y mandamos a paginar desde la pagina actual y le pasamos tambien el total
	// de registros de la consulta mysql.
	$datos = $paginador->paginar($pagina, $totalRegistros);

	// Preguntamos si retorno algo, si retorno paginamos. Nos retorna un arreglo
	// que se puede usar para paginar del modo clasico. Si queremos paginar con
	// el enlace ya confeccionado realizamos lo siguiente.

	$min = $inicial==0?'1':$inicial;
	$NavPages .= '<p class="amount">Mostrando '.$min.' - '.$final.' de '.$zTotal.' registros |';
	$NavPages .= ' Pag. '.$pagina.'</p>';


	$NavPages .= '<ul class="pagination pagination-sm">';
	if($datos){
	  $enlaces = $paginador->getHtmlPaginacion('', 'li');
	  foreach ($enlaces as $enlace) {
		  $NavPages .= $enlace . "\n";
	  }
	}
	$NavPages .= '</ul>';
}
?>