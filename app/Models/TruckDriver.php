<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TruckDriver extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'truck_drivers';
    protected $guarded = [];
    protected $primaryKey = 'id';
}
