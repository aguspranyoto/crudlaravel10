@extends('layout.main') @section('content')

<h3>Form Edit Data Students</h3>

<div class="card">
    <div class="card-header">
        <button
            onclick="window.location='{{ url('students') }}'"
            type="button"
            class="btn btn-sm btn-warning"
        >
            Kembali
        </button>
    </div>
    <div class="card-body">
        <form action="{{ url('students/'.$idstudents) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="idstudents" class="col-sm-2 col-form-label"
                    >NIM</label
                >
                <div class="col-sm-4">
                    <input
                        type="text"
                        class="form-control-plaintext"
                        id="idstudents"
                        name="idstudents"
                        value="{{ $idstudents }}"
                        
                    />
                </div>
            </div>
            <div class="row mb-3">
                <label for="fullname" class="col-sm-2 col-form-label"
                    >Nama Lengkap</label
                >
                <div class="col-sm-4">
                    <input
                        type="text"
                        class="form-control form-control-sm @error('fullname') is-invalid @enderror"
                        id="fullname"
                        name="fullname"
                        value="{{ $fullname }}"
                    />
                    @error('fullname')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="gender" class="col-sm-2 col-form-label"
                    >Jenis Kelamin</label
                >
                <div class="col-sm-4">
                    <select
                        class="form-select form-control-sm @error('gender') is-invalid @enderror"
                        name="gender"
                        id="gender"
                    >
                        <option value="" selected>-Pilih-</option>
                        <option value="P" {{ ($gender=='P') ? 'selected' : '' }}>Pria</option>
                        <option value="W" {{ ($gender=='W') ? 'selected' : '' }}>Wanita</option>
                    </select>
                    @error('gender')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="address" class="col-sm-2 col-form-label"
                    >Alamat</label
                >
                <div class="col-sm-4">
                    <textarea
                        class="form-control form-control-sm @error('address') is-invalid @enderror"
                        name="address"
                        id="address"
                        cols="30"
                        rows="10"
                    >{{ $address }}
                    </textarea>
                    @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="emailaddress" class="col-sm-2 col-form-label"
                    >Email</label
                >
                <div class="col-sm-4">
                    <input
                        type="text"
                        class="form-control form-control-sm @error('emailaddress') is-invalid @enderror"
                        id="emailaddress"
                        name="emailaddress"
                        value="{{ $emailaddress }}"
                    />
                    @error('emailaddress')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="phone" class="col-sm-2 col-form-label">Nomor Telepon</label>
                <div class="col-sm-4">
                    <input
                        type="text"
                        class="form-control form-control-sm @error('phone') is-invalid @enderror"
                        id="phone"
                        name="phone"
                        value="{{ $phone }}"
                    />
                    @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-sm btn-success">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
