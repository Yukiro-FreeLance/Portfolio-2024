<?php
include('header.php')
?>
<div class="art-app art-app-onepage">
  <div class="art-mobile-top-bar"></div>

  <div class="art-app-wrapper">
    <div class="art-app-container">
      <?php
      include('sidebar.php')
      ?>

      <div class="art-content ">
        <div class="art-curtain"></div>

        <div class="art-top-bg" style="background-image: url(img/bg.jpg)">
          <div class="art-top-bg-overlay"></div>
        </div>

        <div class="transition-fade" id="swup">
          <div id="scrollbar" class="art-scroll-frame">
            <div class="container-fluid">
              <div class="row p-60-0 p-lg-30-0 p-md-15-0">
                <div class="col-lg-12">
                  <div class="art-a art-banner" style="background-image: url(img/bg.jpg)">
                    <div class="art-banner-back"></div>

                    <div class="art-banner-dec"></div>

                    <div class="art-banner-overlay">
                      <div class="art-banner-title">
                        <h1 class="mb-15">
                          Discover my Amazing <br />Art Space!
                        </h1>

                        <div class="art-lg-text art-code mb-25">
                          &lt;<i>code</i>&gt; I build
                          <span class="txt-rotate" data-period="2000" data-rotate='[ "web interfaces.", "an web applications.", "design mocups.", "automation tools." ]'></span>&lt;/<i>code</i>&gt;
                        </div>
                        <div class="art-buttons-frame">
                          <a href="#." class="art-btn art-btn-md"><span>Explore now</span></a>

                          <a href="contact.php" class="art-link art-white-link art-w-chevron">Hire me</a>
                        </div>
                      </div>
                      <img src="img/logo.png" class="art-banner-photo" alt="Your Name" />
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="container-fluid">
              <div class="row p-30-0">
                <div class="col-md-3 col-6">
                  <div class="art-counter-frame">
                    <div class="art-counter-box">
                      <span class="art-counter">1</span><span class="art-counter-plus">+</span>
                    </div>

                    <h6>Year Experience</h6>
                  </div>
                </div>

                <div class="col-md-3 col-6">
                  <div class="art-counter-frame">
                    <div class="art-counter-box">
                      <span class="art-counter">6</span>
                    </div>

                    <h6>Completed Projects</h6>
                  </div>
                </div>

                <div class="col-md-3 col-6">
                  <div class="art-counter-frame">
                    <div class="art-counter-box">
                      <span class="art-counter">10</span>
                    </div>

                    <h6>Happy Customers</h6>
                  </div>
                </div>

                <div class="col-md-3 col-6">
                  <div class="art-counter-frame">
                    <div class="art-counter-box">
                      <span class="art-counter">12</span><span class="art-counter-plus">+</span>
                    </div>

                    <h6>Honors and Awards</h6>
                  </div>
                </div>
              </div>
            </div>

            <div class="container-fluid" style="margin-top: 0">
              <div class="row p-60-0 p-lg-30-0 p-md-15-0">
                <div class="col-lg-12">
                  <div class="art-section-title">
                    <div class="art-title-frame">
                      <h4>About Me</h4>
                    </div>
                  </div>
                  <div class="col-lg-12" style="margin:0">
                    <div class="art-a art-service-icon-box" style="padding: 0">
                      <div class="art-service-ib-content" >
                        <p style="font-size: 16px">
                          I'm Wendel Luche, a recent graduate of Palompon Institute of Technology - Tabango. Motivated and tech-savvy BSIT graduate seeking a challenging position in the field of Information Technology. I specialize in web development, with skills in PHP, HTML, CSS, JS, SCSS, Bootstrap, MySQL, Canva, and WordPress.
                          <br><br>
                          Passionate about creating engaging and dynamic online experiences, I specialize in constructing websites that are not only functional and user-friendly but also visually appealing. I infuse a personal touch into your product, ensuring it's both eye-catching and easy to navigate. My goal is to convey your message and identity in the most creative and engaging manner possible.
                          <br>
                          <br>
                          Eager to apply my technical knowledge, problem-solving skills, and passion for innovation to contribute to the success of a dynamic organization.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="art-section-title">
                    <div class="art-title-frame">
                      <h4>My Services</h4>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6">
                  <div class="art-a art-service-icon-box">
                    <div class="art-service-ib-content">
                      <h5 class="mb-15">Web Development</h5>

                      <div class="mb-15">My Content</div>

                      <div class="art-buttons-frame">
                        <a href="#." class="art-link art-color-link art-w-chevron">Inquire now</a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6">
                  <div class="art-a art-service-icon-box">
                    <div class="art-service-ib-content">
                      <h5 class="mb-15">UI/UX Design</h5>

                      <div class="mb-15">Description</div>

                      <div class="art-buttons-frame">
                        <a href="#." class="art-link art-color-link art-w-chevron">Inquire now</a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6">
                  <div class="art-a art-service-icon-box">
                    <div class="art-service-ib-content">
                      <h5 class="mb-15">Graphic Design</h5>

                      <div class="mb-15">Description</div>

                      <div class="art-buttons-frame">
                        <a href="#." class="art-link art-color-link art-w-chevron">Inquire now</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
            include('portfolio.php')
            ?>
            <?php
            include('history.php')
            ?>
            <?php
            include('blog.php')
            ?>
            <?php
            include('testimonial.php')
            ?>
            <div class="container-fluid">
              <div class="row">
                <div class="col-6 col-lg-3">
                  <img class="art-brand" src="img/brands/1.png" alt="brand" />
                </div>

                <div class="col-6 col-lg-3">
                  <img class="art-brand" src="img/brands/2.png" alt="brand" />
                </div>

                <div class="col-6 col-lg-3">
                  <img class="art-brand" src="img/brands/3.png" alt="brand" />
                </div>

                <div class="col-6 col-lg-3">
                  <img class="art-brand" src="img/brands/1.png" alt="brand" />
                </div>
              </div>
            </div>

            <?php
            include('contact.php')
            ?>
            <div class="container-fluid">
              <?php
              include('footer.php');
              ?>
            </div>
          </div>
        </div>
      </div>

      <?php
      include('navbar.php')
      ?>
    </div>
  </div>

  <div class="art-preloader ">
    <div class="art-preloader-content">
      <h4>Wendel Luche</h4>
      <div id="preloader" class="art-preloader-load"></div>
    </div>
  </div>
</div>

<style>
  .art-menu-bar {
    display: none;
  }
</style>