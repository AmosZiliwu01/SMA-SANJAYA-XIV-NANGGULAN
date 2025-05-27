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
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-add-class">
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
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $class->name }}</td>
                                        <td class="text-center">
                                            {{-- Tombol Edit --}}
                                            <button class="btn btn-sm btn-info me-1"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalEditClasses{{ $class->id }}">
                                                <i class="bi bi-pencil-fill"></i>
                                            </button>

                                            {{-- Form Delete --}}
                                            <form id="delete-classes-{{ $class->id }}"
                                                  action="{{ route('class.destroy', $class->id) }}"
                                                  method="POST"
                                                  style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                            {{-- Tombol Delete --}}
                                            <a href="#"
                                               onclick="confirmDelete({{ $class->id }})"
                                               class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash-fill"></i>
                                            </a>
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

    {{-- include modal pop up --}}
    @include('backend.class.modal')

    {{-- Tambahkan script konfirmasi hapus --}}
    @push('scripts')
        <script>
            function confirmDelete(id) {
                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    document.getElementById('delete-classes-' + id).submit();
                }
            }
        </script>
    @endpush

@endsection
