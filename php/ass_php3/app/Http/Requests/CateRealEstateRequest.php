<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateRealEstateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rule = [];
        $currentAction = $this->route()->getActionMethod();
        switch ($this->method()) {
            case 'POST':
                switch ($currentAction) {
                    case 'add':
                        //Xây dựng rules validate trong này
                        $rule = [
                            'name' => 'required',
                        ];
                        break;
                }
                break;
        }
        return $rule;
    }
}
