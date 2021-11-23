<?php

namespace Application\Request\Permission;

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
            'name'        => ['required',Rule::unique('permissions', 'name')->ignore($this->permission)],
            'parent_id'   => 'nullable',
            'is_active'   => 'nullable',
            'guard_name'  => 'required',
            'description' => 'nullable',
        ];
    }
}
