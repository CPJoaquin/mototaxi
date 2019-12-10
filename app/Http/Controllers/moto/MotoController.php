<?php

namespace App\Http\Controllers\moto;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidatorMotoRequest;
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
        return view('moto.motorcycle.create')
            ->with('conductors', $this->getConductors());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidatorMotoRequest $request)
    {
        $motorcyle = Moto::create($request->all());
        $motorcyle->save();
        return redirect( route('moto.index'));
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
        $moto = Moto::findOrFail($id);
        return view('moto.motorcycle.edit')
            ->with('item', $moto)
            ->with('conductors', $this->getConductors());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidatorMotoRequest $request, $id)
    {
        $moto = Moto::findOrFail($id);

        if (empty($moto)) {
            return redirect(route('moto.motorcycle.index'));
        }
        $moto->update($request->all());
        return response(redirect(route('moto.index')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $moto = Moto::findOrFail($id);
        if (empty($moto)) {
            return redirect(route('moto.motorcycle.index'));
        }
        $moto->delete();
        return response(redirect(route('moto.index')));
    }
}
