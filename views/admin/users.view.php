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
                    <li class="breadcrumb-item active">Gebruikers</li>
                </ol>
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Voornaam</th>
                        <th scope="col">Achternaam</th>
                        <th scope="col">Rol</th>
                        <th scope="col"><a type="" name="add_user" class="btn btn-success" href="add_user">Voeg
                                gebruiker toe</a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($users as $user) {
                        echo "<tr>";
                        foreach ($user as $key => $value) {
                            if ($key == "id") {
                                $id = $value;
                                echo "<th scope='row'>" . $value . "</th>";
                            } elseif ($key == "roleid" && $value == 1) {
                                echo "<td scope='row'>Administrator</td>";
                            } elseif ($key == "roleid" && $value == 2) {
                                echo "<td scope='row'>Verzorgende</td>";
                            } elseif ($key == "roleid" && $value == 3) {
                                echo "<td scope='row'>Ouders</td>";
                            } elseif ($key == "roleid" && $value == 4) {
                                echo "<td scope='row'>Kind</td>";
                            } elseif ($key == "fname") {
                                echo "<td><a href='user_details?id=$id' id='title'>" . ucfirst($value) . "</a></td>";
                            } else {
                                echo "<td>" . $value . "</td>";
                            }
                        }
                        echo "
                            <form action='post_remove_user' method='post'>
                                <td>
                                    <input type='hidden' value='$id' name='id'>
                                    <input type='submit' class='btn btn-danger' value='Verwijder gebruiker'>
                                </td>
                            </form>
                        ";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php require "partials/foot.php" ?>