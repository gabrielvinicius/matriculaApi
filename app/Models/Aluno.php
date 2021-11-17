<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Curso;

class Aluno extends Model
{


    use HasFactory;

public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
