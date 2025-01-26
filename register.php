<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="favicon.png" type="x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="contact.css">
    <title>Delta Global India</title>
    <style>
        /* Default styles for all devices */
        .my-element {
            border-radius: 10px;
            /* Reset styles for mobile */
            margin-left: 0;
            /* Reset styles for mobile */
        }

        /* Styles for PC and tablet views */
        @media (min-width: 768px) {

            /* Target tablets and larger screens */
            .my-element {
                border-radius: 20px;
                margin-left: 40%;
            }
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href="https://deltaglobalindia.in/"><img src="img/logo.png" alt="" width="30" height="24"
                    class="d-inline-block align-text-top"></a>
            <a class="navbar-brand" href="https://deltaglobalindia.in/">Delta Global India</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav  visible float-lg-end">
                    <li class="nav-item ">
                        <a class="nav-link active" href="https://deltaglobalindia.in/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blogs.html">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blogs.html">Online Classes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Registration</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>



    <div style="width: 70px;height: 70px;position: fixed;left: 10px;bottom: 3rem;">
        <a href="https://wa.me/message/PRW7EMDSLRAYE1"><img src="img/wa.png" style="width: 70px;height: 70px;"></a>
    </div>

    <!-- user registration -->
    <section>
        <div class="container">
            <div class="col-sm-2 col-md-2 col-lg-2"></div>
            <div class="col-sm-8 col-md-8 col-lg-8">
                <div class="contact-form my-element">
                    <span class="circle one"></span>
                    <span class="circle two"></span>

                    <form action="db/registration.php" method="POST" autocomplete="off">
                        <h3 class="title">Investor Registration</h3>
                        <!--<input type="hidden" name="access_key" value="0a5ab5a6-d44b-42c5-bbef-9e85ff76443d">-->
                        <input type="hidden" name="access_key" value="f72ad2c1-d46d-4d27-b75a-0f1c8639132d">
                        <div class="input-container">
                            <input type="text" name="name" class="input" placeholder="Username" />
                            <!-- <label for="">Username</label>    -->
                        </div>
                        <div class="input-container">
                            <input type="email" name="email" class="input" placeholder="Email" />
                            <!-- <label for="">Email</label> -->
                        </div>
                        <div class="input-container">
                            <input type="tel" name="phone" class="input" placeholder="Phone" />
                            <!-- <label for="">Phone</label> -->
                        </div>
                        <div class="input-container">
                            <input type="password" name="pass" class="input" placeholder="Password" />
                            <!-- <label for="">Password</label> -->
                        </div>

                        <div class="input-container textarea">
                            <textarea name="desc" class="input" placeholder="Description..."></textarea>
                            <!-- <label for="">Description</label> -->
                        </div>

                        <input type="submit" value="Send" name="register" class="btn" />

                        <div class="text-center mt-3">
                            <p class="small">
                                Already registered?
                                <a href="login.php" class="text-primary">Sign in</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2"></div>
        </div>
    </section>
    <!-- user registration -->

    <br><br>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>Delta Global India</h4>
                    <ul>
                        <p style="padding-left: 0;padding-right: 3rem;">Delta Global is an initiative for the young
                            generation
                            interested in making more, willing to step forward and be free from financial situations. We
                            provide
                            knowledge based on self-learning, experience, and theoretical implications on the
                            market.<br> <br> <br></p>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="https://deltaglobalindia.in/">Home</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="blogs.html">Blogs</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Create Account</h4>
                    <!--<ul>-->
                    <!--  <li><a href="https://zerodha.com/open-account?c=VX4351" target="_blank">Zerodha</a></li>-->
                    <!--  <li><a href=" https://join.dhan.co/?invite=GIQRY48395" target="_blank">Dhan</a></li>-->
                    <!--  <li><a href="https://octa.click/ighBhsLhJg0" target="_blank">Octafx</a></li>-->
                    <!--  <li><a-->
                    <!--      href="https://secure.tickmill.com?utm_campaign=ib_link&utm_content=IB71324563&utm_medium=Open+Account&utm_source=link&lp=https%3a%2f%2fsecure.tickmill.com%2fen%2fsign-up" target="_blank">Tickmill</a>-->
                    <!--  </li>-->
                    <!--</ul>-->
                    <ul>
                        <li>
                            <a href="https://zerodha.com/open-account?c=VX4351" target="_blank">Zerodha</a>
                            <a href=" https://join.dhan.co/?invite=GIQRY48395" target="_blank">Dhan</a>
                            <!--<a href="https://octa.click/ighBhsLhJg0" target="_blank">Octafx</a>-->
                            <!--<a href="https://secure.tickmill.com?utm_campaign=ib_link&utm_content=IB71324563&utm_medium=Open+Account&utm_source=link&lp=https%3a%2f%2fsecure.tickmill.com%2fen%2fsign-up" target="_blank">Tickmill</a>-->
                            <a href="https://www.binance.com/activity/referral-entry/CPA?ref=CPA_000V6ITQRY&utm_medium=app_share_link_whatsapp"
                                target="_blank">Binance</a>
                            <!--<a href="https://one.exnesstrack.net/a/voyd2zxw3h" target="_blank">Exness</a>-->
                            <a href="https://www.delta.exchange/?code=KPWTYW" target="_blank">Delta Exchange</a>
                            <a href=" https://www.wealthy.in/p/ravin17064" target="_blank">Wealthy</a>


                        </li>
                    </ul>

                </div>

                <div class="footer-col">
                    <h4>Important Links</h4>
                    <ul>
                        <li><a href="https://investor.sebi.gov.in/" target="_blank">SEBI Invester</a></li>

                    </ul>
                </div>


                <div class="footer-col">
                    <h4>follow us</h4>
                    <div class="social-links">
                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://x.com/TradeWithDelta?t=GXH-1hYmJuUnEni2mKNUxQ&s=08" target="_blank"><i
                                class="fa-brands fa-square-x-twitter"></i></a>
                        <a href="https://www.instagram.com/tradewithdelta?igsh=MWtmemRteHNpOTNqeg==" target="_blank"><i
                                class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/posts/deltaglobalindia_welcome-to-delta-global-india-delta-global-activity-7228682595478233088-A_Gy?utm_source=share&utm_medium=member_desktop"
                            target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <script src="index.js"></script>
</body>

</html>