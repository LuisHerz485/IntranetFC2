<?php 

require '../modelos/conexion.php';
require_once '../modelos/archivo.modelo.php';
require_once '../modelos/clientes.modelo.php';

include 'google-api-php-cliente-2.9.1/vendor/autoload.php';

//Llenar con json de API
putenv('GOOGLE_APPLICATION_CREDENTIALS=');

$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->SetScopes(['https://www.googleapis.com/auth/drive.file']);

$iddrive = $_SESSION['iddrive'];
$razonsocial = $_SESSION['nombre'];

try{
	$service = new Google_Service_Drive($client);
	$file_patch = $_FILE['archivos']['tmp_name'];

	$file = new Google_Service_Drive_DriveFile();
	$file->setName($_FILE['archivos']['name']);

	$info = finfo_open(FILEINFO_MIME_TYPE);
	$mime_type = finfo_file($finfo, $flie_path);

	$file->setParents(arrat($iddrive));
	$file->setDescription("Archivo subido por " . $nombre ." | gracias a la intranet FC Contadores y Asociados");
	$file->setMimeType($mime_type);

	$resultado = $service->files->create(
		$file,
		array(
			'data' => file_get_contents($file_path),
			'MimeType' => $mime_type,
			'updateType' => 'media'


		)

	);

		echo"<script>
			Swal.fire({ 
				title:	'Success!',
				text:	'¡Subida de archivo exitoso!',
				icon:	'success',
				confirmButtonText:	'Ok'
				}).then((result)=>{
					if(result.value){
						window.location='upload';
					}
				})
			</script>";


}catch(Google_Service_Exception $gs){
	$mensaje = json_decode($gs->getMessage());
	echo $mensaje->error->message();
}catch(Exception $e){
	echo $e->getMessage();
}


 ?>