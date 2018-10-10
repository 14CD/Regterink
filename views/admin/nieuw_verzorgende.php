<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
    <div id="wrapper">
        <?php require "partials/sidebar.php" ?>
        <div id="content-wrapper">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Verzorgende</li>
                </ol>
                <div class="jumbotron">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-4">
                                <p>Voor- en achternaam</p>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Woonplaats</p>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10"></div>
                            <div class="col-md-2" align="right">
                                <input type="submit" class="form-control" value="Klik">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php require "partials/foot.php" ?>