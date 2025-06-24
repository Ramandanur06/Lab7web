<?= $this->include('template/header'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-primary"><?= $title; ?></h2>
    <a href="<?= base_url('/admin/artikel/add'); ?>" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Tambah Artikel
    </a>
</div>

<?php if ($artikel): ?>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php foreach ($artikel as $row): ?>
            <div class="col">
                <div class="card shadow-sm h-100">
                <?php if (!empty($row['gambar'])): ?>
                    <img src="<?= base_url('/gambar/' . $row['gambar']); ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title text-dark"><?= $row['judul']; ?></h5>
                        <p class="card-text text-muted"><?= substr($row['isi'], 0, 100); ?>...</p>
                        <span class="badge bg-<?= $row['status'] ? 'success' : 'secondary'; ?>">
                            <?= $row['status'] ? 'Published' : 'Draft'; ?>
                        </span>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="<?= base_url('/admin/artikel/edit/' . $row['id']); ?>" class="btn btn-outline-warning btn-sm">Edit</a>
                        <a href="<?= base_url('/admin/artikel/delete/' . $row['id']); ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="alert alert-info">Belum ada artikel.</div>
<?php endif; ?>

<?= $this->include('template/footer'); ?>
