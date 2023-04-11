<?php

namespace App\Http\Controllers;

use App\models\Student;
use App\models\Kelas;
use App\models\Scoring;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $detailsiswa = $this->getSiswa();
        return response()->json($detailsiswa);
    }

    public function detail()
    {
        $siswa = $this->getSiswa();
        $score = Scoring::all();

        $detailsiswa = [];
        foreach ($siswa as $key => $siswaOne) {
            $scoreSiswa = [];
            $tempScore = [];
            foreach ($score as $keys => $ScoreOne) {

                if ($siswaOne->nisn === $ScoreOne->nisn) {
                    $tempScore["mataPelajaran"] = $ScoreOne->nama_mapel;
                    $tempScore["nilaiAkhir"] = (15 / 100 * ($ScoreOne->latihan1 + $ScoreOne->latihan2 + $ScoreOne->latihan3 + $ScoreOne->latihan4) / 4) + (20 / 100 * ($ScoreOne->uh1 + $ScoreOne->uh2) + 25 / 100 * $ScoreOne->uts + 40 / 100 * $ScoreOne->uas);

                    array_push($scoreSiswa, $tempScore);

                }
            }
            $siswaOne->nilai = $scoreSiswa;
            array_push($detailsiswa, $siswaOne);
        }

        return response()->json($detailsiswa);
    }
    public function detailmapel()
    {
        $siswa = $this->getSiswa();
        $score = Scoring::all();

        $detailsiswa = [];

        foreach ($siswa as $key => $siswaOne) {
            $scoreSiswa = [];
            foreach ($score as $keys => $ScoreOne) {
                if ($siswaOne->nisn === $ScoreOne->nisn) {
                    unset($ScoreOne->_id);
                    unset($ScoreOne->id_mapel);
                    unset($ScoreOne->updated_at);
                    unset($ScoreOne->created_at);

                    $nilai_akhir = (15 / 100 * ($ScoreOne->latihan1 + $ScoreOne->latihan2 + $ScoreOne->latihan3 + $ScoreOne->latihan4) / 4) + (20 / 100 * ($ScoreOne->uh1 + $ScoreOne->uh2) + 25 / 100 * $ScoreOne->uts + 40 / 100 * $ScoreOne->uas);

                    $ScoreOne->nilai_akhir = $nilai_akhir;
                    array_push($scoreSiswa, $ScoreOne);
                }
            }
            $siswaOne->nilai = $scoreSiswa;
            array_push($detailsiswa, $siswaOne);
        }
        return response()->json($detailsiswa);
    }

    public function store(Request $request)
    {
        $student = Student::create($request->toArray());
        return response()->json(['result' => "new Student", 'add'=>$student]);

    }

    public function getSiswa()
    {
        //$detailsiswa = Student::all();
        //$detailsiswa = Student::where("Nama","Yudi")->get();
        $siswa = Student::get();
        $kelas = Kelas::select("id_Kelas", "kelas")->get();

        $detailsiswa = [];

        foreach ($siswa as $i => $j) {
            //array_push($a,$l);
            $siswaTemp = $j;
            foreach ($kelas as $k => $l) {
                $kelasTemp = $l;
                if ($siswaTemp->kelas === $kelasTemp->idKelas) {
                    $siswaTemp->kelas = $kelasTemp->kelas;
                }

            }
            array_push($detailsiswa, $siswaTemp);
        }
        //$siswa = Student::select("nisn","Nama")->get();
        return $detailsiswa;
    }
    public function update(Request $request, $id)
    {
        $input = collect(request()->all())->filter()->all();
        Student::where('nisn', $id)->update($input);
        $siswa = Kelas::where('nisn', $id)->get();
        return response()->json(['Success updated'=>$siswa]);
    }
    public function show($id)
    {
        $siswa = Student::where('nisn', $id)->get()->toArray();
        $nilai = Scoring::where('nisn', $id)->get();
        foreach ($siswa as $key => $value) {
            $siswa=$value;
        }
        $nilaipush=[];
        foreach ($nilai as $key => $ScoreOne)  {
                    unset($ScoreOne->_id);
                    unset($ScoreOne->id_mapel);
                    unset($ScoreOne->updated_at);
                    unset($ScoreOne->created_at);

                    $nilai_akhir = (15 / 100 * ($ScoreOne->latihan1 + $ScoreOne->latihan2 + $ScoreOne->latihan3 + $ScoreOne->latihan4) / 4) + (20 / 100 * ($ScoreOne->uh1 + $ScoreOne->uh2) + 25 / 100 * $ScoreOne->uts + 40 / 100 * $ScoreOne->uas);

                    $ScoreOne->nilai_akhir = $nilai_akhir;
                    array_push($nilaipush, $ScoreOne);
            }

       $siswa['nilai']=$nilaipush;
       return response()->json(($siswa));
    }
    public function destroy($id)
    {
        $siswa=Kelas::where('nisn',$id);
        $siswa->delete();
        return response()->json(['nisn'=>$id,"result" => "Student deleted"]);

    }


}
