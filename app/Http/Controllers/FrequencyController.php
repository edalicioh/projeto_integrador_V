<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Frequencie;
use App\Models\Frequency;
use App\Models\Period;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrequencyController extends Controller
{



    public function show($classesId)
    {


        $class = Classes::where('id', $classesId)->first();


        $students = Student::where('class_id', $classesId)
            ->orderBy('full_name')
            ->limit(30)
            ->get();

        return view('dashboard.frequency.show', compact(['class', 'students']));
    }

    public function showCalendar($classesId)
    {
        return view('dashboard.frequency.calendar', compact('classesId'));
    }

    public function getFrequencyByDate(Request $request)
    {
        $date =  $request->json('date');
        $classesId = $request->json('classesId');

        $class = Student::where('class_id', $classesId)
            ->join('frequencies', 'students.id', 'frequencies.student_id')
            ->whereDate('data', $date)
            ->get();


        $todal = count($class);
        if ($todal == 0) return response()->json([], 200);

        $presences = $class->groupBy('presence');
        $presence = count($presences[true]);
        $notPresence = count($presences[false]);

        $percentagePresence = [
            number_format(($presence / $todal) * 100, 2),
            number_format(($notPresence / $todal) * 100, 2)
        ];


        return response()->json($percentagePresence, 200);
    }

    public function storeFrequencyByDate(Request $request)
    {
        $date = date('Y-m-d');

        $students  = json_decode($request->students);

        foreach ($students as $i =>  $value) {
            Frequency::create([
                'data' => $date,
                'presence' => !isset($value->presence) ? false : $value->presence,
                'student_id' => $value->id
            ]);
        }
    }
}
