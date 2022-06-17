<?php

namespace App\Models;

use App\Models\Agenda;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function appointments() {

        return $this->belongsToMany(Appointment::class);

    }
}
