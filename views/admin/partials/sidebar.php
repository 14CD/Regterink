<ul class="sidebar navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="account_details" style="padding-bottom: 0;">
            <span>
                <?php
                    if ($_SESSION['AdminLogin']) {
                        echo "Welkom: " . ucfirst($_SESSION['AdminLogin'][0][1]);
                    } else if ($_SESSION['VerzorgendeLogin']) {
                        echo "Welkom: " . ucfirst($_SESSION['VerzorgendeLogin'][0][1]);
                    } else if ($_SESSION['OuderLogin']) {
                        echo "Welkom: " . ucfirst($_SESSION['OuderLogin'][0][1]);
                    } else if ($_SESSION['KindLogin']) {
                        echo "Welkom: " . ucfirst($_SESSION['KindLogin'][0][1]);
                    }
                ?>
                <hr style="background-color: white;">
            </span>
        </a>
    </li>
    <?php if(isset($_SESSION['AdminLogin'])) : ?>
    <li class="nav-item">
        <a class="nav-link" href="dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="user">
            <i class="fas fa-fw fa-users"></i>
            <span>Gebruikers</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="children">
            <i class="fas fa-fw fa-child"></i>
            <span>Kinderen</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="documents">
            <i class="fas fa-fw fa-folder"></i>
            <span>Documenten</span></a>
    </li>
    <?php elseif (isset($_SESSION['KindLogin'])) : ?>
    <li class="nav-item">
        <a class="nav-link" href="documents">
            <i class="fas fa-fw fa-folder"></i>
            <span>Mijn Documenten</span></a>
    </li>
    <?php elseif(isset($_SESSION['VerzorgendeLogin'])) : ?>
    <li class="nav-item">
        <a class="nav-link" href="documents">
            <i class="fas fa-fw fa-folder"></i>
            <span>Mijn Documenten</span></a>
    </li>
    <?php endif; ?>
</ul>