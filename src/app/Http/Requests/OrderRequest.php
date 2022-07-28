<?php

namespace App\Http\Requests;

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
     * @return array
     */
    public function rules()
    {
        switch ($this->getMethod()) {
            case 'POST':
                return [
                    'full_name' => 'required|string',
                    'total_cost' => 'required|numeric|min:0.01',
                    'address' => 'required|string',
                ];
            case 'PUT':
                return [
                    'order' => 'required|integer|exists:orders,id',
                    'full_name' => 'sometimes|required|string',
                    'total_cost' => 'sometimes|required|numeric|min:0.01',
                    'address' => 'sometimes|required|string'
                ];
                // case 'PATCH':
                // case 'DELETE':
            default:
                return [];
        }
    }

    public function messages()
    {
        return [
            'fullName.required' => 'A full name is required',
            'fullName.string' => 'Full name should be a string',
            'totalCost.required' => 'A total cost is required',
            'totalCost.min' => 'The total cost should not be less than 0.01',
            'address.required' => 'A address is required',
            'address.string' => 'Address should be a string',
            'orderId.required' => 'Order ID is incorrect',
            'orderId.integer' => 'Order ID is incorrect',
            'orderId.exists' => 'Order ID already in use',
        ];
    }

    public function all($keys = null)
    {
        $data = parent::all($keys);
        switch ($this->getMethod()) {
            case 'PUT':
                $data['order'] = $this->route('order');
                break;
                // case 'PATCH':
                // case 'DELETE':
        }
        return $data;
    }
}
