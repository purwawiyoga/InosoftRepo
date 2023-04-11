<?php

namespace App\Http\Controllers;

use App\Models\Scoring;
use App\Models\Student;

use Illuminate\Http\Request;

class ScoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function nilai(Request $request)
    {
        $nilai = Scoring::where('nisn',$request->nisn )->where('id_mapel',$request->id_mapel)->first();
        $student = Student::where('nisn',$request->nisn)->first();
        $nilai->nama_siswa=$student->Nama;
        return response()->json($nilai);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allScore=Scoring::all();
        return response()->json($allScore);       //
    }
     public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $nilai = Scoring::create($request->toArray());

            return response()->json(['result' => "new Score Recorded", "recorded Score"=> $nilai]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Scoring  $scoring
     * @return \Illuminate\Http\Response
     */
    public function show(Scoring $scoring)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Scoring  $scoring
     * @return \Illuminate\Http\Response
     */
    public function edit(Scoring $scoring)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Scoring  $scoring
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = collect(request()->all())->filter()->all();
        Scoring::where('nisn', $id)->where("id_mapel",$request->id_mapel)->update($input);
        $nilai = Scoring::where('nisn', $id)->where("id_mapel",$request->id_mapel)->first();
        return response()->json(["success updated" => $nilai]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scoring  $scoring
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $kelas=Scoring::where('nisn', $request->nisn)->where("id_mapel",$request->id_mapel);
        $kelas->delete();
        return response()->json(['result'=>'Score deleted']);
    }
}
