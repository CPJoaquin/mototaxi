<?php

namespace App\Http\Controllers;

use App\Http\Controllers\moto\TravelController;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function report(){
        $list = [];
        $list['users'] = (new UserController)->countUsers();
        $list['travels'] = (new TravelController)->countTravel();
        $percents = [];
        $totalU = array_sum($list['users']);
        $totalT = array_sum($list['travels']);
        foreach($list['users'] as $id => $value){
            $percents['users']["$id"] = round(($value/$totalU)*100, 1);
        }
        foreach($list['travels'] as $id => $value){
            $percents['travels']["$id"] =  round(($value/$totalT)*100, 1);
        }
        return view('moto.report.index')
            ->with('list', $list)
            ->with('percents', $percents);
    }
}
