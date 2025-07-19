<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Obats - ngok.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Obat</h3>
                    <h5 class="text-center">well</h5>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('obats.create') }}" class="btn btn-md btn-success mb-3">ADD obat</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">NAMA OBAT</th>
                                    <th scope="col">KATEGORI</th>
                                    <th scope="col">DESCRIPTION</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">STOCK</th>
                                    <th scope="col">EXPIRED</th>
                                    <th scope="col" style="width: 20%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($obats as $obat)
                                    <tr>
                                            <td>{{ $obat->nama_obat }}</td>
                                            <td>{{ $obat->kategori }}</td>
                                            <td>{!! $obat->description !!}</td>
                                            <td>{{ "Rp " . number_format($obat->price,2,',','.') }}</td>
                                            <td>{{ $obat->stock }}</td>
                                            <td>{{ $obat->expired_at }}</td>

                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('obats.destroy', $obat->id) }}" method="POST">
                                                <a href="{{ route('obats.show', $obat->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('obats.edit', $obat->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data obats belum ada.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $obats->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //message with sweetalert
        if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        endif

    </script>

</body>
</html>