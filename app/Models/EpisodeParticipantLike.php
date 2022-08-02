<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EpisodeParticipantLike extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function event_participants()
    {
        return $this->hasMany(EventParticipant::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }


}
