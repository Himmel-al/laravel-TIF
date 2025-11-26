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
                    <li class="breadcrumb-item"><a href="{{ route('customer.index') }}"> Customer </a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
                </ol>
            </nav>
            <h2 class="h4">Edit Data Customer</h2>
            <p class="mb-0">Form Perubahan Data Customer</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('customer.index') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                Kembali
            </a>
            <div class="btn-group ms-2 ms-lg-3">
                <button type="button" class="btn btn-sm btn-outline-gray-600">Share</button>
                <button type="button" class="btn btn-sm btn-outline-gray-600">Export</button>
            </div>
        </div>
    </div>

    <div class="card card-body border-0 shadow mb-4">
        <h2 class="h5 mb-4">General information</h2>
        <form action="{{ route('customer.update', $dataCustomer->customer_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="address_line">Address</label>
                    <input type="text" class="form-control" name="address_line" value="{{ $dataCustomer->address_line }}"
                        required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="city">City</label>
                    <input type="text" class="form-control" name="city" value="{{ $dataCustomer->city }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="state">Province</label>
                    <input type="text" class="form-control" name="state" value="{{ $dataCustomer->state }}" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="postal_code">Postal Code</label>
                    <input type="text" class="form-control" name="postal_code" value="{{ $dataCustomer->postal_code }}"
                        required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" name="country" value="{{ $dataCustomer->country }}" required>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-md-6 mb-3">
                    <label for="membership_type">Membership</label>
                    <select name="membership_type" class="form-select" required>
                        <option value="Regular" {{ $dataCustomer->membership_type == 'Regular' ? 'selected' : '' }}>Regular
                        </option>
                        <option value="Premium" {{ $dataCustomer->membership_type == 'Premium' ? 'selected' : '' }}>Premium
                        </option>
                        <option value="VIP" {{ $dataCustomer->membership_type == 'VIP' ? 'selected' : '' }}>VIP
                        </option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="registration_date">Registration Date</label>
                    <input type="text" class="form-control" name="registration_date"
                        value="{{ date('d/m/Y', strtotime($dataCustomer->registration_date)) }}" placeholder="dd/mm/yyyy"
                        required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="last_purchase_date">Last Purchase Date</label>
                    <input type="text" class="form-control" name="last_purchase_date"
                        value="{{ $dataCustomer->last_purchase_date ? date('d/m/Y', strtotime($dataCustomer->last_purchase_date)) : '' }}"
                        placeholder="dd/mm/yyyy">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="total_spent">Total Spent</label>
                    <input type="number" step="0.01" class="form-control" name="total_spent"
                        value="{{ $dataCustomer->total_spent }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="preferred_contact_method">Preferred Contact</label>
                <select name="preferred_contact_method" class="form-select" required>
                    <option value="Email" {{ $dataCustomer->preferred_contact_method == 'Email' ? 'selected' : '' }}>
                        Email</option>
                    <option value="Telepon" {{ $dataCustomer->preferred_contact_method == 'Telepon' ? 'selected' : '' }}>
                        Telepon
                    </option>
                    <option value="SMS" {{ $dataCustomer->preferred_contact_method == 'SMS' ? 'selected' : '' }}>SMS
                    </option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary px-3">Update Customer</button>
        </form>
    </div>
@endsection
