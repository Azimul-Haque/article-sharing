@extends('layouts.index')
@section('title')
    About Us
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stylesheet.css') }}">
@endsection

@section('content')
    <!-- head section -->
    <section class="content-top-margin wow fadeInUp bg-gray">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-md-6 col-sm-6 xs-margin-bottom-four">
                    <span class="text-large letter-spacing-2 black-text font-weight-600 text-uppercase agency-title">About</span>
                </div>
                <!-- end section title -->
                <!-- section highlight text -->
                <div class="col-md-6 col-sm-6 text-right xs-text-left">
                    <span class="text-extra-large font-weight-400"></span>
                </div>
                <!-- end section highlight text -->
            </div>
        </div>
    </section>
    <!-- end head section -->

    <!-- content section -->
    <section class="bg-black wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-10 text-center center-col">
                    <div class="about-year text-uppercase white-text"><span class="clearfix">1</span> Mission</div>
                    <p class="title-small letter-spacing-1 white-text font-weight-100">
                        Tenx empowers young people who are interested in self-development and social development as well as dreaming of an excellent career path in all private and public corporations that produce goods and/or provide nonfinancial services to the markets.
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
                        Vision</span>
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
                        Our vision is to express the potentiality of an individual for social development. We want community leaders to nurture them to influence their own community. We intend to invent the creative mind to do well. By improving your observation skills, you’ll tap into your creative energy and discover nuances and details you hadn’t noticed before.
                    <p>
                </div>
            </div>
        </div>

    </section>
@endsection

@section('js')
   
@endsection