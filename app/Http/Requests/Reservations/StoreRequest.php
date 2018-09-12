<?php

namespace App\Http\Requests\Reservations;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'car_id' => 'required|exists:cars,id',
            'customer_id' => 'required|exists:customers,id'
        ];
    }
}
