@extends('layouts.admin')

@section ('title') Add School @endsection

@section ('css')

    <link rel="stylesheet" href="{{ asset('backend/css/coloris.min.css') }}"/>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@melloware/coloris/dist/coloris.min.css"/> -->

    <style>
        .ck-editor__editable_inline {
            min-height: 200px;
        }
    </style>
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
            Add School
        </h2>
        <!-- <h3 class="fs-base fw-medium text-muted mb-0">
                                    This is the 7th property you are adding to your portfolio.
                                </h3> -->
    </div>


    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">School <small>Fill Required fields</small></h3>
        </div>
        <div class="block-content">
            <form action="{{ route('admin.schools.store') }}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="row items-push">

                    <div class="col-12">
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <label class="form-label" for="name"> Name</label>
                                <input type="text" class="form-control form-control-lg" id="name" name="name">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-8">
                                {{--<label class="form-label" for="img">Logo</label>
                                <select class="form-select" id="img" name="logo" required="">
                                    <option selected="" disabled>Select Logo</option>
                                    @foreach ($images as $image)
                                    <option value="{{ $image->id }}" {{ old('logo')==$image->id ? 'Selected' : '' }}>
                                        {{ $image->name }}
                                    </option>
                                    @endforeach
                                </select> --}}
                                <input id="select-logo" type="hidden" name="logo" value="">
                                <a class="btn btn-primary mt-2 mt-xl-0" onClick="add()" href="javascript:void(0)"> <i
                                        class="mdi mdi-plus text-white"></i> Select Image </a>
                            </div>
                        </div>
                        <div id="show-image" class="mb-4">

                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class="form-label" for="content"> Description </label>
                                <textarea id="js-ckeditor" name="descr" class="postcontent" rows="10"
                                    cols="80"> {{ old('descr') }}</textarea>
                                <!-- <textarea id="content" name="content" class="summernote" > {{ old('content') }}</textarea> -->
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-8">
                                <label class="form-label" for="phone"> Phone </label>
                                <input type="text" class="form-control form-control-lg" id="phone" name="phone"
                                    value="{{ old('phone') }}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-10">
                                <label class="form-label" for="excerpt"> Address </label>
                                <textarea id="exceprt" name="address" class="form-control" rows="4"
                                    cols="30"> {{ old('address')  }}</textarea>

                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <label class="form-label" for="pcolor">Primary Color</label>
                                <input class="coloris picker1" value='#0505f9' name="pcolor" />
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-8">
                                <label class="form-label" for="color2">Secondary Color</label>
                                <input class="coloris picker2" value="#0505f9" name="scolor" />
                            </div>
                        </div>

                        <!-- <div class="row mb-4">
                                                <div class="col-md-8">
                                                    <label class="form-label" for="linktype">school Link Type</label>
                                                    <select class="form-select" id="linktype" name="type" required="">
                                                        <option selected="" disabled>Select Type</option>
                                                        <option value="post"> Post </option>
                                                        <option value="problem"> Problem </option>

                                                    </select>
                                                </div>
                                            </div> -->

                    </div>

                </div>

                <!-- Form Submission -->
                <div class="row items-push">
                    <div class="col-lg-7 offset-lg-4">
                        <div class="mb-4">
                            <button type="submit" class="btn btn-alt-primary">
                                <i class="fa fa-plus opacity-50 me-1"></i>
                                Save
                            </button>
                        </div>
                    </div>
                </div>
                <!-- END Form Submission -->
            </form>
        </div>
    </div>



    <!-- School modal -->
    <div class="modal fade" id="school-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-fullscreen" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Select Image</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <div id="data-wrapper" class="row items-push">
                            @include('admin.helper.data')
                        </div>

                        <div class="text-center">

                            <button class="btn btn-success load-more-data"><i class="fa fa-refresh"></i> Load More
                                Data...</button>

                        </div>



                        <!-- Data Loader -->

                        <div class="auto-load text-center" style="display: none;">

                            <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="60" viewBox="0 0 100 100"
                                enable-background="new 0 0 0 0" xml:space="preserve">

                                <path fill="#000"
                                    d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">

                                    <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                                        from="0 50 50" to="360 50 50" repeatCount="indefinite" />

                                </path>

                            </svg>

                        </div>
                        {{--<div id="imgs" class="row items-push">
                            @foreach ($images as $image )
                            <div class="col-md-3 animated fadeIn">
                                <div class="options-container">
                                    <img class="img-fluid options-item" src="{{ asset('uploads/large/' . $image->name) }}"
                                        alt="">
                                    <div class="options-overlay bg-black-75">
                                        <div class="options-overlay-content">
                                            <h3 class="h4 text-white mb-1">{{$image->name}}</h3>
                                            <a class="btn btn-sm btn-primary"
                                                onClick="selectImage('{{ $image->id }}', '{{ $image->name }}' )">
                                                Select
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>--}}
                    </div>
                    <div class="block-content block-content-full block-content-sm text-end border-top">
                        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-alt-primary" data-bs-dismiss="modal">
                            Done
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End School model -->

