<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaimPenaltyRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'claim_price_per_day',
        'penalty_price_per_day'
    ];
}
