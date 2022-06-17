<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Treatment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agenda extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function finished()
    {
        return $this->hasOne(FinishedAppointment::class);
    }
}
