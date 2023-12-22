@extends('admin.base')

@section('title', 'Edit Kandidat')

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
                                <h1 class="h2">Edit Kandidat</h1>
                                <div class="btn-toolbar mb-2 mb-md-0">
                                    <div class="btn-group me-2">
                                        <a href="{{ route('admin.kandidat.index') }}" class="btn btn-primary">Kembali</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('admin.kandidat.update', $kandidats->id) }}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    {{-- @method('PUT') --}}
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
                                                <input type="text" class="form-control" name="nama" value="{{ $kandidats->nama }}">
                                            </div>
                                            @error('nama')
                                                <p class="text-danger fs-6">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Angkatan</span>
                                                <input type="text" class="form-control" name="angkatan" value="{{ $kandidats->angkatan }}">
                                            </div>
                                            @error('angkatan')
                                                <p class="text-danger fs-6">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Nomor</span>
                                                <input type="text" class="form-control" name="nomor" value="{{ $kandidats->nomor }}">
                                            </div>
                                            @error('nomor')
                                                <p class="text-danger fs-6">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">VISI</span>
                                                <textarea name="visi" style="height: 250px" class="form-control">{{ $kandidats->visi }}</textarea>
                                            </div>
                                            @error('visi')
                                                <p class="text-danger fs-6">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">MISI</span>
                                                <textarea name="misi" style="height: 250px" class="form-control">{{ $kandidats->misi }}</textarea>
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
                                            <div class="input-group">
                                                <img class="img-fluid" src="{{ asset('storage/' . $kandidats->foto) }}" alt="FOTO KANDIDAT">
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

@section('script')
    {{-- <script>
        fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json`)
            .then((response) => response.json())
            .then((provinces) => {
                var data = provinces;
                var tampung = `<option value="">Pilih Provinsi</option>`;
                data.forEach((element) => {
                    tampung +=
                        `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                });
                document.getElementById("provinsi").innerHTML = tampung;
            });
    </script>
    <script>
        const selectProvinsi = document.getElementById('provinsi');
        const selectKota = document.getElementById('kota');
        const selectKecamatan = document.getElementById('kecamatan');
        const selectKelurahan = document.getElementById('kelurahan');

        selectProvinsi.addEventListener('change', (e) => {
            var provinsi = e.target.options[e.target.selectedIndex].dataset.prov;
            fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/${provinsi}.json`)
                .then((response) => response.json())
                .then((regencies) => {
                    var data = regencies;
                    var tampung = `<option>Pilih Kabupaten</option>`;
                    document.getElementById('kota').innerHTML = '<option>Pilih Kabupaten</option>';
                    document.getElementById('kecamatan').innerHTML = '<option>Pilih Kecamatan</option>';
                    document.getElementById('kelurahan').innerHTML = '<option>Pilih Kelurahan</option>';
                    data.forEach((element) => {
                        tampung +=
                            `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                    });
                    document.getElementById("kota").innerHTML = tampung;
                });
        });

        selectKota.addEventListener('change', (e) => {
            var kota = e.target.options[e.target.selectedIndex].dataset.prov;
            fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/districts/${kota}.json`)
                .then((response) => response.json())
                .then((districts) => {
                    var data = districts;
                    var tampung = `<option>Pilih Kecamatan</option>`;
                    document.getElementById('kecamatan').innerHTML = '<option>Pilih Kecamatan</option>';
                    document.getElementById('kelurahan').innerHTML = '<option>Pilih Kelurahan</option>';
                    data.forEach((element) => {
                        tampung +=
                            `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                    });
                    document.getElementById("kecamatan").innerHTML = tampung;
                });
        });
        selectKecamatan.addEventListener('change', (e) => {
            var kecamatan = e.target.options[e.target.selectedIndex].dataset.prov;
            fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/villages/${kecamatan}.json`)
                .then((response) => response.json())
                .then((villages) => {
                    var data = villages;
                    var tampung = `<option>Pilih Kelurahan</option>`;
                    document.getElementById('kelurahan').innerHTML = '<option>Pilih Kelurahan</option>';
                    data.forEach((element) => {
                        tampung +=
                            `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                    });
                    document.getElementById("kelurahan").innerHTML = tampung;
                });
        });
    </script> --}}
@endsection
