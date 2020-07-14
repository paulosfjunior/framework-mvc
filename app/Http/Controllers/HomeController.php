<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Study;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Study $estudo)
    {
        $this->middleware('auth');
        $this->estudo = $estudo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', ['estudos' => $this->estudo->contarStatus()]); 
    }
}
