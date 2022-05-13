<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParticipantMember\CreateParticipantMemberRequest;
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

        $new_memember = new ParticipantMember();

        $new_memember->nom = $formInput['nom'];
        $new_memember->prenom = $formInput['prenom'];
        $new_memember->age = $formInput['age'];
        $new_memember->email = $formInput['email'];
        $new_memember->phone = $formInput['phone'];
        $new_memember->profil = $formInput['profil'];
        $new_memember->experience = $formInput['experience'];

        $new_memember->setGeneratedUuid();

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
    public function edit(ParticipantMember $participantMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\ParticipantMember  $participantMember
     * @return Response
     */
    public function update(Request $request, ParticipantMember $participantMember)
    {
        //
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
