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
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-header justify-content-between row">
                                <div class="col-md-6 d-flex align-items-start flex-column">
                                    <h3 class="card-title">Detail Mahasiswa</h3>
                                </div>
                                <div class="col-md-6 d-flex align-items-end flex-column">
                                    <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-primary">Kembali</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">NIM</span>
                                            <input type="text" class="form-control" name="nim" value="{{ $mahasiswas->nim }}" disabled>
                                        </div>
                                        @error('nim')
                                            <p class="text-danger fs-6">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Nama</span>
                                            <input type="text" class="form-control" name="nama" value="{{ $mahasiswas->nama }}"disabled>
                                        </div>
                                        @error('nama')
                                            <p class="text-danger fs-6">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Email</span>
                                            <input type="text" class="form-control" name="email" value="{{ $mahasiswas->email }}"disabled>
                                        </div>
                                        @error('email')
                                            <p class="text-danger fs-6">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">HP</span>
                                            <input type="text" class="form-control" name="hp" value="{{ $mahasiswas->hp }}"disabled>
                                        </div>
                                        @error('hp')
                                            <p class="text-danger fs-6">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Angkatan</span>
                                            <input type="text" class="form-control" name="angkatan" value="{{ $mahasiswas->angkatan }}"disabled>
                                        </div>
                                        @error('angkatan')
                                            <p class="text-danger fs-6">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Password & Token</span>
                                            <input type="text" class="form-control" name="password" value="{{ $mahasiswas->token }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Role</span>
                                            <select class="form-select" id="role" name="is_admin" disabled>
                                                <option value="0" {{ $mahasiswas->is_admin == 0 ? 'selected' : '' }}>
                                                    Mahasiswa</option>
                                                <option value="1" {{ $mahasiswas->is_admin == 1 ? 'selected' : '' }}>
                                                    Admin</option>
                                            </select>
                                        </div>
                                        @error('is_admin')
                                            <p class="text-danger fs-6">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        @if ($mahasiswas->hp != null)
                                            <a class="btn btn-success" href="https://wa.me/{{ $mahasiswas->hp }}" target="_blank" role="button"><i class="bi bi-whatsapp"></i>WhatsApp</a>
                                        @else
                                            <button class="btn btn-success" href="" target="_blank" role="button"><i class="bi bi-whatsapp" disabled></i>WhatsApp</button>
                                        @endif
                                        @if ($mahasiswas->email != null)
                                            <a class="btn btn-success" href="mailto:{{ $mahasiswas->email }}" target="_blank" role="button"><i class="bi bi-envelope"></i>Email</a>
                                        @else
                                            <button class="btn btn-success" href="" target="_blank" role="button"><i class="bi bi-envelope" disabled></i>Email</button>
                                        @endif
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
