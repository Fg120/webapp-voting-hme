@extends('admin.base')

@section('title', 'Create User')

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content mt-4">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                <h1 class="h2">Create User</h1>
                                <div class="btn-toolbar mb-2 mb-md-0">
                                    <div class="btn-group me-2">
                                        <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-primary">Kembali</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('admin.mahasiswa.store') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">NIM</span>
                                                <input type="text" class="form-control" placeholder="01234567" name="nim" value="{{ old('nim') }}">
                                            </div>
                                            @error('nim')
                                                <p class="text-danger fs-6">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Nama</span>
                                                <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                                            </div>
                                            @error('nama')
                                                <p class="text-danger fs-6">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">HP</span>
                                                <input type="text" class="form-control" name="hp" value="{{ old('hp') }}">
                                            </div>
                                            @error('hp')
                                                <p class="text-danger fs-6">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Angkatan</span>
                                                <input type="text" class="form-control" placeholder="2000" name="angkatan" value="{{ old('angkatan') }}">
                                            </div>
                                            @error('angkatan')
                                                <p class="text-danger fs-6">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Password & Token</span>
                                                <input type="password" class="form-control" placeholder="Otomatis dibuat" name="password" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Role</span>
                                                <select class="form-select" id="is_admin" name="is_admin">
                                                    <option value="0" selected>Mahasiswa</option>
                                                    <option value="1">Admin</option>
                                                </select>
                                            </div>
                                            @error('is_admin')
                                                <p class="text-danger fs-6">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>
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
