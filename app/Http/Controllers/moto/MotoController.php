<?php

namespace App\Http\Controllers\moto;

use App\Http\Controllers\Controller;
use App\Moto;
use App\User;
use Illuminate\Http\Request;

class MotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $motos = Moto::where('placa', 'LIKE', $request->buscar)
                ->orWhere('model', 'LIKE', '%'.$request->buscar.'%')->paginate(10);
        $conductors = $this->getConductors();
        return view('moto.motorcycle.index')
            ->with('motos', $motos)
            ->with('conductors', $conductors);
    }

    private function getConductors(){
        $users = User::where('role', 'LIKE', 'C')->get();
        $conductors = [];
        foreach($users as $user){
            $conductors["$user->id"] = "$user->name";
        }
        return $conductors;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('moto.motorcycle.create');
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
        return view('moto.motorcycle.edit');
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
        echo "eliminar";
    }
}
