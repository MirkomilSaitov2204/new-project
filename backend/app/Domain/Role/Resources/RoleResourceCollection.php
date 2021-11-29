<?php

namespace Domain\Role\Resources;

use Infrastructure\Interfaces\BaseResourceCollection;

/**
 * @class RoleResourceCollection
 * @package   Domain\Role\Resources
 * @extends Infrastructure\Interfaces\BaseResourceCollection
 *
 * @author <mirkomilmirabdullaevich@gmail.com>
 * @phone +998903248563
 * @copyright 2021.11.27
 */
class RoleResourceCollection extends BaseResourceCollection
{

    public $collects = 'Domain\Role\Resources\RoleResource';

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
