<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Obat - ngok.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="card border-0 shadow-sm rounded">
            <div class="card-body">
                <h3 class="mb-3">{{ $obat->nama_obat }}</h3>
                <p><strong>Kategori:</strong> {{ $obat->kategori }}</p>
                <p><strong>Harga:</strong> {{ "Rp " . number_format($obat->price,2,',','.') }}</p>
                <p><strong>Stok:</strong> {{ $obat->stock }}</p>
                <p><strong>Expired:</strong> {{ $obat->expired_at }}</p>
                <hr/>
                <p><strong>Deskripsi:</strong></p>
                <div class="bg-light p-3 rounded">
                    {!! $obat->description !!}
                </div>
                <hr>
                <a href="{{ route('obats.index') }}" class="btn btn-secondary">Kembali ke Daftar Obat</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
