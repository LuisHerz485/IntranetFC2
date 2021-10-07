<?php
include '../google-api-php-client-2.9.1/vendor/autoload.php';

class ControladorDrive
{
    private string $carpetaId = '';
    private string $pathJSON = '';
    private ?Google_Client $client = null;
    private ?Google_Service_Drive $service = null;

    public function __construct(?string $carpetaId = null)
    {
        try {
            if ($carpetaId) $this->carpetaId = $carpetaId;
            putenv('GOOGLE_APPLICATION_CREDENTIALS=' . $this->pathJSON);
            $this->client = new Google_Client();
            $this->client->useApplicationDefaultCredentials();
            $this->client->setScopes(['https://www.googleapis.com/auth/drive.file']);
            $this->service = new Google_Service_Drive($this->client);
        } catch (Google_Service_Exception $gs) {
            $m = json_decode($gs->getMessage());
            echo $m->error->message;
        }
    }

    public function validarID(mixed $carpetaPadreId): string
    {
        return (empty($carpetaPadreId)) ? $this->carpetaId : $carpetaPadreId;
    }

    public function guardarArchivo(): bool
    {
        try {
            if (isset($_FILES['archivos']['tmp_name'])) {
                $cantidadArchivos = count($_FILES['archivos']['tmp_name']);
                $descripcion = htmlspecialchars($_POST['descripcion'] ?? "");
                $carpetaPadreId = $this->validarID($_POST['carpetaPadreId'] ?? "");

                for ($i = 0; $i < $cantidadArchivos; $i++) {
                    $archivos = htmlspecialchars($_FILES['archivos']['name'][$i]);

                    if (!empty($archivos) && move_uploaded_file($_FILES['archivos']['tmp_name'][$i], $archivos)) {
                        $file = new Google_Service_Drive_DriveFile();
                        $file->setName($archivos);

                        $mimeType = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $archivos);

                        $file->setParents([$carpetaPadreId]);
                        $file->setDescription($descripcion);
                        $file->setMimeType($mimeType);
                        $file->setWritersCanShare(true);

                        $archivo = $this->service->files->create(
                            $file,
                            array(
                                'data' => file_get_contents($archivos),
                                'mimeType' => $mimeType,
                                'uploadType' => 'media',
                            )
                        );
                        unlink($archivos);
                        $this->setPublico($archivo->id);
                    }
                }
                return true;
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return false;
    }

    public  function setPublico(string $archivoID): bool
    {
        try {
            $permissions = new Google_Service_Drive_Permission();
            $permissions->setRole('reader');
            $permissions->setType('anyone');

            $this->service->permissions->create($archivoID, $permissions);
            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return false;
    }

    public function crearCarpeta(): bool
    {
        try {
            $carpetaNombre = htmlspecialchars($_POST["carpetaNombre"]);
            $carpetaPadreId = $this->validarID(htmlspecialchars($_POST["carpetaPadreId"] ?? ""));
            $folder = new Google_Service_Drive_DriveFile();
            $folder->setName($carpetaNombre);
            $folder->setMimeType('application/vnd.google-apps.folder');
            $folder->setParents([$carpetaPadreId]);

            $this->service->files->create($folder);
            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return false;
    }

    public function listarTodo($flag): mixed
    {
        try {
            $carpetaPadreId = $this->validarID(htmlspecialchars($_POST["carpetaPadreId"] ?? ""));
            if ($flag) {
                if (strcmp($carpetaPadreId,  $this->carpetaId) !== 0) {
                    $file = $this->service->files->get($carpetaPadreId, array("fields" => 'parents'));
                    return $this->service->files->listFiles([
                        'q' => "'" . $file["parents"][0] . "' in parents",
                        'fields' => 'files(id, webViewLink, parents, webContentLink, name, mimeType, createdTime)',
                    ])->getFiles();
                }
            } else {
                return $this->service->files->listFiles([
                    'q' => "'" . $carpetaPadreId . "' in parents",
                    'fields' => 'files(id, webViewLink, parents, webContentLink, name, mimeType, createdTime)',
                ])->getFiles();
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return false;
    }

    public function listarArchivos(): mixed
    {
        try {
            $carpetaPadreId = $this->validarID(htmlspecialchars($_POST["carpetaPadreId"] ?? ""));
            return $this->service->files->listFiles([
                'q' => "'" . $carpetaPadreId . "' in parents AND mimeType != 'application/vnd.google-apps.folder'",
                'fields' => 'files(id, webViewLink, parents, webContentLink, name, mimeType, createdTime)',
            ])->getFiles();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return false;
    }

    public function listarCarpetas(): mixed
    {
        try {
            $carpetaPadreId = $this->validarID(htmlspecialchars($_POST["carpetaPadreId"] ?? ""));
            return $this->service->files->listFiles([
                'q' => "'" . $carpetaPadreId . "' in parents AND mimeType = 'application/vnd.google-apps.folder'",
                'fields' => 'files(id, webViewLink, parents, webContentLink, name, mimeType, createdTime)',
            ])->getFiles();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return false;
    }

    public function eliminarArchivo(): bool
    {
        try {
            $archivoID = htmlspecialchars($_POST['archivoID']);
            if (strcmp($archivoID,  $this->carpetaId) !== 0) {
                $this->service->files->delete($archivoID);
                return true;
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return false;
    }

    public function buscarArchivo(): mixed
    {
        try {
            $archivoID = htmlspecialchars($_POST['archivoID']);
            return $this->service->files->get($archivoID, array("fields" =>  ['id, webViewLink, parents, webContentLink, name, mimeType, createdTime']));
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return false;
    }

    public function esFolder(string $mimeType): bool
    {
        return strcmp($mimeType, "application/vnd.google-apps.folder") === 0;
    }

    public  function verificarEstado(string $url, int $estado = 200): bool
    {
        $headers = get_headers($url);
        $status = array();
        preg_match('/HTTP\/.* ([0-9]+) .*/', $headers[0], $status);
        return ($status[1] == $estado);
    }
}
