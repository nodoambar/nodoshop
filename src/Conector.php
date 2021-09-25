<?php
namespace NodoShop;

class Conector
{
    private Peticion $peticion;

    public function __construct(string $alias, string $token)
    {
        $this->peticion = new Peticion($alias, $token);
    }

    public function producto(int $id): array
    {
        return $this->peticion->ejecutarGet("api/catalogo/producto/{$id}")->datos;
    }

    public function productoSlug(string $slug): array
    {
        $id = explode("-", $slug)[0];
        return $this->producto($id);
    }

    public function productos(string $buscar = "", int $id_familia = 0, string $orden = "ASC", int $registros = 0, int $pagina = 0): Resultado
    {
        if ($registros < 0) {
            $registros = 0;
        }
        if ($pagina < 0) {
            $pagina = 0;
        }

        $params = [
            "q" => $buscar,
            "id_familia" => $id_familia,
            "order" => $orden,
            "registros" => $registros,
            "page" => $pagina,
        ];

        $peticion = $this->peticion->ejecutarGet("api/catalogo/productos", $params)->datos;

        return new Resultado(
            $peticion["header"]["page"],
            $peticion["header"]["records"],
            $peticion["header"]["total_records"],
            $peticion["data"],
        );
    }

    public function familia(int $id): array
    {
        return $this->peticion->ejecutarGet("api/catalogo/familia/{$id}")->datos;
    }

    public function familias(string $buscar = "", string $orden = "ASC"): Resultado
    {
        $params = [
            "q" => $buscar,
            "order" => $orden,
        ];

        $peticion = $this->peticion->ejecutarGet("api/catalogo/familias", $params)->datos;

        return new Resultado(
            $peticion["header"]["page"],
            $peticion["header"]["records"],
            $peticion["header"]["total_records"],
            $peticion["data"],
        );
    }

    public function marcas(string $buscar = "", string $orden = "ASC"): Resultado
    {
        $params = [
            "q" => $buscar,
            "order" => $orden,
        ];

        $peticion = $this->peticion->ejecutarGet("api/catalogo/marcas", $params)->datos;

        return new Resultado(
            $peticion["header"]["page"],
            $peticion["header"]["records"],
            $peticion["header"]["total_records"],
            $peticion["data"],
        );
    }
}
