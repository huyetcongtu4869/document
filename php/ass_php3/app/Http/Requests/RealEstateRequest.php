<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RealEstateRequest extends FormRequest
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
        //Lấy ra tên phương thức cần xử lý
        $currentAction = $this->route()->getActionMethod();
        // dd($currentAction);
        switch ($this->method()) {
            case 'POST':
                switch ($currentAction) {
                    case 'add':
                        $rule = [
                            'name' => 'required',
                            'area' => 'required|numeric|min:10',
                            'price' => 'required|numeric',
                            'desc' => 'required',
                            'address' => 'required',
                            'cate' => 'required',
                            'image' => 'required|image|mimes:jpeg,jpg,png'
                        ];
                        break;
                    case 'edit':
                        $rule = [
                            'name' => 'required',
                            'area' => 'required|numeric|min:10',
                            'price' => 'required|numeric',
                            'desc' => 'required',
                            'address' => 'required',
                            'cate' => 'required',
                        ];
                        break;
                }
                break;
        }
        return $rule;
    }
}
