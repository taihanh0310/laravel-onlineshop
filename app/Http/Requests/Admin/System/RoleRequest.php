<?php

namespace App\Http\Requests\Admin\System;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class RoleRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->hasRole(['admin', ['root']]);
        //return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'         => 'required|unique:roles|max:255',
            'display_name' => 'required',
        ];
    }
}