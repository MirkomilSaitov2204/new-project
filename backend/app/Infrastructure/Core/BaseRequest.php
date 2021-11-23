<?php

namespace Infrastructure\Core;

use Illuminate\Http\JsonResponse;
use Interfaces\Http\Traits\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

/**
 * @package Infrastructure\Core;
 * @class BaseRequest;
 *
 * @author <mirkomilmirabdullaevich@gmail.com>
 * @phone +998903248563
 */
abstract class BaseRequest extends FormRequest
{
    // Trait for json response
    use Response;

    /*
     * @const message
     */
    protected const MESSAGE = "Validation error";

    /**
     * @const code
     */
    protected const CODE = 422;

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
     * @param Validator $validator
     * @return JsonResponse
     */
    protected function failedValidation(Validator $validator): JsonResponse
    {
        $errors = (new ValidationException($validator))->errors();
        return $this->error($errors,self::MESSAGE,self::CODE);
    }
}
