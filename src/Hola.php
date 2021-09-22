<?php
namespace NodoShop;

class Hola
{
    public function saludar()
    {
        $peticion = new Peticion();
        return $peticion->ejecutar();
    }
}
