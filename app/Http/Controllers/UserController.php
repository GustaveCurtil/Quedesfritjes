<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request) {

        $osdosh = User::all()->first();

        if (!$osdosh) {
            $encryptedPW = bcrypt($request->password);
            $osdosh = User::create(['name' => 'Osdosh', 'password' => $encryptedPW]);
        } if (!auth()->attempt(['name' => 'Osdosh', 'password' => $request->password])) {
            dd('Fout wachtwoord');
            return redirect('/');
        }
        auth()->login($osdosh);
        return redirect('/fritkot');
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }
}
