<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Student;
use Illuminate\Http\Request;


class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listKelas = Kelas::select("idKelas","kelas","jurusan")->get();
        return response()->json($listKelas);
    }

    public function detail()
    {
        //
        $siswa = Student::get();
        $kelas = Kelas::get();
        $detailKelas = [];


        foreach ($kelas as $keyKelas => $valueKelas) {
            $kelasTemp = $valueKelas;
            $listsiswa = [];

            foreach ($siswa as $keySiswa => $valueSiswa) {
                $siswaTemp = $valueSiswa;


                if ($siswaTemp->kelas === $kelasTemp->idKelas) {
                    array_push($listsiswa, $siswaTemp->Nama);
                }

            }

            $kelasTemp->siswa = $listsiswa;
            array_push($detailKelas, $kelasTemp);
        }


        //$siswa = Student::select("nisn","Nama")->get();
        return response()->json($detailKelas);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $kelas = Kelas::create($request->toArray());
        return response()->json(['result' => "new Kelas", 'add'=>$kelas]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

        /*   $kelas = Kelas::find($request->kelas);
        $kelas -> jurusan = $request->jurusan;
        $kelas->save();
        return response()->json($kelas); */

        //    $kelas = Kelas::find($id);

        /*   $kelas->kelas =$request->kelas->validate(['required']);
        $kelas->jurusan = $request->jurusan->validate(['required']);;
        $kelas->nip = $request->nip->validate(['required']);;
        $kelas->save();
        */
        $input = collect(request()->all())->filter()->all();

        Kelas::where('idKelas', $id)->update($input);

        $kelas = Kelas::where('idKelas', $id)->get();

        return response()->json(['success updated '=> $kelas]);
    }

    public function destroy($id)
    {
        $kelas=Kelas::where('idKelas',$id);
        $kelas->delete();
        return response()->json(['idKelas'=>$id,"result" => "kelas deleted"]);

    }
}
