<?php

namespace App\Models;

use App\Models\User;
use App\Models\Tweet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reply extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function user() {

        return $this->belongsTo(User::class);

    }

    public function tweet() {

        return $this->belongsTo(Tweet::class);

    }
}
