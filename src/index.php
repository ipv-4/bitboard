
<!DOCTYPE html>
<html lang="en">
<?php
$page_title = "Home - Bitboard";
$extra_css = ["index.css"];
$extra_js = ["script.js"];
include "includes/head.php";
?>
<body>

<?php
include "includes/header.php"
?>
 <section class="hero-section container my-5">
        <div class="row align-items-center">
            <div class="col-lg-6 hero-text pe-lg-5">
                <h1>Get your next <br> <span class="dynamic-text" id="changing-text">artistic idea</span></h1>
                <p class="lead mt-4 mb-4">Join our community of artists to share, discover, and get inspired.</p>
                <a href="register.php" class="btn btn-brand fs-5 px-4 py-2">Join for free</a>
                <div class="mt-3">
                    <a href="login.php" class="text-decoration-none text-dark fw-bold">Already have an account? Log in</a>
                </div>
            </div>

            <div class="col-lg-6 mt-5 mt-lg-0">
                <div id="artCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="3000">
                            <img src="assets/images/corousel/slide1.jpg" class="d-block w-100" alt="Art 1">
                        </div>
                        <div class="carousel-item" data-bs-interval="3000">
                            <img src="assets/images/corousel/slide2.jpg" class="d-block w-100" alt="Art 2">
                        </div>
                        <div class="carousel-item" data-bs-interval="3000">
                            <img src="assets/images/corousel/slide3.jpg" class="d-block w-100" alt="Art 3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#artCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#artCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

        </div>
    </section>

    </section>

    <section class="py-5 container" id="categories-section">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="category-image-placeholder p-4 text-center">
                    <img src="assets/images/home_page/column1.jpg" alt="Tools Categories" class="img-fluid rounded">
                </div>
            </div>
            <div class="col-lg-6 ps-lg-5">
                <h2 class="fw-bold display-5 mb-3">Bring your favourite ideas to Life</h2>
                <p class="lead mb-4">With artistic tools, you can unlock tools that spark your creativity and help you explore new possibilities.</p>
                
                <div class="mt-5 p-4 bg-light rounded-4 text-center">
                   <h3 class="fw-bold mb-3">Search by Categories</h3>
                   <button class="btn btn-brand fs-5 px-5 py-2">Try Now</button>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light" id="collaborate-section">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6 order-2 order-lg-1 pe-lg-5">
                    <h2 class="fw-bold display-5 mb-3">Collaborate with group boards</h2>
                    <p class="lead mb-4">Share your vision with others. Create group boards to plan projects, gather inspiration, and work together seamlessly.</p>
                    <button class="btn btn-secondary-custom fs-5 px-4 py-2">See an Example</button>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 mb-4 mb-lg-0">
                    <div class="collaborate-image-placeholder p-4 text-center">
                        <img src="assets/images/home_page/column2.jpg" alt="Art Collaboration" class="img-fluid rounded-4 shadow">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="signup-section position-relative text-white d-flex align-items-center">
        <div class="container position-relative z-2">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0 text-center text-lg-start">
                    <h1 class="display-3 fw-bold">Sign up to Get <br> Your Ideas</h1>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="signup-form bg-white p-4 p-md-5 rounded-4 text-dark text-center shadow-lg">
                        <h2 class="fw-bold mb-2">Welcome to Company</h2>
                        <p class="text-muted mb-4">Find new ideas to try</p>
                        <form>
                            <div class="mb-3 text-start">
                                <label for="email" class="form-label fw-bold small ms-2">Email</label>
                                <input type="email" class="form-control form-control-lg rounded-pill bg-light border-0 ps-4" id="email" placeholder="Email">
                            </div>
                            <div class="mb-3 text-start">
                                <label for="password" class="form-label fw-bold small ms-2">Password</label>
                                <input type="password" class="form-control form-control-lg rounded-pill bg-light border-0 ps-4" id="password" placeholder="Password">
                            </div>
                            <div class="mb-4 text-start">
                                <label for="birthdate" class="form-label fw-bold small ms-2">Birthdate</label>
                                <input type="date" class="form-control form-control-lg rounded-pill bg-light border-0 ps-4" id="birthdate">
                            </div>
                            <button type="submit" class="btn btn-brand btn-lg w-100 rounded-pill mb-3">Continue</button>
                            <div class="fw-bold text-muted mb-3">OR</div>
                            <button type="button" class="btn btn-outline-dark btn-lg w-100 rounded-pill d-flex align-items-center justify-content-center">
                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12.545,10.239v3.821h5.445c-0.712,2.315-2.647,3.972-5.445,3.972c-3.332,0-6.033-2.701-6.033-6.032s2.701-6.032,6.033-6.032c1.498,0,2.866,0.549,3.921,1.453l2.814-2.814C17.503,2.988,15.139,2,12.545,2C7.021,2,2.543,6.477,2.543,12s4.478,10,10.002,10c8.396,0,10.249-7.85,9.426-11.748L12.545,10.239z"/></svg>
                                Continue with Google
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include "includes/footer.php"; ?>
</body>
</html>
