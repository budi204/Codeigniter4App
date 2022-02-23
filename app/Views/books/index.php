<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Cover</th>
            <th scope="col">Publisher</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($books as $book) : ?>
            <tr>
            <td><?= $book['id']; ?></td>
            <td><?= $book['title']; ?></td>
            <td><?= $book['slug']; ?></td>
            <td><?= $book['cover']; ?></td>
            <td><?= $book['publisher']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?= $this->endSection(); ?>