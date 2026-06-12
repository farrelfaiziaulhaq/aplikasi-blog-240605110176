<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Halaman 1: Menampilkan 5 Artikel Terbaru & Widget Kategori
    public function index(Request $request)
    {
        // Ambil semua kategori beserta jumlah artikel di dalamnya
        $kategori = KategoriArtikel::withCount('artikel')->orderBy('nama_kategori', 'asc')->get();

        // Query dasar artikel (urut dari yang terbaru)
        $query = Artikel::with(['penulis', 'kategori'])->orderBy('id', 'desc');

        // Jika pengunjung klik filter kategori di widget samping
        if ($request->has('kategori')) {
            $query->where('id_kategori', $request->kategori);
        }

        // Ambil maksimal 5 artikel sesuai soal
        $artikel = $query->take(5)->get();

        return view('publik.index', compact('artikel', 'kategori'));
    }

    // Halaman 2: Menampilkan Detail Baca Artikel & Artikel Terkait
    public function show($id)
    {
        // Cari artikel berdasarkan ID
        $artikel = Artikel::with(['penulis', 'kategori'])->findOrFail($id);

        // Ambil 5 artikel terkait dari kategori yang sama (kecuali artikel yang sedang dibaca)
        $artikelTerkait = Artikel::where('id_kategori', $artikel->id_kategori)
            ->where('id', '!=', $id)
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        return view('publik.show', compact('artikel', 'artikelTerkait'));
    }
}