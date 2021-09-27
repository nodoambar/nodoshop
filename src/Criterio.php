<?php
namespace NodoShop;

class Criterio
{
    public string $q = "";
    public ?float $precio_min = null;
    public ?float $precio_max = null;
    public string $marca = "";
    public bool $con_stock = false;

    public function toArray(): array
    {
        $criterio = [];
        if (!empty($this->q)) {
            $criterio["q"] = $this->q;
        }
        if (isset($this->precio_min)) {
            $criterio["precio_min"] = (float)$this->precio_min;
        }
        if (isset($this->precio_max)) {
            $criterio["precio_max"] = (float)$this->precio_max;
        }
        if (!empty($this->marca)) {
            $criterio["marca"] = $this->marca;
        }
        $criterio["con_stock"] = $this->con_stock;

        return $criterio;
    }
}