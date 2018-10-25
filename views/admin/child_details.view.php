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
                <li class="breadcrumb-item active">kinderen</li>
            </ol>

            <div class="card mb-3">
                <div class="card-header">
                    kinderen
                </div>
                <div class="card-body" style="margin: 2%;">
                    <form action="" method="">
                        <div class="row">
                            <div class="col-md-5">
                                <h1><?php echo $child[0]['fname'] . " " . $child[0]['lname'] ?></h1>
                            </div>
                            <div class="col-md-7"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-5">
                                <?php
                                if ($child[0]['active'] == 1) {
                                    echo "
                                    <button class='btn btn-sm btn-success' style='width: 100%;' disabled>Kind is actief</button>
                                ";
                                } else {
                                    echo "
                                    <button class='btn btn-sm btn-danger' style='width: 100%;' disabled>Kind is niet actief</button>
                                ";
                                }
                                ?>
                            </div>
                            <div class="col-md-7"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <p>Email adres</p>
                                    </div>
                                    <div class="col-md-7">
                                        <p><?php echo $child[0]['email'] ?></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <p>Mobiele telefoonnummer</p>
                                    </div>
                                    <div class="col-md-7">
                                        <p><?php echo $child[0]['mobile'] ?></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <p>Behandelsplan</p>
                                    </div>
                                    <div class="col-md-7">
                                        <button type="button" class="btn btn-info"><i class="fa fa-download"></i>
                                            Download Behandelsplan
                                        </button>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <p>Eventuele text</p>
                                    </div>
                                    <div class="col-md-7">
                                    <textarea name="" id="" cols="30" rows="10" class="form-control">

                                    </textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-5">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="align" align="right">
                                            <input type="submit" class="btn btn-primary" value="klik">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="https://pure.tue.nl/ws/files/91890610/TUe_Peter_Persoon_4320_B.jpg"
                                     alt=""
                                     class="img-thumbnail">
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
