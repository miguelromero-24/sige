<?php namespace App\Http\Requests;

class TeacherRequest extends Request
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
            'first_name'   => 'required',
            'last_name'       => 'required',
            'email'     => 'required',
            'cellphone'     => 'numeric',
            'city_id'       => 'required'
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
            'email.required'     => 'Email requerido',
            'city_id.required'        => 'Ciudad requerida',
        ];
    }

}
