<?php
class conexion
{
    static public function conectar()
    {
        $link = new PDO("mysql:host=147.135.6.159;dbname=fccontad_intranet_fc_dev", "fccontad", "pRRYFQTZU@&.]FFT~S112189");
        $link->exec("set names utf8");
        return $link;
    }
}
