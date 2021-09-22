<?php
namespace NodoShop;

use JsonException;

class Peticion
{
    /**
     * @throws JsonException
     */
    public function ejecutar(): array
    {
        $url = "https://demoelectrica.nodogestion.com/api/operaciones/listado";
        $token = "de372929-82bc-e2a4-02c4-0ec08ee3a60d";

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
                'header' => 'Authorization: Basic ' . base64_encode($token . ':')
            ]
        ];

        $context = stream_context_create($opts);

        $result = file_get_contents($url . "?orden=DESC", false, $context);

        return json_decode($result, true, 512, JSON_THROW_ON_ERROR);
    }
}