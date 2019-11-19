<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ValidatorUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        $tmp = User::where('cod',$request->cod)->get();

        if (!isset($tmp)) {
            if($tmp[0]->cod == $user['cod']){
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
        return redirect(route('user.show', compact('id')));
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
}