@endsection





@section ('scripts')

    <!-- functions plugin -->
    <script src="{{ asset('backend/js/functions.min.js') }}"></script>
    <script src="{{ asset('backend/js/coloris.min.js') }}"></script>
    <script>

        Coloris({
            el: '.coloris',
            theme: 'large',
            format: 'hex',
        });
        // Custom instance for the first picker
        Coloris.setInstance('.picker1', {
            // theme: 'large',
            // themeMode: 'dark',
            // swatches: ['#ff0000', '#ff9900', '#ffff00']
        });

        // Custom instance for the second picker
        Coloris.setInstance('.picker2', {
            // theme: 'polaroid',
            // swatchesOnly: true,
            // swatches: ['#00ff00', '#00ffff', '#0000ff']
        });

        ClassicEditor
            .create(document.querySelector('#js-ckeditor'), {
                // removePlugins: ['Image', 'MediaEmbed'],
                toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo']
            })
            .catch(error => {
                console.error(error);
            });
        //     import { BlockToolbar } from 'ckeditor5';
        // const { BlockToolbar} = CKEDITOR;
        // ClassicEditor
        //     .create(document.querySelector('#js-ckeditor'), {
        //         //  plugins: [ /* ... */ , AutoImage ]
        //         // plugins: [ BlockToolbar,],
        //         removePlugins: ['Image', 'MediaEmbed'],

        //         ClassicEditor
        //             .create(document.querySelector('#editor'), {
        //                 removePlugins: ['Image', 'MediaEmbed'],
        //                 toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo']
        //         // blockToolbar: [
        //         //     'uploadImage'
        //         // ],

        //     })
        //     .then(editor => {
        //         window.editor = editor;
        //     })
        //     .catch(error => {
        //         console.error(error);
        //     });

        // $('#js-ckeditor').ckeditor(function(){}, {toolbar: 'Basic'});




        function add() {
            $('#PatientForm').trigger("reset");
            $('#SchoolModal').html("Select Image");
            $('#school-modal').modal('show');
            $('#id').val('');
        }

        function selectImage(id, name) {
            var url = '{{ route('main') }}';
            event.preventDefault();
            // var selectedFriend = $(this).attr("id");
            console.log(id);
            $('#show-image').empty();
            $("#show-image").prepend($('<img>', {
                id: id,
                src: url + '/uploads/small/' + name,
            }));
            $('#select-logo').val(id);
            $('#school-modal').modal('hide');
        }

        $('imgs').on('click', 'img', function (event) {
            event.preventDefault();
            var selectedFriend = $(this).attr("id");
            console.log(selectedFriend);
        });

        $(document).ready(function () {
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

    <script>

        var ENDPOINT = "{{ route('admin.images.select') }}";
        var page = 1;


        $(".load-more-data").click(function () {

            page++;

            infinteLoadMore(page);

        });



        /*------------------------------------------

        --------------------------------------------

        call infinteLoadMore()

        --------------------------------------------

        --------------------------------------------*/

        function infinteLoadMore(page) {

            $.ajax({

                url: ENDPOINT + "?page=" + page,

                datatype: "html",

                type: "get",

                beforeSend: function () {

                    $('.auto-load').show();

                }

            })

                .done(function (response) {

                    if (response.html == '') {

                        $('.auto-load').html("We don't have more data to display :(");

                        return;

                    }

                    $('.auto-load').hide();

                    $("#data-wrapper").append(response.html);

                })

                .fail(function (jqXHR, ajaxOptions, thrownError) {

                    console.log('Server error occured');

                });

        }

    </script>

@endsection