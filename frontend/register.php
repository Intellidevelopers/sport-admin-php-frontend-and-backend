
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from pixner.net/sportsodds1/sportsbet/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Apr 2024 20:22:38 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Betting HTML Template</title>
    <!--Shortcut Icon-->
    <link rel="icon" href="assets/img/logo/favicon.png">
    <!--Bootstrap Min Css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--Macnific Popup Css-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!--Owl Carousel min Css-->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <!--Owl theme Default Css-->
    <link rel="stylesheet" href="assets/css/owl.theme.default.css">
    <!--nice select Css-->
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <!--Glyphter Css-->
    <link rel="stylesheet" href="assets/glyphter-font/css/Glyphter.css">
    <!--animation Css-->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!--Fontawsome all min Css-->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!--Main custom Css-->
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <!--Mian Body Area Start-->

    <!--Header Here-->
    <header class="header-section dashboard__header">
        <div class="container p-0">
            <div class="header-wrapper">
                <div class="menu__left__wrap">
                    <div class="logo-menu px-2">
                        <a href="index.html" class="logo">
                            <img src="assets/img/logo/logo.png" alt="logo">
                        </a>
                    </div>
                    <ul class="main-menu">
                        <li>
                            <a href="lives.html">
                                <span>Live</span>
                            </a>
                        </li>
                        <li>
                            <a href="sportsbetting.html">
                                <span>Sports Betting</span>
                            </a>
                        </li>
                        <li>
                            <a href="casino.html" class="active">
                                <span>Casino</span>
                            </a>
                        </li>
                        <li>
                            <a href="#lucky">
                                <span>Lucky Drops</span>
                            </a>
                        </li>
                        <li>
                            <a href="livecasino.html">
                                <span>Live Casino</span>
                            </a>
                        </li>
                        <li>
                            <a href="promotions.html">
                                <span>Promotions</span>
                            </a>
                        </li>
                        <li class="cmn-grp">
                            <span class="cmn--btn">
                                <span class="rela">Deposit</span>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="dashboar__wrap">
                    <div class="items d__text">
                        <span class="small">Your balance</span>
                        <h6>$9.22</h6>
                    </div>
                    <div class="items d__cmn">
                        <a href="#0" class="cmn--btn">
                            <span>Deposit</span>
                        </a>
                    </div>
                    <div class="items dashboar__social">
                        <a href="#0" class="icons">
                            <i class="icon-gift"></i>
                            <span class="count">
                                2
                            </span>
                        </a>
                        <a href="#0" class="icons">
                            <i class="icon-message"></i>
                            <span class="count">
                                2
                            </span>
                        </a>
                        <div class="custom-dropdown">
                            <div class="custom-dropdown__user" data-set="custom-dropdown">
                                <a href="#0" class="icons">
                                    <i class="icon-user text-white"></i>
                                </a>
                            </div>
                            <div class="custom-dropdown__content">
                              <div class="custom-dropdown__body">
                                <ul class="custom-dropdown__list">
                                  <li>
                                    <a href="dashboard.html" class="custom-dropdown__body-link">
                                      <span class="custom-dropdown__body-icon">
                                        <i class="fas fa-layer-group"></i>
                                      </span>
                                      <span class="custom-dropdown__body-text">
                                        Dashboard
                                      </span>
                                    </a>
                                  </li>
                                  <li>
                                    <a href="#0" class="custom-dropdown__body-link">
                                      <span class="custom-dropdown__body-icon">
                                        <i class="fas fa-cog"></i>
                                      </span>
                                      <span class="custom-dropdown__body-text">
                                        Settings
                                      </span>
                                    </a>
                                  </li>
                                  <li>
                                    <a href="#0" class="custom-dropdown__body-link">
                                      <span class="custom-dropdown__body-icon">
                                        <i class="fas fa-sign-out-alt"></i>
                                      </span>
                                      <span class="custom-dropdown__body-text">
                                        Logout
                                      </span>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                    </div>
                    <div class="lang d-flex align-items-center px-2">
                        <div class="header-bar d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--Header End-->
    
    <section class="dashboard__body mt-5 mb-5"> 
        <div class="container">
            <div class="register__modal">
                <div class="modal-content-custom">
                    <div class="modal-body-custom">
                        <div class="row align-items-center g-4">
                            <div class="col-lg-6">
                                <div class="modal__right">
                                    <div class="tab-content" id="myTabContent2">
                                        <div class="tab-pane fade show active" id="contact2" role="tabpanel">
                                            
                                            <div class="form__tabs__wrap">
                                            <div class="container">
        <?php
        if (isset($_POST["submit"])) {
           $fullName = $_POST["fullname"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeat_password"];
           
          // $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
           }
           require_once "database.php";
           $sql = "SELECT * FROM users WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO users (full_name, email, password) VALUES ( ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$fullName, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>
        <form action="register.php" method="post">
            <div class="form__grp">
                <input type="text" class="form-control" name="fullname" placeholder="Full Name:">
            </div>
            <div class="form__grp">
                <input type="emamil" class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="form__grp">
                <input type="password" class="form-control" name="password" placeholder="Password:">
            </div>
            <div class="form__grp">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">
            </div>
            <div class="create__btn">
                <input type="submit" class="cmn--btn" style="width: 100%; border: none; color: #ffffff; font-size: 16px;" value="Register" name="submit">
            </div>
            <p>Already Registered <a href="login.php">Login Here</a></p>
        </form>
        <div>
      </div>
    </div>
    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--footer Bottom Menu-->
        <ul class="footer__menu d-lg-none">
            <li>
                <a href="sportsbetting.html" class="d-grid justify-content-center">
                   <span><i class="fas fa-table-tennis"></i></span>
                    <span class="texta">Sports</span>
                </a>
            </li>
            <li>
                <a href="#0" class="d-grid justify-content-center" data-bs-toggle="modal" data-bs-target="#eventsp">
                   <span><i class="fa-solid fa-gift"></i></span>
                    <span class="texta">Events</span>
                </a>
            </li>
            <li class="header-bartwo d-lg-none">
                <span class="bars"><i class="fas fa-bars"></i></span>
                <span class="cros"> <i class="fa-solid fa-xmark"></i></span>
            </li> 
            <li>
                <a href="#0" class="d-grid justify-content-center" data-bs-toggle="modal" data-bs-target="#betsp">
                   <span> <i class="fas fa-ticket-alt"></i></span>
                    <span class="texta">My Bet</span>
                </a>
            </li>
            <li>
                <a href="dashboard.html" class="d-grid justify-content-center">
                   <span> <i class="far fa-user-circle"></i></span>
                    <span class="texta"> Account</span>
                </a>
            </li>
        </ul>
        <!--footer Bottom Menu-->
    </section>

    <footer class="footer__section pt-60">
        <div class="container">
            <div class="footer__top pb-60">
                <div class="row g-5">
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.9s">
                        <div class="widget__items">
                            <div class="footer-head">
                                <a href="#0" class="footer-logo">
                                    <img src="assets/img/logo/footerlogo.png" alt="f-logo">
                                </a>
                            </div>
                            <div class="content-area">
                                <p>
                                    Lorem ipsum dolor sit of the cart amet, consectetur adipiscing elit. I talk out of the moon.
                                </p>
                                <h6>
                                    Follow Us
                                </h6>
                                <ul class="social">
                                    <li>
                                        <a href="#0" class="icon">
                                            <i class="fa-brands fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#0" class="icon">
                                            <i class="fa-brands fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#0" class="icon">
                                            <i class="fa-brands fa-linkedin-in"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#0" class="icon">
                                            <i class="fa-brands fa-twitter"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-2 col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="widget__items">
                            <div class="footer-head">
                            <h3 class="title">
                                Company
                            </h3>
                            </div>
                            <div class="content-area">
                            <ul class="quick-link">
                                <li>
                                    <a href="index.html">
                                        <img src="assets/img/footer/rightarrow.png" alt="angle"> Home
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                    <img src="assets/img/footer/rightarrow.png" alt="angle"> Slots
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                    <img src="assets/img/footer/rightarrow.png" alt="angle"> Tournament
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                    <img src="assets/img/footer/rightarrow.png" alt="angle"> Jackpots
                                    </a>
                                </li>
                                <li>
                                    <a href="livecasino.html">
                                    <img src="assets/img/footer/rightarrow.png" alt="angle"> Live Games
                                    </a>
                                </li>
                            </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-6 col-sm-3 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="widget__items">
                            <div class="footer-head">
                                <h3 class="title">
                                    Support
                                </h3>
                            </div>
                            <div class="content-area">
                                <ul class="quick-link">
                                    <li>
                                        <a href="contact-preference.html">
                                            <img src="assets/img/footer/rightarrow.png" alt="angle"> Faqs
                                        </a>
                                    </li>
                                    <li>
                                        <a href="contact-preference.html">
                                        <img src="assets/img/footer/rightarrow.png" alt="angle"> Support
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-5 col-lg-4 col-md-6 col-sm-9 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="widget__items">
                            <div class="footer-head">
                                <h3 class="title">
                                        Subscribe Our Newslatter
                                </h3>
                            </div>
                            
                            <p>
                                Proin mauris ligula, pretium eu est ut, imperdiet imperdiet massa. Nullam sodales ut orci vehicula aliquam. Suspendisse.
                            </p>
                            <div class="content-area">
                                <form action="#0">
                                    <input type="text" placeholder="Enter Your Email address">
                                    <button class="cmn--btn" type="submit">
                                        <span>Subscribe</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__bottom">
                <p class="text-white">
                        Copyright &copy; 2024, <a href="index.html" class="text--base">SportOdds</a> - All Right Reserved
                </p>
                <ul class="bottom__ling">
                    <li>
                        <a href="javascript:void(0)" class="text-white">
                            Affiliate program
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="text-white">
                            Terms & conditions
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="text-white">
                            Bonus terms & conditions
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer> 

    <!--Mian Body Area Start-->

   
    <!--MyBets Start-->
    <div class="modal mybets__modal" id="betsp" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog  modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="right__site__section">
                    <div class="betslip__wrap">
                        <h5 class="betslip__title">
                            Betslip
                        </h5>
                        <div class="nav" id="nav-tabr" role="tablist">
                            <button class="nav-link " id="nav-home-tabr" data-bs-toggle="tab" data-bs-target="#nav-homer" type="button" role="tab"  aria-selected="true">Single</button>
                            <button class="nav-link active" id="nav-profile-tabr" data-bs-toggle="tab" data-bs-target="#nav-profiler" type="button" role="tab"  aria-selected="false">Multiple</button>
                            <button class="nav-link" id="nav-contact-tabr" data-bs-toggle="tab" data-bs-target="#nav-contactr" type="button" role="tab"  aria-selected="false">System</button>
                        </div>
                        <div class="tab-content" id="nav-tabContentr">
                            <div class="tab-pane fade text-white " id="nav-homer" role="tabpanel" aria-labelledby="nav-home-tabr" tabindex="0">
                                <div class="multiple__components">
                                    <div class="multiple__items">
                                        <div class="multiple__head">
                                            <div class="multiple__left">
                                                <span class="icons">
                                                    <i class="icon-football"></i>
                                                </span>
                                                <span>
                                                    Real Kashmir vs Trau FC
                                                </span>
                                            </div>
                                            <a href="#0" class="cros">
                                                <i class="icon-cross"></i>
                                            </a>
                                        </div>
                                        <div class="multiple__point">
                                            <span class="pbox">
                                                50.2
                                            </span>
                                            <span class="rightname">
                                                <span class="fc">
                                                    Trau FC
                                                </span>
                                                <span class="point">
                                                    1x2
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="total__odds">
                                        <div class="total__head">
                                            <h6 class="odd">
                                                Total Odds
                                            </h6>
                                            <span>
                                                25
                                            </span>
                                        </div>
                                        <div class="wrapper">
                                            <div class="result">
                                                <span>Stake amount, $</span>
                                                <span class="result">0.00 $</span>
                                            </div>
                                            <div class="buttons">
                                              <button type="button">5</button>
                                              <button type="button">10</button>
                                              <button type="button">50</button>
                                            </div>
                                          </div>
                                    </div>
                                    <div class="possible__pay">
                                        <span>Possible Payout</span>
                                        <span>0.00$</span>
                                    </div>
                                    <a href="signin.html" class="cmn--btn2">
                                        <span>Sign In & Bet</span>
                                    </a>
                                </div>
                                <div class="setting__area">
                                    <div class="tab-content" id="nav-tabContentsettingr">
                                        <div class="tab-pane fade text-white" id="nav-homesettr" role="tabpanel" aria-labelledby="nav-home-tabsettingr" tabindex="0">
                                           <div class="sign__bets__wrap">
                                                <h5 class="betslip__title">
                                                    Betslip
                                                </h5>
                                                <div class="sign__boxes">
                                                    <div class="content">
                                                        <h6>
                                                            Erase Betslip
                                                        </h6>
                                                        <p>
                                                            Are you sure you want to erase Betslip?
                                                        </p>
                                                        <div class="btn__grp">
                                                            <a href="#0" class="cmn--btn">
                                                                <span>No</span>
                                                            </a>
                                                            <a href="#0" class="cmn--btn2">
                                                                <span>Accept</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                           </div>
                                        </div>
                                        <div class="tab-pane fade text-white" id="nav-homeett2r" role="tabpanel" aria-labelledby="nav-home-tabsetting2r" tabindex="0">
                                            <div class="sign__bets__wrap">
                                                <h5 class="betslip__title">
                                                    Betslip
                                                </h5>
                                                <div class="setting__boxes">
                                                   <div class="setting__boxes__head">
                                                        <span>Accept Changes automatically?</span>
                                                        <a href="#0">
                                                            <i class="icon-cross"></i>
                                                        </a>
                                                   </div>
                                                   <div class="check__wrap">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="check11">
                                                            <label class="form-check-label" for="check11">
                                                                Accept any odds changes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="check2oa">
                                                            <label class="form-check-label" for="check2oa">
                                                                Only accept increased odds
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="check3a">
                                                            <label class="form-check-label" for="check3a">
                                                                Always ask
                                                            </label>
                                                        </div>
                                                   </div>
                                                </div>
                                           </div>
                                        </div>
                                    </div>
                                    <div class="nav" id="nav-tabsetingr" role="tablist">
                                        <button class="nav-link" id="nav-home-tabsettingr" data-bs-toggle="tab" data-bs-target="#nav-homesettr" type="button" role="tab"  aria-selected="true">
                                            <span class="icons"><i class="icon-trush"></i></span>
                                            <span class="text">
                                                Sign IN & Bet
                                            </span>
                                        </button>
                                        <button class="nav-link" id="nav-home-tabsetting2r" data-bs-toggle="tab" data-bs-target="#nav-homeett2r" type="button" role="tab"  aria-selected="false">
                                            <span class="icons"><i class="icon-setting"></i></span>
                                            <span class="text">
                                                Settings
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade text-white show active" id="nav-profiler" role="tabpanel" aria-labelledby="nav-profile-tabr" tabindex="0">
                                <div class="multiple__components">
                                    <div class="multiple__items">
                                        <div class="multiple__head">
                                            <div class="multiple__left">
                                                <span class="icons">
                                                    <i class="icon-football"></i>
                                                </span>
                                                <span>
                                                    Real Kashmir vs Trau FC
                                                </span>
                                            </div>
                                            <a href="#0" class="cros">
                                                <i class="icon-cross"></i>
                                            </a>
                                        </div>
                                        <div class="multiple__point">
                                            <span class="pbox">
                                                50.2
                                            </span>
                                            <span class="rightname">
                                                <span class="fc">
                                                    Trau FC
                                                </span>
                                                <span class="point">
                                                    1x2
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="multiple__items">
                                        <div class="multiple__head">
                                            <div class="multiple__left">
                                                <span class="icons">
                                                    <i class="icon-football"></i>
                                                </span>
                                                <span>
                                                    Stodder, Timo vs Kopriva, Vit
                                                </span>
                                            </div>
                                            <a href="#0" class="cros">
                                                <i class="icon-cross"></i>
                                            </a>
                                        </div>
                                        <div class="multiple__point">
                                            <span class="pbox">
                                               3.66
                                            </span>
                                            <span class="rightname">
                                                <span class="fc">
                                                    Stodder, Timo
                                                </span>
                                                <span class="point">
                                                   Winner
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="total__odds">
                                        <div class="total__head">
                                            <h6 class="odd">
                                                Total Odds
                                            </h6>
                                            <span>
                                                25
                                            </span>
                                        </div>
                                        <div class="wrapper">
                                            <div class="result">
                                                <span>Stake amount, $</span>
                                                <span class="result">0.00 $</span>
                                            </div>
                                            <div class="buttons">
                                              <button type="button">5</button>
                                              <button type="button">10</button>
                                              <button type="button">50</button>
                                            </div>
                                          </div>
                                    </div>
                                    <a href="signin.html" class="cmn--btn2">
                                        <span>Sign In & Bet</span>
                                    </a>
                                </div>
                            </div>
                            <div class="tab-pane fade text-white" id="nav-contactr" role="tabpanel" aria-labelledby="nav-contact-tabr" tabindex="0">
                                <div class="multiple__components">
                                    <div class="multiple__items">
                                        <div class="multiple__head">
                                            <div class="multiple__left">
                                                <span class="icons">
                                                    <i class="icon-football"></i>
                                                </span>
                                                <span>
                                                    Real Kashmir vs Trau FC
                                                </span>
                                            </div>
                                            <a href="#0" class="cros">
                                                <i class="icon-cross"></i>
                                            </a>
                                        </div>
                                        <div class="multiple__point">
                                            <span class="pbox">
                                                50.2
                                            </span>
                                            <span class="rightname">
                                                <span class="fc">
                                                    Trau FC
                                                </span>
                                                <span class="point">
                                                    1x2
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="multiple__items">
                                        <div class="multiple__head">
                                            <div class="multiple__left">
                                                <span class="icons">
                                                    <i class="icon-football"></i>
                                                </span>
                                                <span>
                                                    Stodder, Timo vs Kopriva, Vit
                                                </span>
                                            </div>
                                            <a href="#0" class="cros">
                                                <i class="icon-cross"></i>
                                            </a>
                                        </div>
                                        <div class="multiple__point">
                                            <span class="pbox">
                                               3.66
                                            </span>
                                            <span class="rightname">
                                                <span class="fc">
                                                    Stodder, Timo
                                                </span>
                                                <span class="point">
                                                   Winner
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="total__odds">
                                        <div class="total__head">
                                            <h6 class="odd">
                                                Total Odds
                                            </h6>
                                            <span>
                                                25
                                            </span>
                                        </div>
                                        <div class="wrapper">
                                            <div class="result">
                                                <span>Stake amount, $</span>
                                                <span class="result">0.00 $</span>
                                            </div>
                                            <div class="buttons">
                                              <button type="button">5</button>
                                              <button type="button">10</button>
                                              <button type="button">50</button>
                                            </div>
                                          </div>
                                    </div>
                                    <a href="signin.html" class="cmn--btn2">
                                        <span>Sign In & Bet</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--MyBets End-->

    <!--MyBets Start-->
    <div class="modal event__modal" id="eventsp" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog  modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="left__site__section">
                    <div class="tab-content" id="myTabContentmainevent">
                        <div class="tab-pane text-white fade show active" id="mainTabevent" role="tabpanel" tabindex="0">
                            <div class="popular__events__body">
                                <div class="container-fluid p-0">
                                    <div class="row g-0">
                                        <div class="col-xxl-2 col-xl-3 col-lg-3">
                                            <div class="popular__events__left">
                                                <div class="popular__events__head">
                                                    <h5>
                                                        Popular events
                                                    </h5>
                                                    <ul>
                                                        <li>
                                                            <span><img src="assets/img/leftmenu/cup.png" alt="img"></span>
                                                            <span>Eorld Cup 2022</span>
                                                        </li>
                                                        <li>
                                                            <span><img src="assets/img/leftmenu/europ.png" alt="img"></span>
                                                            <span>Euroleague. Season 22/23</span>
                                                        </li>

                                                    </ul>
                                                </div>
                                                <div class="star__wrap">
                                                    <span><img src="assets/img/leftmenu/start.png" alt="img"></span>
                                                    <span>Favorites</span>
                                                </div>
                                                <div class="prematch__wrap">
                                                    <div class="nav" id="nav-tabpreevent" role="tablist">
                                                        <button class="nav-link active" id="nav-home-tabpreevent" data-bs-toggle="tab" data-bs-target="#nav-homepreevent" type="button" role="tab"  aria-selected="true">Live</button>
                                                        <button class="nav-link " id="nav-profile-tabpreevent" data-bs-toggle="tab" data-bs-target="#nav-profilepreevent" type="button" role="tab"  aria-selected="false">Prematch</button>
                                                    </div>
                                                    <div class="tab-content" id="nav-tabContentpreevent">
                                                        <div class="tab-pane fade text-white show active" id="nav-homepre" role="tabpanel" tabindex="0">
                                                            <div class="prematch__scopre this____parent__remove sidebar-livematch">
                                                              <div class="accordion" id="accordionExample">
                                                                  <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="headingOne">
                                                                      <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                        <span class="d-flex align-items-center gap-2 left-chokoboko">
                                                                          <span class="mt-1"><i class="icon-football"></i></span>
                                                                          <span class="score text-white">
                                                                              Soccer
                                                                          </span>
                                                                        </span>
                                                                        <span class="d-flex align-items-center gap-1 icon-rightfs10">
                                                                          2
                                                                          <i class="fa-solid fa-chevron-down"></i>
                                                                        </span>
                                                                      </button>
                                                                    </h2>
                                                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                                      <div class="accordion-body">
                                                                        <div class="d-flex fs14 b__bottom pb-2 align-items-center justify-content-between text-white">
                                                                          <span>
                                                                              Brazil 
                                                                          </span>
                                                                          <span>
                                                                              Vs
                                                                          </span>
                                                                          <span>
                                                                              Argentina
                                                                          </span>
                                                                        </div>
                                                                        <div class="d-flex fs14 b__bottom pb-2 pt-2 align-items-center justify-content-between text-white">
                                                                          <span>
                                                                              Canada 
                                                                          </span>
                                                                          <span>
                                                                              Vs
                                                                          </span>
                                                                          <span>
                                                                              Portugal
                                                                          </span>
                                                                        </div>
                                                                        <div class="d-flex fs14 align-items-center pt-2 justify-content-between text-white">
                                                                          <span>
                                                                              Spain 
                                                                          </span>
                                                                          <span>
                                                                              Vs
                                                                          </span>
                                                                          <span>
                                                                              Germany
                                                                          </span>
                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                  <div class="accordion-item">
                                                                      <h2 class="accordion-header" id="headingtwos">
                                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsetwos" aria-expanded="true" aria-controls="collapsetwos">
                                                                          <span class="d-flex align-items-center gap-2 left-chokoboko">
                                                                            <span class="mt-1"><i class="icon-tennis"></i></span>
                                                                            <span class="score text-white">
                                                                                Tennis
                                                                            </span>
                                                                          </span>
                                                                          <span class="d-flex align-items-center gap-1 icon-rightfs10">
                                                                            4
                                                                            <i class="fa-solid fa-chevron-down"></i>
                                                                          </span>
                                                                        </button>
                                                                      </h2>
                                                                      <div id="collapsetwos" class="accordion-collapse collapse" aria-labelledby="headingtwos" data-bs-parent="#accordionExample">
                                                                        <div class="accordion-body">
                                                                          <div class="d-flex fs14 b__bottom pb-2 align-items-center justify-content-between text-white">
                                                                            <span>
                                                                                Brazil 
                                                                            </span>
                                                                            <span>
                                                                                Vs
                                                                            </span>
                                                                            <span>
                                                                                Argentina
                                                                            </span>
                                                                          </div>
                                                                          <div class="d-flex fs14 b__bottom pb-2 pt-2 align-items-center justify-content-between text-white">
                                                                            <span>
                                                                                Canada 
                                                                            </span>
                                                                            <span>
                                                                                Vs
                                                                            </span>
                                                                            <span>
                                                                                Portugal
                                                                            </span>
                                                                          </div>
                                                                          <div class="d-flex fs14 align-items-center pt-2 justify-content-between text-white">
                                                                            <span>
                                                                                Spain 
                                                                            </span>
                                                                            <span>
                                                                                Vs
                                                                            </span>
                                                                            <span>
                                                                                Germany
                                                                            </span>
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                  </div>
                                                                  <div class="accordion-item">
                                                                      <h2 class="accordion-header" id="headingthrees">
                                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsethrees" aria-expanded="true" aria-controls="collapsethrees">
                                                                          <span class="d-flex align-items-center gap-2 left-chokoboko">
                                                                            <span class="mt-1"><i class="icon-basketball"></i></span>
                                                                            <span class="score text-white">
                                                                                Basketball
                                                                            </span>
                                                                          </span>
                                                                          <span class="d-flex align-items-center gap-1 icon-rightfs10">
                                                                            4
                                                                            <i class="fa-solid fa-chevron-down"></i>
                                                                          </span>
                                                                        </button>
                                                                      </h2>
                                                                      <div id="collapsethrees" class="accordion-collapse collapse" aria-labelledby="headingthrees" data-bs-parent="#accordionExample">
                                                                        <div class="accordion-body">
                                                                          <div class="d-flex fs14 b__bottom pb-2 align-items-center justify-content-between text-white">
                                                                            <span>
                                                                                Brazil 
                                                                            </span>
                                                                            <span>
                                                                                Vs
                                                                            </span>
                                                                            <span>
                                                                                Argentina
                                                                            </span>
                                                                          </div>
                                                                          <div class="d-flex fs14 b__bottom pb-2 pt-2 align-items-center justify-content-between text-white">
                                                                            <span>
                                                                                Canada 
                                                                            </span>
                                                                            <span>
                                                                                Vs
                                                                            </span>
                                                                            <span>
                                                                                Portugal
                                                                            </span>
                                                                          </div>
                                                                          <div class="d-flex fs14 align-items-center pt-2 justify-content-between text-white">
                                                                            <span>
                                                                                Spain 
                                                                            </span>
                                                                            <span>
                                                                                Vs
                                                                            </span>
                                                                            <span>
                                                                                Germany
                                                                            </span>
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                  </div>
                                                                  <div class="accordion-item">
                                                                      <h2 class="accordion-header" id="headingfour">
                                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
                                                                          <span class="d-flex align-items-center gap-2 left-chokoboko">
                                                                            <span class="mt-1"><i class="icon-volly"></i></span>
                                                                            <span class="score text-white">
                                                                                Volleyball
                                                                            </span>
                                                                          </span>
                                                                          <span class="d-flex align-items-center gap-1 icon-rightfs10">
                                                                            3
                                                                            <i class="fa-solid fa-chevron-down"></i>
                                                                          </span>
                                                                        </button>
                                                                      </h2>
                                                                      <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour" data-bs-parent="#accordionExample">
                                                                        <div class="accordion-body">
                                                                          <div class="d-flex fs14 b__bottom pb-2 align-items-center justify-content-between text-white">
                                                                            <span>
                                                                                Brazil 
                                                                            </span>
                                                                            <span>
                                                                                Vs
                                                                            </span>
                                                                            <span>
                                                                                Argentina
                                                                            </span>
                                                                          </div>
                                                                          <div class="d-flex fs14 b__bottom pb-2 pt-2 align-items-center justify-content-between text-white">
                                                                            <span>
                                                                                Canada 
                                                                            </span>
                                                                            <span>
                                                                                Vs
                                                                            </span>
                                                                            <span>
                                                                                Portugal
                                                                            </span>
                                                                          </div>
                                                                          <div class="d-flex fs14 align-items-center pt-2 justify-content-between text-white">
                                                                            <span>
                                                                                Spain 
                                                                            </span>
                                                                            <span>
                                                                                Vs
                                                                            </span>
                                                                            <span>
                                                                                Germany
                                                                            </span>
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                  </div>
                                                                  <div class="accordion-item">
                                                                      <h2 class="accordion-header" id="headingfive">
                                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="true" aria-controls="collapsefive">
                                                                          <span class="d-flex align-items-center gap-2 left-chokoboko">
                                                                            <span class="mt-1"><i class="icon-handball"></i></span>
                                                                            <span class="score text-white">
                                                                                Handball
                                                                            </span>
                                                                          </span>
                                                                          <span class="d-flex align-items-center gap-1 icon-rightfs10">
                                                                            5
                                                                            <i class="fa-solid fa-chevron-down"></i>
                                                                          </span>
                                                                        </button>
                                                                      </h2>
                                                                      <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingfive" data-bs-parent="#accordionExample">
                                                                        <div class="accordion-body">
                                                                          <div class="d-flex fs14 b__bottom pb-2 align-items-center justify-content-between text-white">
                                                                            <span>
                                                                                Brazil 
                                                                            </span>
                                                                            <span>
                                                                                Vs
                                                                            </span>
                                                                            <span>
                                                                                Argentina
                                                                            </span>
                                                                          </div>
                                                                          <div class="d-flex fs14 b__bottom pb-2 pt-2 align-items-center justify-content-between text-white">
                                                                            <span>
                                                                                Canada 
                                                                            </span>
                                                                            <span>
                                                                                Vs
                                                                            </span>
                                                                            <span>
                                                                                Portugal
                                                                            </span>
                                                                          </div>
                                                                          <div class="d-flex fs14 align-items-center pt-2 justify-content-between text-white">
                                                                            <span>
                                                                                Spain 
                                                                            </span>
                                                                            <span>
                                                                                Vs
                                                                            </span>
                                                                            <span>
                                                                                Germany
                                                                            </span>
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        <div class="tab-pane fade text-white " id="nav-profilepreevent" role="tabpanel" aria-labelledby="nav-profile-tabpreevent" tabindex="0">
                                                            <div class="multiple__components">
                                                                <div class="prematch__scopre">
                                                                        <a href="sportsbetting.html" class="prescore__items">
                                                                            <div class="prescore__left">
                                                                                <span><i class="icon-football"></i></span>
                                                                                <span class="score">
                                                                                    Soccer
                                                                                </span>
                                                                            </div>
                                                                        </a>
                                                                        <a href="lives.html" class="prescore__items">
                                                                            <div class="prescore__left">
                                                                                <span><i class="icon-tennis"></i></span>
                                                                                <span class="score">
                                                                                    Tennis
                                                                                </span>
                                                                            </div>
                                                                        </a>
                                                                        <a href="livecasino.html" class="prescore__items">
                                                                            <div class="prescore__left">
                                                                                <span><i class="icon-basketball"></i></span>
                                                                                <span class="score">
                                                                                    Basketball
                                                                                </span>
                                                                            </div>
                                                                        </a>
                                                                        <a href="lives.html" class="prescore__items">
                                                                            <div class="prescore__left">
                                                                                <span><i class="icon-ttennis"></i></span>
                                                                                <span class="score">
                                                                                    Table Tennis
                                                                                </span>
                                                                            </div>
                                                                        </a>
                                                                        <a href="lives.html" class="prescore__items">
                                                                            <div class="prescore__left">
                                                                                <span><i class="icon-volly"></i></span>
                                                                                <span class="score">
                                                                                    Volleyball
                                                                                </span>
                                                                            </div>
                                                                        </a>
                                                                        <a href="lives.html" class="prescore__items">
                                                                            <div class="prescore__left">
                                                                                <span><i class="icon-handball"></i></span>
                                                                                <span class="score">
                                                                                    Handball
                                                                                </span>
                                                                            </div>
                                                                        </a>
                                                                      </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <!--MyBets End-->


    <!--Jquery min js-->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <!--Bootstrap bundle min js-->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--Magnific Popup js-->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!--Owl Carousel min js-->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!--nice select min js-->
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <!--Wow min js-->
    <script src="assets/js/wow.min.js"></script>
    <!--jquery ui min-->
    <script src="assets/js/jquery-ui.min.js"></script>
    <!--Api min js-->
    <script src="assets/js/api.js"></script>
    <!--Main js-->
    <script src="assets/js/main.js"></script>
    
</body>

<!-- Mirrored from pixner.net/sportsodds1/sportsbet/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Apr 2024 20:22:41 GMT -->
</html>