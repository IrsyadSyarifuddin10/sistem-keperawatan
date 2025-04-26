<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $indexPetugas = DB::table('users')
            ->select(['id', 'nip', 'nama_petugas', 'email', 'unit', 'status', 'role'])
            ->paginate(10);

        return view('petugas.petugas', compact('indexPetugas')); // Kirim data ke view
    }

    public function indexEdit($id, $nip, $unit, $status, $role)
    {
        $indexEditPetugas = DB::table('users')
            ->select(['id', 'nip', 'nama_petugas', 'email', 'unit', 'status', 'role'])
            ->where('users.id', $id)
            ->where('users.nip', $nip)
            ->where('users.unit', $unit)
            ->where('users.status', $status)
            ->where('users.role', $role)
            ->first(); // Jika hanya satu baris, gunakan first()

        // Pastikan data ditemukan
        if (!$indexEditPetugas) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        return view('petugas.edit-petugas', compact('indexEditPetugas'));
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
            'nama_petugas' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string', 'max:12', 'unique:users,nip'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'nip' => $request->nip,
            'nama_petugas' => $request->nama_petugas,
            'email' => $request->email,
            'status' => $request->status,
            'unit' => $request->unit,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('petugas')->with('success', 'Data berhasil disimpan.');
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

        $petugas = User::where('id', $request->id)->first();

        if ($petugas) {
            $petugas->update([
                'nip' => $request->nip,
                'nama_petugas' => $request->nama_petugas,
                'email' => $request->email,
                'status' => $request->status,
                'unit' => $request->unit,
                'role' => $request->role,
            ]);
            return redirect()->route('petugas')->with('success', 'Data berhasil diperbarui.');
        } else {
            return redirect()->route('petugas')->with('error', 'Data tidak ditemukan.');
        }

        return redirect()->route('mentoring');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, $nip, $unit, $status, $role)
    {
        DB::table('users')->where('id', $id)->where('nip', $nip)->where('unit', $unit)->where('status', $status)->where('role', $role)->delete();
        // Redirect dengan pesan sukses
        return redirect()->route('petugas')->with('success', 'Data berhasil dihapus!');
    }
}
