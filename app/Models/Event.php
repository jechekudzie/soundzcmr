<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function event_type()
    {
        return $this->belongsTo(EventType::class);
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }

    public function event_streaming_platforms()
    {
        return $this->hasMany(EventStreamingPlatform::class);
    }

    public function featuring_artists()
    {
        return $this->hasMany(FeaturingArtist::class);
    }

    public function ticket()
    {
        return $this->belongsTo(TicketType::class);
    }

    public function event_participants()
    {
        return $this->hasMany(EventParticipant::class);
    }

    public function add_episode($episode)
    {
        return $this->episodes()->create($episode);
    }

    public function add_event_participants($participant)
    {
        return $this->event_participants()->create($participant);
    }
}
