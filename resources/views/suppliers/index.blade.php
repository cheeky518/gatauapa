<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Suppliers - chika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Gudang Farmasi</h3>
                    <h5 class="text-center my-4">Chika</h5>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('suppliers.create') }}" class="btn btn-md btn-success mb-3">ADD SUPPLIER</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">IMAGE</th>
                                    <th scope="col">TITLE</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">STOCK</th>
                                    <th scope="col" style="width: 20%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($suppliers as $supplier)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ asset('/storage/suppliers/'.$supplier->image) }}" class="rounded" style="width: 150px">
                                        </td>
                                        <td>{{ $supplier->title }}</td>
                                        <td>{{ "Rp " . number_format($supplier->price,2,',','.') }}</td>
                                        <td>{{ $supplier->stock }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST">
                                                <a href="{{ route('suppliers.show', $supplier->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Suppliers belum ada.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $suppliers->links() }}
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