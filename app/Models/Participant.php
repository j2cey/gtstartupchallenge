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
 * @property string $fichierpieceidentite
 * @property integer $fichierpieceidentite_size
 * @property string $fichierpieceidentite_type
 *
 * @property string $fichiervideo
 * @property integer $fichiervideo_size
 * @property string $fichiervideo_type
 * @property string $fichiervideo_duree
 * @property string $fichiervideo_artwork
 *
 * @property string $complementinfos
 * @property boolean $reglementvalide
 *
 * @property boolean $videotelecharge
 * @property Carbon $videotelecharge_date
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
            'nomgroupe' => ['required'],
            'email' => ['email','required'],
            'phone' => ['required'],
            'reglementvalide' => ['required'],
        ];
    }
    public static function createRules() {
        return array_merge(self::defaultRules(), [
            'fichierpieceidentite' => ['required','file','max:'. Participant::getFileUploadMaxSize("ko")],
            'fichiervideo' => ['required','file','max:' . Participant::getVideoUploadMaxSize("ko")],
        ]);
    }
    public static function updateRules($model) {
        return array_merge(self::defaultRules(), [

        ]);
    }

    public static function messagesRules() {
        return [
            'nom.required' => 'Prière de Renseigner votre Nom',
            'nomgroupe.required' => 'Prière de Renseigner le Nom du Groupe',
            'email.required' => 'Prière de Renseigner votre adresse e-mail',
            'email.email' => 'Prière de Renseigner une adresse e-mail valide',
            'phone.required' => 'Prière de Renseigner votre Numéro de Phone',
            'fichierpieceidentite.required' => 'Prière de télécharger votre fichier identité',
            'fichierpieceidentite.file' => 'Le fichier identité doit etre un fichier valide',
            'fichierpieceidentite.max' => 'La taille du fichier identité doit etre de ' . Participant::getFileUploadMaxSize("Mo") .' Mo max',
            'fichiervideo.required' => 'Prière de télécharger votre vidéo',
            'fichiervideo.file' => 'La vidéo doit etre un fichier valide',
            'fichiervideo.max' => 'La taille du fichier video doit etre de ' . Participant::getVideoUploadMaxSize("Mo") .' Mo max',
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
