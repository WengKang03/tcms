<!doctype html>
<html lang="en">

  <head>
    <title> Tuition Centre Management System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700|Indie+Flower" rel="stylesheet">
    

    <link rel="stylesheet" href="ui assets/fonts/icomoon/style.css">

    <link rel="stylesheet" href="ui assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="ui assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="ui assets/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="ui assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="ui assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="ui assets/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="ui assets/css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="ui assets/css/style.css">

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <h1 class="logo mr-auto">TCMS</h1>

        <div class="container">
          <div class="menu-wrap d-flex align-items-center">
            <span class="d-inline-block d-lg-none"><a href="#" class="text-black site-menu-toggle js-menu-toggle py-5"><span class="icon-menu h3 text-black"></span></a></span>

              <nav class="site-navigation text-left mr-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav mr-auto ">
                  <li class="active"><a href="index" class="nav-link">Home</a></li>
                  <li><a href="#about" class="nav-link">About</a></li>
                  <li><a href="#package" class="nav-link">Package</a></li>
                  <li><a href="#members" class="nav-link">Our Members</a></li>
                  <li><a href="#contact" class="nav-link">Contact</a></li>
                  
                </ul>
              </nav>
              <div class="top-social ml-auto">
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
              </div>
          </div>
        </div>

       

      </header>

    <div class="ftco-blocks-cover-1">
      <div class="site-section-cover overlay">
        <div class="container" id="index" class="index">
          <div class="row align-items-center ">
            <div class="col-md-5 mt-5 pt-5">
              <span class="text-cursive h5 text-red">Welcome To Our Website</span>
              <h1 class="mb-3 font-weight-bold text-teal" style="color: orange;">Bring Fun Life To Your Kids</h1>
              <p>Amazing Playground for your kids</p>
            </div>
            <div class="col-md-6 ml-auto align-self-end">
              <img src="ui assets/images/kid_transparent.png" alt="Image" class="img-fluid">
              
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="block-2 red">
              <span class="wrap-icon">
                <span class="icon-home"></span>
              </span>
              <h2>Face to Face Learning</h2>
              <p>Students will need to attend to the tuition centre to have the face to face learning.</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="block-2 yellow">
              <span class="wrap-icon">
                <span class="icon-person"></span>
              </span>
              <h2>Online Learning</h2>
              <p>Students can have a tuition class by attend the online class during any emergency problem.</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="block-2 teal">
              <span class="wrap-icon">
                <span class="icon-cog"></span>
              </span>
              <h2>Outdoor Learning</h2>
              <p>Let students can learn more about the things that come from book and also learn about something in life.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light"  id="about" class="about">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <img src="ui assets/images/img_1.jpg" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-5 ml-auto pl-md-5">
            <span class="text-cursive h5 text-red">About Us</span>
            <h3 class="text-black">Bring Fun Life To Your Kids</h3>
            <p><span>Our Tuition Centre not just focus learning, we also focus on the make students enjoy their life.</span><span>Learning might important for the students but playing also are the part can't be remove from their life.</span></p>
          </div>
        </div>
      </div>
    </div>
    
    
    <div class="site-section bg-info" id="package" class="package">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <span class="text-cursive h5 text-red d-block">The extra games/ event that we will provide</span>
            <h2 class="text-white">Package Option</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="package text-center bg-white">
              <span class="img-wrap"><img src="ui assets/images/flaticon/svg/001-jigsaw.svg" alt="Image" class="img-fluid"></span>
              <h3 class="text-teal">Indoor Games</h3>
              <p>The benefits of indoor play is that it encourages creativity and critical thinking.</p>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="package text-center bg-white">
              <span class="img-wrap"><img src="ui assets/images/flaticon/svg/002-target.svg" alt="Image" class="img-fluid"></span>
              <h3 class="text-success">Outdoor Game and Event</h3>
              <p>The benefits of outdoor play is that it allows children to learn by experience, allowing them to make sense of the world around them and use their imaginations.</p>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="package text-center bg-white">
              <span class="img-wrap"><img src="ui assets/images/flaticon/svg/003-mission.svg" alt="Image" class="img-fluid"></span>
              <h3 class="text-danger">Camping for Kids</h3>
              <p>The benefits of is Health Benefits of Spending Time in Nature, Teaches Basic Survival Skills,Builds Self Esteem and etc.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-teal" id="members" class="members">
      <div class="container">
        <div class="row justify-content-center text-center mb-5 section-2-title">
          <div class="col-md-6">
            <span class="text-cursive h5 text-red">The Team</span>
            <h3 class="text-white text-center">Meet The Team</h3>
            <p class="mb-5">In below are the team members of our tuition management system.</p>
          </div>
        </div>
        <div class="row align-items-stretch">

          <div class="col-lg-4 col-md-6 mb-5">
            <div class="post-entry-1 h-100 person-1 teal">
              
                <img src="ui assets/images/person_1.jpg" alt="Image"
                 class="img-fluid">
            
              <div class="post-entry-1-contents">
                <span class="meta">Founder</span>
                <h2>James Doe</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, sapiente.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-5">
            <div class="post-entry-1 h-100 person-1 yellow">
              
                <img src="ui assets/images/person_2.jpg" alt="Image"
                 class="img-fluid">
            
              <div class="post-entry-1-contents">
                <span class="meta">Founder</span>
                <h2>Jenny</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, sapiente.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-5">
            <div class="post-entry-1 h-100 person-1 red">
              
                <img src="ui assets/images/person_3.jpg" alt="Image"
                 class="img-fluid">
            
              <div class="post-entry-1-contents">
                <span class="meta">Founder</span>
                <h2>Adele</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, sapiente.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-5">
            <div class="post-entry-1 h-100 person-1 green">
              
                <img src="ui assets/images/person_4.jpg" alt="Image"
                 class="img-fluid">
            
              <div class="post-entry-1-contents">
                <span class="meta">Founder</span>
                <h2>Chris</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, sapiente.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-5">
            <div class="post-entry-1 h-100 person-1 blue">
              
                <img src="ui assets/images/person_5.jpg" alt="Image"
                 class="img-fluid">
            
              <div class="post-entry-1-contents">
                <span class="meta">Founder</span>
                <h2>Avril</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, sapiente.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-5">
            <div class="post-entry-1 h-100 person-1 red">
              
                <img src="ui assets/images/person_1.jpg" alt="Image"
                 class="img-fluid">
            
              <div class="post-entry-1-contents">
                <span class="meta">Founder</span>
                <h2>Tomas</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, sapiente.</p>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
    
    <div class="site-section bg-light"  id="testimonial" class="testimonial">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <span class="text-cursive h5 text-red d-block">Testimonial</span>
            <h2 class="text-black">The users members of our tuition centre</h2>
          </div>
        </div>
        <div class="row mt-5 justify-content-center">

          <div class="col-md-8">
            

            <div class="row">
              <div class="col-lg-3 text-center">
                <span class="text-teal h2 d-block">3423</span>
                <span>Happy Client</span>
              </div>
              <div class="col-lg-3 text-center">
                <span class="text-yellow h2 d-block">4398</span>
                <span>Members</span>
              </div>
              <div class="col-lg-3 text-center">
                <span class="text-success h2 d-block">50+</span>
                <span>Staffs</span>
              </div>
              <div class="col-lg-3 text-center">
                <span class="text-danger h2 d-block">2000+</span>
                <span>Our Followers</span>
              </div>
            </div>

          </div>
        </div>
      </div>

    <div class="site-section bg-light" id="contact-section">
      <div class="container" id="contact" class="contact">
        <div class="row justify-content-center text-center">
        <div class="col-7 text-center mb-5">
          <h2>Contact Info</h2>
          <li class="d-block mb-4">
            <span class="d-block text-black">Address:</span>
            <span>PTD 64888, Jalan Selatan Utama km 15, Taman Perusahaan Ringan Pulai, 81300 Skudai, Johor</span></li>
          <li class="d-block mb-3"><span class="d-block text-black">Phone:</span><span>+6075586605</span></li>
          <li class="d-block mb-3"><span class="d-block text-black">Email:</span><span>wengkang0229@gmail.com</span></li>
        </div>
      </div>
      </div>
    </div>
    

    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <h2 class="footer-heading mb-3">About Us</h2>
                <p class="mb-5">Our Tuition Centre not just focus learning, we also focus on the make students enjoy their life.Learning might important for the students but playing also are the part can't be remove from their life.</p>
          </div>
          <div class="col-lg-8 ml-auto">
            <div class="row">
              <div class="col-lg-4 ml-auto">
                <h2 class="footer-heading mb-4">Navigation</h2>
                <ul class="list-unstyled">
                  <li><a href="#none">Terms of Service</a></li>
                  <li><a href="#none">Privacy</a></li>
                  <li><a href="#none">Contact Us</a></li>
                </ul>
              </div> 
              <div class="col-lg-4">
                <h2 class="footer-heading mb-4">Subject</h2>
                <ul class="list-unstyled" style="color: white;">
                  <li><a>Bahasa Melayu</a></li>
                  <li><a>Bahasa English</a></li>
                  <li><a>Bahasa China</a></li>
                  <li><a>Mathematic</a></li>
                  <li><a>Science</a></li>
                </ul>
                
              </div>

            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This website is make by NG WENG KANG
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>

        </div>
      </div>
    </footer>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

  </body>

</html>

