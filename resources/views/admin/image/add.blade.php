@extends('layouts.admin')

@section ('title') Add Image @endsection

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
        Add Image
    </h2>

</div>


<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Image </h3>
    </div>
    <div class="block-content">

        <!-- <form action="{{ route('admin.images.store') }}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="row items-push">

                <div class="col-12">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <label class="form-label" for="example-file-input">Image</label>
                            <input class="form-control" type="file" id="example-file-input" name="image">
                        </div>
                    </div>


                </div>

            </div>

            
            <div class="row items-push">
                <div class="col-lg-7 offset-lg-4">
                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </form> -->

        <div class="row my-5">
            <form class="dropzone dz-clickable" method="POST" action="{{ route('admin.images.store') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="dz-default dz-message">
                    <button class="dz-button" type="button">Drop files here to upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section ('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Add Image</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Image</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <!-- <h4 class="card-title">Images</h4>
                        <p class="card-title-desc">Fill all required info below</p> -->

                        <form action="{{ route('admin.images.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group">
                                <label class="control-label"> Image </label>

                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="image" value="">
                                    <label class="custom-file-label" for="customFile">Choose
                                        file</label>
                                </div>
                            </div>





                            <div class="text-center mt-4 mb-4">
                                <button type="submit" class="btn btn-primary mr-2 waves-effect waves-light">Save
                                    Changes</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>

@endsection


@section ('scripts')

<!-- bs custom file input plugin -->
<script src="{{ asset ('backend/js/plugins.js') }}"></script>
<!-- functions plugin -->
<script src="{{ asset ('backend/js/functions.min.js') }}"></script>

<script>
bsCustomFileInput.init();


// on change of type

$('#linktype').on('change', function(e) {
    // console.log(e.target.value);
    $('#post').hide();
    $('#problem').hide();

    if (e.target.value == 'post') {
        $('#post').show();
        $('#problem').hide();
        $('#posts').prop("required", true);
        $('#problem').prop("required", false);
    } else if (e.target.value == 'problem') {
        $('#post').hide();
        $('#problem').show();
        $('#problems').prop("required", true);
        $('#posts').prop("required", false);
    }
});

Dropzone.options.myGreatDropzone = { // camelized version of the `id`
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 2, // MB
    accept: function(file, done) {
        if (file.name == "justinbieber.jpg") {
            done("Naha, you don't.");
        } else {
            done();
        }
    }
};
</script>



@endsection