<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="img/icon.png">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/node_modules/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css" />
    <title>Learntact Education Pvt Ltd</title>

    <style>
    /* ---------- GENERAL STYLES ---------- */
    body {
        font-family: 'Poppins', sans-serif;
    }

    h1 {
        color: #23367a;
        font-weight: 700;
    }

    .color {
        color: #f5a21d !important;
    }

    /* ---------- NAVIGATION BAR ---------- */
    .nav-bar {
        border-bottom: 1px solid #eee;
    }

    .headerMain {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .logo {
        max-width: 200px;
        height: auto;
    }

    .menus {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 1.2rem;
        flex-wrap: wrap;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .menus-link {
        text-decoration: none;
        color: #23367a;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .menus-link:hover {
        color: #f5a21d;
    }

    .icon-round {
        background-color: #b4b4b4ff;
        color: white;
        padding: 6px 8px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* ---------- TABLE STYLES ---------- */
    .table-dark {
        background-color: #23367a !important;
    }

    .table-dark th {
        background-color: #23367a;
        color: white;
    }

    .table {
        border-radius: 8px;
        overflow: hidden;
    }

    /* ---------- FOOTER ---------- */
    .footer {
        background-color: #2c2c2cff;
    }

    .footer p,
    .footer a {
        color: white;
        margin: 0;
    }

    .footer a:hover {
        color: #f5a21d;
    }

    /* ---------- RESPONSIVE DESIGN ---------- */
    @media (max-width: 768px) {
        .headerMain {
            flex-direction: column;
            text-align: center;
        }

        .menus {
            justify-content: center;
            margin-top: 10px;
            padding: 10px 0;
        }

        .logo {
            margin-bottom: 10px;
        }

        .table-responsive {
            padding: 0 15px;
        }
    }

    .courses-section {
        padding: 60px 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .section-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .section-header h2 {
        color: #23367a;
        font-size: 36px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .section-header .underline {
        width: 80px;
        height: 4px;
        background-color: #f5a21d;
        margin: 0 auto;
    }

    .courses-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
        margin-top: 40px;
    }

    .course-card {
        background: white;
        border-radius: 8px;
        padding: 30px 25px;
        text-align: center;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-top: 4px solid #f5a21d;
    }

    .course-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
    }

    .course-icon {
        width: 60px;
        height: 60px;
        background-color: #23367a;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
    }

    .course-icon::before {
        content: "📚";
        font-size: 28px;
    }

    .course-card h3 {
        color: #23367a;
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 15px;
        line-height: 1.4;
    }

    .course-card p {
        color: #666;
        font-size: 14px;
        line-height: 1.6;
    }

    @media (max-width: 768px) {
        .section-header h2 {
            font-size: 28px;
        }

        .courses-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
    }
    </style>
</head>

<body>

    <!-- NAVIGATION -->
    <nav class="nav-bar bg-white shadow-sm">
        <div class="container">
            <div class="headerMain py-3">
                <a href="<?= site_url(); ?>">
                    <img src="<?= base_url(); ?>assets/img/logo-wide.png" alt="Learntact Logo" class="logo">
                </a>

                <ul class="menus">
                    <li class="menus-list">
                        <a href="<?= site_url('about-us'); ?>" class="menus-link">
                            <span class="icon-round"><i class="bi bi-info-circle"></i></span>
                            About Us
                        </a>
                    </li>
                    <li class="menus-list">
                        <a href="<?= site_url('contact-us'); ?>" class="menus-link">
                            <span class="icon-round"><i class="bi bi-telephone"></i></span>
                            Contact Us
                        </a>
                    </li>
                    <li class="menus-list">
                        <a href="<?= site_url('register'); ?>" class="menus-link">
                            <span class="icon-round"><i class="bi bi-pencil-square"></i></span>
                            Register
                        </a>
                    </li>
                    <li class="menus-list">
                        <a href="<?= site_url('login'); ?>" class="menus-link">
                            <span class="icon-round"><i class="bi bi-person"></i></span>
                            Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- BANNER SLIDER -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url(); ?>assets/img/new-banner-1.jpg" class="d-block w-100" alt="Banner 1">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url(); ?>assets/img/new-banner-2.jpg" class="d-block w-100" alt="Banner 2">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url(); ?>assets/img/new-banner-3.jpg" class="d-block w-100" alt="Banner 3">
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- PROGRAM FEES SECTION -->
    <!-- <section class="my-5">
        <div class="container">
            <div class="text-center mb-4">
                <h1><b>Program Fees</b></h1>
                <p class="color mb-4"><b>View all available programs and their fees</b></p>
            </div>

            <div class="table-responsive mx-auto" style="max-width: 600px;">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Program Name</th>
                            <th class="text-end">Program Fees</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-4">LEAP</td>
                            <td class="text-end px-4">₹ 7,500</td>
                        </tr>
                        <tr>
                            <td class="px-4">AEROBAY</td>
                            <td class="text-end px-4">₹ 4,500</td>
                        </tr>
                        <tr>
                            <td class="px-4">AFTERSCHOOL</td>
                            <td class="text-end px-4">₹ 0</td>
                        </tr>
                        <tr>
                            <td class="px-4">FFP</td>
                            <td class="text-end px-4">₹ 22,500</td>
                        </tr>
                        <tr>
                            <td class="px-4">JUNIOR-COLLEGE</td>
                            <td class="text-end px-4">₹ 0</td>
                        </tr>
                        <tr>
                            <td class="px-4">OTHERS</td>
                            <td class="text-end px-4">₹ 0</td>
                        </tr>
                        <tr>
                            <td class="px-4">AeroSTEAM</td>
                            <td class="text-end px-4">₹ 4,500</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section> -->

    <!--  -->
    <section class="courses-section">
        <div class="container">
            <div class="section-header">
                <h2>Courses</h2>
                <!-- <div class="underline"></div> -->
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="course-card">
                        <a href="assets/img/Future-Foundation-Program.pdf" target="_blank" rel="noopener noreferrer"
                            style="color: #23367a; text-decoration:none">
                            <div class="course-icon"></div>
                            <h3>
                                Future Foundation Program
                            </h3>
                            <p>Building tomorrow's leaders with comprehensive skill development</p>
                        </a>
                    </div>
                </div>
                <div class="col-3">
                    <div class="course-card">
                        <div class="course-icon"></div>
                        <h3>Academy For Computer Education</h3>
                        <p>Advanced computer education and technology training</p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="course-card">
                        <div class="course-icon"></div>
                        <h3>Website and Software Development</h3>
                        <p>Complete web and software development courses</p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="course-card">
                        <div class="course-icon"></div>
                        <h3>Soft Skills <br /> Training</h3>
                        <p>Essential communication and professional development</p>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-3">
                    <div class="course-card">
                        <div class="course-icon"></div>
                        <h3>Technical Training</h3>
                        <p>Hands-on technical skills for modern industries</p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="course-card">
                        <div class="course-icon"></div>
                        <h3>Medical Training</h3>
                        <p>Professional healthcare and medical education programs</p>
                    </div>
                </div>

                <div class="col-3">
                    <div class="course-card">
                        <div class="course-icon"></div>
                        <h3>Digital Marketing</h3>
                        <p>Master online marketing strategies and tools</p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="course-card">
                        <div class="course-icon"></div>
                        <h3>Govt. Projects</h3>
                        <p>Master online marketing strategies and tools</p>
                    </div>
                </div>
            </div>
        </div>


    </section>

    <!-- FOOTER -->
    <footer class="footer py-5 text-center text-white bg-dark mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <h4 class="mb-3">Useful Links</h4>
                    <div class="row justify-content-center">
                        <div class="col-md-3 col-6">
                            <a href="term-condition" class="text-white text-decoration-none">Terms & Conditions</a>
                        </div>
                        <div class="col-md-3 col-6">
                            <a href="privacy-policy" class="text-white text-decoration-none">Privacy Policy</a>
                        </div>
                        <div class="col-md-3 col-6">
                            <a href="cancellation-refund-policy" class="text-white text-decoration-none">Cancellation &
                                Refund Policy</a>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="bg-white my-3">

            <div class="row">
                <div class="col-md-12">
                    <h5 class="mb-3">Learntact</h5>
                    <p class="mb-2">Nagpur, Maharashtra 440025</p>
                    <a href="mailto:info@learntact.in" class="text-white text-decoration-none">
                        Email: info@learntact.in
                    </a>
                    <p class="mt-3 small">&copy; 2025 Learntact. All rights reserved.</p>
                </div>
            </div>

        </div>
        <!-- <div class="container">
            <div class="row">
                
            </div>
        </div> -->
    </footer>


    <!-- BOOTSTRAP JS -->
    <script src="<?= base_url(); ?>assets/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="<?= base_url(); ?>assets/js/script.js"></script>
</body>

</html>