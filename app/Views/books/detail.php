<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<h2 class="my-3">Book Detail</h2>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
            <img src="/img/<?= $book['cover']; ?>" class="img-fluid rounded-start" alt="<?= $book['cover']; ?>">
            </div>
            <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?= $book['title']; ?></h5>
                <p class="card-text"><strong>Publisher :</strong> <?= $book['publisher']; ?></p>

                <a href="/book/edit/<?= $book['slug']; ?>" class="btn btn-warning">Edit</a>

                <form action="/book/<?= $book['id']; ?>" method="post" class="d-inline">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-danger" value="Delete" onClick="return confirm('Delete this book ?')">
                </form>

                <a href="<?= base_url('/book'); ?>">Back</a>
            </div>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>