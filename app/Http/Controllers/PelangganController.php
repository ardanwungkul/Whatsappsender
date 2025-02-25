<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pesan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Master/Pelanggan/Index');
    }
    public function whatsapp($nomor)
    {
        if (substr($nomor, 0, 2) === '82') {
            $nomor = '6282' . substr($nomor, 2);
        }
        $pesan = Pesan::orderBy('used', 'asc')->inRandomOrder()->first();
        if ($pesan) {
            $pesan->increment('used');
            return response()->json([
                'message' => 'Berhasil Mengirim Pesan Whatsapp',
                'nomor' => $nomor,
                'pesan' => $pesan->content,
                'link' => 'https://wa.me/' . $nomor . '?text=' . $pesan->content
            ], 200);
        } else {
            return response()->json([
                'message' => 'Tidak ada pesan tersedia.'
            ], 404);
        }
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
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        //
    }
}
