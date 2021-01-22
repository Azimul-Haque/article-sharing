@extends('layouts.index')

@section('title')
    Knowledge, Information & Learning for Local Adaptation (KILLA)
@endsection

@section('css')
    <style type="text/css">
        body {
            overflow: hidden;
        }

        /* Preloader */
        #preloader {
            position: fixed;
            top:0;
            left:0;
            right:0;
            bottom:0;
            background-color:#fff; /* change if the mask should have another color then white */
            z-index:99999;
        }

        #status {
            width:200px;
            height:200px;
            position:absolute;
            left:50%;
            top:50%;
            background-image:url({{ asset('images/3362406.gif') }}); /* path to your loading animation */
            background-repeat:no-repeat;
            background-position:center;
            margin:-100px 0 0 -100px;
        }
    </style>
@endsection

@section('content')
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    @include('partials._slider')
    
    <!-- about section -->
    <section class=" wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-10 text-center center-col">
                    <span class="margin-five no-margin-top display-block letter-spacing-2">Established-2017</span>
                    <span style="font-size: 20px; font-weight: bold;">Knowledge, Information & Learning for Local Adaptation (KILLA)</span>
                    <p class="text-med width-90 center-col margin-seven no-margin-bottom">Knowledge, Information & Learning for Local Adaptation (KILLA) a globally leading organization providing productive and technologically sustainable solutions for reshaping today and constructing a resilient tomorrow. </p>
                </div>
            </div>
        </div>
    </section>
    <!-- end about section -->
    <section class="padding-three bg-gray">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-md-6 col-sm-6">
                    <span class="text-large letter-spacing-2 black-text font-weight-600 agency-title">TenX Genres</span>
                </div>
                <!-- end section title -->
                <!-- section highlight text -->
                <div class="col-md-6 col-sm-6 text-right xs-text-left">
                </div>
                <!-- end section highlight text -->
            </div>
        </div>
    </section>
    <section class="work-5col gutter work-with-title wide wide-title padding-five bg-yellow">
        <div class="container">
            <div class="row">
                <div class="col-md-12 grid-gallery overflow-hidden no-padding" >
                    <div class="tab-content">
                        <!-- tour grid -->
                        <ul class="grid masonry-items">
                            @foreach($projects as $project)
                                <li class="@if($project->status == 0) ongoing @else completed @endif wow fadeInLeft" data-wow-duration="900ms">
                                    <figure>
                                        <div class="gallery-img">
                                            <a href="{{ route('index.project', $project->slug) }}">
                                                @if($project->image != null)
                                                  <img src="{{ asset('images/projects/'.$project->image)}}" />
                                                @else
                                                  <img src="{{ asset('images/abc.png')}}"  class="img-responsive" />
                                                @endif
                                            </a>
                                        </div>
                                        <figcaption>
                                            <h3><big>{{ substr(strip_tags($project->title), 0, 50) }}</big></h3>
                                            {{-- <p class="project-min-height">{{ substr(strip_tags($project->title), 0, 50) }}...</p> --}}
                                            <a class="btn inner-link btn-black btn-small" href="{{ route('index.project', $project->slug) }}">Explore Now</a>
                                        </figcaption>
                                    </figure>
                                </li>
                            @endforeach
                        </ul>
                        <!-- end tour grid -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="padding-three bg-gray">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-md-6 col-sm-6">
                    <span class="text-large letter-spacing-2 black-text font-weight-600 agency-title">Latest Publications</span>
                </div>
                <!-- end section title -->
                <!-- section highlight text -->
                <div class="col-md-6 col-sm-6 text-right xs-text-left">
                </div>
                <!-- end section highlight text -->
            </div>
        </div>
    </section> --}}
{{--     <section id="features" class="features wow fadeIn" style="margin-bottom: 40px; padding: 60px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    @foreach($publications as $publication)
                      <!-- features item -->
                      <div class="features-section col-md-4 col-sm-6 no-padding wow fadeInUp" style="min-height: 100px;">
                          <div class="col-md-3 col-sm-2 col-xs-2 ">
                              <a href="{{ route('index.publication', $publication->code) }}">
                                @if($publication->image != null)
                                  <img src="{{ asset('images/publications/'.$publication->image)}}" />
                                @else
                                  <img src="{{ asset('images/pub.png')}}" />
                                @endif
                              </a>
                          </div>
                          <div class="col-md-9 col-sm-9 no-padding col-xs-9 text-left f-right">
                              <a href="{{ route('index.publication', $publication->code) }}"><h5 style="margin: 5px;">{{ substr(strip_tags($publication->title), 0, 60) }}...</h5></a>
                              <div class="separator-line bg-yellow"></div>{{ date('F d, Y', strtotime($publication->publishing_date)) }}

                          </div>
                      </div>
                      <!-- end features item -->
                    @endforeach
                </div>
            </div>
        </div>
    </section> --}}
    <section class="padding-three bg-gray">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-md-6 col-sm-6">
                    <span class="text-large letter-spacing-2 black-text font-weight-600 agency-title">TenX at a Glance</span>
                </div>
                <!-- end section title -->
                <!-- section highlight text -->
                <div class="col-md-6 col-sm-6 text-right xs-text-left">
                </div>
                <!-- end section highlight text -->
            </div>
        </div>
    </section>
    <!-- counter section -->
    <section id="counter" class="fix-background" style="background-image:url('images/sliders/slider-img45.jpg');">
        <div class="opacity-full bg-dark-gray"></div>
        <div class="container position-relative">
            <div class="row">
                <!-- counter item -->
                <div class="col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten" data-wow-duration="300ms">
                    <i class="icon-heart medium-icon"></i>
                    <span class="timer counter-number white-text main-font font-weight-600" data-to="{{ $employeecount }}" data-speed="7000"></span>
                    <span class="counter-title light-gray-text">People</span>
                </div>
                <!-- end counter item -->
                <!-- counter item -->
                <div class="col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten" data-wow-duration="600ms">
                    <i class="icon-happy medium-icon"></i>
                    <span class="timer counter-number white-text main-font font-weight-600" data-to="{{ $ongoingprojectcount }}" data-speed="7000"></span>
                    <span class="counter-title light-gray-text">Ongoing Project</span>
                </div>
                <!-- end counter item -->
                <!-- counter item -->
                <div class="col-md-3 col-sm-6 bottom-margin-small text-center counter-section wow fadeInUp xs-margin-bottom-ten" data-wow-duration="900ms">
                    <i class="icon-anchor medium-icon"></i>
                    <span class="timer counter-number white-text main-font font-weight-600" data-to="{{ $completeprojectcount }}" data-speed="7000"></span>
                    <span class="counter-title light-gray-text">Projects Completed</span>
                </div>
                <!-- end counter item -->
                <!-- counter item -->
                <div class="col-md-3 col-sm-6 text-center counter-section wow fadeInUp" data-wow-duration="1200ms">
                    <i class="icon-chat medium-icon"></i>
                    <span class="timer counter-number white-text main-font font-weight-600" data-to="{{ $publicationcount }}" data-speed="7000"></span>
                    <span class="counter-title light-gray-text">Publications</span>
                </div>
                <!-- end counter item -->
            </div>
        </div>
    </section>
    <!-- end counter section -->
    <!-- blog content section -->
    <section class="padding-five">
        <div class="container">
            <div class="row">
                <!-- call to action -->
                <div class="col-md-7 col-sm-12 text-center center-col">
                    <p class="title-large text-uppercase letter-spacing-1 black-text font-weight-600 wow fadeIn">Latest Blogs</p><br/><br/>
                </div>
                <!-- end call to action -->
            </div>
            <div class="row">
                <!-- post item -->
                @php
                    $eventwaitduration = 300;
                @endphp
                @foreach($blogs as $blog)
                <div class="col-md-4 col-sm-4 wow fadeInRight" data-wow-duration="{{ $eventwaitduration }}ms">
                    <div class="blog-image">
                        <a href="{{ route('blog.single', $blog->slug) }}">
                            @if($blog->featured_image != null)
                            <img src="{{ asset('images/blogs/'.$blog->featured_image) }}" alt=""/>
                            @else
                            <img src="{{ asset('images/600x315.png') }}" alt=""/>
                            @endif
                        </a>
                    </div>
                    <div class="blog-details">
                        <div class="blog-date"><a href="{{ route('blog.single', $blog->slug) }}">{{ $blog->user->name }}</a> | {{ date('F d, Y', strtotime($blog->created_at)) }}</div>
                        <div class="blog-title" style="min-height: 65px;"><a href="{{ route('blog.single', $blog->slug) }}">{{ $blog->title }}</a></div>
                        <div class="blog-short-description" style="text-align: justify; text-justify: inter-word; width: 100%; min-height: 120px;">
                            @if(strlen(strip_tags($blog->body))>300)
                            {{ mb_substr(strip_tags($blog->body), 0, stripos($blog->body, " ", stripos(strip_tags($blog->body), " ")+200))." [...] " }}
                            @else
                                {{ strip_tags($blog->body) }}
                            @endif
                        </div>
                        <div class="separator-line bg-black no-margin-lr"></div>
                        {{-- <div>
                            <a href="#!" class="blog-like"><i class="fa fa-heart-o"></i>{{ $blog->likes }} Like(s)</a>
                            <a href="#" class="comment"><i class="fa fa-comment-o"></i>
                            <span id="comment_count{{ $blog->id }}"></span> comment(s)</a>
                            <script type="text/javascript" src="{{ asset('vendor/hcode/js/jquery.min.js') }}"></script>
                            <script type="text/javascript">
                                $.ajax({
                                    url: "https://graph.facebook.com/v2.2/?fields=share{comment_count}&id={{ url('/blog/'.$blog->slug) }}",
                                    dataType: "jsonp",
                                    success: function(data) {
                                        if(data.share) {
                                            $('#comment_count{{ $blog->id }}').text(data.share.comment_count);
                                        } else {
                                            $('#comment_count{{ $blog->id }}').text(0);
                                        }
                                        
                                    }
                                });
                            </script>
                        </div> --}}
                    </div>
                </div>
                @php
                    $eventwaitduration = $eventwaitduration + 300;
                @endphp
                @endforeach
                <!-- end post item -->
            </div>
        </div>
    </section>
    <!-- end blog content section -->
    <!-- highlight section -->
    <section class="bg-fast-yellow no-padding wow fadeInUp">
        <div class="container">
            <div class="row padding-five sm-text-center">
                <div class="col-md-1">
                    <i class="medium-icon black-text no-margin icon-toolbox"></i>
                </div>
                <div class="col-md-6 no-padding">
                    <span class="text-med text-uppercase letter-spacing-2 margin-two black-text font-weight-600 xs-margin-top-six xs-margin-bottom-six display-block">Want to Work With Us?</span>
                </div>
                <div class="col-md-5 no-padding">
                    <a class="highlight-button-dark btn btn-medium button xs-margin-bottom-five xs-no-margin-right" href="{{ route('index.projects') }}">View Our Projects</a>
                    <a class="highlight-button btn btn-medium button xs-margin-bottom-five xs-no-margin-right" href="{{ route('index.contact') }}">Contact Us</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end highlight section -->
@endsection

@section('js')
<!-- Preloader -->
<script type="text/javascript">
    //<![CDATA[
        $(window).load(function() { // makes sure the whole site is loaded
            $('#status').fadeOut(); // will first fade out the loading animation
            $('#preloader').delay(1000).fadeOut('slow'); // will fade out the white DIV that covers the website.
            $('body').delay(1000).css({'overflow':'visible'});
        })
    //]]>
</script>
<script>
    $("#owl-demo").owlCarousel ({

        slideSpeed : 800,
        autoPlay: 4000,
        items : 1,
        stopOnHover : false,
        itemsDesktop : [1199,1],
        itemsDesktopSmall : [979,1],
        itemsTablet :   [768,1],
      });
</script>
@endsection