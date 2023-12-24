<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\service;

class Direction extends Model
{
    use HasFactory;
    public $table = "direction";
    public $primaryKey = "code_direction";
    public $timestamps = false;

    public function service()
    {
        return $this->hasMany(Service::class);
    }
}
