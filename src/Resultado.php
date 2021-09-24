<?php
namespace NodoShop;

class Resultado
{
    public int $pagina = 0;
    public int $registros = 0;
    public int $registros_totales = 0;
    public array $datos = [];

    public function __construct(int $pagina, int $registros, int $registros_totales, array $datos)
    {
        $this->pagina = $pagina;
        $this->registros = $registros;
        $this->registros_totales = $registros_totales;
        $this->datos = $datos;
    }
}