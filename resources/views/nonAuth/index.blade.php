@extends('layouts.nonAuthApp')
@section('style')
<style>
    /* Make the image fully responsive */
    .carousel-inner img {
      width: 100%;
      /* height: 100%; */
      height:400px;
    }
</style>
@endsection
@section('content')
<div class="container-fluid" style="margin-top:20px;">
    {{-- slider --}}
    <div class="row ">
        <div class="col-sm-12">
            <div id="demo" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                  <li data-target="#demo" data-slide-to="0" class="active"></li>
                  <li data-target="#demo" data-slide-to="1"></li>
                  <li data-target="#demo" data-slide-to="2"></li>
                  <li data-target="#demo" data-slide-to="3"></li>
                </ul>
                
                <!-- The slideshow -->
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{ asset('images/banner-final4.jpg')}}"alt="slider one" width="1100">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('images/banner-final2.jpg')}}" alt="slider two" width="1100">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('images/banner-final3.jpg')}}" alt="slider three" width="1100">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('images/banner-final5.jpg')}}" alt="slider three" width="1100">
                  </div>
                </div>
                
                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                  <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                </a>
              </div>
        </div>
    </div>
    {{-- main content --}}
    <div class="container-fluid" style="margin-top:20px;">
        <div class="row">
            <div class="col-sm-7" >
                <h3 style="color:#2B6CB0;margin-top:20px;padding-bottom:20px;">Welcome to Haramaya University</h3>
                <h5 style="color:#008000;"> Historical Background of the university</h5>
                <h6 style="margin-top:10px;">
                    Historical Background of the University Haramaya University has gone through a series of transformations since its establishment as a higher learning institution. The agreement signed between the Imperial Ethiopian Government and the Government of the United States of America on May 15,1952 laid the foundations for the establishment of Jimma Agricultural and Technical School and the Imperial College of Agricultural and Mechanical
                </h6>
                <h5 style="color:#008000;"> Mission and vission</h5>
                <h6 style="margin-top:10px;">
                    The Mission of Haramaya University is to produce competent graduates in diverse fields of study, undertake rigorous, problem solving and cutting edge researches,disseminate knowledge and technologies, and provide demand-driven and transformative community services.
                </h6>
                <h5 style="color:#008000;"> Moto</h5>
                <h6>
                    Building the Basis for Development
                </h6>
                <h5 style="color:#008000;">Core values</h5>
                <h6 style="margin-top:10px;">
                    Haramaya University is committed to the following core values:
                </h6>
                <h6>
                    <strong style="color:#2B6CB0;">Academic freedom:</strong> A strong commitment to a free and democratic academic environment where individuals inquire, investigate and engage in relevant academic practices and development.
                </h6>
                <h6 style="margin-top:10px;">
                    <strong style="color:#2B6CB0;">Perseverance:</strong> A commitment and dedication to perform assigned duties to the best of one’s knowledge and abilities.
                </h6>
                <h6 style="margin-top:10px;">
                    <strong style="color:#2B6CB0;">Good governance:</strong> The practice of democratic, transparent, inclusive, responsible and accountable leadership and management and promotion of the principle of equal opportunity.
                </h6>
                <h6 style="margin-top:10px;">
                    <strong style="color:#2B6CB0;">Respect for diversity:</strong> A culture of equity and fairness in all forms of practices; a conviction for the respect of all people without sexual, class, racial, ethnic, religious, and regional discriminations.
                </h6>
                <h6 style="margin-top:10px;">
                    <strong style="color:#2B6CB0;">Professionalism:</strong> A commitment to a high standard of professional integrity and ethics.
                </h6>
                
            </div>
            <div class="col-sm-1">

            </div>
            <div class="col-sm-4 card">
                <h4 style="margin-top:10px;color:#2B6CB0;">Announcements</h4>
                <div class="card" style="margin-top:10px;">
                    <a href="#" style="color:#2B6CB0;margin-top:5px;margin-left:5px;">Call for Application to Home-grown Collaborative PhD Programs (HCPP).</a>
                    <p></p>
                </div>
                <div class="card" style="margin-top:10px;">
                    <a href="#" style="color:#2B6CB0;margin-top:5px;margin-left:5px;">Invitation To Apply For Training In Research Methodology</a>
                    <p></p>
                </div>
                <div class="card" style="margin-top:10px;">
                    <a href="#" style="color:#2B6CB0;margin-top:5px;margin-left:5px;">PhD in Nursing</a>
                    <p></p>
                </div>
                <div class="card" style="margin-top:10px;">
                    <a href="#" style="color:#2B6CB0;margin-top:5px;margin-left:5px;">Re-Opening Academic Calender for phase II of 2020/21 (2013 EC) A.Y.</a>
                    <p></p>
                </div>
                <div class="card" style="margin-top:10px;">
                    <a href="#" style="color:#2B6CB0;margin-top:5px;margin-left:5px;">Re – Vacancy Announcement Child Health and Mortality Surveillance (CHAMPS) Ethiopia Software Engineer</a>
                    <p></p>
                </div>
                <div class="card" style="margin-top:10px;">
                    <a href="#" style="color:#2B6CB0;margin-top:5px;margin-left:5px;">In-house Workshop for MSc Curriculum Review In Information Science and Launching New MSc Program In Data Science</a>
                    <p></p>
                </div>
                <div class="card" style="margin-top:10px;">
                    <a href="#" style="color:#2B6CB0;margin-top:5px;margin-left:5px;">National Curriculum Validation Workshop</a>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection