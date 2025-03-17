@extends('layouts.admin')

@section ('title') Add Setting @endsection

@section ('css')

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.css">
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
        Add Setting
    </h2>
    <!-- <h3 class="fs-base fw-medium text-muted mb-0">
            This is the 7th property you are adding to your portfolio.
        </h3> -->
</div>


<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Setting <small>Fill Required fields</small></h3>
    </div>
    <div class="block-content">
        <form action="{{ route('admin.setting.store') }}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="row items-push">

                <div class="col-12">

                <div class="row mb-4">
                        <div class="col-md-8">
                        <label for="school"> School </label>
                        <select id="school" name="schoolid" class="select2 custom-select form-control" required>
                            <option value="" disabled selected> Select School</option>
                            @foreach ($schools as $school)
                            <option value="{{ $school->id }}" {{ old('schoolid') == $school->id ? 'Selected' : '' }}>
                                {{ $school->name }}
                            </option>
                            @endforeach

                        </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <label class="form-label" for="color1">Color 1</label>
                            <input id="color-picker" value='blue' name="color1" />
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-8">
                            <label class="form-label" for="color2">Color 2</label>
                            <input id="color-picker1" value="#0505f9" name="color2" />
                        </div>
                    </div>

                     <div class="row mb-4">
                        <div class="col-md-8">
                            <label class="form-label" for="video">Video Link</label>
                            <input type="text" class="form-control form-control-lg" id="video" name="video_link">
                        </div>
                    </div>



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

@endsection





@section ('scripts')

<script src="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.js"> </script>
<!-- functions plugin -->
<script src="{{ asset ('backend/js/functions.min.js') }}"></script>

<script>
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

$('#color-picker').spectrum({
  type: "component"
});

$('#color-picker1').spectrum({
  type: "component"
});


</script>



@endsection