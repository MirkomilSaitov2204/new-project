<?php

namespace Application\Request\Permission;

use Infrastructure\Core\BaseRequest;

class StoreRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'        => 'required|unique:permissions,name',
            'parent_id'   => 'nullable',
            'is_active'   => 'nullable',
            'guard_name'  => 'required',
            'description' => 'nullable',
        ];
    }
}
