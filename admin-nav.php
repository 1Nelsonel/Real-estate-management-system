<nav class="navbar navbar-default navbar-trans navbar-expand-lg sticky-top">
    <div class="container">
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <a class="navbar-brand text-brand" href="index.php">Pin<span class="color-b">House</span></a>
        <button type="button" class="btn btn-link  navbar-toggle-box-collapse d-md-none" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
        </button>
        <?php if (isset($_SESSION["id"])) : ?>
        <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="admin-home.php">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="admin-property.php">Property</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="buyers.php">Clients</a>
                    </li>
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="sales.php">Sell</a>-->
<!--                    </li>-->

                    <li class="nav-item">
                        <a class="nav-link" href="booking-admin.php">Bookings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="report.php">Report</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-success  text-uppercase font-weight-bolder" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $_SESSION["names"] ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="logout.php">Logout</a>
<!--                            <a class="dropdown-item" href="change-password">Change password</a>-->
<!--                            <a class="dropdown-item" href="admin-profile.php?id=--><?php //echo $_SESSION['id']; ?><!--">Profile</a>-->
                        </div>
                    </li>
                </ul>
        </div>
        <?php endif; ?>
    </div>
</nav>

