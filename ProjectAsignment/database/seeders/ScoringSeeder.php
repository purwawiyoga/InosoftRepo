<?php

namespace Database\Seeders;
use App\Models\Student;
use App\Models\Course;
use App\Models\Scoring;
use Illuminate\Database\Seeder;

class ScoringSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nisn = Student::all()->pluck('nisn')->toArray();

        $pelajaran = Course::select('id_mapel',"nama_mapel")->get()->toArray();

       foreach ($pelajaran as $keyP => $valueP) {
                foreach ($nisn as $keyS => $vnisn) {
                    Scoring::create([
                        'nisn'=> $vnisn,
                        'id_mapel'=>$valueP["id_mapel"],
                        'nama_mapel'=>$valueP["nama_mapel"],
                        'latihan1'=>random_int(0,100),
                        'latihan2'=>random_int(0,100),
                        'latihan3'=>random_int(0,100),
                        'latihan4'=>random_int(0,100),
                        'uh1'=>random_int(0,100),
                        'uh2'=>random_int(0,100),
                        'uts'=>random_int(0,100),
                        'uas'=>random_int(0,100)
                    ]);

                }
            }
           }
}
