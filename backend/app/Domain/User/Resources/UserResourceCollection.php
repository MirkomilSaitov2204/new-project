<?php

namespace Domain\User\Resources;

use App\Infrastructure\Interfaces\BaseResourceCollection;

/**
 * @package Domain\User\Resources;
 * @class UserResourceCollection
 *
 * @author <mirkomilmirabdullaevich@gmail.com>
 * @copyright 2021.11.23
 */

class UserResourceCollection extends BaseResourceCollection
{

    public $collects = 'App\Domain\User\Resources\PermissionResource';

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
