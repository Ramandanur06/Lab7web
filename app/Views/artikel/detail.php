<?= $this->include('template/header'); ?>

<h2><?= $artikel['judul']; ?></h2>
<p><?= $artikel['isi']; ?></p>

<?= $this->include('template/footer'); ?>
<?php if (!empty($artikel['gambar'])): ?>
    <img src="<?= base_url('/gambar/' . $artikel['gambar']); ?>" class="img-fluid mb-3">
<?php endif; ?>
