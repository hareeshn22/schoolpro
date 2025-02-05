@extends('layouts.admin')

@section ('title') Add Category @endsection

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
        <p><strong>Whoops!</strong> There were some categoriess with your input.</p>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }} !</li>
            @endforeach
        </ul>
    </div>

    @endif


    <div class="my-3 text-center">
        <h2 class="fw-bold mb-2">
            Add Category
        </h2>

    </div>


    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Category <small>Fill Required fields</small></h3>
        </div>
        <div class="block-content">
            <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">

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
                                <label class="form-label" for="slug"> Slug </label>
                                <input type="text" class="form-control form-control-lg" id="slug" name="slug">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <label class="form-label" for="img">Image</label>
                                <select class="form-select" id="img" name="image" required="">
                                    <option selected="" disabled>Select Image</option>
                                    @foreach ($images as $image)
                                    <option value="{{ $image->id }}">{{ $image->name }}</option>
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

    <script>
    // on change of name
    $('#name').on('change', function(e) {
        var namestr = $('#name').val();

        var slugstr = namestr.replace(/\s/g, "-").toLowerCase();


        $('#slug').val(slugstr);
    });
    </script>


@endsection