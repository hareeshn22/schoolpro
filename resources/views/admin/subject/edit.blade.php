@extends('layouts.admin')

@section ('title') Edit Subject @endsection

@section ('css')


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
        Edit Subject
    </h2>
    <!-- <h3 class="fs-base fw-medium text-muted mb-0">
            This is the 7th property you are adding to your portfolio.
        </h3> -->
</div>


<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Subject <small>Fill Required fields</small></h3>
    </div>
    <div class="block-content">
        <form action="{{ route('admin.subjects.update') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <input type="hidden" name="id" value=" {{ $subject->id }}">

            <div class="row items-push">

                <div class="col-12">

                    <div class="row mb-4">
                        <div class="col-md-8">
                            <label class="form-label" for="appname">App Name</label>
                            <input type="text" class="form-control form-control-lg" id="appname" name="appname" value="{{ $subject->app_name }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-8">
                            <label class="form-label" for="name"> Name</label>
                            <input type="text" class="form-control form-control-lg" id="name" name="name"
                                value="{{ $subject->name }}">
                        </div>
                    </div>


                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label" for="content"> Content</label>
                            <textarea id="js-ckeditor" name="content" class="postcontent" rows="40"
                                cols="80"> {{ $subject->content }}</textarea>
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

// bsCustomFileInput.init();



$(document).ready(function() {
    $('.js-select2').select2();
});
</script>



@endsection