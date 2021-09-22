<?php
namespace NodoShop;

class Hola
{
    public function saludar(): void
    {
        $peticion = new Peticion();
        $peticion->ejecutar();
    }
}