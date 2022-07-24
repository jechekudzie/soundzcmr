<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventStreamingPlatform extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function streaming_platform()
    {
        return $this->belongsTo(StreamingPlatform::class);
    }
}
