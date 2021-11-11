<?php

namespace Domain\Permission\Resources;

use App\Infrastructure\Interfaces\BaseResourceCollection;

class PermissionResourceCollection extends BaseResourceCollection
{

    public $collects = 'Domain\Permission\Resources\PermissionResource';

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            self::DATA => $this->collection,

            self::PAGINATION => [
                self::TOTAL         => $this->total(),
                self::COUNT         => $this->count(),
                self::PER_PAGE      => $this->perPage(),
                self::LAST_PAGES    => $this->lastPage(),
                self::TOTAL_PAGES   => $this->lastPage(),
                self::CURRENT_PAGE  => $this->currentPage()
            ]
        ];
    }
}
