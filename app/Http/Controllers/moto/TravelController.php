<?php

namespace App\Http\Controllers\moto;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidatorTravelRequest;
use App\Travel;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('moto.travel.index');
    }

    public function map()
    {
        return view('moto.travel.map');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('moto.travel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($item, $location_id)
    {
        try{
            $now = date("Y-m-d");        
            $time = date("H:i:s");
            $localTime =date('H:i:s',  strtotime('-4 hour', strtotime($time)));
            $cliente_id = Auth::user()->id;
            $travel = Travel::create([
                'cliente_id' => $cliente_id,
                'driver_id' => null,
                'moto_id' => null,
                'location_id' => $location_id,
                'state' => 'espera',
                'date' => $now,
                'time' => $localTime,
            ]);
            $travel->save();
            return true;
        }
        catch(\Exception $exeption){
            return $exeption;
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'mostrando transporte';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'editando travel';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return 'actualizando travel';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 'eliminando travel';
    }
}
