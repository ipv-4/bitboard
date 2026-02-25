<?php
require_once 'includes/config.php';
/** @var PDO $pdo */

// Already logged in — go home
if (!empty($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    // --- Validation ---
    if ($username === '') {
        $errors[] = 'Username is required.';
    } elseif (strlen($username) < 3 || strlen($username) > 50) {
        $errors[] = 'Username must be between 3 and 50 characters.';
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        $errors[] = 'Username may only contain letters, numbers, and underscores.';
    }

    if ($email === '') {
        $errors[] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }

    if (strlen($password) < 8) {
        $errors[] = 'Password must be at least 8 characters.';
    }

    // --- Uniqueness checks ---
    if (empty($errors)) {
        $stmt = $pdo->prepare('SELECT id FROM users WHERE email = ? LIMIT 1');
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $errors[] = 'That email address is already registered.';
        }

        $stmt = $pdo->prepare('SELECT id FROM users WHERE username = ? LIMIT 1');
        $stmt->execute([$username]);
        if ($stmt->fetch()) {
            $errors[] = 'That username is already taken.';
        }
    }

    // --- Insert ---
    if (empty($errors)) {
        $hashed = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $pdo->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
        $stmt->execute([$username, $email, $hashed]);

        $new_id = (int) $pdo->lastInsertId();
        session_regenerate_id(true);
        $_SESSION['user_id']  = $new_id;
        $_SESSION['username'] = $username;
        header('Location: explore.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<?php
$page_title = "Sign Up - Bitboard";
$extra_css = ["signup.css"];
include "includes/head.php";
?>

<body>
<?php include "includes/header.php"; ?>

    <div class="signup-page-container">
        <div class="signup-card text-center">
            <a href="index.php" class="text-danger fw-bold fs-3 text-decoration-none d-block mb-3">Bitboard</a>
            <h2 class="fw-bold mb-2">Create your account</h2>
            <p class="text-muted mb-4">Find new ideas to try</p>

            <?php if (!empty($errors)) : ?>
                <div class="alert alert-danger rounded-3 text-start" role="alert">
                    <ul class="mb-0 ps-3">
                        <?php foreach ($errors as $error) : ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST" novalidate>
                <div class="mb-3 text-start">
                    <label for="username" class="form-label fw-bold small ms-2">Username</label>
                    <input
                        type="text"
                        class="form-control form-control-lg rounded-pill bg-light border-0 ps-4"
                        id="username"
                        name="username"
                        placeholder="Username"
                        value="<?= htmlspecialchars($_POST['username'] ?? '') ?>"
                        maxlength="50"
                        required>
                </div>
                <div class="mb-3 text-start">
                    <label for="email" class="form-label fw-bold small ms-2">Email</label>
                    <input
                        type="email"
                        class="form-control form-control-lg rounded-pill bg-light border-0 ps-4"
                        id="email"
                        name="email"
                        placeholder="Email"
                        value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                        required>
                </div>
                <div class="mb-1 text-start">
                    <label for="password" class="form-label fw-bold small ms-2">Password</label>
                    <input
                        type="password"
                        class="form-control form-control-lg rounded-pill bg-light border-0 ps-4"
                        id="password"
                        name="password"
                        placeholder="Password"
                        required>
                </div>
                <div class="text-start mb-4 ms-3">
                    <small class="text-muted" style="font-size: 0.75rem;">Use 8 or more characters — letters, numbers &amp; symbols.</small>
                </div>
                <button type="submit" class="btn btn-brand btn-lg w-100 rounded-pill mb-3">Continue</button>
                <p class="text-muted small mb-4 px-3" style="font-size: 0.75rem; line-height: 1.5;">
                    By continuing, you agree to the <a href="#" class="text-dark fw-bold text-decoration-none">Terms of Service</a>
                    and acknowledge you've read our <a href="#" class="text-dark fw-bold text-decoration-none">Privacy Policy</a>.
                </p>
                <div class="small fw-bold pb-2">
                    Already a member? <a href="login.php" class="text-dark text-decoration-none">Log in</a>
                </div>
            </form>
        </div>
    </div>

<?php include "includes/footer.php"; ?>
</body>
</html>
