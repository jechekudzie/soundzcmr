<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodeParticipantVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episode_participant_votes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('episode_id');
            $table->unsignedBigInteger('episode_participant_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('vote');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episode_participant_votes');
    }
}
