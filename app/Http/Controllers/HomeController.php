<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $userId = Auth::user()->id;
        $userClass = DB::table('user_class')->where('user_id', $userId)
            ->join('classes', 'user_class.class_id', 'classes.id')
            ->get();



        return view('dashboard.home.index', compact('userClass'));
    }
}
