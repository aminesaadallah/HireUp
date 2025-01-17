<!DOCTYPE html>
<html lang="en">
  <head>
    <title>HireUp</title>
    <meta charset="utf-8" />

    <meta name="description" content="" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link rel="stylesheet" href="./front office assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./front office assets/css/animations.css" />
    <link rel="stylesheet" href="./front office assets/css/font-awesome.css" />
    <link rel="stylesheet" href="./front office assets/css/main.css" class="color-switcher-link" />
    <script src="./front office assets/js/vendor/modernizr-2.6.2.min.js"></script>

    <link href="./front office assets/images/HireUp_icon.ico" rel="icon" />

    <style>
      .button-container {
        display: flex;
      }

      .primary-button {
        background-color: #40A2D8;
        color: white;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
      }

      .transparent-button {
        background-color: transparent;
        color: black;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
      }
    </style>
  </head>

  <?php

  include_once __DIR__ . './Controller/user_con.php';

  $userC = new userCon("user");

  $user_id = null;
  
  if (session_status() == PHP_SESSION_NONE) {
    session_set_cookie_params(0, '/', '', true, true);
    session_start();
  }

  if(isset($_SESSION['user id'])) {
    $user_id = htmlspecialchars($_SESSION['user id']);
    
    $user_role = $userC->get_user_role_by_id($user_id);

    $user_banned = $userC->get_user_banned_by_id($user_id);

  }
  

  ?>


  <body>

  <?php 
    $block_call_back = 'true';
    $access_level = "none";
    include('./View/callback.php')  
  ?>

    <div class="preloader">
      <div class="preloader_image"></div>
    </div>

    <!-- search modal -->
    <div
      class="modal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="search_modal"
      id="search_modal"
    >
      <button
        type="button"
        class="close"
        data-dismiss="modal"
        aria-label="Close"
      >
        <span aria-hidden="true">&times;</span>
      </button>
      <div class="widget widget_search">
        <form
          method="get"
          class="searchform search-form"
          action="http://webdesign-finder.com/"
        >
          <div class="form-group">
            <input
              type="text"
              value=""
              name="search"
              class="form-control"
              placeholder="Search keyword"
              id="modal-search-input"
            />
          </div>
          <button type="submit" class="btn">Search</button>
        </form>
      </div>
    </div>

    <!-- wrappers for visual page editor and boxed version of template -->
    <div id="canvas">
      <div id="box_wrapper">
        <!-- template sections -->

        <!--eof topline-->

        <section class="page_toplogo ls s-py-15 text-center">
          <div class="container-fluid">
            <div class="row align-items-center">
              <div class="col-lg-4">
                <div
                  class="d-lg-flex justify-content-lg-end align-items-lg-center"
                >
                  <span class="social-icons top">
                    <a
                      href="https://www.facebook.com/profile.php?id=61557532202485"
                      class="fa fa-facebook"
                      title="facebook"
                    ></a>
                    <a
                      href="https://www.instagram.com/hire.up.tn/"
                      class="fa fa-instagram"
                      title="instagram"
                    ></a>
                    <a href="#" class="fa fa-google" title="google"></a>
                    <a href="#" class="fa fa-linkedin" title="linkedin"></a>
                    <a href="#" class="fa fa-pinterest-p" title="pinterest"></a>
                  </span>
                </div>
              </div>
              <div class="col-lg-4 text-center">
                <div class="text-center">
                  <div class="header_logo_center">
                    <a href="index.php" class="logo">
                      <span class="logo_text">Hire</span>
                      <img src="./front office assets/images/HireUp_logo.png" alt="" />
                      <span class="logo_subtext">Up</span>
                    </a>
                  </div>
                  <!-- eof .header_left_logo -->
                </div>
              </div>
              <div class="col-lg-4">
                <div class="button-container">                  
                  <?php if ($user_id){
                    if ($user_role == 'admin'){
                      ?>
                      <a class="primary-button" href="./View\front_office\Sign In & Sign Up\logout.php">Sign Out</a>
                      <a class="primary-button" href="./View/back_office/main dashboard">Dashboard</a>
                    <?php
                      } else {
                        ?>
                        <a class="primary-button" href="./View\front_office\Sign In & Sign Up\logout.php">Sign Out</a>
                        <?php
                      }
                  } else {
                    ?>
                    <a class="transparent-button" href="./View\front_office\Sign In & Sign Up\authentication-login.php">Sign In</a>
                    <a class="primary-button" href="./View\front_office\Sign In & Sign Up\authentication-register.php">Sign Up</a>
                    <?php
                  } 
                    ?>
                </div>                
              </div>
            </div>
          </div>
        </section>

        <!-- header with single Bootstrap column only for navigation and includes. Used with topline and toplogo sections. Menu toggler must be in toplogo section -->
        <header
          class="page_header ls s-bordertop nav-narrow justify-nav-center text-center"
        >
          <div class="container-fluid">
            <div class="row align-items-center">
              <div class="col-xl-12">
                <div class="nav-wrap">
                  <!-- main nav start -->
                  <nav class="top-nav">
                    <ul class="nav sf-menu">
                      <li class="active">
                        <a href="index.php">Homepage</a>
                      </li>

                      <li>
                        <a href="./View/front_office/profiles_management/profile.php">Profile</a>
                      </li>
                      <!-- eof pages -->

                      <li>
                        <a href="../back_office/interface/job_management.html">Job</a>
                      </li>

                      <li>
                        <a href="index.php">FeedBack</a>
                      </li>

                      <!-- blog -->
                      <li>
                        <a href="./pages/blog-left.html">Blog</a>
                      </li>
                      <!-- eof blog -->

                      <!-- contacts -->
                      <li>
                        <a href="./pages/contact2.html">Contacts</a>
                      </li>
                      <!-- eof contacts -->

                      <li>
                        <a href="./pages/about.html">About</a>
                      </li>

                    </ul>
                  </nav>
                  <!-- eof main nav -->
                </div>
              </div>
            </div>
          </div>

          <!-- header toggler -->

          <span class="toggle_menu">
            <span></span>
          </span>
        </header>

        <section class="page_slider">
          <div class="flexslider" data-nav="true" data-dots="false">
            <ul class="slides">
              <li class="ds text-center">
                <img src="./front office assets/images/slide01.jpg" alt="" />
                <div class="container">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="intro_layers_wrapper">
                        <div class="intro_layers">
                          <div class="intro_layer" data-animation="fadeInLeft">
                            <h3 class="intro_before_featured_word">
                              Keep in touch & stay updated
                            </h3>
                          </div>
                          <div class="intro_layer" data-animation="fadeInRight">
                            <h2 class="text-uppercase intro_featured_word">
                              With market
                              <br />
                              Trends
                            </h2>
                          </div>
                          <div class="intro_layer" data-animation="fadeIn">
                            <div class="d-inline-block">
                              <button
                                type="button"
                                class="btn btn-outline-maincolor center-block"
                                data-animation="fadeIn"
                              >
                                Subsctibe to Newsletter
                              </button>
                            </div>
                          </div>
                        </div>
                        <!-- eof .intro_layers -->
                      </div>
                      <!-- eof .intro_layers_wrapper -->
                    </div>
                    <!-- eof .col-* -->
                  </div>
                  <!-- eof .row -->
                </div>
                <!-- eof .container -->
              </li>
              <li class="ds text-center">
                <img src="./front office assets/images/slide02.jpg" alt="" />
                <div class="container">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="intro_layers_wrapper">
                        <div class="intro_layers">
                          <div class="intro_layer" data-animation="pullUp">
                            <h3 class="intro_before_featured_word">
                              Stuck in a 'career rut'?
                            </h3>
                          </div>
                          <div class="intro_layer" data-animation="pullDown">
                            <h2 class="text-uppercase intro_featured_word">
                              Help us match to
                              <br />
                              Your hr role
                            </h2>
                          </div>
                          <div class="intro_layer" data-animation="fadeIn">
                            <div class="d-inline-block">
                              <button
                                type="button"
                                class="btn btn-outline-maincolor center-block"
                                data-animation="fadeIn"
                              >
                                Subsctibe to Newsletter
                              </button>
                            </div>
                          </div>
                        </div>
                        <!-- eof .intro_layers -->
                      </div>
                      <!-- eof .intro_layers_wrapper -->
                    </div>
                    <!-- eof .col-* -->
                  </div>
                  <!-- eof .row -->
                </div>
                <!-- eof .container -->
              </li>
              <li class="ds text-center">
                <img src="./front office assets/images/slide03.jpg" alt="" />
                <div class="container">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="intro_layers_wrapper">
                        <div class="intro_layers">
                          <div class="intro_layer" data-animation="pullDown">
                            <h3 class="intro_before_featured_word">
                              Launch Your recruitment career
                            </h3>
                          </div>
                          <div class="intro_layer" data-animation="pullUp">
                            <h2 class="text-uppercase intro_featured_word">
                              With innovate
                              <br />
                              Consultancy
                            </h2>
                          </div>
                          <div class="intro_layer" data-animation="fadeIn">
                            <div class="d-inline-block">
                              <button
                                type="button"
                                class="btn btn-outline-maincolor center-block"
                              >
                                Join Our HU
                              </button>
                            </div>
                          </div>
                        </div>
                        <!-- eof .intro_layers -->
                      </div>
                      <!-- eof .intro_layers_wrapper -->
                    </div>
                    <!-- eof .col-* -->
                  </div>
                  <!-- eof .row -->
                </div>
                <!-- eof .container -->
              </li>
            </ul>
            <ul class="flex-direction-nav">
              <li class="flex-nav-prev">
                <a class="flex-prev" href="#">&gt;</a>
              </li>
              <li class="flex-nav-next">
                <a class="flex-next" href="#">&lt;</a>
              </li>
            </ul>
          </div>
          <!-- eof flexslider -->
        </section>

        <section class="ds slider-bottomline d-none d-xl-block py-50">
          <div class="container">
            <div class="row">
              <div class="col-md-4 text-center">
                <div class="info-block">
                  <p>Call Us 24/7</p>
                  <h3>+123-456-7890</h3>
                </div>
              </div>
              <div class="col-md-4 text-center">
                <div class="info-block">
                  <p>Email Address</p>
                  <h3>example@example.com</h3>
                </div>
              </div>
              <div class="col-md-4 text-center">
                <div class="info-block">
                  <p>Open Hours</p>
                  <h3>Daily 9:00-20:00</h3>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="ls about s-pt-25">
          <div class="container">
            <div class="row">
              <div
                class="col-md-12 col-lg-6 animate"
                data-animation="slideInLeft"
              >
                <div class="heading-about">
                  <h2>HU</h2>
                  <h4>Welcome to</h4>
                  <h3>Invenir!</h3>
                  <p>
                    We believe in the value that our functions add to a
                    business. We feel that this specialist part of HireUp is often
                    unrecognised for its contribution to the profitability and
                    success of a business.
                  </p>
                </div>
                <div class="icons-list">
                  <ul class="list-bordered">
                    <li class="media media-body">
                      <i class="teaser-icon fa fa-rocket"></i>
                      <h4 class="title">
                        <span>638</span> Companies We Helped
                      </h4>
                    </li>
                    <li class="media media-body">
                      <i class="teaser-icon fa fa-briefcase"></i>
                      <h4 class="title"><span>12</span> Corporate Programs</h4>
                    </li>
                    <li class="media media-body">
                      <i class="teaser-icon fa fa-graduation-cap"></i>
                      <h4 class="title"><span>28</span> Trainings Courses</h4>
                    </li>
                    <li class="border-bottom-0 media media-body">
                      <i class="teaser-icon fa fa-user"></i>
                      <h4 class="title"><span>125</span> Strategic Partners</h4>
                    </li>
                  </ul>
                </div>
              </div>
              <div
                class="col-md-12 col-lg-6 animate"
                data-animation="slideInRight"
              >
                <img src="./front office assets/images/person01.jpg" alt="person01.jpg" />
              </div>
            </div>
          </div>
        </section>

        <section
          class="icon-boxed teaser-box ls s-py-lg-130 c-my-lg-10 s-parallax"
        >
          <div class="container">
            <div class="row">
              <div class="col-lg-4">
                <div class="icon-box text-center hero-bg box-shadow">
                  <div class="teaser-icon icon-styled bg-maincolor3">
                    <i class="fa fa-unlock-alt"></i>
                  </div>
                  <h3>
                    <a href="#">Highly Secure</a>
                  </h3>
                  <p>
                    Cloud-based services can offer our customers single tenant
                    dedicated environments
                  </p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="icon-box text-center hero-bg box-shadow">
                  <div class="teaser-icon icon-styled bg-maincolor3">
                    <i class="fa fa-cloud"></i>
                  </div>
                  <h3>
                    <a href="#">True Cloud Scal</a>
                  </h3>
                  <p>
                    Working with customers making 100-40,000 hires per annum
                  </p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="icon-box text-center hero-bg box-shadow">
                  <div class="teaser-icon icon-styled bg-maincolor3">
                    <i class="fa fa-database"></i>
                  </div>
                  <h3>
                    <a href="#">Accurate Data</a>
                  </h3>
                  <p>
                    All of our customers' data is validated. We build accurate
                    data banks for reporting
                  </p>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="pt-20 pb-10 s-py-lg-130 main_contact_form">
          <div class="container">
            <div class="row">
              <div class="col-sm-12 contact-header heading text-center">
                <h5>Submit</h5>
                <h4>Candidate CV</h4>
              </div>
              <div class="px-30 ds-form">
                <form class="ds contact-form c-mb-20">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="col-c-mb-60 form-group has-placeholder">
                        <label for="name"
                          >Full Name
                          <span class="required">*</span>
                        </label>
                        <input
                          type="text"
                          aria-required="true"
                          size="200"
                          value=""
                          name="your-name"
                          id="name"
                          class="form-control"
                          placeholder="Full Name"
                        />
                      </div>
                      <div class="col-c-mb-60 form-group has-placeholder">
                        <label for="text"
                          >Phone number
                          <span class="required">*</span>
                        </label>
                        <input
                          type="text"
                          aria-required="true"
                          size="200"
                          value=""
                          name="text"
                          id="text"
                          class="form-control"
                          placeholder="Phone number"
                        />
                      </div>
                      <div class="col-c-mb-60 form-group has-placeholder">
                        <label for="email"
                          >Email address
                          <span class="required">*</span>
                        </label>
                        <input
                          type="email"
                          aria-required="true"
                          size="200"
                          value=""
                          name="your-email"
                          id="email"
                          class="form-control"
                          placeholder="Email address"
                        />
                      </div>
                      <div class="col-c-mb-60 form-group has-placeholder">
                        <label for="text"
                          >Job sector
                          <span class="required">*</span>
                        </label>
                        <input
                          type="text"
                          aria-required="true"
                          size="200"
                          value=""
                          name="text"
                          id="text"
                          class="form-control"
                          placeholder="Job sector"
                        />
                      </div>
                      <div class="col-c-mb-60 form-group">
                        <input
                          type="file"
                          class="custom-file-input button"
                          id="validatedCustomFile"
                        />
                        <label
                          class="custom-file-label"
                          for="validatedCustomFile"
                          >Attach CV</label
                        >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group has-placeholder">
                        <label for="message">Comment</label>
                        <textarea
                          aria-required="true"
                          rows="6"
                          cols="40"
                          name="message"
                          id="message"
                          class="form-control"
                          placeholder="comment"
                        ></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group text-center">
                      <button
                        type="submit"
                        id="contact_form_submit"
                        name="contact_submit"
                        class="button"
                      >
                        Submit CV
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>

        <section class="ls s-py-lg-130 s-pt-30 s-pb-30 pt-20 main_blog">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <div class="contact-header text-center">
                  <h5>Our</h5>
                  <h4>Blog Posts</h4>
                </div>
                <div
                  class="owl-carousel pt-30"
                  data-responsive-lg="3"
                  data-responsive-md="2"
                  data-responsive-sm="2"
                  data-nav="false"
                  data-dots="false"
                >
                  <article
                    class="box vertical-item text-center content-padding padding-small bordered post type-post status-publish format-standard has-post-thumbnail"
                  >
                    <div class="item-media post-thumbnail">
                      <a href="#" title="#" rel="#">
                        <img src="./front office assets/images/img_01.jpg" alt="" />
                      </a>
                    </div>
                    <!-- .post-thumbnail -->
                    <div class="item-content">
                      <header class="blog-header">
                        <a href="#" rel="bookmark">
                          <h4>Modernising our Talent Programmes</h4>
                        </a>
                      </header>
                      <!-- .entry-header -->
                      <div class="entry-content ls">
                        <p>
                          The world of work has changed and the appetite for
                          spending long periods of time…
                        </p>
                      </div>
                      <!-- .entry-content -->
                      <div class="blog-item-icons">
                        <div class="col-sm-4">
                          <i class="color-main fa fa-user"></i>
                          <a href="#"> Emma </a>
                        </div>
                        <div class="col-sm-4">
                          <i class="color-main fa fa-calendar"></i>
                          <a href="#"> August 11, 2017 </a>
                        </div>
                        <div class="col-sm-4">
                          <i class="color-main fa fa-tag"></i>
                          <a href="#"> Post </a>
                        </div>
                      </div>
                    </div>
                    <!-- .item-content -->
                  </article>
                  <!-- #post-## -->
                  <article
                    class="box vertical-item text-center content-padding padding-small bordered post type-post status-publish format-standard has-post-thumbnail"
                  >
                    <div class="item-media post-thumbnail">
                      <a title="#" href="#">
                        <img src="./front office assets/images/blog-1.jpg" alt="" />
                      </a>
                    </div>
                    <!-- .post-thumbnail -->
                    <div class="item-content">
                      <header class="blog-header">
                        <a href="#" rel="bookmark">
                          <h4>Franki goes to… The Philippines & Indonesia</h4>
                        </a>
                      </header>
                      <!-- .entry-header -->
                      <div class="entry-content ls">
                        <p>
                          In this blog series titled ‘Franki goes to…’ we follow
                          her travels around the world…
                        </p>
                      </div>
                      <!-- .entry-content -->
                      <div class="blog-item-icons">
                        <div class="col-sm-4">
                          <i class="color-main fa fa-user"></i>
                          <a href="#"> Emma </a>
                        </div>
                        <div class="col-sm-4">
                          <i class="color-main fa fa-calendar"></i>
                          <a href="#"> August 7, 2017 </a>
                        </div>
                        <div class="col-sm-4">
                          <i class="color-main fa fa-tag"></i>
                          <a href="#"> Post </a>
                        </div>
                      </div>
                    </div>
                    <!-- .item-content -->
                  </article>
                  <!-- #post-## -->
                  <article
                    class="box vertical-item text-center content-padding padding-small bordered post type-post status-publish format-standard has-post-thumbnail"
                  >
                    <div class="item-media post-thumbnail">
                      <a title="#" href="#">
                        <img src="./front office assets/images/blog-2.jpg" alt="" />
                      </a>
                    </div>
                    <!-- .post-thumbnail -->
                    <div class="item-content">
                      <header class="blog-header">
                        <a href="#" rel="bookmark">
                          <h4>Getting More For Your Money</h4>
                        </a>
                      </header>
                      <!-- .entry-header -->
                      <div class="entry-content ls">
                        <p>
                          The majority of businesses will have a degree of
                          reliance on recruitment suppliers…
                        </p>
                      </div>
                      <!-- .entry-content -->
                      <div class="blog-item-icons">
                        <div class="col-sm-4">
                          <i class="color-main fa fa-user"></i>
                          <a href="#"> Emma </a>
                        </div>
                        <div class="col-sm-4">
                          <i class="color-main fa fa-calendar"></i>
                          <a href="#"> August 6, 2017 </a>
                        </div>
                        <div class="col-sm-4">
                          <i class="color-main fa fa-tag"></i>
                          <a href="#"> Post </a>
                        </div>
                      </div>
                    </div>
                    <!-- .item-content -->
                  </article>
                  <!-- #post-## -->
                  <article
                    class="box vertical-item text-center content-padding padding-small bordered post type-post status-publish format-standard has-post-thumbnail"
                  >
                    <div class="item-media post-thumbnail">
                      <a title="#" href="#">
                        <img src="./front office assets/images/blog-3.jpg" alt="" />
                      </a>
                    </div>
                    <!-- .post-thumbnail -->
                    <div class="item-content">
                      <header class="blog-header">
                        <a href="#" rel="bookmark">
                          <h4>
                            Post With Youtube
                            <br />
                            Video
                          </h4>
                        </a>
                      </header>
                      <!-- .entry-header -->
                      <div class="entry-content ls">
                        <p>
                          Ribeye cupim jerky ham. Fatback sausage shoulder,
                          bresaola boudin hamburger pork turkey
                        </p>
                      </div>
                      <!-- .entry-content -->
                      <div class="blog-item-icons">
                        <div class="col-sm-4">
                          <i class="color-main fa fa-user"></i>
                          <a href="#"> Emma </a>
                        </div>
                        <div class="col-sm-4">
                          <i class="color-main fa fa-calendar"></i>
                          <a href="#"> June 10, 2017 </a>
                        </div>
                        <div class="col-sm-4">
                          <i class="color-main fa fa-tag"></i>
                          <a href="#"> Post </a>
                        </div>
                      </div>
                    </div>
                    <!-- .item-content -->
                  </article>
                  <!-- #post-## -->
                  <article
                    class="box vertical-item text-center content-padding padding-small bordered post type-post status-publish format-standard has-post-thumbnail"
                  >
                    <div class="item-media post-thumbnail">
                      <a title="#" href="#">
                        <img src="./front office assets/images/blog-4.jpg" alt="" />
                      </a>
                    </div>
                    <!-- .post-thumbnail -->
                    <div class="item-content">
                      <header class="blog-header">
                        <a href="#" rel="bookmark">
                          <h4>
                            Post format:
                            <br />
                            Image
                          </h4>
                        </a>
                      </header>
                      <!-- .entry-header -->
                      <div class="entry-content ls">
                        <p>
                          Beef beef ribs pancetta sirloin tail brisket strip
                          steak chuck swine frankfurter ham hock kielbasa
                        </p>
                      </div>
                      <!-- .entry-content -->
                      <div class="blog-item-icons">
                        <div class="col-sm-4">
                          <i class="color-main fa fa-user"></i>
                          <a href="#"> Emma </a>
                        </div>
                        <div class="col-sm-4">
                          <i class="color-main fa fa-calendar"></i>
                          <a href="#"> June 8, 2017 </a>
                        </div>
                        <div class="col-sm-4">
                          <i class="color-main fa fa-tag"></i>
                          <a href="#"> Post </a>
                        </div>
                      </div>
                    </div>
                    <!-- .item-content -->
                  </article>
                  <!-- #post-## -->
                  <article
                    class="box vertical-item text-center content-padding padding-small bordered post type-post status-publish format-standard has-post-thumbnail"
                  >
                    <div class="item-media post-thumbnail">
                      <a title="#" href="#">
                        <img src="./front office assets/images/blog-1.jpg" alt="" />
                      </a>
                    </div>
                    <!-- .post-thumbnail -->
                    <div class="item-content">
                      <header class="blog-header">
                        <a href="#" rel="bookmark">
                          <h4>
                            Post With Carousel
                            <br />
                          </h4>
                        </a>
                      </header>
                      <!-- .entry-header -->
                      <div class="entry-content ls">
                        <p>
                          Beef beef ribs pancetta sirloin tail brisket strip
                          steak chuck swine frankfurter ham hock kielbasa
                        </p>
                      </div>
                      <!-- .entry-content -->
                      <div class="blog-item-icons">
                        <div class="col-sm-4">
                          <i class="color-main fa fa-user"></i>
                          <a href="#"> Emma </a>
                        </div>
                        <div class="col-sm-4">
                          <i class="color-main fa fa-calendar"></i>
                          <a href="#"> june 7, 2017 </a>
                        </div>
                        <div class="col-sm-4">
                          <i class="color-main fa fa-tag"></i>
                          <a href="#"> Post </a>
                        </div>
                      </div>
                    </div>
                    <!-- .item-content -->
                  </article>
                  <!-- #post-## -->
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="ds half-section collapse-section">
          <div class="row">
            <div class="col-lg-6">
              <div class="image_cover image_cover_left half-image"></div>
            </div>
            <div class="col-lg-6 collapse-table">
              <div class="contact-header collapse-header heading pt-30">
                <h5>Receiving</h5>
                <h4>A job offer</h4>
              </div>
              <div id="accordion01" role="tablist" aria-multiselectable="true">
                <div class="card">
                  <div class="card-header" role="tab" id="collapse01_header">
                    <h5 class="mb-0">
                      <a
                        data-toggle="collapse"
                        href="#collapse01"
                        aria-expanded="true"
                        aria-controls="collapse01"
                      >
                        Be decisive
                      </a>
                    </h5>
                  </div>
                  <div
                    id="collapse01"
                    class="collapse show"
                    role="tabpanel"
                    aria-labelledby="collapse01_header"
                    data-parent="#accordion01"
                  >
                    <div class="card-body">
                      Confirming your acceptance guarantees the job is yours.
                      Usually, there are other candidates in the process at this
                      point, so ensure you are committed.
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header" role="tab" id="collapse02_header">
                    <h5 class="mb-0">
                      <a
                        class="collapsed"
                        data-toggle="collapse"
                        href="#collapse02"
                        aria-expanded="false"
                        aria-controls="collapse02"
                      >
                        Or take your time
                      </a>
                    </h5>
                  </div>
                  <div
                    id="collapse02"
                    class="collapse"
                    role="tabpanel"
                    aria-labelledby="collapse02_header"
                    data-parent="#accordion01"
                  >
                    <div class="card-body">
                      Confirming your acceptance guarantees the job is yours.
                      Usually, there are other candidates in the process at this
                      point, so ensure you are committed.
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header" role="tab" id="collapse03_header">
                    <h5 class="mb-0">
                      <a
                        class="collapsed"
                        data-toggle="collapse"
                        href="#collapse03"
                        aria-expanded="false"
                        aria-controls="collapse03"
                      >
                        Resign
                      </a>
                    </h5>
                  </div>
                  <div
                    id="collapse03"
                    class="collapse"
                    role="tabpanel"
                    aria-labelledby="collapse03_header"
                    data-parent="#accordion01"
                  >
                    <div class="card-body">
                      Confirming your acceptance guarantees the job is yours.
                      Usually, there are other candidates in the process at this
                      point, so ensure you are committed.
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header" role="tab" id="collapse04_header">
                    <h5 class="mb-0">
                      <a
                        class="collapsed"
                        data-toggle="collapse"
                        href="#collapse04"
                        aria-expanded="false"
                        aria-controls="collapse04"
                      >
                        Counter offers
                      </a>
                    </h5>
                  </div>
                  <div
                    id="collapse04"
                    class="collapse"
                    role="tabpanel"
                    aria-labelledby="collapse04_header"
                    data-parent="#accordion01"
                  >
                    <div class="card-body">
                      Confirming your acceptance guarantees the job is yours.
                      Usually, there are other candidates in the process at this
                      point, so ensure you are committed.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section id="testimonials" class="s-pt-75 s-pb-50">
          <div class="container">
            <div class="row">
              <div class="divider-50 d-none d-lg-block"></div>

              <div class="col-md-12">
                <div
                  class="testimonials-slider owl-carousel"
                  data-autoplay="true"
                  data-responsive-lg="1"
                  data-responsive-md="1"
                  data-responsive-sm="1"
                  data-nav="false"
                  data-dots="true"
                >
                  <div class="quote-item">
                    <div class="quote-image">
                      <img src="./front office assets/images/team/testimonials_01.jpg" alt="" />
                    </div>
                    <p class="small-text color-darkgrey">
                      Jessica J.
                      <br />
                      <span>Aumiller</span>
                    </p>
                    <p class="testimonials">
                      <em class="big text-muted">
                        Working with HR Invenir has already allowed us to
                        challenge some existing assumptions internally, right
                        from the first data collection. The dashboards have been
                        able to provide us with some validated external insight.
                      </em>
                    </p>
                  </div>
                  <div class="quote-item">
                    <div class="quote-image">
                      <img src="./front office assets/images/team/testimonials_02.jpg" alt="" />
                    </div>
                    <p class="small-text color-darkgrey">
                      Michael J.
                      <span>Carter</span>
                    </p>
                    <p class="testimonials">
                      <em class="big text-muted">
                        That is always so powerful in evaluating performance and
                        setting future direction. The data collection itself was
                        straightforward, and Nicky and Jeremy have been a
                        pleasure to work with
                      </em>
                    </p>
                  </div>

                  <div class="quote-item">
                    <div class="quote-image">
                      <img src="./front office assets/images/team/testimonials_03.jpg" alt="" />
                    </div>
                    <p class="small-text color-darkgrey">
                      Sammy
                      <span>Winchell</span>
                    </p>
                    <p class="testimonials">
                      <em class="big text-muted">
                        Duis autem vel eum iriure dolor in hendrerit in
                        vulputate velit esse molestie consequat, vel illum
                        dolore eu feugiat nulla facilisis at vero eros et
                        accumsan et iusto odio dignissim qui blandit praesent.
                      </em>
                    </p>
                  </div>
                </div>
                <!-- .testimonials-slider -->
              </div>

              <div class="divider-50 d-none d-lg-block"></div>
            </div>
          </div>
        </section>

        <section class="ds section_gradient gradient-background py-50">
          <div class="container">
            <div class="row">
              <div class="col-md-4 text-center animate" data-animation="pullUp">
                <div class="info-block">
                  <p>Call Us 24/7</p>
                  <h3>+123-456-7890</h3>
                </div>
              </div>
              <div class="col-md-4 text-center animate" data-animation="pullUp">
                <div class="info-block">
                  <p>Email Address</p>
                  <h3>example@example.com</h3>
                </div>
              </div>
              <div class="col-md-4 text-center animate" data-animation="pullUp">
                <div class="info-block">
                  <p>Open Hours</p>
                  <h3>Daily 9:00-20:00</h3>
                </div>
              </div>
            </div>
          </div>
        </section>

        <div
          class="ls ms page_map"
          data-draggable="true"
          data-scrollwheel="true"
        >
          <div class="marker">
            <div class="marker-address">
              sydney, australia, Liverpool street, 66
            </div>
            <div class="marker-title">First Marker</div>
            <div class="marker-description">
              <ul class="list-unstyled">
                <li>
                  <span class="icon-inline">
                    <span class="icon-styled color-main">
                      <i class="fa fa-map-marker"></i>
                    </span>
                    <span> Sydney, Australia, Liverpool street, 66 </span>
                  </span>
                </li>
                <li>
                  <span class="icon-inline">
                    <span class="icon-styled color-main">
                      <i class="fa fa-phone"></i>
                    </span>
                    <span> 1 (800) 123-45-67 </span>
                  </span>
                </li>
                <li>
                  <span class="icon-inline">
                    <span class="icon-styled color-main">
                      <i class="fa fa-envelope"></i>
                    </span>
                    <span> mail@example.com </span>
                  </span>
                </li>
              </ul>
            </div>
            <img class="marker-icon" src="./front office assets/images/map_marker_icon.png" alt="" />
          </div>
          <!-- .marker -->
        </div>

        <footer
          class="page_footer ds s-py-sm-20 s-pt-md-75 s-pb-md-50 s-py-lg-130 c-gutter-60 pb-20 half-section"
        >
          <div class="container">
            <div class="row">
              <div
                class="footer col-md-4 text-center animate"
                data-animation="fadeInUp"
              >
                <div class="footer widget text-center">
                  <h3 class="widget-title title-menu">Explore</h3>
                  <ul class="footer-menu">
                    <li>
                      <a href="#">Job Search</a>
                    </li>
                    <li class="menu1">
                      <a>Consultants</a>
                    </li>
                    <li>
                      <a href="#">Reviews</a>
                    </li>
                    <li class="menu1">
                      <a>Insights</a>
                    </li>
                    <li>
                      <a href="#">Survey</a>
                    </li>
                    <li class="menu1">
                      <a>Careers</a>
                    </li>
                    <li class="border-bottom-0">
                      <a href="#">Contact</a>
                    </li>
                    <li class="menu1 border-bottom-0">
                      <a>About</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div
                class="footer col-md-4 text-center animate"
                data-animation="fadeInUp"
              >
                <div class="text-center">
                  <div class="header_logo_center footer-logo-ds">
                    <a href="index.php" class="logo">
                      <span class="logo_text">Hire</span>
                      <img src="./front office assets/images/light_logo.png" alt="" />
                      <span class="logo_subtext">Up</span>
                    </a>
                  </div>
                  <!-- eof .header_left_logo -->
                </div>
                <div class="widget pt-20">
                  Duis autem vel eum iriure dolor in hendrerit in vulputate
                  velit esse molestie consequat, vel illum dolore eu feugiat
                  nulla.
                </div>
                <div class="widget">
                  <div class="media">
                    <i class="mx-10 color-main fa fa-map-marker"></i>
                    4518 Spirit Drive, Deland, FL 32720
                  </div>

                  <div class="media">
                    <i class="mx-10 color-main fa fa-phone"></i>
                    101 123 456 789
                  </div>

                  <div class="media text-center link">
                    <i class="mx-10 text-center color-main fa fa-envelope"></i>
                    <a href="#">example@example.com</a>
                  </div>
                </div>

                <div class="author-social">
                  <a
                    title="#"
                    href="https://www.facebook.com/profile.php?id=61557532202485"
                    class="fa fa-facebook color-bg-icon rounded-icon"
                  ></a>
                  <a
                    title="#"
                    href="https://www.instagram.com/hire.up.tn/"
                    class="fa fa-twitter color-bg-icon rounded-icon"
                  ></a>
                  <a
                    title="#"
                    href="https://www.instagram.com/hire.up.tn/"
                    class="fa fa-google color-bg-icon rounded-icon"
                  ></a>
                </div>
              </div>
              <div
                class="footer col-md-4 text-center animate"
                data-animation="fadeInUp"
              >
                <div class="widget widget_mailchimp">
                  <h3 class="widget-title">Newsletter</h3>

                  <p>
                    Enter your email address here always to be updated. We
                    promise not to spam!
                  </p>

                  <form class="signup">
                    <label for="mailchimp_email">
                      <span class="screen-reader-text">Subscribe:</span>
                    </label>

                    <input
                      id="mailchimp_email"
                      name="email"
                      type="email"
                      class="form-control mailchimp_email"
                      placeholder="Email Address"
                    />

                    <button type="submit" class="search-submit">
                      Subscribe
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </footer>

        <section class="page_copyright ds s-py-30">
          <div class="container">
            <div class="row align-items-center">
              <div class="divider-20 d-none d-lg-block"></div>
              <div class="col-md-12 text-center">
                <p>
                  &copy; Copyright <span class="copyright_year">2024</span> All
                  Rights Reserved
                </p>
              </div>
              <div class="divider-20 d-none d-lg-block"></div>
            </div>
          </div>
        </section>
      </div>
      <!-- eof #box_wrapper -->
    </div>
    <!-- eof #canvas -->

    <script src="./front office assets/js/compressed.js"></script>
    <script src="./front office assets/js/main.js"></script>
    <!-- <script src="js/switcher.js"></script> -->

    <!-- Google Map Script -->
    <script
      type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?"
    ></script>
  </body>
</html>
