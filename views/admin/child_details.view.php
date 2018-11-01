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
                <li class="breadcrumb-item active">Kinderen</li>
            </ol>

            <div class="card mb-3">
                <div class="card-header">
                    Kinderen
                </div>
                <div class="card-body" style="margin: 2%;">
                    <form action="child_details_post" method="POST">
                        <div class="row">
                            <div class="col-md-5">
                                <h1><?php echo $child[0]['fname'] . " " . $child[0]['lname'] ?></h1>
                            </div>
                            <div class="col-md-7"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-5">
                                <input type="hidden" name="id" value="<?php echo $child[0]['id'] ?>">
                                <input type="hidden" name="email" value="<?php echo $child[0]['email'] ?>">
                                <input type="hidden" name="fname" value="<?php echo $child[0]['fname'] ?>">
                                <input type="hidden" name="lname" value="<?php echo $child[0]['lname'] ?>">
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
                                        <p>Reden van plaatsing</p>
                                    </div>
                                    <div class="col-md-7">
                                        <textarea name="reason" id="" cols="30" rows="5" class="form-control"><?php echo $childDetails[0]['reason'] ?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <p>Eventuele text</p>
                                    </div>
                                    <div class="col-md-7">
                                        <textarea name="comment" id="" cols="30" rows="5" class="form-control"><?php echo $childDetails[0]['comment'] ?></textarea>
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
                                <img
                                    <?php
                                    if ($child[0]['file']) {
                                        echo 'src="public/images/profile/' . $child[0]['file'] . '"';
                                    } else {
                                        echo 'src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_166aa20abe6%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_166aa20abe6%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.1953125%22%20y%3D%2296.6%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"';
                                    }
                                    ?>


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
