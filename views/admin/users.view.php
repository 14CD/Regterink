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
                    <li class="breadcrumb-item active">Gebruikers</li>
                </ol>
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Gebruikersnaam</th>
                        <th scope="col">Email</th>
                        <th scope="col">Rol</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Aaron</td>
                        <td>aaronweggemans@hotmail.nl</td>
                        <td>Administrator</td>
                        <td>
                            <button class="btn btn-primary">Activeer knop</button>
                        </td>
                        <td>
                            <button class="btn btn-danger">Activeer knop</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php require "partials/foot.php" ?>