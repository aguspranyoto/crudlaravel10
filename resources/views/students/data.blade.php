@extends('layout.main') @section('content')

<h3>Data Students</h3>

<div class="card">
    <div class="card-header">
        <button
            onclick="window.location='{{ url('students/add') }}'"
            type="button"
            class="btn btn-sm btn-primary"
        >
            <i class="fas fa-plus-circle"> Add New Data</i>
        </button>
    </div>
    <div class="card-body">
        @if (session('msg'))
        <div
            class="alert alert-success alert-dismissible fade show"
            role="alert"
        >
            <strong>Yeay!</strong> {{ session("msg") }}
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
            ></button>
        </div>
        @endif
        <table class="table table-sm table-striped table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>NIM</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $row)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $row->idstudents }}</td>
                    <td>{{ $row->fullname }}</td>
                    <td>{{ ($row->gender=='P') ? 'Pria' : 'Wanita' }}</td>
                    <td>{{ $row->address }}</td>
                    <td>{{ $row->emailaddress }}</td>
                    <td>{{ $row->phone }}</td>
                    <td>
                        <button
                            onclick="window.location='{{ url('students/'.$row->idstudents) }}'"
                            type="button"
                            class="btn btn-sm btn-warning"
                            title="Edit Data"
                        >
                            <i class="fas fa-edit"></i>
                        </button>
                        <form
                            action="{{ url('students/'.$row->idstudents) }}"
                            method="POST"
                            style="display: inline"
                            onsubmit="return deleteData('{{ $row->fullname }}')"
                        >
                            @csrf @method('DELETE')
                            <button
                                type="submit"
                                class="btn btn-sm btn-danger"
                                title="Hapus Data"
                            >
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    function deleteData(name) {
        pesan = confirm(`Yakin data students dengan nama${name} ini dihapus?`);
        if (pesan) return true;
        else return false;
    }
</script>
@endsection
