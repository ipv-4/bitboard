<?php
require_once 'includes/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<?php
$page_title = "About - Bitboard";
$extra_css  = ["pages.css"];
include "includes/head.php";
?>

<body>
<?php include "includes/header.php"; ?>

<!-- Hero -->
<section class="page-hero text-white d-flex align-items-center">
    <div class="container position-relative z-2">
        <div class="row justify-content-center text-center">
            <div class="col-lg-7">
                <p class="text-uppercase fw-bold letter-spacing mb-3" style="color: rgba(255,255,255,0.7);">Our story</p>
                <h1 class="display-3 fw-bold mb-4">Art deserves a better home</h1>
                <p class="lead mb-0" style="color: rgba(255,255,255,0.85);">
                    Bitboard started as a university project and grew into a community
                    where artists of every skill level share what they create.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Mission -->
<section class="py-6 container">
    <div class="row align-items-center g-5">
        <div class="col-lg-6">
            <img src="assets/images/home_page/column1.jpg" alt="Community artwork" class="img-fluid rounded-4 shadow-sm">
        </div>
        <div class="col-lg-6">
            <p class="section-label">Mission</p>
            <h2 class="fw-bold display-5 mb-4">Inspire and be inspired</h2>
            <p class="lead text-muted">
                We believe every creative deserves a space to share their work without
                noise or algorithm anxiety. Bitboard puts the artwork front and centre —
                no follower counts, no sponsored posts, just art.
            </p>
            <a href="explore.php" class="btn btn-brand mt-2 px-4 py-2 fs-5">Explore the gallery</a>
        </div>
    </div>
</section>

<!-- Values -->
<section class="py-6 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <p class="section-label">What we stand for</p>
            <h2 class="fw-bold display-5">Our values</h2>
        </div>
        <div class="row g-4">
            <?php
            $values = [
                ['🎨', 'Creativity first',   'Every feature we build starts with a single question: does this help artists create and share more freely?'],
                ['🤝', 'Community',          'Great art thrives through connection. We build tools that bring people together around shared inspiration.'],
                ['🔒', 'Privacy',            'Your account, your data. We don\'t sell personal information or track you across the web.'],
                ['⚡', 'Simplicity',         'Complex tools get in the way. We keep the experience clean so you can focus on what matters — the work.'],
            ];
            foreach ($values as [$icon, $title, $body]) : ?>
                <div class="col-sm-6 col-lg-3">
                    <div class="value-card h-100 p-4 bg-white rounded-4 shadow-sm">
                        <div class="value-icon mb-3"><?= $icon ?></div>
                        <h5 class="fw-bold mb-2"><?= $title ?></h5>
                        <p class="text-muted mb-0 small"><?= $body ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Team / origin -->
<section class="py-6 container">
    <div class="row align-items-center g-5">
        <div class="col-lg-6 order-lg-2">
            <img src="assets/images/home_page/column2.jpg" alt="Collaboration" class="img-fluid rounded-4 shadow-sm">
        </div>
        <div class="col-lg-6 order-lg-1">
            <p class="section-label">Origin</p>
            <h2 class="fw-bold display-5 mb-4">Built by students, for creators</h2>
            <p class="lead text-muted mb-3">
                Bitboard was created as part of an Internet Technologies course. What began
                as an assignment became something we actually wanted to use — so we kept
                building.
            </p>
            <p class="text-muted">
                The name comes from the idea of a digital pinboard: a bit of everything,
                all in one place. We're a small team that cares deeply about open creative
                spaces on the internet.
            </p>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="page-cta text-white text-center py-6">
    <div class="container">
        <h2 class="display-5 fw-bold mb-3">Ready to share your work?</h2>
        <p class="lead mb-4" style="color: rgba(255,255,255,0.85);">Join a growing community of artists today. It's completely free.</p>
        <a href="register.php" class="btn btn-light fw-bold px-5 py-3 rounded-pill fs-5 text-danger">Get started</a>
    </div>
</section>

<?php include "includes/footer.php"; ?>
</body>
</html>
