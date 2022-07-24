<div class="col-12">
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <h3>Data Profile Anda:</h3>
            <?php foreach ($_SESSION['login'] as $k => $v) : ?>
                <?php if ($k != 'password' && $k!='deleted_at') : ?>
                <h4><?= $k; ?>: <?= $v; ?></h4>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <!-- /.card-body -->
    </div>
</div>