<?php

namespace App\Http\Controllers\moto;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Requests\ValidatorLocationRequest;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conductors = (new UserController)->conductors();
        $motos = (new MotoController)->placas();
        return view('moto.location.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('moto.location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidatorLocationRequest $request)
    {
        $location = Location::create([
            'primary' => $request->primary,
            'secondary' => $request->secondary,
        ]);
        $location->save();
         $travel = (new TravelController)->store($request->time, $location->id);
         if($travel){
            return redirect(route('location.index'));
         }
         else{
             return redirect(route('location.create'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function list(){
        $primary = DB::table('locations')->pluck('primary', 'id');
        $secondary = DB::table('locations')->pluck('secondary', 'id');
        $list = [];
        foreach($primary as $id => $value){
            $list["$id"] = $value.' '.$secondary["$id"];
        }
        return $list;
    }
}
