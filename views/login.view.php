<?php require 'partials/head.php'; ?>
    <header class="mastheadLogin text-white">
        <div class="mask text-center d-flex">
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <h2>Login</h2>
                        <form action="login_user" method="post">
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <h5>Email:</h5>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <h5>Password:</h5>
                                </div>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-4">

                                </div>
                                <div class="col-md-6" align="right">
                                    <input type="submit" value="Login" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php require 'partials/foot.php'; ?>