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
                        <th scope="col">Voornaam</th>
                        <th scope="col">Achternaam</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Rol</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($users as $user) {
                                echo "<tr>";
                                    foreach($user as $key => $value)
                                    {
                                        if ($key == "id")
                                        {
                                            $id = $value;
                                            echo "<th scope='row'>" . $value . "</th>";
                                        }
                                        elseif ($key == "roleid" && $value == 1)
                                        {
                                            echo "<td scope='row'>Administrator</td>";
                                        }
                                        elseif ($key == "roleid" && $value == 2)
                                        {
                                            echo "<td scope='row'>Verzorgende</td>";
                                        }
                                        elseif ($key == "roleid" && $value == 3)
                                        {
                                            echo "<td scope='row'>Ouders</td>";
                                        }
                                        elseif ($key == "roleid" && $value == 4)
                                        {
                                            echo "<td scope='row'>Kind</td>";
                                        }
                                        else
                                        {
                                            echo "<td>" . $value . "</td>";
                                        }
                                    }
                                echo "<td><button class='btn btn-danger' formaction='post_remove_user/" . $id . "/'>Verwijder gebruiker</button></td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php require "partials/foot.php" ?>