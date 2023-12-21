@extends('admin.base')

@section('title', 'Home')

@section('link')
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content mt-4">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    @include('sweetalert::alert')
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-header justify-content-between row">
                                <div class="col-md-6 d-flex align-items-start flex-column">
                                    <h3 class="card-title">Data Kandidat</h3>
                                </div>
                                <div class="col-md-6 d-flex align-items-end flex-column">
                                    <a href="{{ route('admin.kandidat.create') }}" class="btn btn-primary">Tambah</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered table-striped shadow">
                                        <thead>

                                            <tr>
                                                <th class="sorting sorting_asc">No</th>
                                                <th class="sorting">NIM</th>
                                                <th class="sorting">Nama</th>
                                                <th class="sorting">Visi</th>
                                                <th class="sorting">Misi</th>
                                                <th class="sorting">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kandidats as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->nim }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>
                                                        <span class="d-inline-block text-truncate" style="max-width: 150px">{{ $item->visi }}</span>
                                                    </td>
                                                    <td>
                                                        <span class="d-inline-block text-truncate" style="max-width: 150px">{{ $item->misi }}</span>
                                                    </td>
                                                    {{-- <td>{{ $item->visi }}</td>
                                                    <td>{{ $item->misi }}</td> --}}
                                                    <td>
                                                        <a href="{{ route('admin.kandidat.edit', $item->id) }}" type="button" class="btn btn-primary me-3">Edit</a>
                                                        <a href="{{ route('admin.kandidat.show', $item->id) }}" type="button" class="btn btn-primary me-3">Detail</a>
                                                        <a href="{{ route('admin.kandidat.destroy', $item->id) }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js">
        < /> <
        script type = "text/javascript" >
            $('.show_confirm').click(function(event) {
                var form = $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                swal({
                        title: `Apakah anda yakin ingin menghapur record ini?`,
                        text: "Jika anda mengapus maka record akan hilang selamanya",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        }
                    });
            });
    </script>
@endsection

@section('script')
@endsection
