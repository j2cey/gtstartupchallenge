<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ParticipantMemberResource
 * @package App\Http\Resources
 *
 * @property string $nom
 * @property string $prenom
 * @property integer $age
 * @property string $email
 * @property string $phone
 * @property string $profil
 * @property integer $experience
 */
class ParticipantMemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'age' => $this->age,
            'email' => $this->email,
            'phone' => $this->phone,
            'profil' => $this->profil,
            'experience' => $this->experience,

            'edit_url' => route('participantmembers.edit', $this->id),
            'destroy_url' => route('participantmembers.destroy', $this->uuid),
        ];
    }
}
