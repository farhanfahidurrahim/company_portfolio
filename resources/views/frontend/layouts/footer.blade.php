<div class="footer-top">
    <div class="container">
      <div class="row">
        @php
            $contact=DB::table('contacts')->first();
        @endphp
        <div class="col-lg-3 col-md-6 footer-contact">
          <h3>Company</h3>
          <p>
            {{ $contact->address }} <br><br>
            <strong>Phone:</strong> {{ $contact->phone_one }}<br>
            <strong>Phone:</strong> {{ $contact->phone_two }}<br>
            <strong>Email:</strong> {{ $contact->email }}<br>
          </p>
        </div>

        <div class="col-lg-2 col-md-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('home') }}">Home</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('nav.news') }}">News Post</a></li>
            {{-- <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li> --}}
            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('nav.contact') }}">Contact us</a></li>
            {{-- <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li> --}}
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          {{-- <h4>Our Services</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
          </ul> --}}
        </div>

        @php
            $social_link=DB::table('social_links')->first();
        @endphp
        <div class="col-lg-4 col-md-6 footer-newsletter">
          <h4>Follow Our Social Site</h4>
          <div class="social-links text-center text-md-right pt-3 pt-md-0">
              <a href="{{ $social_link->facebook }}" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="{{ $social_link->instagram }}" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="{{ $social_link->twitter }}" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="{{ $social_link->linkedin }}" target="_blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="container d-md-flex py-4">

    <div class="me-md-auto text-center text-md-start">
      <div class="copyright">
        &copy; Copyright <strong><span>Company</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/company-free-html-bootstrap-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
    {{-- <div class="social-links text-center text-md-right pt-3 pt-md-0">
      <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
      <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
      <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
      <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
      <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
    </div> --}}
  </div>
