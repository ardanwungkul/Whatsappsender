<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesan = Pesan::all();
        return Inertia::render('Master/Pesan/Index', [
            'pesan' => $pesan,
            'success' => session('success')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Master/Pesan/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        Pesan::insert(['content' => $request->content]);

        return response()->json([
            'message' => 'Pesan Berhasil Disimpan!',
            'data' => $request->all(),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pesan $pesan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesan $pesan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesan $pesan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesan $pesan)
    {
        $pesan->delete();
        return response()->json(
            [
                'message' => 'Berhasil Menghapus Pesan'
            ],
            200
        );
    }
}
