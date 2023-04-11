<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Scoring extends Eloquent
{
    use HasFactory;
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'nilai';

    protected $fillable = [
        "nisn","id_mapel","nama_mapel","latihan1","latihan2","latihan3","latihan4","uh1","uh2","uts","uas"
    ];
}
