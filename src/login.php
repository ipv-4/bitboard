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
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '') {
        $errors[] = 'Email is required.';
    }
    if ($password === '') {
        $errors[] = 'Password is required.';
    }

    if (empty($errors)) {
        $stmt = $pdo->prepare('SELECT id, username, password FROM users WHERE email = ? LIMIT 1');
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            session_regenerate_id(true);
            $_SESSION['user_id']  = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: explore.php');
            exit;
        } else {
            $errors[] = 'Invalid email or password.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<?php
$page_title = "Log In - Bitboard";
$extra_css = ["login.css"];
include "includes/head.php";
?>

<body>
<?php include "includes/header.php"; ?>

    <div class="auth-page-container">
        <div class="auth-card text-center">
            <a href="index.php" class="text-danger fw-bold fs-3 text-decoration-none d-block mb-3">Bitboard</a>
            <h2 class="fw-bold mb-4">Welcome back</h2>

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
                    <a href="#" class="text-dark text-decoration-none small fw-bold">Forgot password?</a>
                </div>
                <button type="submit" class="btn btn-brand btn-lg w-100 rounded-pill mb-4">Log in</button>
                <div class="small fw-bold mb-4">
                    Not on Bitboard yet? <a href="register.php" class="text-dark text-decoration-none">Sign up</a>
                </div>
                <p class="text-muted small mb-0 px-3" style="font-size: 0.75rem; line-height: 1.5;">
                    By continuing, you agree to the <a href="#" class="text-dark fw-bold text-decoration-none">Terms of Service</a>
                    and acknowledge you've read our <a href="#" class="text-dark fw-bold text-decoration-none">Privacy Policy</a>.
                </p>
            </form>
        </div>
    </div>

<?php include "includes/footer.php"; ?>
</body>
</html>
