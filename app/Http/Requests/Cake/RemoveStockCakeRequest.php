<?php

declare(strict_types=1);

namespace App\Http\Requests\Cake;

use Illuminate\Foundation\Http\FormRequest;

class RemoveStockCakeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "amount" => ["required", "integer"],
        ];
    }
}
