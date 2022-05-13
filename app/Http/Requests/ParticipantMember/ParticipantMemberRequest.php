<?php

namespace App\Http\Requests\ParticipantMember;

use App\Models\ParticipantMember;
use App\Traits\Request\RequestTraits;
use Illuminate\Foundation\Http\FormRequest;

class ParticipantMemberRequest extends FormRequest
{
    use RequestTraits;

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
        return ParticipantMember::defaultRules();
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return ParticipantMember::messagesRules();
    }
}
