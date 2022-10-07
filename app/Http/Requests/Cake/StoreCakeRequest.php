<?php

declare(strict_types=1);

namespace App\Http\Requests\Cake;

use Illuminate\Foundation\Http\FormRequest;

class StoreCakeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name"           => ["required", "string"],
            "weight"         => ["required", "numeric"],
            "value"          => ["required", "numeric"],
            "stock.amount"   => ["integer"],
        ];
    }
}
