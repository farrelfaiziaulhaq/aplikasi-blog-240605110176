@extends('publik.layout')

@section('content')
    <div class="row">
        <div class="col-md-8 mb-4">
            <div class="card border-0 shadow-sm p-4">
                <span class="badge bg-secondary align-self-start mb-2">{{ $artikel->kategori->nama_kategori }}</span>
                <h2 class="fw-bold mb-3">{{ $artikel->judul }}</h2>

                <p class="text-muted small border-bottom pb-3">
                    Ditulis oleh: <strong>{{ $artikel->penulis->nama_depan }}
                        {{ $artikel->penulis->nama_belakang }}</strong>
                    <br> Dipublikasikan pada: {{ $artikel->hari_tanggal }}
                </p>

                <div class="text-center mb-4 mt-3">
                    <img src="{{ asset('storage/gambar/' . $artikel->gambar) }}" class="img-fluid rounded w-100"
                        style="max-height: 400px; object-fit: cover;" alt="Gambar Utama">
                </div>

                <div class="article-content" style="line-height: 1.8; font-size: 15px; color: #333;">
                    {!! nl2br(e($artikel->isi)) !!}
                </div>

                <div class="mt-5">
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">&larr; Kembali ke Beranda</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white fw-bold">Artikel Terkait</div>
                <div class="card-body p-0">
                    @if ($artikelTerkait->isEmpty())
                        <div class="p-3 text-muted small">Belum ada artikel terkait.</div>
                    @else
                        <div class="list-group list-group-flush">
                            @foreach ($artikelTerkait as $terkait)
                                <a href="{{ route('artikel.baca', $terkait->id) }}"
                                    class="list-group-item list-group-item-action border-0 mb-2 p-3">
                                    <div class="fw-semibold text-dark mb-1" style="font-size: 14px;">{{ $terkait->judul }}
                                    </div>
                                    <small class="text-muted">{{ $terkait->hari_tanggal }}</small>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
