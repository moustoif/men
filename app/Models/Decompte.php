<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Decompte extends Model
{
    use HasFactory;
    public $table = "decompte";
    public $primaryKey = "id_decompte";
    public $timestamps = false;
}
