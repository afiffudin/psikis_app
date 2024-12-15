<div class="modal fade" id="colorModal" tabindex="-1" aria-labelledby="colorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="colorModalLabel">Pilih Warna Tema</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('settings.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="themeColor" class="form-label">Warna Tema</label>
                        <input type="color" id="themeColor" name="themeColor" class="form-control" value="{{ session('themeColor', '#343a40') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
