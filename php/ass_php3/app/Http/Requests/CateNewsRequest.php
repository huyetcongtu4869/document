<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateNewsRequest extends FormRequest
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
                        $rule = [
                            'name' => 'required',
                        ];
                        break;
                    case 'edit':
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
