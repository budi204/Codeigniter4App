<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
    <h2>Add Book</h2>
    <form class="col-md-8 mt-3" action="<?= base_url('/book/save'); ?>" method="post">
        <?= csrf_field() ?>
        <div class="row mb-3">
            <label for="title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="title" name="title" autofocus autocomplete="off" value="<?= old('title'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('title'); ?>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="cover" class="col-sm-2 col-form-label">Cover</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="cover" name="cover" autocomplete="off" value="<?= old('cover'); ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="publisher" name="publisher" autocomplete="off" value="<?= old('publisher'); ?>">
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<?= $this->endSection(); ?>