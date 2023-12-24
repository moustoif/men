<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Abscence;
use App\Models\Decompte;
use App\Models\Direction;
use App\Models\Service;


class Personnels extends Model
{
    use HasFactory;
    public $table = "personnels";
    public $primaryKey = "matricule";
    public $timestamps = false;

    public function about()
    {
        return $this->hasManyThrough(Abscence::class, Decompte::class);
    }

}
