<?php
require_once 'includes/config.php';
/** @var PDO $pdo */

$categories = ['Digital Art', 'Illustration', 'Pixel Art', 'Sketch', 'Photography', 'Other'];

$selected_category = $_GET['category'] ?? '';
$search            = trim($_GET['q'] ?? '');

// Build query with optional filters
$where  = [];
$params = [];

if ($selected_category !== '' && in_array($selected_category, $categories, true)) {
    $where[]  = 'a.category = ?';
    $params[] = $selected_category;
}

if ($search !== '') {
    $where[]  = '(a.title LIKE ? OR u.username LIKE ?)';
    $params[] = '%' . $search . '%';
    $params[] = '%' . $search . '%';
}

$sql = '
    SELECT a.id, a.title, a.category, a.image_path, a.uploaded_at, u.username
    FROM artworks a
    JOIN users u ON a.user_id = u.id
' . ($where ? 'WHERE ' . implode(' AND ', $where) : '') . '
    ORDER BY a.uploaded_at DESC
';

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$artworks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<?php
$page_title = "Explore - Bitboard";
$extra_css  = ["explore.css"];
include "includes/head.php";
?>

<body>
<?php include "includes/header.php"; ?>

<div class="container py-4">

    <!-- Search + filter bar -->
    <form method="GET" class="explore-toolbar mb-4 d-flex flex-wrap gap-2 align-items-center">
        <div class="input-group explore-search">
            <span class="input-group-text bg-light border-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#888" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398l3.85 3.85a1 1 0 0 0 1.415-1.415l-3.868-3.833zm-5.242 1.156a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11z"/>
                </svg>
            </span>
            <input
                type="text"
                class="form-control bg-light border-0"
                name="q"
                placeholder="Search artworks or artists…"
                value="<?= htmlspecialchars($search) ?>">
        </div>

        <div class="d-flex flex-wrap gap-2 align-items-center">
            <a href="explore.php"
               class="category-pill <?= $selected_category === '' ? 'active' : '' ?>">
                All
            </a>
            <?php foreach ($categories as $cat) : ?>
                <a href="?<?= http_build_query(array_filter(['q' => $search, 'category' => $cat])) ?>"
                   class="category-pill <?= $selected_category === $cat ? 'active' : '' ?>">
                    <?= htmlspecialchars($cat) ?>
                </a>
            <?php endforeach; ?>
        </div>

        <!-- Hidden submit so pressing Enter on search works -->
        <button type="submit" class="d-none">Search</button>
    </form>

    <!-- Results summary -->
    <p class="text-muted small mb-3">
        <?php if ($search !== '' || $selected_category !== '') : ?>
            <?= count($artworks) ?> result<?= count($artworks) !== 1 ? 's' : '' ?>
            <?= $selected_category !== '' ? 'in <strong>' . htmlspecialchars($selected_category) . '</strong>' : '' ?>
            <?= $search !== '' ? ' for <strong>"' . htmlspecialchars($search) . '"</strong>' : '' ?>
            — <a href="explore.php" class="text-decoration-none text-muted">Clear filters</a>
        <?php else : ?>
            <?= count($artworks) ?> artwork<?= count($artworks) !== 1 ? 's' : '' ?> shared by the community
        <?php endif; ?>
    </p>

    <!-- Masonry grid -->
    <?php if (empty($artworks)) : ?>
        <div class="empty-state text-center py-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#ccc" viewBox="0 0 16 16" class="mb-3">
                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
            </svg>
            <h5 class="text-muted">No artworks found</h5>
            <?php if (!empty($_SESSION['user_id'])) : ?>
                <a href="upload.php" class="btn btn-brand mt-2">Be the first to upload</a>
            <?php else : ?>
                <a href="register.php" class="btn btn-brand mt-2">Join and upload</a>
            <?php endif; ?>
        </div>
    <?php else : ?>
        <div class="masonry-grid" id="masonryGrid">
            <?php foreach ($artworks as $art) : ?>
                <div class="masonry-item">
                    <div class="art-card">
                        <div class="art-card__img-wrap">
                            <img
                                src="<?= htmlspecialchars($art['image_path']) ?>"
                                alt="<?= htmlspecialchars($art['title']) ?>"
                                loading="lazy"
                                onerror="this.closest('.art-card__img-wrap').classList.add('art-card__img-wrap--broken')">
                            <div class="art-card__overlay">
                                <span class="art-card__category"><?= htmlspecialchars($art['category']) ?></span>
                            </div>
                        </div>
                        <div class="art-card__body">
                            <p class="art-card__title" title="<?= htmlspecialchars($art['title']) ?>">
                                <?= htmlspecialchars($art['title']) ?>
                            </p>
                            <p class="art-card__author">
                                <a href="?<?= http_build_query(array_filter(['q' => $art['username'], 'category' => $selected_category])) ?>"
                                   class="text-decoration-none text-muted">
                                    <?= htmlspecialchars($art['username']) ?>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</div>

<?php include "includes/footer.php"; ?>
</body>
</html>
