<?php
require_once 'includes/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<?php
$page_title = "Business - Bitboard";
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
                <p class="text-uppercase fw-bold letter-spacing mb-3" style="color: rgba(255,255,255,0.7);">For brands &amp; studios</p>
                <h1 class="display-3 fw-bold mb-4">Reach an audience that loves art</h1>
                <p class="lead mb-5" style="color: rgba(255,255,255,0.85);">
                    Bitboard Business puts your brand in front of a highly engaged community
                    of artists, designers, and creative professionals.
                </p>
                <a href="#contact" class="btn btn-light fw-bold px-5 py-3 rounded-pill fs-5 text-danger">Get in touch</a>
            </div>
        </div>
    </div>
</section>

<!-- Stats -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4 text-center">
            <?php
            $stats = [
                ['10 K+',  'Active artists'],
                ['50 K+',  'Artworks uploaded'],
                ['6',      'Art categories'],
                ['100 %',  'Passion-driven'],
            ];
            foreach ($stats as [$number, $label]) : ?>
                <div class="col-6 col-lg-3">
                    <div class="stat-card p-4 bg-white rounded-4 shadow-sm">
                        <div class="stat-number"><?= $number ?></div>
                        <div class="stat-label"><?= $label ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- What we offer -->
<section class="py-6 container">
    <div class="text-center mb-5">
        <p class="section-label">What we offer</p>
        <h2 class="fw-bold display-5">Tools built for creative brands</h2>
    </div>
    <div class="row g-4">
        <?php
        $offerings = [
            [
                'icon' => '📌',
                'title' => 'Featured placements',
                'body' => 'Pin your content at the top of category feeds so the right audience discovers your brand organically.',
            ],
            [
                'icon' => '🗂️',
                'title' => 'Brand boards',
                'body' => 'Curate a dedicated brand board to showcase portfolios, campaigns, and product inspiration in one place.',
            ],
            [
                'icon' => '📊',
                'title' => 'Audience insights',
                'body' => 'Understand which categories and styles resonate with our community through detailed engagement analytics.',
            ],
            [
                'icon' => '🤝',
                'title' => 'Creator partnerships',
                'body' => 'Connect directly with artists on the platform for commissions, collaborations, and sponsored content.',
            ],
            [
                'icon' => '📣',
                'title' => 'Campaign tools',
                'body' => 'Run themed upload challenges and hashtag campaigns that generate authentic user-created content.',
            ],
            [
                'icon' => '🛡️',
                'title' => 'Verified badge',
                'body' => 'Build trust with a verified brand badge that signals authenticity to the Bitboard community.',
            ],
        ];
        foreach ($offerings as $item) : ?>
            <div class="col-md-6 col-lg-4">
                <div class="offer-card h-100 p-4 rounded-4 border">
                    <div class="offer-icon mb-3"><?= $item['icon'] ?></div>
                    <h5 class="fw-bold mb-2"><?= $item['title'] ?></h5>
                    <p class="text-muted mb-0 small"><?= $item['body'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Pricing -->
<section class="py-6 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <p class="section-label">Pricing</p>
            <h2 class="fw-bold display-5">Simple, transparent plans</h2>
        </div>
        <div class="row g-4 justify-content-center">
            <?php
            $plans = [
                [
                    'name'     => 'Starter',
                    'price'    => 'Free',
                    'period'   => '',
                    'desc'     => 'Perfect for independent artists and small studios just getting started.',
                    'features' => ['Public profile', 'Unlimited uploads', 'Category listing', 'Community access'],
                    'cta'      => 'Sign up free',
                    'href'     => 'register.php',
                    'featured' => false,
                ],
                [
                    'name'     => 'Pro',
                    'price'    => '$19',
                    'period'   => '/ month',
                    'desc'     => 'For brands and studios that want visibility and audience insights.',
                    'features' => ['Everything in Starter', 'Verified badge', 'Brand board', 'Audience insights', 'Featured placements (5/mo)'],
                    'cta'      => 'Start free trial',
                    'href'     => '#contact',
                    'featured' => true,
                ],
                [
                    'name'     => 'Enterprise',
                    'price'    => 'Custom',
                    'period'   => '',
                    'desc'     => 'Tailored campaigns, dedicated support, and white-glove onboarding.',
                    'features' => ['Everything in Pro', 'Creator partnerships', 'Campaign tools', 'Dedicated account manager', 'Custom integrations'],
                    'cta'      => 'Contact sales',
                    'href'     => '#contact',
                    'featured' => false,
                ],
            ];
            foreach ($plans as $plan) : ?>
                <div class="col-md-6 col-lg-4">
                    <div class="pricing-card h-100 p-4 rounded-4 <?= $plan['featured'] ? 'pricing-card--featured text-white' : 'bg-white border' ?>">
                        <p class="fw-bold mb-1 <?= $plan['featured'] ? 'text-white-50' : 'text-muted' ?> small text-uppercase"><?= $plan['name'] ?></p>
                        <div class="d-flex align-items-end mb-2">
                            <span class="pricing-number fw-bold"><?= $plan['price'] ?></span>
                            <?php if ($plan['period']) : ?>
                                <span class="ms-1 mb-1 <?= $plan['featured'] ? 'text-white-50' : 'text-muted' ?>"><?= $plan['period'] ?></span>
                            <?php endif; ?>
                        </div>
                        <p class="small mb-4 <?= $plan['featured'] ? '' : 'text-muted' ?>"><?= $plan['desc'] ?></p>
                        <ul class="list-unstyled mb-4">
                            <?php foreach ($plan['features'] as $f) : ?>
                                <li class="mb-2 small">
                                    <span class="me-2"><?= $plan['featured'] ? '✓' : '✓' ?></span><?= $f ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="<?= $plan['href'] ?>"
                           class="btn w-100 rounded-pill fw-bold <?= $plan['featured'] ? 'btn-light text-danger' : 'btn-brand' ?>">
                            <?= $plan['cta'] ?>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Contact -->
<section class="py-6 container" id="contact">
    <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
            <p class="section-label">Contact</p>
            <h2 class="fw-bold display-5 mb-3">Let's talk</h2>
            <p class="text-muted lead mb-5">Tell us about your brand and we'll follow up within one business day.</p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <form class="bg-white p-4 p-md-5 rounded-4 shadow-sm">
                <div class="mb-3">
                    <label class="form-label fw-bold small ms-2">Name</label>
                    <input type="text" class="form-control form-control-lg rounded-pill bg-light border-0 ps-4" placeholder="Your name">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold small ms-2">Work email</label>
                    <input type="email" class="form-control form-control-lg rounded-pill bg-light border-0 ps-4" placeholder="you@company.com">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold small ms-2">Company</label>
                    <input type="text" class="form-control form-control-lg rounded-pill bg-light border-0 ps-4" placeholder="Company name">
                </div>
                <div class="mb-4">
                    <label class="form-label fw-bold small ms-2">Message</label>
                    <textarea class="form-control bg-light border-0 rounded-4 ps-4 pt-3" rows="4" placeholder="Tell us about your goals…"></textarea>
                </div>
                <button type="submit" class="btn btn-brand btn-lg w-100 rounded-pill">Send message</button>
            </form>
        </div>
    </div>
</section>

<?php include "includes/footer.php"; ?>
</body>
</html>
