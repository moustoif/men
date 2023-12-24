<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abscence extends Model
{
    use HasFactory;
    public $table = "abscence";
    public $primaryKey = "id_conge";
    public $timestamps = false;
}
