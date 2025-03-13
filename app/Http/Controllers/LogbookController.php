<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LogbookController extends Controller
{
    public function index($type)
    {
        // $indexLogbookBK = DB::table('logbook_bk')
        //     ->leftJoin('users as nipUsers', 'logbook_bk.nip', '=', 'nipUsers.nip')
        //     ->leftJoin('users as mentorUsers', 'logbook_bk.mentor', '=', 'mentorUsers.nip')
        //     ->select(['mentoring.created_at', 'nipUsers.name as nip', 'mentorUsers.name as mentor', 'mentoring.status_verifikasi'])
        //     ->get();

        // return view('mentoring.mentoring', compact('indexMentoring')); // Kirim data ke view
    }
    public function redirect(Request $request)
    {
        $user = Auth::user();

        // Contoh percabangan berdasarkan role/user_id
        if ($user->role === 'admin') {
            return redirect()->route('input-logbook-admin');
        } elseif ($user->role === 'bk') {
            return redirect()->route('input-logbook-bk');
        } elseif ($user->role === 'pk-ugd') {
            return redirect()->route('input-logbook-pk-ugd');
        } elseif ($user->role === 'pk-rawat-jalan') {
            return redirect()->route('input-logbook-pk-ralan');
        } elseif ($user->role === 'pk-rawat-inap') {
            return redirect()->route('input-logbook-pk-ranap');
        } elseif ($user->role === 'pk-perina') {
            return redirect()->route('input-logbook-pk-perina');
        } elseif ($user->role === 'pk-ok') {
            return redirect()->route('input-logbook-pk-ok');
        } elseif ($user->role === 'pk-icu') {
            return redirect()->route('input-logbook-pk-icu');
        }
    }
}