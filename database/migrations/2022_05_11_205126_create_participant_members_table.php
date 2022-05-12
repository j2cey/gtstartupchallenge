<?php

use App\Traits\Migrations\BaseMigrationTrait;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantMembersTable extends Migration
{
    use BaseMigrationTrait;

    public $table_name = 'participant_members';
    public $table_comment = 'liste des membres pour un participant donné.';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id();
            $table->baseFields();

            $table->string('nom')->nullable()->comment('nom du membre');
            $table->string('prenom')->nullable()->comment('prenom du membre');
            $table->integer('age')->nullable()->comment('age du membre');
            $table->string('email')->nullable()->comment('adresse email du membre');
            $table->string('phone')->nullable()->comment('numero de phone du membre');
            $table->string('profil')->nullable()->comment('profile du membre');
            $table->integer('experience')->nullable()->comment('experience du membre en années');

            $table->unsignedBigInteger('participant_id')->nullable()->comment('reference du participant');
            $table->foreign('participant_id')->references('id')->on('participants')->onDelete('set null');
        });
        $this->setTableComment($this->table_name,$this->table_comment);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->table_name, function (Blueprint $table) {
            $table->dropBaseForeigns();
            $table->dropForeign(['participant_id']);
        });
        Schema::dropIfExists($this->table_name);
    }
}
