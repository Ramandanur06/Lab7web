<?= $this->include('template/header'); ?>

<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="card-title text-primary mb-4"><?= $title; ?></h3>

        <form method="post" enctype="multipart/form-data">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="judul" name="judul" value="<?= $data['judul']; ?>" required>
                <label for="judul">Judul Artikel</label>
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" id="isi" name="isi" style="height: 200px" required><?= $data['isi']; ?></textarea>
                <label for="isi">Isi Artikel</label>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Upload Gambar Baru (opsional)</label>
                <input class="form-control" type="file" id="gambar" name="gambar" accept="image/*">
            </div>

            <?php if (!empty($data['gambar'])): ?>
                <p>Gambar sekarang:</p>
                <img src="<?= base_url('/gambar/' . $data['gambar']); ?>" class="img-thumbnail" style="max-height:150px;">
            <?php endif; ?>

            <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Update</button>
            <a href="<?= base_url('/admin/artikel'); ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?= $this->include('template/footer'); ?>
