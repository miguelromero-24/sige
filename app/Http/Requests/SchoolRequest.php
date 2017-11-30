<?php namespace App\Http\Requests;

class SchoolRequest extends Request
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
            'description'   => 'required',
            'address'       => 'required',
            'principal'     => 'required',
            'telephone'     => 'numeric',
            'city_id'       => 'required',
            'supervision_id'=> 'required'
        ];
    }


    /**
     * Set message for broken rules
     * @return array
     */
    public function messages()
    {
        return [
            'description.required'       => 'Descripcion requerida',
            'address.required'        => 'Dirección requerido',
            'principal.required'     => 'Director requerido',
            'city_id.required'        => 'Ciudad requerida',
            'supervision_id.required'     => 'Supervision requerido'
        ];
    }

}
