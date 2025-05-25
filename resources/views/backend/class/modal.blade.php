<!-- Modal Tambah Class -->
<div class="modal fade" id="modal-add-class" tabindex="-1" aria-labelledby="modalAddDownloadLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddDownloadLabel">Tambah Class</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('class.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Masukan nama class">
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


<!-- Modal Edit Download -->
<div class="modal fade" id="modalEditDownload" tabindex="-1" aria-labelledby="modalEditDownloadLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="modalEditDownloadLabel">Edit Download</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="fileUpload" class="form-label">File</label>
                        <input type="file" class="form-control" id="fileUpload"
                               accept=".pdf,.doc,.docx,.ppt,.pptx,.zip">
                        <small class="text-muted">File yang diizinkan:pdf, doc, docx, ppt, pptx, zip</small>
                    </div>

                    <div class="mb-3">
                        <label for="editDescription" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="editDescription"
                                  rows="3">Laporan tahunan perusahaan</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editAuthor" class="form-label">Oleh</label>
                        <input type="text" class="form-control" id="editAuthor" value="Enjelina">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-info">Update</button>
            </div>
        </div>
    </div>
</div>
