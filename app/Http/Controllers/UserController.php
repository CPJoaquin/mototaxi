<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ValidatorUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $user = User::where('name', 'LIKE', '%'.$request->buscar.'%')->paginate(10);

        return view('moto.user.index', compact('user'));
    }

    public function create()
    {
        return view('moto.user.create');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        if (empty($user)) {
            return redirect(route('user.index'));
        }
        return view('moto.user.show')->with('item', $user);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
      
        if (empty($user)) {
            return redirect(route('user.index'));
        }

        return view('moto.user.edit')->with('item', $user);
    }

    public function update($id, ValidatorUserRequest $request)
    {
        $user = User::findOrFail($id);

        if (empty($user)) {
            return redirect(route('user.index'));
        }

        $tmp = User::where('id',$request->id)->get();

        if (!isset($tmp)) {
            if($tmp[0]->id == $user['id']){
                $request['password'] = Hash::make($request->password);

                $user->update($request->all());
                if($request->file('photo'))
                {
                    $path = Storage::disk('public')->put('photos', $request->file('photo'));
                    $user->photo = asset($path);
                    $user->save();
                }
            }
            else {
                return redirect(route('user.edit', compact('id')));
            }
        }
        else
        {
            $request['password'] = Hash::make($request->password);

            $user->update($request->all());

            if($request->file('photo'))
            {
                $path = Storage::disk('public')->put('photos', $request->file('photo'));
                $user->photo = asset($path);
                $user->save();
            }
        }
        return response(redirect(route('user.show', compact('id'))));//->cookie($cookie);
    }

    public function store(ValidatorUserRequest  $request)
    {
        $request['password'] = Hash::make($request->password);
        $user = User::create($request->all());
        $url = $request->file('photo');
        if($request->file('photo'))
        {
            $path = $url->store('photos', 'public');
            $user->photo = $path;
        }

        $user->save();

        return redirect(route('user.index'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if (empty($user)) {
            return redirect(route('user.show'));
        }
        else{
            $user->delete();
           
            return redirect(route('user.index'));
        }
    }
    public function list(){
        return DB::table('users')->pluck('name', 'id');
    }
    public function conductors(){
        $users = User::where('role', 'LIKE', 'C')->get();
        $conductors = [];
        foreach($users as $user){
            $conductors["$user->id"] = "$user->name";
        }
        return $conductors;
    }
}
