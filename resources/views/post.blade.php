@extends('layouts.app')

@section('title') Healtyrec Natural Remedies Blog @endsection

@section('content')


<!-- Begin Post -->
 <div class="main-content">
        <div class="container-max">
            <div class="row">
                <div class="col-lg-8 col-md-7">

                    <section class="post post-single">
                        <div class="post-header">
                            <h1 class="post-title">
                                {{ $post->title }}
                            </h1>
                        </div>

                        @if ($post->image)
                            <div class="post-image post-single">
                                <img src="{{ asset('uploads/' . $post->image->name ) }}" alt="" srcset="">
                            </div>
                        @else

                            <div class="post-image post-single">
                                <img src="{{ asset('uploads/post-thumb.webp' ) }}" alt="" srcset="">
                            </div>

                        @endif

                        

                        <section class="post-detail post-single">
                            <article>
                                <div class="container">
                                    {!!$post->content !!}
                                </div>
                            </article>
                        </section>

                    </section>





                </div>

                <div class="col-lg-4 col-md-5">
                    @include('includes/sidebar')
                </div>
            </div>
        </div>


    </div>

<!-- End Post Single -->


@endsection