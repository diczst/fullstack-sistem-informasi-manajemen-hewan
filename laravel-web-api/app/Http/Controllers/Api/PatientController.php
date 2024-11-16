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
    public function index(Request $request)
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

        // Mendapatkan owner_id dari request, jika tidak ada default ke null
        $userId = $request->query('user_id', null);

        // Filter pasien berdasarkan owner_id
        $patients = Patient::when($userId, function ($query, $userId) {
            return $query->where('user_id', $userId);
        })->get();

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
