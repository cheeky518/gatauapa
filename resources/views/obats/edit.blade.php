<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Obat - ngok.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="card border-0 shadow-sm rounded">
            <div class="card-body">
                <h3 class="mb-4">Edit Data Obat</h3>
                <form action="{{ route('obats.update', $obat->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nama Obat</label>
                        <input type="text" class="form-control @error('nama_obat') is-invalid @enderror" name="nama_obat" value="{{ old('nama_obat', $obat->nama_obat) }}">
                        @error('nama_obat')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" value="{{ old('kategori', $obat->kategori) }}">
                        @error('kategori')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5">{{ old('description', $obat->description) }}</textarea>
                        @error('description')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Harga</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $obat->price) }}">
                            @error('price')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Stok</label>
                            <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock', $obat->stock) }}">
                            @error('stock')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Expired Date</label>
                        <input type="date" class="form-control @error('expired_at') is-invalid @enderror" name="expired_at" value="{{ old('expired_at', $obat->expired_at) }}">
                        @error('expired_at')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-start">
                        <button type="submit" class="btn btn-primary me-3">Update</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
