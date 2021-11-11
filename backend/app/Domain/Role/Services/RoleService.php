<?php


namespace App\Domain\Role\Services;

use App\Domain\Core\GetOrderedDataService;
use App\Domain\Role\Entities\Role;
use App\Http\Requests\Action\RoleFilterRequest;

/**
 * Class RoleService
 * @package App\Domain\Role\Services
 *
 * @author Mirkomil Saitov <mirkomilmirabdullaevich@gmail.com>
 * @phone +998903248563
 */
class RoleService extends GetOrderedDataService
{
    protected $roles;

    /**
     * RoleService constructor.
     * @param Role $roles
     */
    public function __construct(Role $roles)
    {
        $this->roles = $roles;
    }

    /**
     * @return Role
     */
    public function roles(): Role
    {
        return $this->roles;
    }

    /**
     * @method getRoleByName
     * $param $name
     * @return mixed
     */
    public function getRoleByName($data): object
    {
        return $this->roles()->with('permissions')->where('name', $data)->first();
    }

    /**
     * @param RoleFilterRequest $request
     * @param $roles
     * @return mixed
     */
    public function filter(RoleFilterRequest $request, $roles)
    {
        $roles = $request->name
            ? $roles->where('name', 'LIKE', '%'.$request->name.'%')
            :$roles;

        $roles = $request->is_active
            ? $roles->where('is_active', $request->is_active)
            :$roles;

        return $roles;
    }

    /**
     * @param RoleFilterRequest $request
     * @return array
     */
    public function getSortFront(RoleFilterRequest $request): array
    {
        $order = $this->getSortOrder($request);

        $sort = [
            'key' => $this->getSortKey($request),
            'order' => $order,
            'order_reverse' => ($order == 'asc') ? 'desc' : 'asc'
        ];
        return $sort;
    }

    /**
     * @param RoleFilterRequest $request
     * @return string
     */
    private function getSortKey(RoleFilterRequest $request): string
    {

        $keys = ['id','created_at', 'name', 'updated_at'];
        $key = $request->get('sort_key', 'id');
        if (!in_array($key, $keys)) {
            $key = 'id';
        }
        return $key;
    }


    /**
     * @param RoleFilterRequest $request
     * @return string
     */
    private function getSortOrder(RoleFilterRequest $request): string
    {
        $types = ['asc', 'desc'];
        $type = $request->get('sort_order', 'desc');
        if (!in_array($type, $types)) {
            $type = 'desc';
        }
        return $type;
    }

    /**
     * @param RoleFilterRequest $request
     * @param $eventTypes
     * @return mixed
     */
    public function sort(RoleFilterRequest $request, $eventTypes)
    {
        $order = $this->getSortOrder($request);
        $key = $this->getSortKey($request);
        return $this->getOrderedData($eventTypes, $key, $order);
    }
}
