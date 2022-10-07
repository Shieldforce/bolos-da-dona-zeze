<?php

declare(strict_types=1);

namespace App\Http\Requests\Cake;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCakeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name"           => ["string"],
            "weight"         => ["numeric"],
            "value"          => ["numeric"],
            "stock.amount"   => ["integer"],
        ];
    }
}
