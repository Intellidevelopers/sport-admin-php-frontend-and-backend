<?php
require_once "database.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from pixner.net/sportsodds1/sportsbet/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Apr 2024 20:25:30 GMT -->
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
    <?php
// Check if user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}


// Retrieve user ID from session
$userId = $_SESSION["user_id"];

// Function to get user details by ID from the database
function getUserById($conn, $userId) {
    $user = null;

    // Prepare and execute query to fetch user by ID
    $query = "SELECT * FROM users WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
        }

        mysqli_stmt_close($stmt);
    }

    return $user;
}

// Get user details by ID
$user = getUserById($conn, $userId);

// Check if user exists and display user information
if ($user) {
    // Format last login time
    $lastLoginTimestamp = strtotime($user['last_login']);
    $formattedLastLogin = date('l jS Y', $lastLoginTimestamp);

    // Display user information
    ?>

    <!--Header Here-->
    <header class="header-section dashboard__header">
        <div class="container p-0">
            <div class="header-wrapper">
                <div class="menu__left__wrap">
                    <div class="logo-menu px-2">
                        <a href="index.php" class="logo">
                            <img src="assets/img/logo/logo.png" alt="logo">
                        </a>
                    </div>
                    <ul class="main-menu">
                    <li>
                            <a href="inbox.php">
                                <span>Inbox</span>
                            </a>
                        </li>
                        <li>
                            <a href="training.php">
                                <span>Training</span>
                            </a>
                        </li>
                        <li>
                            <a href="schedule.php">
                                <span>Schedule</span>
                            </a>
                        </li>
                        <li>
                            <a href="medical-center.php">
                                <span>Medical Center</span>
                            </a>
                        </li>
                        <li>
                            <a href="scouting.php">
                                <span>Scouting</span>
                            </a>
                        </li>
                        <li>
                            <a href="tactics.php">
                                <span>Tactics</span>
                            </a>
                        </li>
                        <li class="cmn-grp">
                            <a href="./payment/index.php">
                                <span class="cmn--btn">
                                    <span class="rela">Deposit</span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="dashboar__wrap">
                    <div class="items d__text">
                        <span class="small">Your balance</span>
                        <h6>₦ <?= $user['amount']; ?></h6>
                    </div>
                    <div class="items d__cmn">
                        <a href="./payment/index.php" class="cmn--btn">
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
                                    <a href="logout.php" class="custom-dropdown__body-link">
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
    
    <section class="dashboard__body mt__30 pb-60"> 
        <div class="container">
            <div class="row g-4">
                <div class="col-xxl-3 col-xl-3 col-lg-4">
                    <div class="dashboard__side__bar">
                        <ul class="account__menu">
                            <li>
                                <a href="dashboard.php" class="active">
                                    <span class="icons">
                                        <i class="icon-user"></i>
                                    </span>
                                    <span>
                                        Account Settings
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="contact-preference.php">
                                    <span class="icons">
                                        <i class="icon-pcontact"></i>
                                    </span>
                                    <span>
                                       Contact Preferences
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="identity.php">
                                    <span class="icons">
                                        <i class="icon-details"></i>
                                    </span>
                                    <span>
                                       Identity Details
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="verification.php">
                                    <span class="icons">
                                        <i class="icon-verify"></i>
                                    </span>
                                    <span>
                                       Verify
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="casinobet.php">
                                    <span class="icons">
                                        <i class="icon-casino"></i>
                                    </span>
                                    <span>
                                       Casino bets
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="mypromo.php">
                                    <span class="icons">
                                        <i class="icon-promos"></i>
                                    </span>
                                    <span>
                                       My Promos
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="deposit.php">
                                    <span class="icons">
                                        <i class="icon-deposit"></i>
                                    </span>
                                    <span>
                                       Deposit
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="withdraw.php">
                                    <span class="icons">
                                        <i class="icon-withdraw"></i>
                                    </span>
                                    <span>
                                       Withdraw
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="transaction.php">
                                    <span class="icons">
                                        <i class="icon-history"></i>
                                    </span>
                                    <span>
                                       Transction History
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="notification.php">
                                    <span class="icons">
                                        <i class="icon-notifivation"></i>
                                    </span>
                                    <span>
                                       Notifications
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="bethistory.php">
                                    <span class="icons">
                                        <i class="icon-bhistory"></i>
                                    </span>
                                    <span>
                                       Bet History
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="bonuses.php">
                                    <span class="icons">
                                        <i class="icon-bonus"></i>
                                    </span>
                                    <span>
                                       Bonuses
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="logout.php">
                                    <span class="icons">
                                        <i class="icon-logout"></i>
                                    </span>
                                    <span>
                                       Logout
                                    </span>
                                </a>
                            </li>
                        </ul> 
                    </div>
                </div>
                
                <div class="col-xxl-9 col-xl-9 col-lg-8">
                    <div class="dashboard__body__wrap">
                        <h3 class="account__head mb__30">
                            Account Settings
                        </h3>
                        <div class="row g-4">
                            <div class="col-xl-4">
                                <div class="user__box">
                                    <div class="img__change">
                                        <img src="assets/img/profile/profile.jpg" alt="profile">
                                        <div class="icons" id="profile-picture">
                                            <i class="fas fa-pen"></i>
                                        </div>
                                    </div>
                                    <div class="user__content">
                                        <h5 class="usertext__one"><?= $user['full_name']; ?></h5>
                                        <h6 class="usertext__two">UUID:</h6>
                                        <a href="#0" class="link">
                                            ffbe99f2-7f4b-11ed-9e24-3ee8038fe302
                                        </a>
                                    </div>
                                    <div class="reset__wrap">
                                        <a href="#0" class="reset">
                                            Reset Password
                                        </a>
                                        <a href="#0" class="change">
                                            Change Gamertag
                                        </a>
                                    </div>
                                    <div class="user__dated">
                                        <span class="date">Joined April 4th, 2024</span>
                                        <a href="#0" class="lastlogin">
                                            Last Login on: <?php echo $user['last_login']; ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="account__body">
                                    <div class="account__strength__box mb__30">
                                        <div class="strength__box">
                                            <div class="circle__box">
                                                <div class="circle">
                                                    <div class="box">
                                                        <h3 class="text">
                                                            70%
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5>
                                                Account Strength
                                            </h5>
                                        </div>
                                        <div class="strength__content">
                                            <div class="items">
                                                <input class="form-check-input" type="checkbox" id="stre1c" checked>
                                                <label class="form-check-label" for="stre1c">
                                                    Create account
                                                </label>
                                            </div>
                                            <div class="items">
                                                <input class="form-check-input" type="checkbox" id="stre2" checked>
                                                <label class="form-check-label" for="stre2">
                                                    Complete Account
                                                </label>
                                            </div>
                                            <div class="items">
                                                <input class="form-check-input" type="checkbox" id="stre3" checked>
                                                <label class="form-check-label" for="stre3">
                                                    Verify Identity
                                                </label>
                                            </div>
                                            <div class="items">
                                               <span class="icons">
                                                <i class="icon-deposit"></i>
                                               </span>
                                               <span>
                                                Made a Deposit
                                               </span>
                                            </div>
                                            <div class="items">
                                                <span class="icons">
                                                <i class="icon-user"></i>
                                                </span>
                                                <span>
                                                Upload Avatar
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="account__email mb__30">
                                        <h5>
                                            Account Emails
                                        </h5>
                                        <span class="subtitle">
                                            Primary Emails
                                        </span>
                                        <div class="form__wrap">
                                            <form action="#">
                                                <input type="text" placeholder="adeagbojosiah1@gmail.com">
                                                <i class="icon-lock"></i>
                                            </form>
                                            <div class="check__items">
                                                <input class="form-check-input" type="checkbox" id="stre1" checked>
                                                <label class="form-check-label" for="stre1">
                                                   Verified
                                                </label>
                                            </div>
                                        </div>
                                        <a href="#0" class="add__email">
                                            <span><img src="assets/img/profile/plus.png" alt="icon"></span>
                                            <span>
                                                Add email
                                            </span>
                                        </a>
                                    </div>
                                    <div class="account__email enroll__box mb__30">
                                        <h5>
                                            Multi_factor Authentication
                                        </h5>
                                        <p>
                                            Add an Extra Layer of security to your SportOdds account when logging in with Email/Passsword. A verrification code will be sent to your email each time you loin to secrely protect your account.
                                        </p>
                                        <a href="#0" class="cmn--btn">
                                            <span>Enroll</span>
                                        </a>
                                    </div>
                                    <div class="account__email language__box mb__30">
                                        <h5>
                                            Language
                                        </h5>
                                        <span class="slanguage">Select Language</span>
                                        <div class="language__wrap">
                                            <select name="#" id="#id">
                                                <option value="1">
                                                    English
                                                </option>
                                                <option value="2">
                                                    Turki
                                                </option>
                                                <option value="3">
                                                    Spanish
                                                </option>
                                            </select>
                                            <a href="#0" class="cmn--btn">
                                                <span>Save</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="account__email social__box mb__30">
                                        <h5>
                                            Social Accounts
                                        </h5>
                                        <span class="slanguage">Connect your accounts for faster login.</span>
                                        <div class="social__wrap">
                                           <div class="social__left">
                                                <a href="#0">
                                                    <span>
                                                        <img src="assets/img/profile/goggle.png" alt="icon">
                                                    </span>
                                                    <span>
                                                        Connect Google
                                                    </span>
                                                </a>
                                                <a href="#0">
                                                    <span>
                                                        <img src="assets/img/profile/steam.png" alt="icon">
                                                    </span>
                                                    <span>
                                                        Connect steam
                                                    </span>
                                                </a>
                                                <a href="#0">
                                                    <span>
                                                        <img src="assets/img/profile/twitter.png" alt="icon">
                                                    </span>
                                                    <span>
                                                        Connect Twitter
                                                    </span>
                                                </a>
                                           </div>
                                           <div class="social__left">
                                            <a href="#0">
                                                <span>
                                                    <img src="assets/img/profile/facebook.png" alt="icon">
                                                </span>
                                                <span>
                                                    Connect facebook
                                                </span>
                                            </a>
                                            <a href="#0">
                                                <span>
                                                    <img src="assets/img/profile/twitch.png" alt="icon">
                                                </span>
                                                <span>
                                                    Connect twitch
                                                </span>
                                            </a>
                                            <a href="#0">
                                                <span>
                                                    <img src="assets/img/profile/vkonta.png" alt="icon">
                                                </span>
                                                <span>
                                                    Connect vkontakte
                                                </span>
                                            </a>
                                       </div>
                                        </div>
                                    </div>
                                    <div class="account__email enroll__box">
                                        <h5>
                                            Archive Account
                                        </h5>
                                        <p>
                                            Want to temporarily close your account?
                                        </p>
                                        <!-- HTML button to delete account -->
                                        <!-- HTML button to delete account -->
                                        <!-- HTML button to delete account -->
                                        <form action="delete_account.php" method="post">
                                            <button type="submit" class="cmn--btn" name="delete_account" onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
                                                Delete Account
                                            </button>
                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
} else {
    echo "<p>User not found</p>";
}

mysqli_close($conn); // Close database connection
?>          </div>
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
                                    <a href="#0">
                                        <img src="assets/img/footer/rightarrow.png" alt="angle"> Faqs
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>

<!-- Mirrored from pixner.net/sportsodds1/sportsbet/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Apr 2024 20:25:35 GMT -->
</html>
