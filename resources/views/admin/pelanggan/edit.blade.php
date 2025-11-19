@extends('admin.layout.app')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('pelanggan.index') }}"> Pelanggan </a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
                </ol>
            </nav>
            <h2 class="h4">Edit Data Pelanggan</h2>
            <p class="mb-0">Form Perubahan Data Pelanggan</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('pelanggan.index') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                Kembali
            </a>
            <div class="btn-group ms-2 ms-lg-3">
                <button type="button" class="btn btn-sm btn-outline-gray-600">Share</button>
                <button type="button" class="btn btn-sm btn-outline-gray-600">Export</button>
            </div>
        </div>
    </div>

    <form action="{{ route('pelanggan.update', $dataPelanggan->pelanggan_id) }}" method="POST">
        @csrf
        @method('PUT')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>First Name</label>
                <input class="form-control" name="first_name" type="text"
                    value="{{ old('first_name', $dataPelanggan->first_name) }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Last Name</label>
                <input class="form-control" name="last_name" type="text"
                    value="{{ old('last_name', $dataPelanggan->last_name) }}" required>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-md-6 mb-3">
                <label>Birthday</label>
                <input class="form-control" name="birthday" type="date"
                    value="{{ old('birthday', $dataPelanggan->birthday) }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Gender</label>
                <select class="form-select" name="gender" required>
                    <option value="Male" {{ $dataPelanggan->gender == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $dataPelanggan->gender == 'Female' ? 'selected' : '' }}>Female
                    </option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Email</label>
                <input class="form-control" name="email" type="email" value="{{ old('email', $dataPelanggan->email) }}"
                    required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Phone</label>
                <input class="form-control" name="phone" type="text" value="{{ old('phone', $dataPelanggan->phone) }}"
                    required>
            </div>
        </div>

        <button class="btn btn-info text-white mt-3" type="submit">Simpan Perubahan</button>
    </form>

@endsection
