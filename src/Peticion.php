<?php
namespace NodoShop;

use JsonException;

class Peticion
{
    private string $url;
    private string $token;

    public function __construct(string $alias, string $token)
    {
        $this->url = "https://{$alias}.nodogestion.com";
        $this->token = $token;
    }

    public function ejecutarGet(string $endpoint, array $params): Respuesta
    {
        //$url = "https://demoelectrica.nodogestion.com/api/operaciones/listado";
        //$token = "de372929-82bc-e2a4-02c4-0ec08ee3a60d";
        //$token = "b7eebd1c-4519-40f9-8036-9403be561420";

        /*
        $postdata = http_build_query([
            'campo' => 'valor',
        ]);
        $optsPost = [
            'http' => [
                'method' => 'POST',
                'header' => 'Content-Type: application/x-www-form-urlencoded',
                'content' => $postdata,
            ]
        ];
        */

        $opts = [
            'http' => [
                'method' => 'GET',
                'header' => 'Authorization: Basic ' . base64_encode($this->token . ':')
            ]
        ];

        $context = stream_context_create($opts);

        $result = file_get_contents("{$this->url}/{$endpoint}?" . http_build_query($params), false, $context);

        try {
            $datos = json_decode($result, true, 512, JSON_THROW_ON_ERROR);
            $respuesta = new Respuesta("OK", $datos);
        } catch (JsonException $e) {
            $respuesta = new Respuesta("error", [], $e->getMessage());
        }

        return $respuesta;
    }
}
