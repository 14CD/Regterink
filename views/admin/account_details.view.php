<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
    <div id="wrapper">
        <?php require "partials/sidebar.php" ?>
        <div id="content-wrapper">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        Dashboard
                    </li>
                    <li class="breadcrumb-item active">Account</li>
                </ol>
                <div class="card mb-3">
                    <div class="card-header">
                        Uw gegevens
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-8">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td>username:</td>
                                            <td>
                                                <input type="text" class="form-control" value="Navid Haghighi">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>email:</td>
                                            <td>
                                                <input type="text" class="form-control" value="navidhaghighi.1900@gmail.com">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>mobiel:</td>
                                            <td>
                                                <input type="text" class="form-control" value="06-10202809">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>wachtwoord:</td>
                                            <td>
                                                <input type="password" class="form-control" value="geheimeDingen">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <img src="https://images-na.ssl-images-amazon.com/images/S/sgp-catalog-images/region_US/wb-883316843024-Full-Image_GalleryBackground-en-US-1483994511403._RI_SX940_.jpg"
                                         alt="" class="img-thumbnail">
                                </div>
                                <input class="btn btn-primary" type="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require "partials/foot.php" ?>