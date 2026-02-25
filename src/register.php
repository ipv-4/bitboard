<!DOCTYPE html>
<html lang="en">

<?php
$page_title = "Sign Up - Bitboard";
$extra_css = ["signup.css"];
include "includes/head.php";
?>

<body>
<?php
include "includes/header.php"
?>
    <div class="signup-page-container">
        <div class="signup-card text-center">
            <div class="text-danger fw-bold fs-3 mb-3">Logo</div>
            <h2 class="fw-bold mb-2">Welcome to Company</h2>
            <p class="text-muted mb-4">Find new ideas to try</p>
            <form>
                <div class="mb-3 text-start">
                    <label for="pageEmail" class="form-label fw-bold small ms-2">Email</label>
                    <input type="email" class="form-control form-control-lg rounded-pill bg-light border-0 ps-4" id="pageEmail" placeholder="Email">
                </div>
                <div class="mb-1 text-start">
                    <label for="pagePassword" class="form-label fw-bold small ms-2">Password</label>
                    <input type="password" class="form-control form-control-lg rounded-pill bg-light border-0 ps-4" id="pagePassword" placeholder="Password">
                </div>
                <div class="text-start mb-3 ms-3">
                    <small class="text-muted" style="font-size: 0.75rem;">use 8 or more Letters, numbers & Symbols</small>
                </div>
                <div class="mb-4 text-start">
                    <label for="pageBirthdate" class="form-label fw-bold small ms-2">Birthdate</label>
                    <input type="date" class="form-control form-control-lg rounded-pill bg-light border-0 ps-4" id="pageBirthdate">
                </div>
                <button type="submit" class="btn btn-brand btn-lg w-100 rounded-pill mb-3">Continue</button>
                <div class="fw-bold text-muted mb-3">OR</div>
                <button type="button" class="btn btn-outline-dark btn-lg w-100 rounded-pill d-flex align-items-center justify-content-center mb-4">
                    <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12.545,10.239v3.821h5.445c-0.712,2.315-2.647,3.972-5.445,3.972c-3.332,0-6.033-2.701-6.033-6.032s2.701-6.032,6.033-6.032c1.498,0,2.866,0.549,3.921,1.453l2.814-2.814C17.503,2.988,15.139,2,12.545,2C7.021,2,2.543,6.477,2.543,12s4.478,10,10.002,10c8.396,0,10.249-7.85,9.426-11.748L12.545,10.239z"/></svg>
                    Continue with Google
                </button>
                <p class="text-muted small mb-4 px-3" style="font-size: 0.75rem; line-height: 1.5;">
                    By continuing, you agree to <a href="#" class="text-dark fw-bold text-decoration-none">Terms of Service</a> and acknowledge you've read our <a href="#" class="text-dark fw-bold text-decoration-none">Privacy policy</a>
                </p>
                <div class="small fw-bold pb-2">
                    <a href="login.html" class="text-dark text-decoration-none">Already a member? log in</a>
                </div>
            </form>
        </div>
    </div>

<?php include "includes/footer.php"; ?>
</body>
</html>

