
<?php $is_logged_in = !empty($_SESSION['user_id']); ?>

<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand text-danger fw-bold fs-3" href="index.php">Bitboard</a>
        <a class="nav-link fw-bold d-none d-lg-block" href="explore.php">Explore</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="business.php">Business</a>
                </li>
                <?php if ($is_logged_in) : ?>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="upload.php">Upload</a>
                    </li>
                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                        <span class="nav-link fw-bold text-muted">
                            Hi, <?= htmlspecialchars($_SESSION['username']) ?>
                        </span>
                    </li>
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        <a href="logout.php" class="btn btn-secondary-custom w-100 text-center text-decoration-none">Log out</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="#">Create</a>
                    </li>
                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                        <a href="login.php" class="btn btn-secondary-custom w-100 text-center text-decoration-none">Log in</a>
                    </li>
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        <a href="register.php" class="btn btn-brand w-100">Sign up</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
