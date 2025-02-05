                    <div class="sidebar">
                        @if (count($prposts))
                        <section class="posts-popular">

                            <div class="row justify-content-center">
                                <h4 class="posts-popular-title">
                                    Popular Articles
                                </h4>
                            </div>

                            <div class="row">
                                @foreach ($prposts as $post)

                                <div class="col-12 mb-2">
                                    <div class="post-item post-style1">
                                        <div class="col-6">
                                            <div class="post-img">
                                                <a href="{{ route('post', ['link' => $post->slug ]) }}">
                                                    @if ($post->image)
                                                        <img src="{{ asset('uploads/large/' . $post->image->name ) }}"
                                                        alt="" />
                                                    @else
                                                    <img src="{{ asset('uploads/post-thumb.webp' ) }}"
                                                        alt="" />
                                                        
                                                    @endif
                                                </a>

                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="post-content">
                                                <a href="{{ route('post', ['link' => $post->slug ]) }}">
                                                    <h4 class="post-title"> {{ $post->title }} </h4>
                                                </a>

                                                <a href="{{ route('post', ['link' => $post->slug ]) }}"
                                                    class="btn btn-sm post-btn">
                                                    Read More <i class="fa-solid fa-angles-right post-btn-icon"></i>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                                
                            </div>

                        </section>
                        @endif
                        
                        <section class="image-ad">
                            <h4>Image Ad</h4>
                            <img src="img/project-img1.png" alt="">
                        </section>

                        @if (count($feposts))
                        <section class="posts-popular">

                            <div class="row justify-content-center">
                                <h4 class="posts-popular-title">
                                    Featured Articles
                                </h4>
                            </div>

                            <div class="row">
                                 @foreach ($feposts as $post)

                                <div class="col-12 mb-2">
                                    <div class="post-item post-style1">
                                        <div class="col-6">
                                            <div class="post-img">
                                                <a href="{{ route('post', ['link' => $post->slug ]) }}">
                                                   @if ($post->image)
                                                        <img src="{{ asset('uploads/large/' . $post->image->name ) }}"
                                                        alt="" />
                                                    @else
                                                    <img src="{{ asset('uploads/post-thumb.webp' ) }}"
                                                        alt="" />
                                                        
                                                    @endif
                                                </a>

                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="post-content">
                                                <a href="{{ route('post', ['link' => $post->slug ]) }}">
                                                    <h4 class="post-title"> {{ $post->title }} </h4>
                                                </a>

                                                <a href="{{ route('post', ['link' => $post->slug ]) }}"
                                                    class="btn btn-sm post-btn">
                                                    Read More <i class="fa-solid fa-angles-right post-btn-icon"></i>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </div>

                        </section>
                        @endif


                    </div>