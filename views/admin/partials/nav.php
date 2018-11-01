    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a href="#" class="navbar-brand brand-logo">Dashboard Regterink</a>
    <div class="container"></div>
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <?php if(isset($_SESSION['AdminLogin'])) : ?>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="account_details">Account</a>
                <a class="dropdown-item" href="add_user">Nieuw account</a>
                <a class="dropdown-item" href="new_password">Nieuw wachtwoord</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/logout">Loguit</a>
            </div>
            <?php elseif(isset($_SESSION['VerzorgendeLogin'])) : ?>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="/logout">Loguit</a>
                </div>
            <?php elseif(isset($_SESSION['KindLogin'])) : ?>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="/logout">Loguit</a>
                </div>
            <?php endif; ?>
        </li>
    </ul>
</nav>