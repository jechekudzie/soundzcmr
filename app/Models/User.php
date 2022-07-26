<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function episode_rating()
    {
        return $this->belongsTo(EpisodeRating::class);
    }

    public function episode_participant_vote()
    {
        return $this->belongsTo(EpisodeParticipantVote::class);
    }

    public function episode_participant_like()
    {
        return $this->belongsTo(EpisodeParticipantLike::class);
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
