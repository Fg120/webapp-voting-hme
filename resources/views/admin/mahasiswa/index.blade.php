@extends('admin.base')

@section('title', 'Data User')

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
                            <div class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                <h1 class="h2">Data User</h1>
                                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                    <a href="{{ route('admin.mahasiswa.create') }}" class="btn btn-primary">Tambah</a>

                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Export
                                        </button>
                                        {{-- <a href="mailto:test@example.com?subject=Testing out mailto!&body=This is only a test!">Second Example</a> --}}
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('admin.mahasiswa.export.all') }}" class="dropdown-item">Export User & admin</a></li>
                                            <li><a href="{{ route('admin.mahasiswa.export.user') }}" class="dropdown-item">Export Hanya User</a></li>
                                            <li><a href="{{ route('admin.mahasiswa.export.admin') }}" class="dropdown-item">Export Hanya Admin</a></li>
                                            <li><a href="{{ route('admin.mahasiswa.export.user_unvote') }}" class="dropdown-item">Export User Belum Vote</a></li>
                                            <li><a href="{{ route('admin.mahasiswa.export.user_voted') }}" class="dropdown-item">Export User Sudah Vote</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="{{ route('admin.mahasiswa.search') }}" method="post">
                                        @csrf
                                        <div class="input-group mb-3 shadow">
                                            <input type="text" class="form-control" required name="search" class="form-control mb-3 shadow-sm" type="text" placeholder="Cari NIM...">
                                            <button class="btn btn-dark" type="button">Search</button>
                                        </div>
                                        {{-- <input required name="search" class="form-control mb-3 shadow-sm" type="text" placeholder="Cari NIM..."> --}}
                                    </form>
                                    <table id="myTable" class="table table-bordered table-striped shadow">
                                        <thead>

                                            <tr>
                                                <th class="sorting sorting_asc">No</th>
                                                <th class="sorting">NIM</th>
                                                <th class="sorting">Nama</th>
                                                <th class="sorting">Angkatan</th>
                                                <th class="sorting">Role</th>
                                                <th class="sorting">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->nim }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->angkatan }}</td>
                                                    <td>
                                                        @if ($item->is_admin == 0)
                                                            <p class="btn btn-success">Mahasiswa</p>
                                                        @elseif ($item->is_admin == 1)
                                                            <p class="btn btn-danger">Admin</p>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.mahasiswa.edit', $item->id) }}" type="button" class="btn btn-primary me-3">Edit</a>
                                                        <a href="{{ route('admin.mahasiswa.show', $item->id) }}" type="button" class="btn btn-primary me-3">Detail</a>
                                                        <a href="{{ route('admin.mahasiswa.destroy', $item->id) }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex">
                                        {{-- Halaman : {{ $users->currentPage() }} <br />
                                        Jumlah Data : {{ $users->total() }} <br />
                                        Data Per Halaman : {{ $users->perPage() }} <br />
                                        {{ $users->links() }} --}}
                                        {!! $users->links() !!}
                                    </div>
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

@endsection

@section('script')
@endsection
