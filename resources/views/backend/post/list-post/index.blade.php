@extends('backend.layout.main')
@section('title', 'List Post')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Data Berita</h5>
                    </div>
                    <div class="mb-0 m-4 text-lg-start">
                        <a href="{{ route('post.create') }}" class="btn btn-success">
                            <i class="bi bi-plus-circle me-1"></i> Post Berita
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle mb-0">
                                <thead class="table-light text-center">
                                <tr>
                                    <th style="width: 80px;">No</th>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Tanggal</th>
                                    <th>Author</th>
                                    <th>Baca</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($post as $row)
                                    <tr class="text-center">
                                        <td>{{ ($post->currentPage() - 1) * $post->perPage() + $loop->iteration }}</td>
                                        <td class="text-center">
                                            <img src="{{ Str::startsWith($row->image, 'http') ? $row->image : asset('storage/' . $row->image) }}"  width="50" height="50" onerror="this.src='{{ asset('assets/img/img-not-found.png') }}'">
                                        </td>
                                        <td class="text-start">{{ $row->title }}</td>
                                        <td>
                                            {{ $row->updated_at != $row->created_at
                                                ? $row->updated_at->format('d M Y')
                                                : $row->created_at->format('d M Y') }}
                                        </td>
                                        <td>{{ $row->user->role ?? '' }}</td>
                                        <td>{{ $row->views ?? 0 }}x</td>
                                        <td>{{ $row->category->name ?? '' }}</td>
                                        <td>
                                            <a href="{{ route('post.edit', $row->id) }}" class="btn btn-sm btn-info me-1" title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form id="delete-post-{{$row->id}}" action="{{ route('post.destroy', $row->id) }}" method="POST" style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                            <a href="#" onclick="confirmDelete({{ $row->id }})" class="btn btn-sm btn-danger">
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
                                Menampilkan {{ $post->firstItem() }} - {{ $post->lastItem() }} dari total {{ $post->total() }} Berita
                            </p>
                            {{ $post->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                        document.getElementById('delete-post-' + id).submit();
                    });
                }
            });
        }
    </script>
@endsection
