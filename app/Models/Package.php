<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function package_items()
    {
        return $this->hasMany(PackageItem::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
