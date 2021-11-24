<?php

namespace Application\Request\Role;

use Illuminate\Validation\Rule;
use Infrastructure\Core\BaseRequest;

class UpdateRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'        => ['required',Rule::unique('roles', 'name')->ignore($this->roles)],
            'is_active'   => 'nullable',
            'guard_name'  => 'required',
            'description' => 'nullable',
            'permissions' => 'nullable',
        ];
    }
}
