<?php

namespace App\Models;

use App\Traits\Data\HasData;
use Illuminate\Support\Carbon;
use App\Traits\File\HasFile;
use App\Traits\Video\HasVideo;
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
 * @property boolean $reglementvalide
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Participant extends BaseModel implements Auditable
{
    use HasFile, HasVideo, HasData, \OwenIt\Auditing\Auditable;
    protected $guarded = [];

    #region Validation Rules

    public static function defaultRules() {
        return [
            'nom' => ['required'],
            'email' => ['email','required'],
            'phone' => ['required'],
            'reglementvalide' => ['required'],
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
        ];
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
