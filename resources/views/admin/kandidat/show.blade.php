@extends('admin.base')

@section('title', 'Detail Kandidat')

@section('link')

@endsection

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
                                <h1 class="h2">Detail Kandidat</h1>
                                <div class="btn-toolbar mb-2 mb-md-0">
                                    <div class="btn-group me-2">
                                        <a href="{{ route('admin.kandidat.index') }}" class="btn btn-primary">Kembali</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">NIM</span>
                                            <input type="text" class="form-control" name="nim" value="{{ $kandidats->nim }}" disabled>
                                        </div>
                                        @error('nim')
                                            <p class="text-danger fs-6">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Nama</span>
                                            <input type="text" class="form-control" name="nama" value="{{ $kandidats->nama }}"disabled>
                                        </div>
                                        @error('nama')
                                            <p class="text-danger fs-6">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Angkatan</span>
                                            <input type="text" class="form-control" name="angkatan" value="{{ $kandidats->angkatan }}"disabled>
                                        </div>
                                        @error('angkatan')
                                            <p class="text-danger fs-6">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Voter</span>
                                            <input type="text" class="form-control" name="voter" value="{{ $kandidats->voter }}"disabled>
                                        </div>
                                        @error('voter')
                                            <p class="text-danger fs-6">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <img class="img-fluid" src="{{ asset('storage/' . $kandidats->foto) }}" alt="FOTO KANDIDAT">
                                        </div>
                                        @error('foto')
                                            <p class="text-danger fs-6">{{ $message }}</p>
                                        @enderror
                                    </div>
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
