@extends('layouts.template')

@section('content')

    @if(Session::get('success'))
        <div class="alert alert-success"> {{ Session::get('success') }} </div>
    @endif

    @if(Session::get('deleted'))
        <div class="alert alert-warning"> {{ Session::get('deleted') }} </div>
    @endif
    <h3>Data Staff Tata Usaha</h3>
    <div class="col-md-6">
        <form action="{{ route('order.staff.index') }}" method="GET">
            <div class="input-group">
                <input type="text" name="name" id="name" value="{{ request('name') }}" class="form-control">
                <button type="submit" class="btn btn-info">Search</button>
                @if(request('name'))
                    <a href="{{ route('order.staff.index') }}" class="btn btn-secondary">Clear</a>
                @endif
            </div>
        </form>
    </div>
    <div class="justify-content-end d-flex">
        <a href="{{ route('order.staff.create') }}" class="btn btn-primary" style="margin-top: 1em">Tambah</a>
    </div>{{-- <button type="submit" href="#" class="btn btn-secondary">Tambah Pengguna</button> --}}
    <br>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($orders as $item)
            @if($item['role'] == 'staff')
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ ucwords($item['name']) }}</td>
                <td>{{ $item['email'] }}</td>
                <td>{{ ucwords($item['role']) }}</td>
                <td class="d-flex justify-content-center">
                    <a href="{{ route('order.staff.edit', $item['id']) }}" class="btn btn-primary me-3">Edit</a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal-{{ $item['id'] }}">Hapus</button>
                </td>
            </tr> 
        @endif
        <div class="modal fade" id="confirmDeleteModal-{{ $item['id']}}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="confirmDeleteModalLabel">Konfirmasi hapus</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Yakin ingin menghapus data ini?
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="{{ route('order.staff.destroy', $item['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </tbody>
</table>
        @endsection
        @push('script')
    {{-- <script type="text/javascript">
        var deleteItemId;

        function confirmDelete(id) {
            deleteItemId = id;
            $('#confirmDeleteModal').modal('show');
        }

        function deleteItem() {
            if (deleteItemId) {
                var url = "{{ route('user.delete', ":id") }}";
                url = url.replace(':id', deleteItemId);
                
                $.ajax({
                    type: 'DELETE',
                    url: url,
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        $('#confirmDeleteModal').modal('hide');
                        sessionStorage.reloadAfterPageLoad = true;
                        window.location.reload();
                    },
                    error: function(data) {
                        $('#msg').attr("class", "alert alert-danger");
                        $('#msg').text(data.responseJSON.message);
                    }
                });
            }
        }

        $(function () {
            if (sessionStorage.reloadAfterPageLoad) {
                $('#msg-success').attr("class", "alert alert-success");
                $('#msg-success').text("Berhasil menghapus data stock!");
                sessionStorage.clear();
            }
        });
    </script> --}}
@endpush 