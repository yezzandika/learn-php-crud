<?php
require '../config.php';
require '../layouts/header.php';
require 'action.php';
?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary">
                <h5 class="card-title text-white">
                    Login
                </h5>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <?= alert() ?>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="">Username </label>
                            <input class="form-control" type="text" name="username" placeholder="Username" required>
                        </div>
                        <div class="form-group col-12">
                            <label for="">Password </label>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group col-12 my-2">
                            <button class="btn btn-primary float-end" name="login">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require '../layouts/footer.php';
?>