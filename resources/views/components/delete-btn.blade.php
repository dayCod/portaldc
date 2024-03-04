@props(['url' => $url])

<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal">
    <i class="fa fa-trash"></i>
</button>
<!-- Delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ $url }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data ini ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span class="font-weight-bold text-danger">
                        Penting!!, Data yang telah dihapus tidak dapat dikembalikan, pastikan anda yakin menghapusnya,
                        jikalau sudah yakin, silahkan klik tombol `Hapus Data` dibawah, untuk membatalkan penghapusan
                        silahkan klik tombol `Batalkan` Dibawah ini
                    </span>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn btn-danger">
                        Hapus Data
                        </a>
                </div>
            </div>
        </form>
    </div>
</div>
