<?php
$page_title = "Log In - Bitboard";
$extra_css = ["bootstrap.css", "login.css"];
include "includes/header.php";
?>
    
</head>
<body>

    <div class="auth-page-container">
        <div class="auth-card text-center">
            
            <div class="text-danger fw-bold fs-3 mb-3">Logo</div>
            <h2 class="fw-bold mb-4">Welcome to Company</h2>
            
            <form>
                <div class="mb-3 text-start">
                    <label for="pageLoginEmail" class="form-label fw-bold small ms-2">Email</label>
                    <input type="email" class="form-control form-control-lg rounded-pill bg-light border-0 ps-4" id="pageLoginEmail" placeholder="Email">
                </div>
                
                <div class="mb-1 text-start">
                    <label for="pageLoginPassword" class="form-label fw-bold small ms-2">Password</label>
                    <input type="password" class="form-control form-control-lg rounded-pill bg-light border-0 ps-4" id="pageLoginPassword" placeholder="Password">
                </div>
                
                <div class="text-start mb-4 ms-3">
                    <a href="#" class="text-dark text-decoration-none small fw-bold">Forgot password?</a>
                </div>
                
                <button type="submit" class="btn btn-brand btn-lg w-100 rounded-pill mb-3">Log in</button>
                
                <div class="fw-bold text-muted mb-3">OR</div>
                
                <button type="button" class="btn btn-outline-dark btn-lg w-100 rounded-pill d-flex align-items-center justify-content-center mb-4">
                    <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12.545,10.239v3.821h5.445c-0.712,2.315-2.647,3.972-5.445,3.972c-3.332,0-6.033-2.701-6.033-6.032s2.701-6.032,6.033-6.032c1.498,0,2.866,0.549,3.921,1.453l2.814-2.814C17.503,2.988,15.139,2,12.545,2C7.021,2,2.543,6.477,2.543,12s4.478,10,10.002,10c8.396,0,10.249-7.85,9.426-11.748L12.545,10.239z"/></svg>
                    Continue with Google
                </button>
                
                <div class="small fw-bold mb-4">
                    Not on Company yet? <a href="signup.html" class="text-dark text-decoration-none">Sign up</a>
                </div>
                
                <p class="text-muted small mb-0 px-3" style="font-size: 0.75rem; line-height: 1.5;">
                    By continuing, you agree to the <a href="#" class="text-dark fw-bold text-decoration-none">Terms of Service</a> and acknowledge you've read our <a href="#" class="text-dark fw-bold text-decoration-none">Privacy policy</a>
                </p>
            </form>
        </div>
    </div>
    <script src="JS/bootstrap.js"></script>
</body>
</html>