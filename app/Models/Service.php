<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Direction;


class Service extends Model
{
    use HasFactory;
    public $table = "service";
    public $primaryKey = "code_service";
    public $timestamps = false;

    public function direction()
    {
        return $this->belongsTo(Direction::class);
    }

}
