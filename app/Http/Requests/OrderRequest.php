<?php

namespace App\Http\Requests;

use App\Constants\ServiceOfAstrologerConstants;
use App\Models\ServiceOfAstrologer;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $serviceMaskPath = ServiceOfAstrologer::class . ',' . ServiceOfAstrologerConstants::DB_MASK_FIELD;

        return [
            'name' => 'required',
            'email' => 'required|email',
            'service_mask' => 'required|exists:' . $serviceMaskPath,
        ];
    }
}
