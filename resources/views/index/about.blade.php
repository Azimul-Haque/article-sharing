@extends('layouts.index')
@section('title')
    About Us
@endsection

@section('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/stylesheet.css') }}"> --}}
@endsection

@section('content')
    <!-- head section -->
    <section class="content-top-margin page-title page-title-small bg-gray">
      <div class="container">
          <div class="row">
              <div class="col-lg-8 col-md-7 col-sm-12 wow fadeInUp" data-wow-duration="300ms">
                  <!-- page title -->
                  <h1 class="black-text">About</h1>
                  <!-- end page title -->
              </div>
              <div class="col-lg-4 col-md-5 col-sm-12 breadcrumb text-uppercase wow fadeInUp xs-display-none" data-wow-duration="600ms">
                  <!-- breadcrumb -->
                  <ul>
                     {{--  <li><a href="{{ route('index.index') }}">Home</a></li>
                      <li><a href="#">About</a></li> --}}
                  </ul>
                  <!-- end breadcrumb -->
              </div>
          </div>
      </div>
    </section>

    <!-- content section -->
    <section class="bg-black wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-10 text-center center-col">
                    <div class="about-year text-uppercase white-text"><span class="clearfix">{{ date('Y') - 2017 }}</span> Years</div>
                    <p class="title-small letter-spacing-1 white-text font-weight-100">
                        KILLA is a consultancy organization that intends to provide services in the field of Climate Change Adaptation (CCA) and Disaster Risk Management (DRM) to give everyone the power to build resilience through sharing local knowledge, ideas, information and experience. Climate Change and the increased frequency of natural disasters are the greatest concerns of the current century. Adaptation to such abrupt erratic nature of climate, requires intervention both at local and global scale. Our aim is to provide consultancy focusing upon the local level adaptation and implementation of Climate Change Adaptation (CCA) and Disaster Risk Management (DRM) strategies with the application of best available tools and technologies towards the achievement of Sustainable Development Goals (SDGs).
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="padding-three">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-md-6 col-sm-6">
                    <span class="text-large letter-spacing-2 black-text font-weight-600 agency-title">Our
                        Strategy</span>
                </div>
                <!-- end section title -->
                <!-- section highlight text -->
                <div class="col-md-6 col-sm-6 text-right xs-text-left">
                </div>
                <!-- end section highlight text -->
            </div>
        </div>
    </section>
    <section class="cover-background" style="background-image:url('images/strategy.jpg');">
        <div class="opacity-full bg-dark-gray"></div>
        <div class="container position-relative">
            <div class="row">
                <div class="col-md-10 col-sm-11 center-col text-center">
                    <p class="text-large white-text margin-five no-margin-bottom">
                        Identifying the right solution is all about understanding the problem. We deliver unique and rigorous research that helps create knowledge, ensures sustainable development and protects the nature. We identify indigenous knowledge that can work at regional scale and introduce these to global forums. We are strategic collaborators, innovators, knowledge brokers and navigator of change. Our strategy outlines how we aim to grow in scope, reach and reputation. Expect us to bring a high degree of attention to your demands, as well as consideration for your budget. 
                    <p>
                </div>
            </div>
        </div>

    </section>
    <!-- services section -->
    <section class="padding-three">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-md-6 col-sm-6 xs-margin-bottom-four">
                    <span class="text-large letter-spacing-2 black-text font-weight-600 text-uppercase agency-title">Key
                        components of our strategy</span>
                </div>
                <!-- end section title -->
                <!-- section highlight text -->
                <div class="col-md-6 col-sm-6 text-right xs-text-left">
                </div>
                <!-- end section highlight text -->
            </div>
        </div>
    </section>
    <!-- section text -->
    <section class="bg-gray">
        <div class="container">
            <div class="row">
                @foreach($strategies as $strategy)
                    <div class="col-md-4 col-sm-4 text-center xs-margin-bottom-ten" style="min-height: 150px;">
                        <p class="text-uppercase letter-spacing-2 black-text font-weight-600 margin-five no-margin-bottom">
                            {{ $strategy->title }}
                        </p>
                        <p class="margin-two text-med width-90 center-col" style="min-height: 100px;">
                            {{ substr(strip_tags($strategy->description), 0, 50) }}...
                        </p>
                        <a href="{{ route('index.strategy', $strategy->id) }}" class="btn btn-small margin-three highlight-button xs-margin-bottom-five">View Details</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end section text -->

    <!-- services section -->
    <section class="padding-three">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-md-6 col-sm-6 xs-margin-bottom-four">
                    <span class="text-large letter-spacing-2 black-text font-weight-600 text-uppercase agency-title">Our
                        People</span>
                </div>
                <!-- end section title -->
                <!-- section highlight text -->
                <div class="col-md-6 col-sm-6 text-right xs-text-left">
                </div>
                <!-- end section highlight text -->
            </div>
        </div>
    </section>
    <section class="bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 pull-left text-center sm-margin-bottom-eight wow fadeInUp" data-wow-duration="300ms">
                    <p class="center-col width-90 text-med">
                        KILLA is led by a successful team with experience in the field of Climate Change and Disaster Risk Management. Also, has experience to work with National & International Development Partners, NGOs, and INGOs etc. Moreover, has proficiency over working with different tools and techniques.
                    </p>
                </div>
                <div class="col-md-6 col-sm-12 pull-right text-center wow fadeInUp" data-wow-duration="600ms">
                    <p class="margin-right-seven no-margin-bottom  text-med"></p>
                    <a href="{{ route('index.directors') }}" class="margin-three highlight-button-dark btn-big btn-round button xs-margin-bottom-five">Find all our staff and board of directors</a>
                </div>
            </div>
        </div>
    </section>
    <section class="padding-three">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-md-6 col-sm-6 xs-margin-bottom-four">
                    <span class="text-large letter-spacing-2 black-text font-weight-600 text-uppercase agency-title">Research Expertise</span>
                </div>
                <!-- end section title -->
                <!-- section highlight text -->
                <div class="col-md-6 col-sm-6 text-right xs-text-left">
                </div>
                <!-- end section highlight text -->
            </div>
        </div>
    </section>
    @php
      $oddoreven = 1;
    @endphp
    
        <!-- portfolio item  -->
        <section class="portfolio-short-description bg-gray padding-three">
            <div class="container">
                <div class="row">
                    @foreach($expertises as $expertise)
                    <div class="col-md-4 col-sm-6 text-center xs-margin-bottom-ten" style="min-height: 220px;">
                        <a href="{{ route('index.expertise', $expertise->slug) }}"><img src="{{ asset('images/expertises/'. $expertise->image)  }}" style="max-height: 100px; width: auto;"></a>
                        <span class="text-uppercase letter-spacing-2 black-text font-weight-600 display-block margin-ten no-margin-bottom xs-margin-top-five"><a href="{{ route('index.expertise', $expertise->slug) }}">{{ $expertise->title }}</a></span>
                        <p class="width-80 center-col margin-three">{{ substr(strip_tags($expertise->description), 0, 100) }}...</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- end portfolio item  -->
@endsection

@section('js')
   
@endsection