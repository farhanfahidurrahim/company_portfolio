@extends('frontend.layouts.master')
@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Contact-Us</h2>
          <ol>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li>Contact</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="ftco-section contact-section">
        <div class="container">
          <div class="row block-9 mb-4">
            <div class="col-md-6 pr-md-5 flex-column">
              <div class="row d-block flex-row">
                <h2 class="h4 mb-4">Contact Information</h2>
                <div class="col mb-3 d-flex py-4 border" style="background: white;">
                  <div class="align-self-center">
                    <p class="mb-0"><span>Address:</span> <a href="#"> {{ $contact->address }}</a></p>
                  </div>
                </div>
                <div class="col mb-3 d-flex py-4 border" style="background: white;">
                  <div class="align-self-center">
                    <p class="mb-0"><span>Phone One:</span> <a href="tel://{{ $contact->phone_one }}"> {{ $contact->phone_one }}</a></p>
                  </div>
                </div>
                <div class="col mb-3 d-flex py-4 border" style="background: white;">
                    <div class="align-self-center">
                      <p class="mb-0"><span>Phone Two:</span> <a href="tel://{{ $contact->phone_two }}"> {{ $contact->phone_two }}</a></p>
                    </div>
                  </div>
                <div class="col mb-3 d-flex py-4 border" style="background: white;">
                  <div class="align-self-center">
                    <p class="mb-0"><span>Email:</span> <a href="mailto:{{ $contact->email }}"> {{ $contact->email }}</a></p>
                  </div>
                </div>
                {{-- <div class="col mb-3 d-flex py-4 border" style="background: white;">
                  <div class="align-self-center">
                    <p class="mb-0"><span>Website</span> <a href="#">yoursite.com</a></p>
                  </div>
                </div> --}}
              </div>
            </div>

            <div class="col-md-6">
            <h2 class="h4 mb-0">Get In Touch!</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error )
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('contact.message.store') }}" method="post">
                @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1"></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Your Full Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"></label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter Your Email Address">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="subject" placeholder="Enter Message Subject">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"></label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3" placeholder="Enter Your Message"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"></label>
                        <input type="number" class="form-control" id="exampleInputEmail1" name="phone" placeholder="Enter Your Phone Number (Optional)">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12" id="map"></div>
        </div>
        </div>
    </section>

</main>

@endsection
