<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<?php
//$array_key contains the name of the Session and $array_keys contains the trimmed name of the session
$array_key = array_keys($_SESSION);
$array_keys = trim($array_key[0]);

//Current user ID
$id= $_SESSION[$array_keys][0][0];
$app['database']->Get_current_Account_info($id);
$profilePicture = $app['database']->selectWhere("users", $id);
?>
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
                        <form action="Account_info_change" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-8">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td>Voornaam:</td>
                                            <td>
                                                <input id="fname" type="text" class="form-control" value="" name="fname">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Achternaam:</td>
                                            <td>
                                                <input id="lname" type="text" class="form-control" value="" name="lname">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td>
                                                <input id="email" type="text" class="form-control" value="" name="email">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Mobiel:</td>
                                            <td>
                                                <input id="mobiel" type="number" class="form-control" value="" name="mobiel">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Rol:</td>
                                            <td>
                                                <select id="" name="role" class="form-control" name="role">
                                                    <option id="curr_select" value="" selected></option>
                                                    <option value="Administrator">Administrator</option>
                                                    <option value="Verzorgende">Verzorgende</option>
                                                    <option value="Ouder">Ouders</option>
                                                    <option value="Kind">Kind</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <input id="id" type="hidden" value="" name="id">
                                        <input id="active" type="hidden" value="" name="active">
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <img src="/public/images/profile/<?php echo $profilePicture[0]['file']?>"
                                         alt="" class="img-thumbnail">

                                    <div class="col-md-12 mt-2">
                                        <div class="mt-2 mb-2">
                                            Verander profiel foto?
                                        </div>
                                        <input type="file" name="profilePicture" id="profilePicture" class="form-control-file">
                                    </div>
                                </div>
                                <div class="align" align="right">
                                    <input class="btn btn-primary" type="submit" value="Submit">
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
    </div>
<?php require "partials/foot.php" ?>