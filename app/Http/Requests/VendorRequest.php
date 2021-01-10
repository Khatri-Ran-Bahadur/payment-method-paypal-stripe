<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
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
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'plant_id'=>'required',
            'company_name_vendor_name'=>'required',
            'street'=>'required',
            'address1'=>'required',
            'address2'=>'required',
            'city'=>'required',
            'state'=>'required',
            'pin'=>'required',
            'country'=>'required',
            'contact_person_name'=>'required',
            'tel_no'=>'required',
            'mobile_no'=>'required',
            'industry_type'=>'required',
            'located'=>'required',
            'address_proof' => 'required|mimes:pdf,xlx,csv,jpg,jpeg,png',
            'registration_certificate' => 'required|mimes:pdf,xlx,csv,jpg,jpeg,png',
            'copy_pan_card' => 'required|mimes:pdf,xlx,csv,jpg,jpeg,png',
        ];
    }
}
