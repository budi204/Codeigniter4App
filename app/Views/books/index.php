<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
    <a href="<?= base_url('/book/create'); ?>" class="btn btn-primary mb-3">Add Book</a>

    <?php if(session()->getFlashdata('message')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashData('message'); ?>
        </div>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Cover</th>
            <th scope="col">Title</th>
            <th scope="col">Publisher</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($books as $book) : ?>
            <tr>
            <td><?= $book['id']; ?></td>
            <td><img src="/img/<?= $book['cover']; ?>" alt="<?= $book['cover']; ?>" width="50"></td>
            <td><?= $book['title']; ?></td>
            <td><?= $book['publisher']; ?></td>
            <td><a href="/book/<?= $book['slug']; ?>"class="btn btn-success">Detail</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?= $this->endSection(); ?>