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

        // Contoh percabangan berdasarkan role/user_id
        if ($user->role === 'admin') {
            //admin
        } elseif ($user->role === 'bk') {
            $indexLogbookBK = DB::table('logbook_bk')
                ->leftJoin('users', 'logbook_bk.validator', '=', 'users.nip')
                ->leftJoin('pasien', 'logbook_bk.no_rm', '=', 'pasien.no_rm')
                ->select(['logbook_bk.created_at', 'logbook_bk.no_rm', 'pasien.nama_pasien', 'users.name', 'logbook_bk.status_validasi', 'logbook_bk.waktu_validasi'])
                ->get();

            return view('logbook.logbook_bk', compact('indexLogbookBK')); // Kirim data ke view
        } elseif ($user->role === 'pk-ugd') {
            $indexLogbookPKUGD = DB::table('logbook_pk_ugd')
                ->leftJoin('users', 'logbook_pk_ugd.validator', '=', 'users.nip')
                ->leftJoin('pasien', 'logbook_pk_ugd.no_rm', '=', 'pasien.no_rm')
                ->select(['logbook_pk_ugd.created_at', 'logbook_pk_ugd.no_rm', 'pasien.nama_pasien', 'users.name', 'logbook_pk_ugd.status_validasi', 'logbook_pk_ugd.waktu_validasi'])
                ->get();

            return view('logbook.logbook_pk_ugd', compact('indexLogbookPKUGD')); // Kirim data ke view
        } elseif ($user->role === 'pk-rawat-jalan') {
            $indexLogbookPKRawatJalan = DB::table('logbook_pk_rawat_jalan')
                ->leftJoin('users', 'logbook_pk_rawat_jalan.validator', '=', 'users.nip')
                ->leftJoin('pasien', 'logbook_pk_rawat_jalan.no_rm', '=', 'pasien.no_rm')
                ->select(['logbook_pk_rawat_jalan.created_at', 'logbook_pk_rawat_jalan.no_rm', 'pasien.nama_pasien', 'users.name', 'logbook_pk_rawat_jalan.status_validasi', 'logbook_pk_rawat_jalan.waktu_validasi'])
                ->get();

            return view('logbook.logbook_pk_rawat_jalan', compact('indexLogbookPKRawatJalan')); // Kirim data ke view
        } elseif ($user->role === 'pk-rawat-inap') {
            $indexLogbookPKRawatInap = DB::table('logbook_pk_rawat_inap')
                ->leftJoin('users', 'logbook_pk_rawat_inap.validator', '=', 'users.nip')
                ->leftJoin('pasien', 'logbook_pk_rawat_inap.no_rm', '=', 'pasien.no_rm')
                ->select(['logbook_pk_rawat_inap.created_at', 'logbook_pk_rawat_inap.no_rm', 'pasien.nama_pasien', 'users.name', 'logbook_pk_rawat_jalan.status_validasi', 'logbook_pk_rawat_inap.waktu_validasi'])
                ->get();

            return view('logbook.logbook_pk_rawat_inap', compact('indexLogbookPKRawatInap')); // Kirim data ke view
        } elseif ($user->role === 'pk-perina') {
            $indexLogbookPKPerina = DB::table('logbook_pk_ugd')
                ->leftJoin('users', 'logbook_pk_perina.validator', '=', 'users.nip')
                ->leftJoin('pasien', 'logbook_pk_perina.no_rm', '=', 'pasien.no_rm')
                ->select(['logbook_pk_perina.created_at', 'logbook_pk_perina.no_rm', 'pasien.nama_pasien', 'users.name', 'logbook_pk_perina.status_validasi', 'logbook_pk_perina.waktu_validasi'])
                ->get();

            return view('logbook.logbook_pk_perina', compact('indexLogbookPKPerina')); // Kirim data ke view
        } elseif ($user->role === 'pk-ok') {
            $indexLogbookPKOK = DB::table('logbook_pk_ugd')
                ->leftJoin('users', 'logbook_pk_ok.validator', '=', 'users.nip')
                ->leftJoin('pasien', 'logbook_pk_ok.no_rm', '=', 'pasien.no_rm')
                ->select(['logbook_pk_ok.created_at', 'logbook_pk_ok.no_rm', 'pasien.nama_pasien', 'users.name', 'logbook_pk_ok.status_validasi', 'logbook_pk_ok.waktu_validasi'])
                ->get();

            return view('logbook.logbook_pk_ok', compact('indexLogbookPKOK')); // Kirim data ke view
        } elseif ($user->role === 'pk-icu') {
            $indexLogbookPKICU = DB::table('logbook_pk_icu')
                ->leftJoin('users', 'logbook_pk_icu.validator', '=', 'users.nip')
                ->leftJoin('pasien', 'logbook_pk_icu.no_rm', '=', 'pasien.no_rm')
                ->select(['logbook_pk_icu.created_at', 'logbook_pk_icu.no_rm', 'pasien.nama_pasien', 'users.name', 'logbook_pk_icu.status_validasi', 'logbook_pk_icu.waktu_validasi'])
                ->get();

            return view('logbook.logbook_pk_icu', compact('indexLogbookPKICU')); // Kirim data ke view
        }
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
