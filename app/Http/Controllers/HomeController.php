<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Undocumented function
     *
     * @param  Illuminate\Http\Request $request
     * @return void
     */
    public function indexJwt(Request $request)
    {
        return json_encode($request->all());
    }
}
