<?php
namespace NodoShop;

class Respuesta
{
    public string $resultado = "";
    public string $mensaje = "";
    public array $datos = [];

    public function __construct(string $resultado, array $datos, string $mensaje = "")
    {
        $this->resultado = $resultado;
        $this->datos = $datos;
        $this->mensaje = $mensaje;
    }
}
