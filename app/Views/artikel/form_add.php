<?= $this->include('template/header'); ?>

<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="card-title text-primary mb-4"><?= $title; ?></h3>
        <?php if (isset($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors(); ?>
            </div>
        <?php endif; ?>

        <form method="post" enctype="multipart/form-data">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Artikel" required>
                <label for="judul">Judul Artikel</label>
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" id="isi" name="isi" style="height: 200px" placeholder="Isi Artikel" required></textarea>
                <label for="isi">Isi Artikel</label>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Upload Gambar</label>
                <input class="form-control" type="file" id="gambar" name="gambar" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Tambah</button>
            <a href="<?= base_url('/admin/artikel'); ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>

<?= $this->include('template/footer'); ?>
