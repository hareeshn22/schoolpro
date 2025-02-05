@extends('layouts.app')

@section('title') {{ $cate->name }} @endsection

@section('content')


<!-- Begin PageTitle -->
<section class="innerpage">
    <div class="container">
        <div class="innerpage-head">
            <h4 class="innerpage-title">{{ $cate->name }}</h4>
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

                @if (count($subcates))

                <section class="subcates section">
                    <div class="container">
                        <div class="row"> 
                            @foreach ($subcates as $cate)
                            <div class="col-lg-6 col-md-6">
                                <div class="cate-item cate-box ">

                                    <div class="cate-content">
                                        <a href="{{ route('category', ['link' => $cate->slug ]) }}">
                                            <h4 class="cate-title">
                                                {{ $cate->name }}
                                            </h4>
                                        </a>
                                    </div>
                                    @if ($cate->image)
                                    <div class="cate-img">
                                        <a href="#">
                                                <img src=" {{ asset('uploads/' . $cate->image->name ) }}" alt="" srcset="">
                                        </a>
                                    </div>
                                    @else

                                    <div class="cate-img">
                                        <a href="#">
                                            <img src=" {{ asset('uploads/cate-thumb.webp' ) }}" alt="" srcset="">
                                        </a>
                                    </div>
                                        
                                    @endif

                                </div>
                            </div
                            @endforeach>
                        </div>
                    </div>
                </section>

                @else

                <section class="post-list section">
                    <div class="container">
                        <div class="row">
                            @foreach ($posts as $post)
                            <div class="col-lg-6 mb-4">
                                <a href="{{ route('post', ['link' => $post->slug ]) }}" class="post-item post-stylec">
                                    @if ($post->image)
                                        <div class="post-img">
                                            <img src="{{ asset('uploads/large/' . $post->image->name ) }}" alt="" srcset="">
                                        </div>
                                    @else

                                        <div class="post-img">
                                            <img src="{{ asset('uploads/post-thumb.webp' ) }}" alt="" srcset="">
                                        </div>

                                    @endif
                                    <div class="post-content">

                                        <h4 class="post-title">{{ $post->title }}</h4>
                                        <p class="post-text mb-2">
                                            {{ $post->excerpt }}
                                            <!-- {!! substr($post->content, 0, 50) !!} -->
                                        </p>

                                    </div>
                                </a>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </section>

                @endif




            </div>

            <div class="col-lg-4 col-md-5">
                @include('includes/sidebar')
            </div>
        </div>
    </div>



</div>
<!-- End Category -->


@endsection