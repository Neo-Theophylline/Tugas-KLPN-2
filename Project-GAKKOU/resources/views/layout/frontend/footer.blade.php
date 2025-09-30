  <footer id="footer" class="footer dark-background">

      <div class="container footer-top">
          <div class="row gy-4">
              <div class="col-lg-4 col-md-4 footer-about">
                  <a href="index.html" class="logo d-flex align-items-center">
                      <span class="sitename">RIZZ SCHOOL</span>
                  </a>
                  <div class="footer-contact pt-3">
                      <p>Jl. Mandor Martinem Roy</p>
                      <p>Kota Banjar</p>
                      <p class="mt-3"><strong>Phone:</strong> <span>+1 831 3312 6644</span></p>
                      <p><strong>Email:</strong> <span>rizz@email.com</span></p>
                  </div>
                  <div class="social-links d-flex mt-4">
                      <a href=""><i class="bi bi-twitter-x"></i></a>
                      <a href=""><i class="bi bi-youtube"></i></a>
                      <a href=""><i class="bi bi-instagram"></i></a>
                      <a href=""><i class="bi bi-tiktok"></i></a>
                  </div>
              </div>

              <div class="col-lg-4 col-md-4 footer-links d-flex flex-column align-items-center">
                  <h4>Useful Links</h4>
                  <ul>
                      <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                      <li><a href="about" class="{{ request()->is('about') ? 'active' : '' }}">About</a></li>
                      <li><a href="services" class="{{ request()->is('services') ? 'active' : '' }}">Services</a></li>
                      <li><a href="testimonials" class="{{ request()->is('testimonials') ? 'active' : '' }}">Testimonials</a></li>
                      <li><a href="contact" class="{{ request()->is('contact') ? 'active' : '' }}">Contact us</a></li>
                  </ul>
              </div>

              <div class="col-lg-4 col-md-4 footer-links d-flex flex-column align-items-center">
                  <h4>Our Services</h4>
                  <ul>
                      <li><a>Admissions / PPDB</a></li>
                      <li><a>Academic Programs</a></li>
                      <li><a>Payment Information</a></li>
                      <li><a>Library Access</a></li>
                      <li><a>Payment Information</a></li>
                  </ul>
              </div>

          </div>
      </div>

      <div class="container copyright text-center mt-4">
          <p>© <span>Copyright</span> <strong class="px-1 sitename">RIZZ SCHOOL</strong> <span>All Rights
                  Reserved</span></p>
          <div class="credits">
              <!-- All the links in the footer should remain intact. -->
              <!-- You can delete the links only if you've purchased the pro version. -->
              <!-- Licensing information: https://bootstrapmade.com/license/ -->
              <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
              Designed by <a href="#">Kelompok 2</a> Distributed by
              <a href="#">RIZZ SCHOOL TEAM </a>
          </div>
      </div>

  </footer>
