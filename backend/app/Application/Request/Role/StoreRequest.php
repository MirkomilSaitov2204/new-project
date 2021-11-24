<?php

namespace Application\Request\Role;

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
            'name'        => 'required|unique:roles,name',
            'is_active'   => 'nullable',
            'guard_name'  => 'required',
            'description' => 'nullable',
            'permissions' => 'nullable',
        ];
    }
}
