<?php
	function createPath($path) {
	    if (is_dir($path)) return true;
	    $prev_path = substr($path, 0, strrpos($path, '/', -2) + 1 );
	    $return = createPath($prev_path);
	    return ($return && is_writable($prev_path)) ? mkdir($path, 0755) : false;
	}
	class UpLoadFile{
	
		var $directorio;
		public $archivo;    
		var $nuevo_archivo;
		var $is_upload;
		var $mensaje;
		
		//FUNCIÓN PARA SUBIR IMÁGENES EN GENERAL
		public function UploadGlobal_IMAGE($file, $path, $dir='', $array=NULL){
			
			if($this->archivo == NULL) $this->archivo = $_FILES[$file]['name'];

			if(!file_exists($path)) createPath($path);


			$this->mensaje = '';

			//archivos permitidos
			$allowed = array('jpg', 'gif', 'docx', 'jpeg', 'pjpeg', 'png');
			
			//extensión actual
			$extension = pathinfo($_FILES[$file]['name'], PATHINFO_EXTENSION);

			$tamano_real = $_FILES[$file]['size'];
			$tamano_fijo = 7097152;	// 7MB

			if(in_array(strtolower($extension), $allowed)){
				if($_FILES[$file]['error'] > 0){
					//return 0;
					$this->mensaje = 'Error inesperado.';
					$this->is_upload = false;
				}else{
					if($tamano_real < $tamano_fijo){
						if(file_exists($path)){
							if(file_exists($path . $this->archivo)){
								//return -1;
								$this->mensaje = 'El archivo ya existe.';
								$this->is_upload = false;
							}else {
								if(@move_uploaded_file($_FILES[$file]['tmp_name'], $path . $this->archivo)){	
									$type = explode('/',$_FILES[$file]['type']);
									
									if(!file_exists($path.$dir)){
										@mkdir($path.$dir, 0755);
									}
									$dir_new = $path.$dir.'/';
								
									if($array!=NULL){
										$resizeObj = new ClsResizeImage($path.$this->archivo);
										foreach($array as $nwa=>$ma){
											//resize thumb's
											if($ma[0]!=NULL){
												$tb = '';
												if($ma[4]!=NULL){
													@mkdir($dir_new.$ma[4], 0755);
													$tb = $ma[4];
												}
												$resizeObj->resizeImage($ma[1], $ma[2], $ma[3]);
												$resizeObj->saveImage($dir_new.$tb.$ma[0], $ma[5]);
											}
										}
									}
									
									@unlink($path . $this->archivo);
									//return true;
									//$this->mensaje = 'archivo subido con exito';
									$this->is_upload = true;
									//echo "archivo subido con exito";
								}else{
									$this->mensaje = 'Error al subir el archivo';
									$this->is_upload = false;
									//echo "error al copiar el archivo";
								}
							}
						}else{
							$this->mensaje = 'El directorio: "'.$path.'" no existe.';
							$this->is_upload = false;	
						}
					}else{
						$this->mensaje = 'El archivo supera los '.format_bytes($tamano_fijo).'. Tama\xF1o actual del archivo: '.format_bytes($tamano_real);
						$this->is_upload = false;
						//echo "el archivo supera los 60kb";		
					}
				}
			}else{
				//return -2;
				$this->mensaje = 'El formato de archivo no es permitido.';
				$this->is_upload = false;
				//echo "el formato de archivo no es valido, solo $extension";
			}
		}
		

		//FUNCIÓN PARA SUBIR PDF, OFFICE Y COMPRIMIDOS
		public function UpLoadGlobal_PDFOFILES($file, $path, $dir=''){
			
			if($this->archivo == NULL) $this->archivo = $_FILES[$file]['name'];
			if(!file_exists($path)) createPath($path);

			$this->mensaje = '';

			//archivos permitidos
			$allowed = array('pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx');
			//$allowed = array('exe', 'pdf', '7z', 'zip', 'rar', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx'); 
			
			//extensión actual
			$extension = pathinfo($_FILES[$file]['name'], PATHINFO_EXTENSION);
			
			$tamano_real = $_FILES[$file]['size'];
			$tamano_fijo = 20971520;	 // 20 MB en bytes
			
			if(in_array(strtolower($extension), $allowed)){
				if($_FILES[$file]['error'] > 0){
					//return 0;
					$this->mensaje = 'Error inesperado.';
					$this->is_upload = false;
				} else {
					if($tamano_real < $tamano_fijo){
						if(file_exists($path)){
							if (file_exists($path . $this->archivo)){
								//return -1;
								$this->mensaje = 'El archivo ya existe.';
								$this->is_upload = false;
							}else {
								$dir_a = $dir.'/';
								if(!file_exists($path.$dir)){
									mkdir($path.$dir, 0755);
									$dir_a = $dir.'/';
								}
								$dir_new = $path.$dir_a;
								
								if(move_uploaded_file($_FILES[$file]['tmp_name'], $dir_new . $this->archivo)){	
									//return true;
									//$this->mensaje = 'archivo subido con exito';
									$this->is_upload = true;
									//echo "archivo subido con exito";
								}else{
									$this->mensaje = 'Error al subir el archivo';
									$this->is_upload = false;
									//echo "error al copiar el archivo";
								}
							}
						}else{
							$this->mensaje = 'El directorio: "'.$path.'" no existe.';
							$this->is_upload = false;	
						}
					}else{
						$this->mensaje = 'El archivo supera los '.format_bytes($tamano_fijo).'. Tama\xF1o actual del archivo: '.format_bytes($tamano_real);
						$this->is_upload = false;
						//echo "el archivo supera los 60kb";		
					}
				}
			}else{
				//return -2;
				$this->mensaje = 'El formato de archivo no es permitido.';
				$this->is_upload = false;
				//echo "el formato de archivo no es valido, solo $extension";
			}
		}
		
		
		//FUNCIÓN PARA SUBIR ARCHIVOS DE AUDIO
		public function UploadGlobal_AUDIO($file, $path, $dir = ''){
	
			if($this->archivo == NULL) $this->archivo = $_FILES[$file]['name'];
			if(!file_exists($path)) createPath($path);
			
			$this->mensaje = '';
			
			//archivos permitidos
			$allowed = array('mp3');
			
			//extensión actual
			$extension = pathinfo($_FILES[$file]['name'], PATHINFO_EXTENSION);

			$tamano_real = $_FILES[$file]['size'];
			$tamano_fijo = 10485760; // 10MB
			
			if(in_array(strtolower($extension), $allowed)){
				if ($_FILES[$file]['error'] > 0){
					//return 0;
					$this->mensaje = 'Error inesperado.';
					$this->is_upload = false;
				} else {
					if($tamano_real < $tamano_fijo){
						if(file_exists($path)){					
							if (file_exists($path . $this->archivo)){
								//return -1;
								$this->mensaje = 'El archivo ya existe.';
								$this->is_upload = false;
							}else {
								$dir_a = $dir.'/';
								if(!file_exists($path.$dir)){
									mkdir($path.$dir, 0755);
									$dir_a = $dir.'/';
								}
								$dir_new = $path.$dir_a;
								
								if(move_uploaded_file($_FILES[$file]['tmp_name'], $dir_new . $this->archivo)){
									
									//return true;
									//$this->mensaje = 'archivo subido con exito';
									$this->is_upload = true;
									//echo "archivo subido con exito";
								}else{
									$this->mensaje = 'Error al subir el archivo';
									$this->is_upload = false;
									//echo "error al copiar el archivo";
								}
							}
						}else{
							$this->mensaje = 'El directorio: "'.$path.'" no existe.';
							$this->is_upload = false;	
						}
						
					}else{
						$this->mensaje = 'El archivo supera los '.format_bytes($tamano_fijo).'. Tama\xF1o actual del archivo: '.format_bytes($tamano_real);
						$this->is_upload = false;
						//echo "el archivo supera los 60kb";		
					}
				}
			 } else {
				//return -2;
				$this->mensaje = 'El formato de archivo no es permitido.';
				$this->is_upload = false;
				//echo "el formato de archivo no es valido, solo $extension";
			}
		}
		
	}
?>