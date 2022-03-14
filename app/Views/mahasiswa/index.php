<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

    <h2>Daftar Mahasiswa</h2>

    <div class="col-md-8">
        <form action="" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search by name or address" name="keyword" autocomplete="off">
                <button class="btn btn-outline-secondary" type="submit" name="submit">Search</button>
            </div>
        </form>
    </div>


    <table class="table">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            </tr>
        </thead>
        <tbody>
            <?php $i= 1 + 10 * ($currentPage - 1); ?>
            <?php foreach($mahasiswa as $siswa) : ?>
            <tr>
            <td><?= $i++; ?></td>
            <td><?= $siswa['name']; ?></td>
            <td><?= $siswa['num_phone']; ?></td>
            <td><?= $siswa['address']; ?></td>
            <td><a href="/siswa/<?= $siswa['id']; ?>"class="btn btn-success">Detail</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- param 1 = nama table, param 2 = nama custom file pagination -->
    <?= $pager->links('mahasiswa', 'mahasiswa_pagination'); ?>
<?= $this->endSection(); ?>