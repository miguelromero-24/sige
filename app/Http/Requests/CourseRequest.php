<?php namespace App\Http\Requests;

class CourseRequest extends Request
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
            'shift_id'       => 'required',
            'level_id'     => 'required',
            'teacher_id'     => 'numeric'
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
            'shift_id.required'        => 'Turno requerido',
            'level_id.required'     => 'Nivel requerido',
            'teacher_id.required'        => 'Docente requerido'
        ];
    }

}
