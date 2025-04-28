<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $indexPasien = DB::table('pasien')->select(['id', 'no_rm', 'nama_pasien'])->paginate(10);

        return view('pasien.pasien', compact('indexPasien')); // Kirim data ke view
    }

    public function indexEdit($id, $no_rm, $nama_pasien)
    {
        $indexEditPasien = DB::table('pasien')
            ->select(['id', 'no_rm', 'nama_pasien'])
            ->where('pasien.id', $id)
            ->where('pasien.no_rm', $no_rm)
            ->where('pasien.nama_pasien', $nama_pasien)
            ->first(); // Jika hanya satu baris, gunakan first()

        // Pastikan data ditemukan
        if (!$indexEditPasien) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        return view('pasien.edit-pasien', compact('indexEditPasien'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request) {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_rm' => ['required', 'string', 'max:6', 'unique:pasien,no_rm'],
            'nama_pasien' => ['required', 'string', 'max:255'],
        ]);

        Pasien::create([
            'no_rm' => $request->no_rm,
            'nama_pasien' => $request->nama_pasien,
        ]);

        return redirect()->route('pasien')->with('success', 'Data berhasil disimpan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request): RedirectResponse
    {

        $pasien = Pasien::where('id', $request->id)->first();

        if ($pasien) {
            $pasien->update([
                'no_rm' => $request->no_rm,
                'nama_pasien' => $request->nama_pasien,
            ]);
            return redirect()->route('pasien')->with('success', 'Data berhasil diperbarui.');
        } else {
            return redirect()->route('pasien')->with('error', 'Data tidak ditemukan.');
        }

        return redirect()->route('pasien');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $no_rm, $nama_pasien)
    {
        DB::table('pasien')->where('no_rm', $no_rm)->where('nama_pasien', $nama_pasien)->delete();
        // Redirect dengan pesan sukses
        return redirect()->route('pasien')->with('success', 'Data berhasil dihapus!');
    }
}
