<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function episode_participants()
    {
        return $this->hasMany(EpisodeParticipant::class);
    }

    public function episode_ratings()
    {
        return $this->hasMany(EpisodeRating::class);
    }


    public function add_episode_participants($episode_participant)
    {
        return $this->episode_participants()->create($episode_participant);
    }

}
