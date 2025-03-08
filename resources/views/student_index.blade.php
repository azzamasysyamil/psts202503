<div>
    @extends('layouts.app_modern', ['title' => 'Database Pelajar'])
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        {{-- <div class="card-header">Form student</div> --}}
                        <div class="card-body">
                            <div class="row mb-3 mt-3">
                            <div class="col-md-3 h3">
                                Data Pelajar
                            </div>
                            <div class="col-md-6">
                                <form class="d-flex">
                                    <input class="form-control me-2" type="text" name="p" placeholder="Cari Nama Pelajar" value="{{ request('p') }}" aria-label="Search">
                                    <button class="btn btn-outline-primary" type="submit">Cari</button>
                                </form>
                            </div>
                            <div class="col-md-3">
                                <a href="/student/create" class="btn btn-primary btn-md float-end">Tambah Data</a>
                            </div>
                        </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Email</th>
                                        <th>Nomor Telpon</th>
                                        <th>Kelas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($student as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {{ $item->name }}
                                            </td>
                                            <td>{{ $item->gender }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->grade }}</td>
                                            <td style="min-width: 200px">
                                                <a href="/student/{{ $item->id }}/edit" class="btn btn-warning btn-sm ml-2">Edit</a>&nbsp
                                                <form action="/student/{{  $item->id }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm ml-2" onclick="return confirm('Yakin ingin menghapus data?')">Hapus
                                                    </button>
                                                </form>
                                                                                         

                                                {{-- <button type="button" class="btn btn-warning">Edit</button>
                                                <button type="button" class="btn btn-danger">Remove</button> --}}
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $student->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</div>
