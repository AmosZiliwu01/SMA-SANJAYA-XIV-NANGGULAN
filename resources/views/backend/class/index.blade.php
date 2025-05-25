@extends('backend.layout.main')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Data Class</h5>
                    </div>
                    <div class="mb-0 m-4 text-lg-start">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-add-class">
                            <i class="bi bi-plus-circle me-1"></i> Tambah Class
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle mb-0">
                                <thead class="table-light text-center">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Name</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($classes as $key => $class)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$class->name}}</td>
                                        <td>
                                            <button>update</button>
                                            <button>delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--include modal pop up--}}
    @include('backend.class.modal')

@endsection
