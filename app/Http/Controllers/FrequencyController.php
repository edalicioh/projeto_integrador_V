<?php

namespace App\Http\Controllers;

use App\Models\Frequencie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrequencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($classes)
    {

        $class = DB::table('student_Class')->where('class_id', $classes)
            ->join('periods', 'student_Class.class_id', 'periods.id')
            ->join('classes', 'student_Class.class_id', 'classes.id')
            ->first();


        $students = DB::table('student_Class')->where('class_id', $classes)
            ->join('students', 'student_Class.student_id', 'students.id')
            ->limit(30)
            ->orderBy('full_name')
            ->get();


        return view('dashboard.frequency.show', compact(['class', 'students']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frequencie  $frequencie
     * @return \Illuminate\Http\Response
     */
    public function edit(Frequencie $frequencie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Frequencie  $frequencie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Frequencie $frequencie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Frequencie  $frequencie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Frequencie $frequencie)
    {
        //
    }
}
