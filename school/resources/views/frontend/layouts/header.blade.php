<nav class="fh5co-nav" role="navigation">
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-right">
                    <p class="site">www.yourdomainname.com</p>
                    <p class="num">Call: +01 123 456 7890</p>
                    <ul class="fh5co-social">
                        <li><a href="#"><i class="icon-facebook2"></i></a></li>
                        <li><a href="#"><i class="icon-twitter2"></i></a></li>
                        <li><a href="#"><i class="icon-dribbble2"></i></a></li>
                        <li><a href="#"><i class="icon-github"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="top-menu">
        <div class="container">
            <div class="row">
                <div class="col-xs-2">
                    <div id="fh5co-logo"><a href="index.html"></a></div>
                </div>
                <div class="col-xs-10 text-right menu-1">
                    <ul>
                        <li class="active"><a href="{{route('frontend.layouts.home')}}">Home</a></li>
                        <li><a href="{{route('frontend.layouts.course')}}">Courses</a></li>
                        <li><a href="{{route('frontend.layouts.teacher')}}">Teacher</a></li>
                        <li><a href="{{route('frontend.layouts.about')}}">About</a></li>
                        <li><a href="{{route('frontend.layouts.pricing')}}">Pricing</a></li>
                        <li class="has-dropdown">
                            <a href="{{route('frontend.layouts.blog')}}">Blog</a>
                            <ul class="dropdown">
                                <li><a href="#">Web Design</a></li>
                                <li><a href="#">eCommerce</a></li>
                                <li><a href="#">Branding</a></li>
                                <li><a href="#">API</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('frontend.layouts.contact')}}">Contact</a></li>
                        <li class="btn-cta"><a href="{{ route('login') }}"><span>Login</span></a></li>
                        <li class="btn-cta"><a href="#"><span>Create a Course</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
