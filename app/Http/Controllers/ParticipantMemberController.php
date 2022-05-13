<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParticipantMember\CreateParticipantMemberRequest;
use App\Http\Requests\ParticipantMember\UpdateParticipantMemberRequest;
use App\Models\ParticipantMember;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ParticipantMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateParticipantMemberRequest $request
     * @return ParticipantMember|Response
     */
    public function store(CreateParticipantMemberRequest $request)
    {
        $formInput = $request->all();

        $new_memember = ParticipantMember::createSimple(
            $formInput['nom'],$formInput['prenom'],$formInput['age'],$formInput['email'],$formInput['phone'],
            $formInput['profil'],$formInput['experience']
        );

        return $new_memember;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ParticipantMember  $participantMember
     * @return Response
     */
    public function show(ParticipantMember $participantMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ParticipantMember  $participantMember
     * @return Response
     */
    public function edit(ParticipantMember $participantmember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateParticipantMemberRequest $request
     * @param ParticipantMember $participantmember
     * @return ParticipantMember|void
     */
    public function update(Request $request, $participantmember)
    {
        $formInput = $request->all();

        $request ->validate(ParticipantMember::updateRules($participantmember),ParticipantMember::messagesRules());

        //dd($formInput, $participantmember);

        $memember = ParticipantMember::createSimple(
            $formInput['nom'],$formInput['prenom'],$formInput['age'],$formInput['email'],$formInput['phone'],
            $formInput['profil'],$formInput['experience'],$participantmember
        );

        return $memember;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ParticipantMember  $participantMember
     * @return Response
     */
    public function destroy(ParticipantMember $participantMember)
    {
        //
    }
}
