<?php
require __DIR__ . '/../partials/head.php';
require __DIR__ .  '/../partials/nav.php';
?>
<div id="wrapper">
    <?php
    require __DIR__ . '/../partials/sidebar.php';

    ?>
    <div id="content-wrapper">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    dashboard
                </li>
                <li class="breadcrumb-item">
                    documenten
                </li>
                <li class="breadcrumb-item active">nieuw document</li>
            </ol>
            <div class="card mb-3">
                <div class="card-header">
                    voeg een nieuw document toe
                </div>
                <div class="card-body">
                    <form action="add_document" method="POST" enctype="multipart/form-data">
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <p>omschrijving</p>
                            </div>
                            <div class="col-md-8">
                                <textarea class="form-control" name="description" cols="30"></textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <p>kind:</p>
                            </div>
                            <div class="col-md-8">
                                <select name="child" class="form-control">
                                <?php

                                foreach ($children as $child) {
                                    echo "<option value='".$child['id']." '> " . $child['fname'] . " </option>";
                                }
                                ?>

                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 mt-2">
                            <input type="file" name="document" class="form-control-file">
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
<?php
require __DIR__ . '/../partials/foot.php';
?><script>
    //Eerst moet hij swal laten zien dan pas redirecten naar post_add_user
    // $('#sendForm').submit(function (event) {
    //     swal("Success!", "Uw gebruiker is aangemaakt!", "success");
    //     event.preventDefault();
    // });
</script>