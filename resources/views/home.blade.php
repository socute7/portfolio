@extends('layouts.app')

@section('content')

    <!-- External CSS -->
    <link rel="stylesheet" href="https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/css/demo.css">

    <!-- External JavaScript -->
    <script src="https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/EasePack.min.js"></script>
    <script src="https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/rAF.js"></script>
    <script src="https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/TweenLite.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/TweenLite/1.20.3/TweenLite.min.js"></script>
    <style>
        /* Header */
        .home {
            position: relative;
            width: 100%;
            background: #333;
            overflow: hidden;
            background-size: cover;
            background-position: center center;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #home-bg {
            background-image: url("https://img.freepik.com/free-vector/gradient-hexagonal-background_23-2148944164.jpg?t=st=1729496272~exp=1729499872~hmac=f4c9cf77c12c29f57979ab1b1fa18850086027e8c5c8ba9cd44bdd47233d2f52&w=2000");
            height: 80vh;
            width: 100%;
        }

        .home-container {
            min-height: 50vh;
            position: relative;
            z-index: 2;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Menjaga konten berada di tengah horizontal */
            text-align: center;
            /* Menambah padding untuk jarak */
        }

        .main-title {
            margin: 0;
            padding: 0;
            color: #f9f1e9;
            text-align: center;
            top: 50%;
            left: 50%;
            transform: translate3d(-50%, -50%);
        }

        .demo-1 .main-title {
            text-transform: uppercase;
            font-size: 4.2em;
            letter-spacing: 0.1em;
        }

        .main-title .thin {
            font-weight: 200;
        }

        @media only screen and (max-width: 768px) {
            .demo-1 .main-title {
                font-size: 3em;
            }

            .home-container {
                text-align: center;
                /* Ubah align untuk perangkat kecil */
            }

            .main-title {
                margin-top: 20px;
                /* Atur jarak atas jika perlu */
            }
        }

        /* Canvas Styling */
        #demo-canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
    </head>

    <body>

        <!-- Header Start -->
        <header>
            <div id="home-bg" class="home">
                <canvas id="demo-canvas"></canvas>
                <div class="home-container">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-5 pb-5 pb-lg-0">
                                <img class="img-fluid rounded-circle shadow-sm"
                                    src="{{ asset('storage/' . $user->profile_pic) }}" alt=""
                                    style="width: 350px; height: 350px; object-fit: cover;">
                            </div>
                            <div class="col-lg-7 text-center text-lg-left">
                                <h3 class="text-white font-weight-normal mb-3">I'm</h3>
                                <h1 class="display-3 text-uppercase text-white mb-2"
                                    style="-webkit-text-stroke: 2px #ffffff;">{{ $user?->name }}</h1>
                                <h1 class="typed-text-output d-inline font-weight-lighter text-white"></h1>
                                <div class="typed-text d-none">{{ $user?->job }}</div>
                                <div class="d-flex align-items-center justify-content-center justify-content-lg-start pt-5">
                                    <a href="{{ $setting->cv_url }}" class="btn btn-outline-light mr-5">Download CV</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>



        <!-- About Start -->
        <div class="container-fluid py-5" id="about">
            <div class="container">
                <div class="position-relative d-flex align-items-center justify-content-center">
                    <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">About</h1>
                    <h1 class="position-absolute text-uppercase text-danger">About Me</h1>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-5 pb-4 pb-lg-0">
                        <img class="img-fluid rounded w-100" src="{{ asset("storage/$setting->about_photo") }}"
                            alt="">
                    </div>
                    <div class="col-lg-7">
                        <h3 class="mb-4">{{ $setting->about_title }}</h3>
                        <p>{{ $setting->about_description }}</p>
                        <div class="row mb-3">
                            <div class="col-sm-6 py-2">
                                <h6>Name: <span class="text-secondary">{{ $user?->name }}</span></h6>
                            </div>
                            <div class="col-sm-6 py-2">
                                <h6>Birthday: <span class="text-secondary">{{ $user?->birth_day }}</span></h6>
                            </div>
                            <div class="col-sm-6 py-2">
                                <h6>Degree: <span class="text-secondary">{{ $user?->degree }}</span></h6>
                            </div>
                            <div class="col-sm-6 py-2">
                                <h6>Experience: <span class="text-secondary">{{ $user?->experience }} Years</span></h6>
                            </div>
                            <div class="col-sm-6 py-2">
                                <h6>Phone: <span class="text-secondary">{{ $user?->phone }}</span></h6>
                            </div>
                            <div class="col-sm-6 py-2">
                                <h6>Email: <span class="text-secondary">{{ $user?->email }}</span></h6>
                            </div>
                            <div class="col-sm-6 py-2">
                                <h6>Address: <span class="text-secondary">{{ $user?->address }}</span></h6>
                            </div>
                            <div class="col-sm-6 py-2">
                                <h6>Freelance: <span class="text-secondary">Available</span></h6>
                            </div>
                        </div>
                        <a href="{{ $setting->freelance_url }}" class="btn btn-outline-danger mr-4">Hire Me</a>
                        {{-- <a href="" class="btn btn-outline-primary">Learn More</a> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Qualification Start -->
        <div class="container-fluid py-5" id="qualification">
            <div class="container">
                <div class="position-relative d-flex align-items-center justify-content-center">
                    <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Quality</h1>
                    <h1 class="position-absolute text-uppercase text-danger">Education & Expericence</h1>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h3 class="mb-4">My Education</h3>
                        <div class="border-left border-danger pt-2 pl-4 ml-2">
                            @foreach ($educations as $education)
                                <div class="position-relative mb-4">
                                    <i class="far fa-dot-circle text-danger position-absolute"
                                        style="top: 2px; left: -32px;"></i>
                                    <h5 class="font-weight-bold mb-1">{{ $education->title }}</h5>
                                    <p class="mb-2"><strong>{{ $education->association }}</strong> |
                                        <small>{{ $education->from }} - {{ $education->to }}</small>
                                    </p>
                                    <p>{{ $education->description }} </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h3 class="mb-4">My Expericence</h3>
                        <div class="border-left border-danger pt-2 pl-4 ml-2">
                            @foreach ($experiences as $experience)
                                <div class="position-relative mb-4">
                                    <i class="far fa-dot-circle text-danger position-absolute"
                                        style="top: 2px; left: -32px;"></i>
                                    <h5 class="font-weight-bold mb-1">{{ $experience->title }}</h5>
                                    <p class="mb-2"><strong>{{ $experience->association }}</strong> |
                                        <small>{{ $experience->from }} - {{ $experience->to }}</small>
                                    </p>
                                    <p>{{ $experience->description }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Qualification End -->


        <!-- Skill Start -->
        <div class="container-fluid py-5" id="skill">
            <div class="container">
                <div class="position-relative d-flex align-items-center justify-content-center">
                    <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Skills</h1>
                    <h1 class="position-absolute text-uppercase text-danger">My Skills</h1>
                </div>
                <div class="row align-items-center">
                    @foreach ($skills->split(max(1, $skills->count() / 3)) as $row)
                        <div class="col-md-6">
                            @foreach ($row as $skill)
                                <div class="skill mb-4">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="font-weight-bold">{{ $skill->name }}</h6>
                                        <h6 class="font-weight-bold">{{ $skill->percent }}%</h6>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->percent }}"
                                            aria-valuemin="0" aria-valuemax="100"
                                            style="background-color: {{ $skill->color }}"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Skill End -->


        <!-- Services Start -->
        {{-- <div class="container-fluid pt-5" id="service">
            <div class="container">
                <div class="position-relative d-flex align-items-center justify-content-center">
                    <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Service</h1>
                    <h1 class="position-absolute text-uppercase text-danger">My Services</h1>
                </div>
                <div class="row pb-3">
                    @foreach ($services as $service)
                        <div class="col-lg-4 col-md-6 text-center mb-5">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <i class="{{ $service->icon }} service-icon bg-primary text-white mr-3"></i>
                                <h4 class="font-weight-bold m-0">{{ $service->name }}</h4>
                            </div>
                            <p>{{ $service->description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div> --}}
        <!-- Services End -->


        <!-- Portfolio Start -->
        <div class="container-fluid pt-5 pb-3" id="portfolio">
            <div class="container">
                <div class="position-relative d-flex align-items-center justify-content-center">
                    <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Gallery</h1>
                    <h1 class="position-absolute text-uppercase text-danger">My Portfolio</h1>
                </div>
                <div class="row">
                    <div class="col-12 text-center mb-2">
                        <ul class="list-inline mb-4" id="portfolio-flters">
                            <li class="btn btn-sm btn-outline-danger m-1 active" data-filter="*">All</li>
                            @foreach ($categories as $category)
                                <li class="btn btn-sm btn-outline-danger m-1" data-filter=".{{ $category->name }}">
                                    {{ $category->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row portfolio-container">
                    @foreach ($portfolios as $portfolio)
                        <div class="col-lg-4 col-md-6 mb-4 portfolio-item {{ $portfolio->category->name }}">
                            <div class="position-relative overflow-hidden mb-2">
                                <img class="img-fluid rounded w-100" src="{{ asset("storage/$portfolio->image") }}"
                                    alt="">
                                <div class="portfolio-btn bg-danger d-flex align-items-center justify-content-center">
                                    <a href="{{ asset("storage/$portfolio->image") }}" data-lightbox="portfolio">
                                        <i class="fa fa-plus text-white" style="font-size: 50px;"></i>
                                    </a>
                                    <a href="{{ $portfolio->project_url }}" data-lightbox="portfolio">
                                        <i class="fa-solid fa-link text-white"
                                            style="margin-left:20px; font-size: 50px;"></i>
                                    </a>
                                </div>
                                <h5 class="text-center text-uppercase mt-2">{{ $portfolio->title }}</h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Portfolio End -->


        <!-- Testimonial Start -->
        {{-- <div class="container-fluid py-5" id="testimonial">
            <div class="container">
                <div class="position-relative d-flex align-items-center justify-content-center">
                    <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Review</h1>
                    <h1 class="position-absolute text-uppercase text-danger">Clients Say</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="owl-carousel testimonial-carousel">
                            @foreach ($reviewers as $review)
                                <div class="text-center">
                                    <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                                    <h4 class="font-weight-light mb-4">{{ $review->description }}</h4>
                                    <img class="img-fluid rounded-circle mx-auto mb-3"
                                        src="{{ asset("storage/$review->image") }}" style="width: 80px; height: 80px;">
                                    <h5 class="font-weight-bold m-0">{{ $review->name }} </h5>
                                    <span>{{ $review->job }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Testimonial End -->

        <!-- Contact Start -->
        <div class="container-fluid py-5" id="contact">
            <div class="container">
                <div class="position-relative d-flex align-items-center justify-content-center">
                    <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Contact</h1>
                    <h1 class="position-absolute text-uppercase text-danger">Contact Me</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="contact-form text-center">
                            @if (Session::has('message'))
                                <div class="alert alert-primary" role="alert">
                                    {{ Session::get('message') }}
                                </div>
                                <br>
                            @endif
                            <form id="contactForm" method="POST" action="{{ route('contact') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="control-group col-sm-6">
                                        <input type="text" class="form-control p-4" id="name"
                                            placeholder="Your Name" required name="name"
                                            value="{{ old('name') }}" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group col-sm-6">
                                        <input type="email" class="form-control p-4" id="email"
                                            placeholder="Your Email" value="{{ old('email') }}" required
                                            name="email" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <input type="text" class="form-control p-4" id="subject" placeholder="Subject"
                                        value="{{ old('subject_mail') }}" required name="subject_mail" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <textarea class="form-control py-3 px-4" rows="5" id="message" placeholder="Message" name="content"
                                        required>{{ old('content') }}</textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div>
                                    <button class="btn btn-outline-danger" type="submit" id="sendMessageButton">Send
                                        Message</button>
                                </div>
                                @if ($errors->any())
                                    <br>
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->


        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white mt-5 py-5 px-sm-3 px-md-5">
            <div class="container text-center py-5">
                <div class="d-flex justify-content-center mb-4">
                    <a class="btn btn-light btn-social mr-2" href="{{ $setting->github_url }}"><i
                            class="fab fa-github"></i></a>
                    <a class="btn btn-light btn-social mr-2" href="{{ $setting->fb_url }}"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-light btn-social mr-2" href="{{ $setting->linkedin_url }}"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="d-flex justify-content-center mb-3">
                    <a class="text-white" href="#">Privacy</a>
                    <span class="px-3">|</span>
                    <a class="text-white" href="#">Terms</a>
                    <span class="px-3">|</span>
                    <a class="text-white" href="#">FAQs</a>
                    <span class="px-3">|</span>
                    <a class="text-white" href="#">Help</a>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Scroll to Bottom -->
        <i class="fa fa-2x fa-angle-down text-white scroll-to-bottom"></i>

        <!-- Back to Top -->
        <a href="#" class="btn btn-outline-dark px-0 back-to-top"><i class="fa fa-angle-double-up"></i></a>


        <script>
            (function() {
                var width, height, largeHeader, canvas, ctx, points, target, animateHeader = true;

                // Main
                initHeader();
                initAnimation();
                addListeners();

                function initHeader() {
                    width = window.innerWidth;
                    height = window.innerHeight;
                    target = {
                        x: width / 2,
                        y: height / 2
                    };

                    largeHeader = document.getElementById('home-bg');
                    largeHeader.style.height = height + 'px';

                    canvas = document.getElementById('demo-canvas');
                    canvas.width = width;
                    canvas.height = height;
                    ctx = canvas.getContext('2d');

                    // Create points
                    points = [];
                    for (var x = 0; x < width; x += width / 20) {
                        for (var y = 0; y < height; y += height / 20) {
                            var px = x + Math.random() * width / 20;
                            var py = y + Math.random() * height / 20;
                            var p = {
                                x: px,
                                originX: px,
                                y: py,
                                originY: py
                            };
                            points.push(p);
                        }
                    }

                    // Assign closest points
                    for (var i = 0; i < points.length; i++) {
                        var closest = [];
                        var p1 = points[i];
                        for (var j = 0; j < points.length; j++) {
                            var p2 = points[j];
                            if (!(p1 == p2)) {
                                var placed = false;
                                for (var k = 0; k < 5; k++) {
                                    if (!placed) {
                                        if (closest[k] == undefined) {
                                            closest[k] = p2;
                                            placed = true;
                                        }
                                    }
                                }

                                for (var k = 0; k < 5; k++) {
                                    if (!placed) {
                                        if (getDistance(p1, p2) < getDistance(p1, closest[k])) {
                                            closest[k] = p2;
                                            placed = true;
                                        }
                                    }
                                }
                            }
                        }
                        p1.closest = closest;
                    }

                    // Assign circles to each point
                    for (var i in points) {
                        var c = new Circle(points[i], 2 + Math.random() * 2, 'rgba(255,255,255,0.3)');
                        points[i].circle = c;
                    }
                }

                // Event handling
                function addListeners() {
                    if (!('ontouchstart' in window)) {
                        window.addEventListener('mousemove', mouseMove);
                    }
                    window.addEventListener('scroll', scrollCheck);
                    window.addEventListener('resize', resize);
                }

                function mouseMove(e) {
                    var posx = posy = 0;
                    if (e.pageX || e.pageY) {
                        posx = e.pageX;
                        posy = e.pageY;
                    } else if (e.clientX || e.clientY) {
                        posx = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
                        posy = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
                    }
                    target.x = posx;
                    target.y = posy;
                }

                function scrollCheck() {
                    if (document.body.scrollTop > height) animateHeader = false;
                    else animateHeader = true;
                }

                function resize() {
                    width = window.innerWidth;
                    height = window.innerHeight;
                    largeHeader.style.height = height + 'px';
                    canvas.width = width;
                    canvas.height = height;
                }

                // Animation
                function initAnimation() {
                    animate();
                    for (var i in points) {
                        shiftPoint(points[i]);
                    }
                }

                function animate() {
                    if (animateHeader) {
                        ctx.clearRect(0, 0, width, height);
                        for (var i in points) {
                            // Detect points in range
                            if (Math.abs(getDistance(target, points[i])) < 4000) {
                                points[i].active = 0.3;
                                points[i].circle.active = 0.6;
                            } else if (Math.abs(getDistance(target, points[i])) < 20000) {
                                points[i].active = 0.1;
                                points[i].circle.active = 0.3;
                            } else if (Math.abs(getDistance(target, points[i])) < 40000) {
                                points[i].active = 0.02;
                                points[i].circle.active = 0.1;
                            } else {
                                points[i].active = 0;
                                points[i].circle.active = 0;
                            }

                            drawLines(points[i]);
                            points[i].circle.draw();
                        }
                    }
                    requestAnimationFrame(animate);
                }

                function shiftPoint(p) {
                    TweenLite.to(p, 1 + 1 * Math.random(), {
                        x: p.originX - 50 + Math.random() * 100,
                        y: p.originY - 50 + Math.random() * 100,
                        ease: Circ.easeInOut,
                        onComplete: function() {
                            shiftPoint(p);
                        }
                    });
                }

                // Canvas manipulation
                function drawLines(p) {
                    if (!p.active) return;
                    for (var i in p.closest) {
                        ctx.beginPath();
                        ctx.moveTo(p.x, p.y);
                        ctx.lineTo(p.closest[i].x, p.closest[i].y);
                        ctx.strokeStyle = 'rgba(156,217,249,' + p.active + ')';
                        ctx.stroke();
                    }
                }

                function Circle(pos, rad, color) {
                    var _this = this;

                    // Constructor
                    (function() {
                        _this.pos = pos || null;
                        _this.radius = rad || null;
                        _this.color = color || null;
                    })();

                    this.draw = function() {
                        if (!_this.active) return;
                        ctx.beginPath();
                        ctx.arc(_this.pos.x, _this.pos.y, _this.radius, 0, 2 * Math.PI, false);
                        ctx.fillStyle = 'rgba(156,217,249,' + _this.active + ')';
                        ctx.fill();
                    };
                }

                // Util
                function getDistance(p1, p2) {
                    return Math.pow(p1.x - p2.x, 2) + Math.pow(p1.y - p2.y, 2);
                }
            })();
        </script>
    @endsection
