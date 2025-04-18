<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class LogbookController extends Controller
{
    public function index($type)
    {
        $user = Auth::user();
        $indexLogbook = collect(); // Default: kosong biar gak error di view

        switch ($user->role) {
            case 'bk':
                $indexLogbook = DB::table('logbook_bk')
                    ->leftJoin('users', 'logbook_bk.validator', '=', 'users.nip')
                    ->leftJoin('pasien', 'logbook_bk.no_rm', '=', 'pasien.no_rm')
                    ->select(['logbook_bk.created_at', 'logbook_bk.no_rm', 'pasien.nama_pasien', 'users.name', 'logbook_bk.status_validasi', 'logbook_bk.waktu_validasi'])
                    ->get();
                break;

            case 'pk-ugd':
                $indexLogbook = DB::table('logbook_pk_ugd')
                    ->leftJoin('users', 'logbook_pk_ugd.validator', '=', 'users.nip')
                    ->leftJoin('pasien', 'logbook_pk_ugd.no_rm', '=', 'pasien.no_rm')
                    ->select(['logbook_pk_ugd.created_at', 'logbook_pk_ugd.no_rm', 'pasien.nama_pasien', 'users.name', 'logbook_pk_ugd.status_validasi', 'logbook_pk_ugd.waktu_validasi'])
                    ->get();
                break;

            case 'pk-rawat-jalan':
                $indexLogbook = DB::table('logbook_pk_rawatjalan')
                    ->leftJoin('users', 'logbook_pk_rawatjalan.validator', '=', 'users.nip')
                    ->leftJoin('pasien', 'logbook_pk_rawatjalan.no_rm', '=', 'pasien.no_rm')
                    ->select(['logbook_pk_rawatjalan.created_at', 'logbook_pk_rawatjalan.no_rm', 'pasien.nama_pasien', 'users.name', 'logbook_pk_rawatjalan.status_validasi', 'logbook_pk_rawatjalan.waktu_validasi'])
                    ->get();
                break;

            case 'pk-rawat-inap':
                $indexLogbook = DB::table('logbook_pk_rawatinap')
                    ->leftJoin('users', 'logbook_pk_rawatinap.validator', '=', 'users.nip')
                    ->leftJoin('pasien', 'logbook_pk_rawatinap.no_rm', '=', 'pasien.no_rm')
                    ->select(['logbook_pk_rawatinap.created_at', 'logbook_pk_rawatinap.no_rm', 'pasien.nama_pasien', 'users.name', 'logbook_pk_rawatinap.status_validasi', 'logbook_pk_rawatinap.waktu_validasi'])
                    ->get();
                break;

            case 'pk-perina':
                $indexLogbook = DB::table('logbook_pk_perina') // <- perbaiki juga ini, tadi salah table
                    ->leftJoin('users', 'logbook_pk_perina.validator', '=', 'users.nip')
                    ->leftJoin('pasien', 'logbook_pk_perina.no_rm', '=', 'pasien.no_rm')
                    ->select(['logbook_pk_perina.created_at', 'logbook_pk_perina.no_rm', 'pasien.nama_pasien', 'users.name', 'logbook_pk_perina.status_validasi', 'logbook_pk_perina.waktu_validasi'])
                    ->get();
                break;

            case 'pk-ok':
                $indexLogbook = DB::table('logbook_pk_ok') // <- tadi salah pakai `logbook_pk_ugd`
                    ->leftJoin('users', 'logbook_pk_ok.validator', '=', 'users.nip')
                    ->leftJoin('pasien', 'logbook_pk_ok.no_rm', '=', 'pasien.no_rm')
                    ->select(['logbook_pk_ok.created_at', 'logbook_pk_ok.no_rm', 'pasien.nama_pasien', 'users.name', 'logbook_pk_ok.status_validasi', 'logbook_pk_ok.waktu_validasi'])
                    ->get();
                break;

            case 'pk-icu':
                $indexLogbook = DB::table('logbook_pk_icu')
                    ->leftJoin('users', 'logbook_pk_icu.validator', '=', 'users.nip')
                    ->leftJoin('pasien', 'logbook_pk_icu.no_rm', '=', 'pasien.no_rm')
                    ->select(['logbook_pk_icu.created_at', 'logbook_pk_icu.no_rm', 'pasien.nama_pasien', 'users.name', 'logbook_pk_icu.status_validasi', 'logbook_pk_icu.waktu_validasi'])
                    ->get();
                break;

            case 'admin':
                // Bisa redirect, tampilkan dashboard, atau tampilkan semua data gabungan
                break;
        }

        return view('logbook.logbook', compact('indexLogbook'));
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
