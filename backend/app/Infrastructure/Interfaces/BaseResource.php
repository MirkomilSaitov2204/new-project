<?php

namespace Infrastructure\Interfaces;

use App\Infrastructure\Interfaces\Items;
use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource implements Items
{
    /**
     * @param $data
     * @param string $format
     * @return false|string
     */
    public function dateFormatters($data, $format = 'd/m/y')
    {
        return date($format, strtotime($data));
    }

}
