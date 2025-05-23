@extends('layouts.admin')

@section ('title') Add Post @endsection

@section ('css')
<link rel="stylesheet" href="{{ asset('backend/css/functions.min.css')}}">

@endsection



@section ('content')

    @if ($message = Session::get('success'))

    <div class="alert alert-primary alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <h3 class="alert-heading fs-5 fw-bold mb-1">Success</h3>
        <p class="mb-0">
            {{ $message }}!
        </p>
    </div>

    @endif
    @if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <h3 class="alert-heading fs-5 fw-bold mb-1">Errors</h3>
        <p><strong>Whoops!</strong> There were some problems with your input.</p>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }} !</li>
            @endforeach
        </ul>
    </div>

    @endif


    <div class="my-3 text-center">
        <h2 class="fw-bold mb-2">
            Add Post
        </h2>

    </div>


    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Post <small>Fill Required fields</small></h3>
        </div>
        <div class="block-content">
            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="row items-push">

                    <div class="col-12">
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <label class="form-label" for="type">Type</label>
                                <select class="form-select" id="type" name="type" required="">
                                    <option selected="" disabled>Choose Type</option>
                                    <option value="normal"> Normal </option>
                                    <option value="remedy"> Remedy </option>
                                    <option value="diet"> Diet </option>
                                    <option value="excercise"> Excercise </option>
                                    <option value="recipe"> Recipe </option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <label class="form-label" for="name"> Title</label>
                                <input type="text" class="form-control form-control-lg" id="name" name="title"value="{{ old('title') }}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <label class="form-label" for="subt"> SubTitle</label>
                                <input type="text" class="form-control form-control-lg" id="subt" name="subtitle" value="{{ old('subtitle') }}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <label class="form-label" for="slug"> Slug </label>
                                <input type="text" class="form-control form-control-lg" id="slug" name="slug" value="{{ old('slug') }}" >
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-10">
                                <label class="form-label" for="excerpt"> Excerpt </label>
                                <textarea id="exceprt" name="excerpt" class="form-control"  rows="4" cols="30"> {{ old('excerpt')  }}</textarea>
                                
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class="form-label" for="content"> Content </label>
                                <textarea id="js-ckeditor" name="content" class="postcontent" rows="10" cols="80" > {{ old('content') }}</textarea>
                                <!-- <textarea id="content" name="content" class="summernote" > {{ old('content') }}</textarea> -->
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <label class="form-label" for="img">Image</label>
                                <select class=" js-select2 form-select" id="img" name="image" required="">
                                    <option selected="" disabled>Select Image</option>
                                    @foreach ($images as $image)
                                    <option value="{{ $image->id }}">{{ $image->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-8">
                                <label class="form-label" for="feat"> Featured </label>
                                <select class="form-select" id="feat" name="feature" required="">
                                    
                                    <option value="0"> No</option>
                                    <option value="1"> YES</option>

                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-8">
                                <label class="form-label" for="pop"> Popular </label>
                                <select class="form-select" id="pop" name="popular" required="">
                                    
                                    <option value="0"> No</option>
                                    <option value="1"> YES</option>

                                </select>
                            </div>
                        </div>

                         <div class="row mb-4">
                            <div class="col-md-8">
                                <label class="form-label" for="more"> More </label>
                                <select class="form-select" id="more" name="more" required="">
                                    
                                    <option value="0"> No</option>
                                    <option value="1"> YES</option>

                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-8">
                                <label class="form-label" for="probs">Problems</label>
                                <select class=" js-select2 form-select" id="probs" name="problems[]" multiple="multiple">
                                    
                                    @foreach ($problems as $problem)
                                    <option value="{{ $problem->id }}">{{ $problem->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-8">
                                <label class="form-label" for="probs">Categories</label>
                                <select class=" js-select2 form-select" id="cates" name="cates[]" multiple="multiple" >
                                    
                                    @foreach ($cates as $cate)
                                    <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>



                    </div>

                </div>

                <!-- Form Submission -->
                <div class="row items-push">
                    <div class="col-lg-7 offset-lg-4">
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary">
                                Save Changes
                            </button>
                        </div>
                    </div>
                </div>
                <!-- END Form Submission -->
            </form>
        </div>
    </div>

@endsection



@section ('scripts')

    <script src="{{ asset('backend/js/vendors.js') }}"></script>
    <!-- functions plugin -->
    <script src="{{ asset ('backend/js/functions.min.js') }}"></script>

    <script>

        ClassicEditor
        .create( document.querySelector( '#js-ckeditor' ), {
            //  plugins: [ /* ... */ , AutoImage ]
        } )
        .then( editor => {
			window.editor = editor;
		} )
        .catch( error => {
            console.error( error );
        } );

        //On change method for name

        $('#name').on('change', function(e) {

            var name = $(this).val();
            var slug  = name.replace(/ /g, "-").toLowerCase();

            $('#slug').val(slug);

        });

        

        $(document).ready(function() {
            //select2
            $('.js-select2').select2();
            // summernote init
            // $('.postcontent').summernote({
            //     placeholder: 'Fill Description',
            //     tabsize: 2,
            //     height: 300,
            //     toolbar: [
            //         ['style', ['style']],
            //         ['font', ['bold', 'italic', 'underline', 'clear', 'strikethrough']],
            //         ['color', ['color']],
            //         ['para', ['ul', 'ol', 'paragraph']],
            //         ['table', ['table']],
            //         ['insert', ['link', ]],
            //         ['view', ['fullscreen', 'codeview']]
            //     ]
            // });

        });


    </script>



@endsection
