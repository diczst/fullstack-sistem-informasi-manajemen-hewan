<?php

namespace App\Http\Controllers\Api;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil user yang sedang login
        $user = auth('api')->user();

        // Pengecekan apakah user memiliki permission yang diperlukan
        if (!$user->can('get-patient', 'api')) {
            return response()->json([
                'code' => 403,
                'message' => 'Anda tidak memiliki izin untuk mengakses data ini.',
                'data' => null
            ], 403);
        }

        // Cek apakah user adalah admin
        if (!$user->hasRole('admin')) {
            // Batasi akses hanya pada data milik pengguna saat ini
            $patients = Patient::where('user_id', $user->id)->get();
        } else {
            // Jika admin, tampilkan semua data pasien
            $patients = Patient::all();
        }

        return response()->json([
            'code' => 200,
            'message' => "Berhasil mendapatkan data!",
            'data' => $patients
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
