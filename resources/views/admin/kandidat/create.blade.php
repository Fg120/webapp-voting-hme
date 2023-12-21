@extends('admin.base')

@section('title', 'Home')

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content mt-4">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-header justify-content-between row">
                                <div class="col-md-6 d-flex align-items-start flex-column">
                                    <h3 class="card-title">Tambah Kandidat</h3>
                                </div>
                                <div class="col-md-6 d-flex align-items-end flex-column">
                                    <a href="{{ route('admin.kandidat.index') }}" class="btn btn-primary">Kembali</a>
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
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1">Foto Kandidat</span>
                                                <input type="file" class="form-control" id="inputGroupFile04" name="foto">
                                            </div>
                                            @error('foto')
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
