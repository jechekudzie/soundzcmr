<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StreamingPlatform extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function event_streaming_platforms()
    {
        return $this->hasMany(EventStreamingPlatform::class);
    }
}
