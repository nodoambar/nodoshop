<?php
use NodoShop\Conector;

require_once "vendor/autoload.php";

$conector = new Conector("nodoambar", "5b694cd7-d8e3-493a-8d33-fed137755424");
print_r($conector->productos());
