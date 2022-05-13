<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use OwenIt\Auditing\Contracts\Auditable;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ParticipantMember
 * @package App\Models
 *
 * @property integer $id
 * @property string $uuid
 * @property bool $is_default
 * @property string $tags
 * @property integer|null $status_id
 *
 * @property string $nom
 * @property string $prenom
 * @property integer $age
 * @property string $email
 * @property string $phone
 * @property string $profil
 * @property integer $experience
 * @property integer $participant_id
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class ParticipantMember extends BaseModel implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $guarded = [];

    #region Validation Rules

    public static function defaultRules() {
        return [
            'nom' => ['required'],
            'email' => ['email','required'],
            'phone' => ['required','min:8'],
            'age' => ['required','numeric'],
            'profil' => ['required'],
            'experience' => ['required','numeric'],
        ];
    }
    public static function createRules() {
        return array_merge(self::defaultRules(), [

        ]);
    }
    public static function updateRules($model) {
        return array_merge(self::defaultRules(), [

        ]);
    }

    public static function messagesRules() {
        return [
            'nom.required' => 'Prière de Renseigner le Nom',
            'email.required' => 'Prière de Renseigner une adresse e-mail',
            'email.email' => 'Prière de Renseigner une adresse e-mail valide',
            'phone.required' => 'Prière de Renseigner le Numéro de Phone',
            'phone.min' => 'Le Numéro de Phone doit avoir 8 digits minimum',
            'age.required' => 'Prière de Renseigner l age du membre',
            'age.numeric' => 'L age doit etre un nombre',
            'profil.required' => 'Prière de Renseigner le Profile du membre',
            'experience.required' => 'Prière de Renseigner le nombre d années d expérience du membre',
            'experience.numeric' => 'L expérience doit etre un nombre d années',
        ];
    }

    #endregion

    #region Eloquent Relationships

    public function participant() {
        return $this->belongsTo(Participant::class, 'participant_id');
    }

    #endregion

    #region Custom Functions - CRUD

    /**
     * Crée et retourne une nouvelle de membre de project (paraticipant)
     * @param $nom
     * @param $prenom
     * @param $age
     * @param $email
     * @param $phone
     * @param $profil
     * @param $experience
     * @param null $participant
     * @return ParticipantMember
     */
    public static function createNew($nom, $prenom, $age, $email, $phone, $profil, $experience, $participant = null) {

        $member = ParticipantMember::create([
            'nom' => $nom,
            'prenom' => $prenom,
            'age' => $age,
            'email' => $email,
            'phone' => $phone,
            'profil' => $profil,
            'experience' => $experience,
        ]);

        if( ! is_null($participant) ) $member->participant_id = $participant->id;

        $member->save();

        return $member;
    }

    public static function createSimple($nom, $prenom, $age, $email, $phone, $profil, $experience, $uuid = null, $participant = null) {

        $member = new ParticipantMember([
            'nom' => $nom,
            'prenom' => $prenom,
            'age' => $age,
            'email' => $email,
            'phone' => $phone,
            'profil' => $profil,
            'experience' => $experience,
        ]);

        if( ! is_null($participant) ) $member->participant_id = $participant->id;

        is_null($uuid) ? $member->setGeneratedUuid() : $member->uuid = $uuid;

        return $member;
    }

    #endregion
}
