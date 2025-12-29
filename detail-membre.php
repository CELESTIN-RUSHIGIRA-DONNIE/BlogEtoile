<?php include('inc/config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Detail membre - Etoile de Louange</title>
    <link rel="icon" type="image/png" sizes="16x16" href="admin/assets/images/favicon.png">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .underline {
            height: 4px;
            width: 80px;
            background-color: red;
            margin-bottom: 20px;

        }
    </style>
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid bg-primary px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i
                            class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2"
                        href="https://www.facebook.com/share/1G6g6YW1Xu/?mibextid=wwXIfr"><i
                            class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i
                            class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i
                            class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle"
                        href="https://www.youtube.com/@etoiledelouangeUEA"><i class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a href="register.php"><small class="me-3 text-light"><i
                                class="fa fa-user me-2"></i>Register</small></a>
                    <a href="login.php"><small class="me-3 text-light"><i
                                class="fa fa-sign-in-alt me-2"></i>Login</small></a>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle text-light" data-bs-toggle="dropdown"><small><i
                                    class="fa fa-home me-2"></i> My Dashboard</small></a>
                        <div class="dropdown-menu rounded">
                            <a href="#" class="dropdown-item"><i class="fas fa-user-alt me-2"></i> My Profile</a>
                            <a href="#" class="dropdown-item"><i class="fas fa-comment-alt me-2"></i> Inbox</a>
                            <a href="#" class="dropdown-item"><i class="fas fa-bell me-2"></i> Notifications</a>
                            <a href="#" class="dropdown-item"><i class="fas fa-cog me-2"></i> Account Settings</a>
                            <a href="#" class="dropdown-item"><i class="fas fa-power-off me-2"></i> Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0">
                <h1 class="m-0">
                    <img src="img/lg-et.jpg" width="50px" class="img-fluid" alt="Image">
                    Etoile de Louange
                </h1>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.php" class="nav-item nav-link">Acceuil</a>
                    <a href="post.php" class="nav-item nav-link">Posts</a>
                    <a href="historique.php" class="nav-item nav-link">Historique</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Plus</a>
                        <div class="dropdown-menu m-0">
                            <a href="categorie.php" class="dropdown-item active">Categorie</a>
                            <a href="galerie.php" class="dropdown-item">Galery</a>
                            <a href="testimonials.php" class="dropdown-item">Temoignage</a>
                            <a href="gallery.html" class="dropdown-item">Our Gallery</a>
                            <a href="guides.html" class="dropdown-item">Travel Guides</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404 Page</a>
                        </div>
                    </div>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar & Hero End -->
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Membre</h3>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="index.php">Acceuil</a></li>
                <li class="breadcrumb-item active text-white">Detail de membre</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- About Start -->
    <div class="container-fluid about py-5">
        <div class="container">
            <?php
            if (isset($_GET['id'])) {
                $post_id = $_GET['id'];
                $post = "SELECT * FROM membres WHERE id ='$post_id'";
                $post_run = mysqli_query($con, $post);

                if (mysqli_num_rows($post_run) > 0) {
                    $post_row = mysqli_fetch_array($post_run)
                        ?>
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-5">
                            <div class="h-100">
                                <img class="img-fluid rounded" src="admin/uploads/<?= $post_row['profile']; ?>" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7"
                            style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url(img/about-img-1.png);">
                            <h5 class="section-about-title pe-3"><?= $post_row['fonction']; ?></h5>
                            <div class="underline"></div>
                            <h2 class="mb-4">Noms : <span
                                    class="text-primary"><?= $post_row['nom'] . ' ' . $post_row['postnom'] . ' ' . $post_row['prenom']; ?></span>
                            </h2>
                            <div class="row gy-2 gx-4 mb-4">
                                <div class="col-sm-12">
                                    <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Email :
                                        <?= $post_row['email']; ?></p>
                                </div>
                                <div class="col-sm-12">
                                    <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Téléphone :
                                        <?= $post_row['telephone']; ?></p>
                                </div>
                                <div class="col-sm-12">
                                    <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Adresse d'origine :
                                        <?= $post_row['adress_origine']; ?></p>
                                </div>
                                <div class="col-sm-12">
                                    <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Adresse Actuelle :
                                        <?= $post_row['adress_actuelle']; ?></p>
                                </div>
                            </div>
                            <p class="mb-4"><?= $post_row['bios']; ?></p>
                            <p class="mb-4">ministère de chant issu de l’aumônerie protestante
                                de l’Université Evangelique en Afrique (UEA), située à Bukavu, en République Démocratique du
                                Congo (RDC).
                                rassemblant des jeunes passionnés par la louange et engagés dans la mission d’annoncer la Bonne
                                Nouvelle de Jésus-Christ à travers le chant.</p>
                        </div>
                    </div>
                    <?php

                }
            }
            ?>
        </div>
    </div>
    <!-- About End -->



    <!-- Subscribe Start -->
    <div class="container-fluid subscribe py-5">
        <div class="container text-center py-5">
            <div class="mx-auto text-center" style="max-width: 900px;">
                <h5 class="subscribe-title px-3">S'abonner</h5>
                <h2 class="text-white mb-4">Notre bulletin d'information</h2>
                <p class="text-white mb-5">Si vous désirez rejoindre notre chorale en tant que membre ou partenaire,
                    écrivez-nous par e-mail pour obtenir plus d’informations sur les modalités. Nous serons heureux de
                    vous accueillir !
                </p>
                <div class="position-relative mx-auto">
                    <input class="form-control border-primary rounded-pill w-100 py-3 ps-4 pe-5" type="text"
                        placeholder="votre email">
                    <button type="button"
                        class="btn btn-primary rounded-pill position-absolute top-0 end-0 py-2 px-4 mt-2 me-2">s'abonner</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Subscribe End -->

    <!-- Footer Start -->
    <div class="container-fluid footer py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="mb-4 text-white">Entrer en contact</h4>
                        <a href=""><i class="fas fa-home me-2"></i> 123 Panzi, BUKAVU, RDC</a>
                        <a href="mailto:etoiledelouangeuea01@gmail.com"><i class="fas fa-envelope me-2"></i>
                            etoiledelouange@gmail.com</a>
                        <a href=""><i class="fas fa-phone me-2"></i> +243 979 599 841</a>
                        <a href="" class="mb-3"><i class="fas fa-print me-2"></i> +243 997 746 535</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="mb-4 text-white">Entreprise</h4>
                        <a href=""><i class="fas fa-angle-right me-2"></i> About</a>
                        <a href=""><i class="fas fa-angle-right me-2"></i> Careers</a>
                        <a href=""><i class="fas fa-angle-right me-2"></i> Blog</a>
                        <a href=""><i class="fas fa-angle-right me-2"></i> Press</a>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-xl-6">
                    <div class="rounded">
                        <iframe class="rounded w-100" style="height: 200px;"
                            src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d1504.3828692494042!2d28.85994941018481!3d-2.540094786037498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1simani%20Panzi!5e1!3m2!1sfr!2scd!4v1766816733106!5m2!1sfr!2scd"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright text-body py-4">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6 text-center text-md-end mb-md-0">
                    <i class="fas fa-copyright me-2"></i><a class="text-white" href="#">étoile de louange UEA</a>, Tous
                    droits réservés.
                </div>
                <div class="col-md-6 text-center text-md-start">

                    Conçu par <a class="text-white" href="mailto:celestinrushigiradonnie@gmail.com">Donnie Rushigira
                        C</a>
                </div>

            </div>
        </div>
    </div>
    <!-- Copyright End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>


    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>