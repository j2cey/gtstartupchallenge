<?php

namespace App\Http\Requests\ParticipantMember;

use App\Models\ParticipantMember;
use Illuminate\Foundation\Http\FormRequest;

class UpdateParticipantMemberRequest extends ParticipantMemberRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return ParticipantMember::updateRules($this->participantmember);
    }
}
