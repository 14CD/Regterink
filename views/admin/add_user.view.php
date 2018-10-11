<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
    <div id="wrapper">
        <?php require "partials/sidebar.php" ?>
        <div id="content-wrapper">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Nieuwe Gebruiker</li>
                </ol>
                <div class="jumbotron">
                    <form action="post_add_user" method="POST">
                        <div class="row">
                            <div class="col-md-4">
                                <p>Voor- en achternaam</p>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="fname">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="lname">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Geboortedatum</p>
                            </div>
                            <div class="col-md-8">
                                <input type="date" name="date" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Email Adres</p>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Mobiele telefoon</p>
                            </div>
                            <div class="col-md-8">
                                <input type="number" class="form-control" maxlength="10" name="mobile">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Baan</p>
                            </div>
                            <div class="col-md-8">
                                <select id="" name="roleid" class="form-control">
                                    <option value="Administrator">Administrator</option>
                                    <option value="Verzorgende">Verzorgende</option>
                                    <option value="Ouders">Ouders</option>
                                    <option value="Kind">Kind</option>
                                </select>
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