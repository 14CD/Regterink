<?php
require 'partials/head.php';
require 'partials/nav.php';
?>
<div id="wrapper">
    <?php
    require 'partials/sidebar.php';
    ?>
    <div id="content-wrapper">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    Dashboard
                </li>
                <li class="breadcrumb-item active">Verander wachtwoord</li>
            </ol>

            <div class="card mb-3">
                <div class="card-header">
                    wachtwoord vergeten
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row mb-2">
                            <div class="col-md-4">
                                Email:
                            </div>
                            <div class="col-md-8">
                                <input type="email" name="email" value="test@test.test" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                Oude wachtwoord:
                            </div>
                            <div class="col-md-8">
                                <input type="password" value="********" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                Gewenste wachtwoord:
                            </div>
                            <div class="col-md-8">
                                <input type="password" value="" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                Herhaal gewenste wachtwoord:
                            </div>
                            <div class="col-md-8">
                                <input type="password" name="password" value="" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <div class="align" align="right">
                                    <input type="submit" value="Klik" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
require 'partials/foot.php';
?>

