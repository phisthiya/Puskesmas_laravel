<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class EditController extends Controller
{
    use AuthenticatesUsers;

    public function showEditForm(User $user)
    {
        return view('auth.edit', compact('user'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function update(Request $request, User $user)
    {
        $this->validator($request->all())->validate();
        $user->forceFill([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ])->save();
        return redirect('/');
    }
}
