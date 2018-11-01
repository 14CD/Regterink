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
                <div class="card-body">
                    <?php
                    foreach ($children as $child) {
                        $id = $child['id'];
                        ?>
                        <div class="card" style="float: left; width: 20rem; margin: 2%;">
                            <img class="card-img-top"
                                 <?php
                                    if($child['file'] == NULL)
                                    {
                                        ?>
                                            src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_166aa20abe6%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_166aa20abe6%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.1953125%22%20y%3D%2296.6%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                                        <?php
                                    }
                                    else {
                                        echo 'src="/public/images/profile/' . $child['file'] . '"';
                                    }
                                 ?>
                                 alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo $child['fname'] . " " . $child['lname'] ?>
                                </h5>
                                <p class="card-text">
                                    <?php echo $child['email'] ?>
                                </p>
                                <a href='child_details?id=<?php echo $id ?>' class="btn btn-primary">Zie gegevens in</a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
require 'partials/foot.php';
?>
