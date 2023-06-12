<?php
require 'config.php';
require 'layouts/header.php';
if (is_login() == false) {
    exit(redirect(base_url('auth/login.php')));
}
?>
<div class="row justify-content-center">
    <div class="col-md-12">
        <?= alert() ?>
    </div>
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary">
                <h5 class="card-title text-white">
                    Dashboard
                </h5>
            </div>
            <div class="card-body">
                <p>Haii, <strong><?= user('name') ?></strong></p>
            </div>
        </div>
    </div>
</div>
<?php
require 'layouts/footer.php';
?>