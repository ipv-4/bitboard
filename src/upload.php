<?php

require_once 'includes/config.php';
/** @var PDO $pdo */

// Must be logged in to upload
if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $file = $_FILES['image'] ?? null;

    // --- Validation ---
    if ($title === '') {
        $errors[] = 'Title is required.';
    } elseif (strlen($title) > 100) {
        $errors[] = 'Title must be 100 characters or fewer.';
    }

    $allowed_categories = ['Digital Art', 'Illustration', 'Pixel Art', 'Sketch', 'Photography', 'Other'];
    if (!in_array($category, $allowed_categories, true)) {
        $errors[] = 'Please select a valid category.';
    }

    if (empty($file['tmp_name'])) {
        $errors[] = 'Please select an image to upload.';
    } else {
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $mime = mime_content_type($file['tmp_name']);
        if (!in_array($mime, $allowed_types, true)) {
            $errors[] = 'Only JPEG, PNG, GIF, and WebP images are allowed.';
        } elseif ($file['size'] > 20 * 1024 * 1024) {
            $errors[] = 'Image must be 20 MB or smaller.';
        }
    }

    // --- Process upload ---
    if (empty($errors)) {
        $upload_dir = __DIR__ . '/assets/images/uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = bin2hex(random_bytes(16)) . '.' . strtolower($ext);
        $dest = $upload_dir . $filename;

        if (!move_uploaded_file($file['tmp_name'], $dest)) {
            $errors[] = 'Failed to save the image. Please try again.';
        } else {
            $image_path = 'assets/images/uploads/' . $filename;

            $stmt = $pdo->prepare(
                'INSERT INTO artworks (user_id, title, category, image_path) VALUES (?, ?, ?, ?)'
            );
            $stmt->execute([$_SESSION['user_id'], $title, $category, $image_path]);

            $success = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
$page_title = "Upload - Bitboard";
$extra_css = ["upload.css"];
include "includes/head.php";
?>

<body>
<?php include "includes/header.php"; ?>

<div class="upload-page-container">
    <div class="upload-card">
        <h2 class="fw-bold mb-1 text-center">Share your artwork</h2>
        <p class="text-muted text-center mb-4">Upload an image and let the community discover it.</p>

        <?php if ($success) : ?>
            <div class="alert alert-success rounded-3" role="alert">
                <strong>Uploaded!</strong> Your artwork has been shared.
                <a href="explore.php" class="alert-link ms-1">Browse the gallery →</a>
            </div>
        <?php endif; ?>

        <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger rounded-3" role="alert">
                <ul class="mb-0 ps-3">
                    <?php foreach ($errors as $error) : ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data" novalidate>

            <!-- Image drop zone -->
            <div class="drop-zone mb-4" id="dropZone">
                <input type="file" name="image" id="imageInput" accept="image/*" class="drop-zone__input">
                <div class="drop-zone__prompt" id="dropPrompt">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#aaa" viewBox="0 0 16 16" class="mb-2">
                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                        <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                    </svg>
                    <p class="mb-0 fw-semibold">Click or drag an image here</p>
                    <small class="text-muted">JPEG, PNG, GIF, WebP — up to 20 MB</small>
                </div>
                <img id="imagePreview" src="" alt="Preview" class="drop-zone__preview d-none">
            </div>

            <div class="mb-3">
                <label for="title" class="form-label fw-bold small ms-2">Title</label>
                <input
                    type="text"
                    class="form-control form-control-lg rounded-pill bg-light border-0 ps-4"
                    id="title"
                    name="title"
                    placeholder="Give your artwork a title"
                    maxlength="100"
                    value="<?= htmlspecialchars($_POST['title'] ?? '') ?>"
                    required>
            </div>

            <div class="mb-4">
                <label for="category" class="form-label fw-bold small ms-2">Category</label>
                <select
                    class="form-select form-select-lg rounded-pill bg-light border-0 ps-4"
                    id="category"
                    name="category"
                    required>
                    <option value="" disabled <?= empty($_POST['category']) ? 'selected' : '' ?>>Select a category</option>
                    <?php foreach (['Digital Art', 'Illustration', 'Pixel Art', 'Sketch', 'Photography', 'Other'] as $cat) : ?>
                        <option value="<?= $cat ?>" <?= (($_POST['category'] ?? '') === $cat) ? 'selected' : '' ?>>
                            <?= $cat ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-brand btn-lg w-100 rounded-pill">Upload</button>
        </form>
    </div>
</div>

<script>
    const dropZone = document.getElementById('dropZone');
    const input = document.getElementById('imageInput');
    const prompt = document.getElementById('dropPrompt');
    const preview = document.getElementById('imagePreview');

    dropZone.addEventListener('click', () => input.click());

    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.classList.add('drop-zone--over');
    });

    ['dragleave', 'dragend'].forEach(type => {
        dropZone.addEventListener(type, () => dropZone.classList.remove('drop-zone--over'));
    });

    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.classList.remove('drop-zone--over');
        if (e.dataTransfer.files.length) {
            input.files = e.dataTransfer.files;
            showPreview(e.dataTransfer.files[0]);
        }
    });

    input.addEventListener('change', () => {
        if (input.files.length) showPreview(input.files[0]);
    });

    function showPreview(file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            preview.src = e.target.result;
            preview.classList.remove('d-none');
            prompt.classList.add('d-none');
        };
        reader.readAsDataURL(file);
    }
</script>

<?php include "includes/footer.php"; ?>
</body>
</html>
