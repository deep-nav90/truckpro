<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tone extends Model
{
    use HasFactory;

    protected $fillable = [
        'tone_serial_number',
        'hul_tone',
        'maximum_quantity'

    ];
}
