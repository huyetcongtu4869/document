<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DemoRequest extends FormRequest
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
        //Tạo ra 1 mảng
        $rule = [];
        //Lấy ra tên phương thức cần xử lý
        $currentAction = $this->route()->getActionMethod();
        // dd($currentAction);
        switch ($this->method()) {
            case 'POST':
                switch ($currentAction) {
                    case 'add':
                        //Xây dựng rules validate trong này
                        $rule = [
                            'name' => 'required',
                            'email' => 'required|email|unique:demo',
                            'image'=>'required|image|mimes:jpeg,jpg,png|max:5128'
                        ];
                        break;
                }
                break;
        }
        return $rule;
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'email.required' => 'Bắt buộc phải nhập email',
            'email.email' => 'Phải là kiểu email',
            'email.unique' => 'email đã tồn tại'
        ];
    }
}
