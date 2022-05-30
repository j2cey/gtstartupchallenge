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

            'project_name' => $this->project_name,
            'project_problem' => $this->project_problem,
            'project_problem_eval' => $this->project_problem_eval,
            'project_problem_current_solve' => $this->project_problem_current_solve,
            'project_problem_solution' => $this->project_problem_solution,
            'project_problem_solution_innovative' => $this->project_problem_solution_innovative,
            'project_problem_solution_link' => $this->project_problem_solution_link,
            'project_problem_solution_level' => $this->project_problem_solution_level,
            'project_payment' => $this->project_payment,
            'project_money_source' => $this->project_money_source,
            'project_team_value' => $this->project_team_value,

            'membres' => ParticipantMemberResource::collection($this->members),

            'fichieradministratifs_url' => '/uploads/participants/fichieradministratifs/' . $this->fichier_administrative,
            'fichierdossierscandidature_url' => '/uploads/participants/fichierdossierscandidature/' . $this->fichier_dossier_candidature,

            'edit_url' => route('participant.edit', $this->id),
            'destroy_url' => route('participant.getvideo', $this->uuid),
        ];
    }
}
