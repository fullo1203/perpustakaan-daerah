<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h1><?= $judul; ?></h1>
            <form class="mt-3" method="POST" action="/anggota/tambahdata" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="anggota_nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('anggota_nama')) ? 'is-invalid' : ''; ?>" id="anggota_nama" name="anggota_nama" autofocus value="<?= old('judul'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('anggota_nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="anggota_username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="anggota_username" name="anggota_username" value="<?= old('anggota_username'); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="anggota_jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="anggota_jenis_kelamin" name="anggota_jenis_kelamin" value="<?= old('anggota_jenis_kelamin'); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="anggota_tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="anggota_tempat_lahir" name="anggota_tempat_lahir" value="<?= old('anggota_tempat_lahir'); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="anggota_tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="anggota_tanggal_lahir" name="anggota_tanggal_lahir" value="<?= old('anggota_tanggal_lahir'); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="anggota_alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="anggota_alamat" name="anggota_alamat" value="<?= old('anggota_alamat'); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="anggota_nomor_identitas" class="col-sm-2 col-form-label">Nomor Indentitas</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="anggota_nomor_identitas">
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="anggota_jenis_kartu" class="col-sm-2 col-form-label">Jenis Kartu Identitas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="anggota_jenis_kartu" name="anggota_jenis_kartu" value="<?= old('anggota_jenis_kartu'); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="anggota_foto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-2">
                        <img src="/img/default.png" class="img-tumbnail img-preview" width="100">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('anggota_foto')) ? 'is-invalid' : ''; ?>" id="anggota_foto" name="anggota_foto" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('anggota_foto'); ?>
                            </div>
                            <label class="custom-file-label" for="anggota_foto">Pilih Gambar..</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Tambah Buku</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    function previewImg() {
        const anggota_foto = document.querySelector('#anggota_foto');
        const gambarLabel = document.querySelector('.custom-file-label')
        const imgPreview = document.querySelector('.img-preview');

        gambarLabel.textContent = anggota_foto.files[0].name;

        const fileGambar = new FileReader();
        fileGambar.readAsDataURL(anggota_foto.files[0]);

        fileGambar.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
<?= $this->endSection('content'); ?>