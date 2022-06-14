<?php

namespace App\Http\Controllers;

use App\Models\User;
use Faker\Core\Number;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', [
            "title"=>"Halaman Register User"
        ]);
    }

    public function store(Request $request)
    {
        // return $request->all();
        $validateData = $request->validate([
            'name' => 'required|max:50|alpha',
            'username' => 'required|min:3|max:50|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);
        User::create($validateData);

        // $request->session()->flash('success', 'Registrasi user berhasil!');

        return redirect('/login')->with('success', 'Registrasi user berhasil!');

    }
}
