<?php

namespace App\Models;

use App\Models\Agenda;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FinishedAppointment extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    
    public function agenda()
    {
        return $this->belongsTo(Agenda::class);
    }
}
