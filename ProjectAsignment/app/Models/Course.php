<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Course extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'mapel';

    protected $fillable = [
        "id_mapel", "nama_mapel"
    ];
}
