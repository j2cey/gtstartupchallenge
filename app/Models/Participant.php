<?php

namespace App\Models;

use App\Traits\Data\HasData;
use App\Traits\File\HasFile;
use App\Traits\Video\HasVideo;
use Illuminate\Support\Carbon;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Participant
 * @package App\Models
 *
 * @property integer $id
 * @property string $uuid
 * @property bool $is_default
 * @property string $tags
 * @property integer|null $status_id
 *
 * @property string $nom
 * @property string $nomgroupe
 * @property string $email
 * @property string $phone
 *
 * @property string $fichier_administrative
 * @property integer $fichier_administrative_size
 * @property string $fichier_administrative_type
 *
 * @property string $fichier_dossier_candidature
 * @property integer $fichier_dossier_candidature_size
 * @property string $fichier_dossier_candidature_type
 *
 * @property string $complementinfos
 *
 * @property string $project_name
 * @property string $project_problem
 * @property string $project_problem_eval
 * @property string $project_problem_current_solve
 * @property string $project_problem_solution
 * @property string $project_problem_solution_innovative
 * @property string $project_problem_solution_link
 * @property string $project_problem_solution_level
 * @property string $project_payment
 * @property string $project_money_source
 * @property string $project_cost
 * @property string $project_team_value
 *
 * @property boolean $reglementvalide
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Participant extends BaseModel implements Auditable
{
    use HasFile, HasData, \OwenIt\Auditing\Auditable;
    protected $guarded = [];

    #region Validation Rules

    public static function defaultRules() {
        return [
            'nom' => ['required','max:255'],
            'email' => ['email','required'],
            'phone' => ['required','max:255'],
            'reglementvalide' => ['required'],
            'complementinfos' => ['max:255'],
            'project_name' => ['required','max:255'],
            'project_problem' => ['required','max:255'],
            'project_problem_eval' => ['required','max:255'],
            'project_problem_current_solve' => ['required','max:255'],
            'project_problem_solution' => ['required','max:255'],
            'project_problem_solution_innovative' => ['required','max:255'],
            'project_problem_solution_link' => ['required','max:255'],
            'project_problem_solution_level' => ['required','max:255'],
            'project_payment' => ['required','max:255'],
            'project_money_source' => ['required','max:255'],
            'project_cost' => ['required','max:255'],
            'project_team_value' => ['required','max:255'],
            'project_team' => ['required','max:255'],
        ];
    }
    public static function createRules() {
        return array_merge(self::defaultRules(), [
            'fichier_administrative' => [
                'required','file','max:'. Participant::getFileUploadMaxSize("ko"),
                'mimes:pdf,PDF,jpeg,png,bmp,gif,svg',
            ],
            'fichier_dossier_candidature' => [
                'required','file','max:'. Participant::getFileUploadMaxSize("ko"),
                'mimes:pdf,PDF,jpeg,png,bmp,gif,svg',
            ],
        ]);
    }
    public static function updateRules($model) {
        return array_merge(self::defaultRules(), [

        ]);
    }

    public static function messagesRules() {
        return [
            'nom.required' => 'Prière de Renseigner votre Nom',
            'nom.max' => 'Ce champs ne doit pas excéder 255 caractères !',
            'email.required' => 'Prière de Renseigner votre adresse e-mail',
            'email.email' => 'Prière de Renseigner une adresse e-mail valide',
            'phone.required' => 'Prière de Renseigner votre Numéro de Phone',

            'fichier_administrative.required' => 'Prière de télécharger votre fichier administratif',
            'fichier_administrative.file' => 'Le fichier administratif doit etre un fichier valide',
            'fichier_administrative.max' => 'La taille du fichier administratif doit etre de ' . Participant::getFileUploadMaxSize("Mo") .' Mo max',
            'fichier_administrative.mimes' => 'Le fichier administratif doit etre au format PDF,jpeg,png,bmp,gif ou svg',

            'fichier_dossier_candidature.required' => 'Prière de télécharger votre fichier dossier de candidature',
            'fichier_dossier_candidature.file' => 'Le fichier dossier de candidature doit etre un fichier valide',
            'fichier_dossier_candidature.max' => 'La taille du fichier dossier de candidature doit etre de ' . Participant::getFileUploadMaxSize("Mo") .' Mo max',
            'fichier_dossier_candidature.mimes' => 'Le fichier dossier de candidature doit etre au format PDF,jpeg,png,bmp,gif ou svg',

            'reglementvalide.required' => 'Vous devez aprrouver le règlement !',

            'complementinfos.max' => 'Le complément d information ne peut pas excéder 255 caractères !',

            'project_name.required' => 'Prière de répondre à cette question',
            'project_name.max' => 'Ce champs ne doit pas excéder 255 caractères !',

            'project_problem.required' => 'Prière de répondre à cette question',
            'project_problem.max' => 'Ce champs ne doit pas excéder 255 caractères !',

            'project_problem_eval.required' => 'Prière de répondre à cette question',
            'project_problem_eval.max' => 'Ce champs ne doit pas excéder 255 caractères !',

            'project_problem_current_solve.required' => 'Prière de répondre à cette question',
            'project_problem_current_solve.max' => 'Ce champs ne doit pas excéder 255 caractères !',

            'project_problem_solution.required' => 'Prière de répondre à cette question',
            'project_problem_solution.max' => 'Ce champs ne doit pas excéder 255 caractères !',

            'project_problem_solution_innovative.required' => 'Prière de répondre à cette question',
            'project_problem_solution_innovative.max' => 'Ce champs ne doit pas excéder 255 caractères !',

            'project_problem_solution_link.required' => 'Prière de répondre à cette question',
            'project_problem_solution_link.max' => 'Ce champs ne doit pas excéder 255 caractères !',

            'project_problem_solution_level.required' => 'Prière de répondre à cette question',
            'project_problem_solution_level.max' => 'Ce champs ne doit pas excéder 255 caractères !',

            'project_payment.required' => 'Prière de répondre à cette question',
            'project_payment.max' => 'Ce champs ne doit pas excéder 255 caractères !',

            'project_money_source.required' => 'Prière de répondre à cette question',
            'project_money_source.max' => 'Ce champs ne doit pas excéder 255 caractères !',

            'project_cost.required' => 'Prière de répondre à cette question',
            'project_cost.max' => 'Ce champs ne doit pas excéder 255 caractères !',

            'project_team_value.required' => 'Prière de répondre à cette question',
            'project_team_value.max' => 'Ce champs ne doit pas excéder 255 caractères !',

            'project_team.required' => 'Prière renseigner au moins un membre',
            'project_team.max' => 'Ce champs ne doit pas excéder 255 caractères !',
        ];
    }

    #endregion

    #region Eloquent Relationships

    public function members() {
        return $this->hasMany(ParticipantMember::class, 'participant_id');
    }

    #endregion

    #region Custom Functions CRUD

    public function addMember($nom, $prenom, $age, $email, $phone, $profil, $experience) {
        return ParticipantMember::createNew($nom, $prenom, $age, $email, $phone, $profil, $experience,$this);
    }

    public function addMembersMulti($members) {
        foreach ($members as $member) {
            $nom = $member['nom'];
            $prenom = $member['prenom'];
            $age = $member['age'];
            $email = $member['email'];
            $phone = $member['phone'];
            $profil = $member['profil'];
            $experience = $member['experience'];
            $this->addMember($nom, $prenom, $age, $email, $phone, $profil, $experience);
        }
    }

    public function addMembersMultiFromJson($members_json) {
        $members_arr = json_decode($members_json, true);
        $this->addMembersMulti($members_arr);
    }

    #endregion

    public static function getFileUploadMaxSize($type_wanted) {
        $val_mo = config('Settings.files.uploads.max_size.any');
        return (new Participant())->convert_bytes($val_mo, "Mo", $type_wanted);
    }

    public static function getVideoUploadMaxSize($type_wanted) {
        $val_mo = config('Settings.files.uploads.max_size.video');
        return (new Participant())->convert_bytes($val_mo, "Mo", $type_wanted);
    }
}
