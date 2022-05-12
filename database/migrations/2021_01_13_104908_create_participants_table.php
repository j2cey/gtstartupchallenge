<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Traits\Migrations\BaseMigrationTrait;

class CreateParticipantsTable extends Migration
{
    use BaseMigrationTrait;

    public $table_name = 'participants';
    public $table_comment = 'liste des participants.';

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

            $table->string('nom')->nullable()->comment('nom du participant');
            $table->string('nomgroupe')->nullable()->comment('nom de groupe du participant');
            $table->string('email')->nullable()->comment('adresse email du participant');
            $table->string('phone')->nullable()->comment('numero de phone du participant');

            $table->string('fichier_administrative')->nullable()->comment('piece identite du participant');
            $table->integer('fichier_administrative_size')->nullable()->comment('taile du fichier de piece identite du participant');
            $table->string('fichier_administrative_type')->nullable()->comment('type du fichier de piece identite du participant');

            $table->string('fichier_dossier_candidature')->nullable()->comment('video du participant');
            $table->integer('fichier_dossier_candidature_size')->nullable()->comment('taille du fichier video du participant');
            $table->string('fichier_dossier_candidature_type')->nullable()->comment('type du fichier video du participant');

            $table->string('complementinfos')->nullable()->comment('complement infos du participant');
            $table->boolean('reglementvalide')->default(false)->comment('complement infos du participant');

            $table->string('project_name')->nullable()->comment('nom du projet');
            $table->string('project_problem')->nullable()->comment('project_problem');
            $table->string('project_problem_eval')->nullable()->comment('project_problem_eval');
            $table->string('project_problem_current_solve')->nullable()->comment('project_problem_current_solve');
            $table->string('project_problem_solution')->nullable()->comment('project_problem_solution');
            $table->string('project_problem_solution_innovative')->nullable()->comment('project_problem_solution_innovative');
            $table->string('project_problem_solution_link')->nullable()->comment('project_problem_solution_link');
            $table->string('project_problem_solution_level')->nullable()->comment('project_problem_solution_level');
            $table->string('project_payment')->nullable()->comment('project_payment');
            $table->string('project_money_source')->nullable()->comment('project_money_source');
            $table->string('project_cost')->nullable()->comment('project_cost');
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
        });
        Schema::dropIfExists($this->table_name);
    }
}
