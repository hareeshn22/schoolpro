@extends('layouts.admin')

@section ('title') Add Curriculum @endsection

@section ('css')
<link rel="stylesheet" href="{{ asset('backend/css/functions.css') }}">

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
        Add Curriculum
    </h2>
    <!-- <h3 class="fs-base fw-medium text-muted mb-0">
            This is the 7th property you are adding to your portfolio.
        </h3> -->
</div>


<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Curriculum <small>Fill Required fields</small></h3>
    </div>
    <div class="block-content">
        <form action="{{ route('admin.syllabus.store') }}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="row items-push">

                <div class="col-12">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <label for="school"> School </label>
                            <select id="school" name="schoolid" class="select2 custom-select form-control" required>
                                <option value="" disabled selected> Select School</option>
                                @foreach ($schools as $school)
                                <option value="{{ $school->id }}"
                                    {{ old('schoolid') == $school->id ? 'Selected' : '' }}>
                                    {{ $school->name }}
                                </option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-8">
                            <label for="class"> Class </label>
                            <select id="class" name="courseid" class="custom-select form-control" required>
                                <option value="" disabled selected> Select Class</option>
                                @foreach ($courses as $course)
                                <option value="{{ $course->id }}"
                                    {{ old('courseid') == $course->id ? 'Selected' : '' }}>
                                    {{ $course->name }}
                                </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="mb-4">

                    </div>
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <label class="form-label" for="syllabus"> Curriculum Pdf</label>
                            <input class="form-control" type="file" accept="application/pdf" id="syllabus" name="syllabus">
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
<script src="{{ asset ('backend/js/plugins.js') }}"></script>
<!-- functions plugin -->
<script src="{{ asset ('backend/js/functions.js') }}"></script>

<script>
//select2
$('.select2').select2();
$('.custom-select').select2();
</script>



@endsection
