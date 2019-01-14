<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateMedicineRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($user = Auth::user())
            return true;
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => 'sometimes',
            'name' => 'sometimes',
            'short_text' => 'sometimes',
            'long_text' => 'sometimes',
            'image_url' => 'sometimes',
            'is_published' => 'sometimes',
            'company_id' => 'sometimes'
        ];
    }
}
