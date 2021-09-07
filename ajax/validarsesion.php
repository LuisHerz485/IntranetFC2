<?php

header('Content-Type: application/json');
session_start();
if (!(isset($_SESSION['iniciarSesion']) && $_SESSION['iniciarSesion'] == "ok")) {
    http_response_code(401);
    die();
}
