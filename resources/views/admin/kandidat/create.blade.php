@extends('admin.base')

@section('title', 'Create Kandidat')

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
                                <h1 class="h2">Creata Kandidat</h1>
                                <div class="btn-toolbar mb-2 mb-md-0">
                                    <div class="btn-group me-2">
                                        <a href="{{ route('admin.kandidat.index') }}" class="btn btn-primary">Kembali</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('admin.kandidat.store') }}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Nomor</span>
                                                <input type="text" class="form-control" name="nomor" value="{{ old('nomor') }}">
                                            </div>
                                            @error('nomor')
                                                <p class="text-danger fs-6">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">NIM</span>
                                                <input type="text" class="form-control" name="nim" value="{{ old('nim') }}">
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
                                                <span class="input-group-text" id="basic-addon1">Angkatan</span>
                                                <input type="text" class="form-control" name="angkatan" value="{{ old('angkatan') }}">
                                            </div>
                                            @error('angkatan')
                                                <p class="text-danger fs-6">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">VISI</span>
                                                <textarea name="visi" style="height: 250px" class="form-control">{{ old('visi') }}</textarea>
                                            </div>
                                            @error('visi')
                                                <p class="text-danger fs-6">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">MISI</span>
                                                <textarea name="misi" style="height: 250px" class="form-control">{{ old('misi') }}</textarea>
                                            </div>
                                            @error('misi')
                                                <p class="text-danger fs-6">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1">Foto Kandidat</span>
                                                <input type="file" class="form-control" id="inputGroupFile04" name="foto">
                                            </div>
                                            @error('foto')
                                                <p class="text-danger fs-6">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-3">
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
