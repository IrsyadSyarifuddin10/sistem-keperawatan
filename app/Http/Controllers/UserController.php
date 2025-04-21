<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getUserName(Request $request)
    {
        $nip = $request->nip;
        $user = User::where('nip', $nip)->first();

        if ($user) {
            return response()->json(['nama_petugas' => $user->nama_petugas]);
        } else {
            return response()->json(['nama_petugas' => null]);
        }
    }
}
