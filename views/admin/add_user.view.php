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
                <li class="breadcrumb-item active">Nieuwe Gebruiker</li>
            </ol>
            <div class="card mb-3">
                <div class="card-header">
                    Voeg Gebruiker toe
                </div>
                <div class="card-body">
                    <form action="post_add_user" method="POST" id="sendForm">
                        <div class="row mb-2">
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
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <p>Geboortedatum</p>
                            </div>
                            <div class="col-md-8">
                                <input type="date" name="date" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <p>Email Adres</p>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <p>Wachtwoord</p>
                            </div>
                            <div class="col-md-8">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <p>Mobiele telefoon</p>
                            </div>
                            <div class="col-md-8">
                                <input type="number" class="form-control" maxlength="10" name="mobile">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <p>Rol</p>
                            </div>
                            <div class="col-md-8">
                                <select id="" name="role" class="form-control">
                                    <option value="Administrator">Administrator</option>
                                    <option value="Verzorgende">Verzorgende</option>
                                    <option value="Ouder"selected>Ouders</option>
                                    <option value="Kind">Kind</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <input type="hidden" value="1" name="active">
                            <div class="col-md-10"></div>
                            <div class="col-md-2" align="right">
                                <input
                                    type="submit"
                                    class="form-control"
                                    value="Bevestig"
                                />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require "partials/foot.php" ?>
<script>
    //Eerst moet hij swal laten zien dan pas redirecten naar post_add_user
    // $('#sendForm').submit(function (event) {
    //     swal("Success!", "Uw gebruiker is aangemaakt!", "success");
    //     event.preventDefault();
    // });
</script>