@extends('frontend.layouts.master')

@section('content')
    <aside id="fh5co-hero">
        <div class="flexslider">
            <ul class="slides">
            <li style="background-image: url('{{asset('/frontend/images/img_bg_4.jpg')}}');">
                <div class="overlay-gradient"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center slider-text">
                            <div class="slider-text-inner">
                                <h1 class="heading-section">Contact us</h1>
                                    <h2>Free html5 templates Made by <a href="http://freehtml5.co/" target="_blank">freehtml5.co</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            </ul>
        </div>
    </aside>

    <div id="fh5co-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-md-push-1 animate-box">

                    <div class="fh5co-contact-info">
                        <h3>Contact Information</h3>
                        <ul>
                            <li class="address">198 West 21th Street, <br> Suite 721 New York NY 10016</li>
                            <li class="phone"><a href="tel://1234567920">+ 1235 2355 98</a></li>
                            <li class="email"><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
                            <li class="url"><a href="http://freehtml5.co">freeHTML5.co</a></li>
                        </ul>
                    </div>

                </div>
                <div class="col-md-6 animate-box">
                    <h3>Get In Touch</h3>
                    @if (Session::get('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>{{Session::get('success')}}</strong>
                        </div>
                    @endif
                    <form method="POST" action="{{route('frontend.layouts.contact.store')}}">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-6">
                                <!-- <label for="fname">First Name</label> -->
                                <input type="text" name="fname" id="fname" class="form-control" placeholder="Your firstname" required>
                            </div>
                            <div class="col-md-6">
                                <!-- <label for="lname">Last Name</label> -->
                                <input type="text" name="lname" id="lname" class="form-control" placeholder="Your lastname" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <!-- <label for="email">Email</label> -->
                                <input type="text" name="email" id="email" class="form-control" placeholder="Your email address" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <!-- <label for="subject">Subject</label> -->
                                <input type="text" name="subject" id="subject" class="form-control" placeholder="Your subject of this message" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <!-- <label for="message">Message</label> -->
                                <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
    <div id="map" class="fh5co-map"></div>

    <div id="fh5co-register" style="background-image: url('{{asset('/frontend/images/img_bg_2.jpg')}}');">
        <div class="overlay"></div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 animate-box">
                <div class="date-counter text-center">
                    <h2>Get 400 of Online Courses for Free</h2>
                    <h3>By Mike Smith</h3>
                    <div class="simply-countdown simply-countdown-one"></div>
                    <p><strong>Limited Offer, Hurry Up!</strong></p>
                    <p><a href="#" class="btn btn-primary btn-lg btn-reg">Register Now!</a></p>
                </div>
            </div>
        </div>
    </div>

@endsection
