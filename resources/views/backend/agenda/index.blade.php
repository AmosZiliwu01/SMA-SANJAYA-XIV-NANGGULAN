@extends('backend.layout.main')
@section('title', 'Data Agenda')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Data Agenda</h5>
                    </div>
                    <div class="mb-0 m-4 text-lg-start">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAddAgenda">
                            <i class="bi bi-plus-circle me-1"></i> Add Agenda
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle mb-0">
                                <thead class="table-light text-center">
                                <tr>
                                    <th style="width: 50px;">No</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Judul Agenda</th>
                                    <th>Deskripsi Agenda</th>
                                    <th>Mulai/Selesai</th>
                                    <th>Tempat</th>
                                    <th>Waktu</th>
                                    <th>Author</th>
                                    <th style="width: 150px;">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($agendas as  $agenda)
                                <tr class="text-center">
                                    <td>{{ ($agendas->currentPage() - 1) * $agendas->perPage() + $loop->iteration }}</td>
                                    <td>{{ $agenda->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $agenda->name }}</td>
                                    <td class="align-middle text-start">
                                        <span title="{{ $agenda->description }}">
                                            {{ Str::limit($agenda->description, 50, '...') }}
                                        </span>
                                    </td>
                                    <td>
                                        {{ $agenda->start_date }} s/d {{ $agenda->end_date }}
                                    </td>
                                    <td>{{ $agenda->place }}</td>
                                    <td>{{ $agenda->time }}</td>
                                    <td>{{ $agenda->user->role ?? ''}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalEditAgenda{{ $agenda->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <form id="delete-agenda-{{$agenda->id}}" action="{{ route('agenda.destroy', $agenda->id) }}" method="POST" style="display:none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <a href="#" onclick="confirmDelete({{ $agenda->id }})" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3 px-2">
                            <p class="text-muted small mb-0">
                                Menampilkan {{ $agendas->firstItem() }} - {{ $agendas->lastItem() }} dari total {{ $agendas->total() }} Gallery
                            </p>
                            {{ $agendas->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Agenda -->
    <div class="modal fade" id="modalAddAgenda" tabindex="-1" aria-labelledby="modalAddAgendaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="modalAddAgendaLabel">Tambah Agenda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('agenda.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="judulagenda" class="form-label">Judul Agenda</label>
                            <input type="text" name="name" class="form-control" id="judulagenda" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                            <input type="date" name="start_date" class="form-control" id="tanggal_mulai" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                            <input type="date" name="end_date" class="form-control" id="tanggal_selesai" required>
                        </div>
                        <div class="mb-3">
                            <label for="tempat" class="form-label">Tempat</label>
                            <input type="text" name="place" class="form-control" id="tempat" required>
                        </div>
                        <div class="mb-3">
                            <label for="waktu" class="form-label">Waktu</label>
                            <input type="text" name="time" class="form-control" id="waktu" placeholder="Misal: 09:00 - 11:00" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi Agenda</label>
                            <textarea class="form-control" name="description" id="deskripsi" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Agenda -->
    @foreach ($agendas as $agenda)
        <div class="modal fade" id="modalEditAgenda{{ $agenda->id }}" tabindex="-1" aria-labelledby="modalEditAgendaLabel{{ $agenda->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="modalEditAgendaLabel{{ $agenda->id }}">Edit Agenda</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="{{ route('agenda.update', $agenda->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="editJudulAgenda{{ $agenda->id }}" class="form-label">Judul Agenda</label>
                                <input type="text" name="author" class="form-control" id="editJudulAgenda{{ $agenda->id }}" value="{{ $agenda->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="editStartDate{{ $agenda->id }}" class="form-label">Tanggal Mulai</label>
                                <input type="date" name="start_date" class="form-control" id="editStartDate{{ $agenda->id }}" value="{{ $agenda->start_date }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="editEndDate{{ $agenda->id }}" class="form-label">Tanggal Selesai</label>
                                <input type="date" name="end_date" class="form-control" id="editEndDate{{ $agenda->id }}" value="{{ $agenda->end_date }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="editTempat{{ $agenda->id }}" class="form-label">Tempat</label>
                                <input type="text" name="place" class="form-control" id="editTempat{{ $agenda->id }}" value="{{ $agenda->place }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="editWaktu{{ $agenda->id }}" class="form-label">Waktu</label>
                                <input type="text" name="time" class="form-control" id="editWaktu{{ $agenda->id }}" value="{{ $agenda->time }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="editDeskripsi{{ $agenda->id }}" class="form-label">Deskripsi Agenda</label>
                                <textarea name="description" class="form-control" id="editDeskripsi{{ $agenda->id }}" rows="3" required>{{ $agenda->description }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        function confirmDelete(id){
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    }).then(()=>{
                        document.getElementById('delete-agenda-' + id).submit();
                    });
                }
            });
        }
    </script>
@endsection




