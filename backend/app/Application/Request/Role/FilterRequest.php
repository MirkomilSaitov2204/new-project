<?php

namespace Application\Request\Role;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class FilterRequest
 * @package Application\Request\Role;
 * @extends Illuminate\Foundation\Http\FormRequest;
 *
 * @author Mirkomil Saitov <mirkomilmirabdullaevich@gmail.com>
 * @phone +998903248563
 *
 * @copyright 2021.11.24
 */
class FilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

        ];
    }
}
