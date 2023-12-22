@extends('admin.base')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            {{-- <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
                <svg class="bi">
                    <use xlink:href="#calendar3"></use>
                </svg>
                This week
            </button> --}}
        </div>
    </div>
    <div class="row d-flex justify-content-around">
        <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
            {{-- <div class="card-header">User</div> --}}
            <div class="card-body">
                <h5 class="card-title">Jumlah User</h5>
                <p class="card-text">{{ $users }}</p>
            </div>
        </div>
        <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
            {{-- <div class="card-header">User</div> --}}
            <div class="card-body">
                <h5 class="card-title">Jumlah Admin</h5>
                <p class="card-text">{{ $admins }}</p>
            </div>
        </div>
        <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
            {{-- <div class="card-header">User</div> --}}
            <div class="card-body">
                <h5 class="card-title">Jumlah Kandidat</h5>
                <p class="card-text">{{ $kandidats }}</p>
            </div>
        </div>
        <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
            {{-- <div class="card-header">User</div> --}}
            <div class="card-body">
                <h5 class="card-title">Jumlah Sudah Voting</h5>
                <p class="card-text">{{ $s_vote }}</p>
            </div>
        </div>
        <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
            {{-- <div class="card-header">User</div> --}}
            <div class="card-body">
                <h5 class="card-title">Jumlah Belum Voting</h5>
                <p class="card-text">{{ $b_vote }}</p>
            </div>
        </div>
    </div>
@endsection
