<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EpisodeParticipant extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function event_participant()
    {
        return $this->belongsTo(EventParticipant::class);
    }

    public function episode()
    {
        return $this->belongsTo(Episode::class);
    }

    public function episode_participant_vote()
    {
        return $this->belongsTo(EpisodeParticipantVote::class);
    }



}
