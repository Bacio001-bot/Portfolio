<?php

namespace App\Models;

use App\Models\Agenda;
use App\Models\Client;
use App\Models\Treatment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function agenda()
    {
        return $this->belongsTo(Agenda::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function treatment()
    {
        return $this->belongsTo(Treatment::class);
    }
}
