<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class Participant
 * @package App\Http\Resources
 *
 * @property int $id
 * @property string $uuid
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
 * @property string $statut_video_name
 */
class Participant extends JsonResource
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
            'nomgroupe' => $this->nomgroupe,
            'email' => $this->email,
            'phone' => $this->phone,
            'fichiervideo' => $this->fichiervideo,
            'fichiervideo_type' => $this->fichiervideo_type,
            'fichiervideo_size' => $this->fichiervideo_size,
            'fichiervideo_duree' => $this->fichiervideo_duree,
            'complementinfos' => $this->complementinfos,
            'statut_video_name' => $this->statut_video_name,
            'fichieradministratifs_url' => '/uploads/participants/fichieradministratifs/' . $this->fichier_administrative,
            'fichierdossierscandidature_url' => '/uploads/participants/fichierdossierscandidature/' . $this->fichier_dossier_candidature,
            'edit_url' => route('participant.edit', $this->id),
            'destroy_url' => route('participant.getvideo', $this->uuid),
        ];
    }
}
