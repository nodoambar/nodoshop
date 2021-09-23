<?php
namespace NodoShop;

class Conector
{
    private Peticion $peticion;

    public function __construct(string $alias, string $token)
    {
        $this->peticion = new Peticion($alias, $token);

    }

    public function productos(string $buscar = "", string $orden = "ASC", int $registros = 0, int $pagina = 0): array
    {
        if ($registros < 0) {
            $registros = 0;
        }
        if ($pagina < 0) {
            $pagina = 0;
        }

        $params = [
            "q" => $buscar,
            "orden" => $orden,
            "registros" => $registros,
            "pagina" => $pagina,
        ];

        return $this->peticion->ejecutarGet("api/productos", $params)->datos;
    }
}
