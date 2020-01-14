<?php

namespace App\Http\Controllers\moto;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Requests\ValidatorMapRequest;
use App\Http\Requests\ValidatorTravelRequest;
use App\Travel;
use App\User;
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
        $travels = Travel::latest()->get();
        $users = (new UserController )->list();
        $locations = (new LocationController)->list();  
        $motos = (new MotoController)->list();
        //dd($users);
        return view('moto.travel.index')
                ->with('travels', $travels)
                ->with('locations', $locations)
                ->with('motos', $motos)
                ->with('users', $users);
    }

    public function map(ValidatorMapRequest $request)
    {
        $map_id = (new MapController)->store($request->latitud, $request->longitud);
        
        try{
            $now = date("Y-m-d");        
            $time = date("H:i:s");
            $localTime =date('H:i:s',  strtotime('-4 hour', strtotime($time)));
            $cliente_id = Auth::user()->id;
            $travel = Travel::create([
                'cliente_id' => $cliente_id,
                'driver_id' => null,
                'moto_id' => null,                
                'state' => 'espera',
                'date' => $now,
                'time' => $localTime,
                'map_id' => $map_id,
            ]);
            $travel->save();
            return redirect(route('location.index'));
        }
        catch(\Exception $exeption){
            return $exeption;
        }   
        
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
        $travel = Travel::findOrFail($id);
        return view('moto.travel.show')
                ->with('item', $travel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $travel = Travel::findOrFail($id);
        $conductors = (new UserController)->conductors();
        $placas = (new MotoController)->placas();
        return view('moto.travel.edit')
                ->with('conductors', $conductors)
                ->with('placas', $placas)
                ->with('item', $travel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidatorTravelRequest $request, $id)
    {
        $moto = (new MotoController)->getPlaca($request->driver_id);
        $travel = Travel::findOrFail($id);
        $moto_id = $moto->id;
        $travel->driver_id = $request->driver_id;
        $travel->moto_id = $moto_id;
        $travel->state = 'en camino';
        $travel->save();
        return redirect( route('travel.index'));
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

//FUNCTIONES
    public function confirm($id){
        $travel = Travel::findOrFail($id);
        $travel->state = 'confirmado';
        $travel->save();
        return redirect( route('location.index'));
    }
    public function cancel($id){
        $travel = Travel::findOrFail($id);
        $travel->state = 'cancelado';
        $travel->save();
        return redirect( route('location.index'));
    }
    public function countTravel(){
        $confirmed = Travel::where('state','confirmado')->count();
        $pendient = Travel::where('state','en camino')->count();
        $waiting = Travel::where('state','espera')->count();
        $canceled = Travel::where('state','cancelado')->count();
        return [$confirmed, $pendient, $waiting, $canceled];
    }
    public function search($id){
        return Travel::findOrFail($id);
    }
}
