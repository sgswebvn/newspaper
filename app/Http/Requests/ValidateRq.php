<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateRq extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return  [
            'tieu_de' => ['required', 'string', 'min:10'],
            'the_loai' => ['required'],
            'noi_dung' => ['required', 'string', 'min:30'],
            // 'hinh_anh' => ['nullable','required', 'image', 'mimes:png,jpeg,jpg,gif,svg,webp', 'max:2048'],
            'tac_gia' => ['required', 'nullable'],
            'description' => ['required'],

        ];
       
    }
    public function messages(): array
    {
        return [
           'tieu_de.required' => 'Vui lòng nhập tiêu đề nhé cu',
            'tieu_de.min' => 'Tiêu đề phải có ít nhất 10 ký tự',
            'the_loai.required' => 'Vui lòng chọn thể loại',
            'noi_dung.required' => 'Không để trống nội dung',
            'noi_dung.min' => 'Nội dung phải có ít nhất 30 ký tự',
            'hinh_anh.required' => 'Phải nhập hình ảnh',
            'hinh_anh.image' => 'Hình ảnh không hợp lệ',
            'hinh_anh.mimes' => 'Hình ảnh phải có định dạng png, jpeg, jpg, gif, svg, hoặc webp',
            'hinh_anh.max' => 'Kích thước hình ảnh không được vượt quá 2MB',
            'tac_gia.required' => 'Vui lòng nhập tên tác giả',
            'description.required' => 'Vui lòng nhập mô t',
        ];
    }
}
