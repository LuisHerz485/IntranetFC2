<?php
class conexion
{
    static public function conectar()
    {
        $link = new PDO("mysql:host=147.135.1.109;dbname=fccontad_intranet_fc_dev", "fccontad", "l2WDJ3@@bI2_X4gVQ?");
        $link->exec("set names utf8");
        return $link;
    }
}
