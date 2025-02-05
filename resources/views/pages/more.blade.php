@extends('layouts.app')

@section('title') More Topics @endsection

@section('content')


    <!-- Begin PageTitle -->
    <section class="innerpage">
        <div class="container">
            <div class="innerpage-head">
                <h4 class="innerpage-title">More Topics</h4>
            </div>
        </div>

        <div class="bg-shape" style="z-index:1;  top: 0px; left: 0px;">
            <img src="{{ asset('frontend/img/page-bg2.png') }}" alt="">
        </div>
        <div class="bg-shape" style=" z-index:1; bottom: 0px; right: 0px;">
            <img src="{{ asset('frontend/img/page-bg.png') }}" alt="">
        </div>
    </section>
    <!-- End PageTitle -->


    <!-- Begin Category -->
    <div class="main-content">
        <div class="container-max">
            <div class="row">
                <div class="col-lg-8 col-md-7">
    
                    <section class="post-list section">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <a href="post.html" class="post-item post-stylec">
                                        <div class="post-img">
                                            <img src="img/postex1.webp" alt="" />
                                        </div>
                                        <div class="post-content">
                            
                                            <h4 class="post-title">Benefits of Orange
                                                and Citrus Fruits</h4>
                                            <p class="post-text mb-2">
                                                Lorem ipsum dolor sit amet, conset etur sadipscing elitr, sed
                                                diam noket numy eirmod tempor.
                                            </p>
                            
                                        </div>
                                    </a>
                                </div>
                            
                                <div class="col-lg-6 mb-4">
                                    <a href="post.html" class="post-item post-stylec">
                                        <div class="post-img">
                                            <img src="img/postex2.webp" alt="" />
                                        </div>
                                        <div class="post-content">
                            
                                            <h4 class="post-title">Benefits of Orange
                                                and Citrus Fruits</h4>
                                            <p class="post-text mb-2">
                                                Lorem ipsum dolor sit amet, conset etur sadipscing elitr, sed
                                                diam noket numy eirmod tempor.
                                            </p>
                            
                                        </div>
                                    </a>
                                </div>
                            
                                <div class="col-lg-6 mb-4">
                                    <a href="post.html" class="post-item post-stylec">
                                        <div class="post-img">
                                            <img src="img/postex1.webp" alt="" />
                                        </div>
                                        <div class="post-content">
                            
                                            <h4 class="post-title">Benefits of Orange
                                                and Citrus Fruits</h4>
                                            <p class="post-text mb-2">
                                                Lorem ipsum dolor sit amet, conset etur sadipscing elitr, sed
                                                diam noket numy eirmod tempor.
                                            </p>
                            
                                        </div>
                                    </a>
                                </div>
                            
                                <div class="col-lg-6 mb-4">
                                    <a href="post.html" class="post-item post-stylec">
                                        <div class="post-img">
                                            <img src="img/postex2.webp" alt="" />
                                        </div>
                                        <div class="post-content">
                            
                                            <h4 class="post-title">Benefits of Orange
                                                and Citrus Fruits</h4>
                                            <p class="post-text mb-2">
                                                Lorem ipsum dolor sit amet, conset etur sadipscing elitr, sed
                                                diam noket numy eirmod tempor.
                                            </p>
                            
                                        </div>
                                    </a>
                                </div>
                                

                                <div class="col-lg-6 mb-4">
                                    <a href="post.html" class="post-item post-stylec">
                                        <div class="post-img">
                                            <img src="img/postex1.webp" alt="" />
                                        </div>
                                        <div class="post-content">
                                
                                            <h4 class="post-title">Benefits of Orange
                                                and Citrus Fruits</h4>
                                            <p class="post-text mb-2">
                                                Lorem ipsum dolor sit amet, conset etur sadipscing elitr, sed
                                                diam noket numy eirmod tempor.
                                            </p>
                                
                                        </div>
                                    </a>
                                </div>
                                
                                <div class="col-lg-6 mb-4">
                                    <a href="post.html" class="post-item post-stylec">
                                        <div class="post-img">
                                            <img src="img/postex2.webp" alt="" />
                                        </div>
                                        <div class="post-content">
                                
                                            <h4 class="post-title">Benefits of Orange
                                                and Citrus Fruits</h4>
                                            <p class="post-text mb-2">
                                                Lorem ipsum dolor sit amet, conset etur sadipscing elitr, sed
                                                diam noket numy eirmod tempor.
                                            </p>
                                
                                        </div>
                                    </a>
                                </div>
                                
                                <div class="col-lg-6 mb-4">
                                    <a href="post.html" class="post-item post-stylec">
                                        <div class="post-img">
                                            <img src="img/postex1.webp" alt="" />
                                        </div>
                                        <div class="post-content">
                                
                                            <h4 class="post-title">Benefits of Orange
                                                and Citrus Fruits</h4>
                                            <p class="post-text mb-2">
                                                Lorem ipsum dolor sit amet, conset etur sadipscing elitr, sed
                                                diam noket numy eirmod tempor.
                                            </p>
                                
                                        </div>
                                    </a>
                                </div>
                                
                                <div class="col-lg-6 mb-4">
                                    <a href="post.html" class="post-item post-stylec">
                                        <div class="post-img">
                                            <img src="img/postex2.webp" alt="" />
                                        </div>
                                        <div class="post-content">
                                
                                            <h4 class="post-title">Benefits of Orange
                                                and Citrus Fruits</h4>
                                            <p class="post-text mb-2">
                                                Lorem ipsum dolor sit amet, conset etur sadipscing elitr, sed
                                                diam noket numy eirmod tempor.
                                            </p>
                                
                                        </div>
                                    </a>
                                </div>
                            
                            
                            </div>
                        </div>
                    </section>
    
    
    
    
    
                </div>
    
                <div class="col-lg-4 col-md-5">
                    @include('includes/sidebar')
                </div>
            </div>
        </div>
    
        
    
    </div>
    <!-- End Category -->


@endsection