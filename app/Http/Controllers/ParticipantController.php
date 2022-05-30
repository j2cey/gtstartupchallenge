<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use http\Client\Response;
use App\Models\Participant;
use App\Models\StatutVideo;
use Illuminate\Http\Request;
use Iman\Streamer\VideoStreamer;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\SearchCollection;
use App\Http\Requests\Participant\FetchRequest;
use Illuminate\Contracts\Foundation\Application;
use App\Http\Resources\Participant as ParticipantResource;
use App\Http\Requests\Participant\CreateParticipantRequest;
use App\Repositories\Contracts\IParticipantRepositoryContract;

use Exception;
use \Illuminate\View\View;
use Illuminate\Support\Collection;
use Illuminate\Http\RedirectResponse;

class ParticipantController extends Controller
{
    /**
     * @var IParticipantRepositoryContract
     */
    private $repository;

    /**
     * ParticipantController constructor.
     *
     * @param IParticipantRepositoryContract $repository [description]
     */
    public function __construct(IParticipantRepositoryContract $repository) {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|\Illuminate\Http\Response|View
     */
    public function index()
    {
        $statutvideos = StatutVideo::all();
        $questionnaire = [
            ['Quel est le nom de votre  projet','project_name'],
            ['Quel est le problème que vous souhaitez resoudre?','project_problem'],
            ['Avez-vous des chiffres ou tout autre document permettant d\'évaluer la réalité du problème','project_problem_eval'],
            ['Comment le problème est-il résolu actuellement?','project_problem_current_solve'],
            ['Quelle est la solution que vous proposez? (description du projet)','project_problem_solution'],
            ['En quoi est-elle innovante?','project_problem_solution_innovative'],
            ['Avez-vous un lien pour tester votre solution? Ou une solution similaire?','project_problem_solution_link'],
            ['Quel est le niveau de développement de votre solution (estimez en %)','project_problem_solution_level'],
            ['Quel est votre cible? (qui payera pour votre solution)','project_payment'],
            ['Comment gagnerez vous de l\'argent (décrivez toutes les sources de revenus généré par votre projet)','project_money_source'],
            ['Pourquoi êtes-vous le mieux placer pour développer cette solution?','project_team_value'],
        ];
        return view('participants.index')
            ->with('perPage', new Collection(config('system.per_page')))
            ->with('defaultPerPage', config('system.default_per_page'))
            ->with('statutvideos', $statutvideos)
            ->with('questionnaire', new Collection($questionnaire));
    }

    /**
     * Fetch records.
     *
     * @param  FetchRequest     $request [description]
     * @return SearchCollection          [description]
     */
    public function fetch(FetchRequest $request)
    {
        return new SearchCollection(
            $this->repository->search($request), ParticipantResource::class
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateParticipantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateParticipantRequest $request)
    {
        //instantiate class with file
        //$track = new GetId3( request()->file('fichiervideo') );
        //dd($track, $track->getPlaytimeSeconds(), $track->extractInfo(), $track->getArtwork());

        $formInput = $request->all();

        //dd($formInput);

        $new_participant = Participant::create([
            'nom' => $formInput['nom'],
            'nomgroupe' => $formInput['nomgroupe'],
            'email' => $formInput['email'],
            'phone' => $formInput['phone'],
            //'complementinfos' => $formInput['complementinfos'],

            'project_name' => $formInput['project_name'],
            'project_problem' => $formInput['project_problem'],
            'project_problem_eval' => $formInput['project_problem_eval'],
            'project_problem_current_solve' => $formInput['project_problem_current_solve'],
            'project_problem_solution' => $formInput['project_problem_solution'],
            'project_problem_solution_innovative' => $formInput['project_problem_solution_innovative'],
            'project_problem_solution_link' => $formInput['project_problem_solution_link'],
            'project_problem_solution_level' => $formInput['project_problem_solution_level'],
            'project_payment' => $formInput['project_payment'],
            'project_money_source' => $formInput['project_money_source'],
            'project_cost' => $formInput['project_cost'],
            'project_team_value' => $formInput['project_team_value'],

            'reglementvalide' => $request->getCheckValue('reglementvalide'),
        ]);

        // verifyAndStoreFile( Request $request, $fieldname_rqst, $fieldname_db, $directory = 'unknown', $oldimage = ' ' )
        $new_participant->verifyAndStoreFile($request, 'fichier_administrative', 'fichier_administrative', 'participants_fichier_administrative_dir');

        $new_participant->verifyAndStoreFile($request, 'fichier_dossier_candidature', 'fichier_dossier_candidature', 'participants_fichier_dossier_candidature_dir');

        //$new_participant->setVideoDuration("fichiervideo_duree",'participants_fichiersvideos_dir',$new_participant->fichiervideo);
        //$new_participant->setVideoFormat("fichiervideo_type",'participants_fichiersvideos_dir',$new_participant->fichiervideo);
        //$new_participant->setVideoParameters($request,'participants_fichiersvideos_dir', 'fichiervideo', 'fichiervideo', 'fichiervideo_duree', 'fichiervideo_artwork');
        //$new_participant->setVideoParameters($request, 'participants_fichiersvideos_dir', 'fichiervideo', 'fichiervideo_duree', 'fichiervideo_artwork');

        //session()->flash('msg_success', 'Inscription effectuéé avec succès.');

        // 'project_team_value' => $formInput['project_team_value'],
        $new_participant->addMembersMulti($formInput['project_team']["list"]);
        return $new_participant;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function show(Participant $participant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function edit(Participant $participant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participant $participant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {
        //
    }

    public function getvideofile($uuid)
    {
        $participant = Participant::where('uuid', $uuid)->first();
        $filename = $participant->fichiervideo;
        $file_dir = config('app.' . 'participants_fichiersvideos_dir');
        $path = $file_dir . '/' . $filename;
        $participant->update([
            'statut_video_id' => StatutVideo::coded("telecharge_ok")->first()->id,
            'statut_video_name' => StatutVideo::coded("telecharge_ok")->first()->name,
            'videotelecharge' => true,
            'videotelecharge_date' => Carbon::now(),
        ]);
        /**this will force download your file**/
        return response()->download($path);
    }

    public function readvideo($uuid)
    {
        // participantreadvideo/9280c3da-225e-4630-b3e9-8faf5cb13b65
        $participant = Participant::where('uuid', $uuid)->first();

        $filename = $participant->name;
        $file_dir = config('app.' . 'participants_fichiersvideos_dir');
        $path = $file_dir . '/' . $filename;

        /*return view('participants.readvideo')
            ->with('participant', $participant)
            ->with('path', $path);*/

        //$file_dir = config('app.' . 'participants_fichiersvideos_dir');
        //$path = $file_dir . '/' . $filename;

        VideoStreamer::streamFile($path);
        https://github.com/j2cey/gtinscriptionL7.git
    }

    public function getVideo(Participant $participant)
    {
        // participantreadvideo/9280c3da-225e-4630-b3e9-8faf5cb13b65
        $filename = $participant->name;
        $file_dir = config('app.' . 'participants_fichiersvideos_dir');
        $path = $file_dir . '/' . $filename;

        $fileContents = Storage::disk('local')->get($path);
        $response = Response::make($fileContents, 200);
        $response->header('Content-Type', "video/mp4");
        return $response;
    }
}
