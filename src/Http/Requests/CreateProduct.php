<?php
/**
 * Contains the CreateProduct request class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-10-19
 *
 */


namespace Konekt\Vanilo\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Konekt\Product\Models\ProductStateProxy;
use Konekt\Vanilo\Contracts\Requests\CreateProduct as CreateProductContract;

class CreateProduct extends FormRequest implements CreateProductContract
{
    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'name'  => 'required|min:2|max:255',
            'sku'   => 'required|unique:products',
            'state' => ['required', Rule::in(ProductStateProxy::values())],
        ];
    }

    /**
     * @inheritDoc
     */
    public function authorize()
    {
        return true;
    }

}