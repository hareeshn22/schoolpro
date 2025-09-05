@extends('layouts.admin')

@section ('title') Add Option @endsection

@section ('css')

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.snow.css" rel="stylesheet" />

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
            Add Option
        </h2>
        <!-- <h3 class="fs-base fw-medium text-muted mb-0">
                                                                                                                This is the 7th property you are adding to your portfolio.
                                                                                                            </h3> -->
    </div>


    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Option <small>Fill Required fields</small></h3>
        </div>
        <div class="block-content">
            <form action="{{ route('admin.homeworkai.store') }}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="row items-push">

                    <div class="col-12">
                        <!-- <div class="row mb-4">
                                                    <div class="col-md-8">
                                                        <label class="form-label" for="appname">Atendance</label>
                                                        <input type="text" class="form-control form-control-lg" id="appname" name="appname">
                                                    </div>
                                                </div> -->

                        <div class="row mb-4">`
                            <div class="col-md-8 mb-4">
                                <label for="category"> </label>
                                <select id="category" name="optionname" class="custom-select form-control" required>
                                    <option value="" disabled selected> Select Category</option>

                                    <option value="Attendance" {{ old('optionname') == 'English' ? 'Selected' : '' }}>
                                        Attendance
                                    </option>
                                    <option value="20%" {{ old('optionname') == 'Telugu' ? 'Selected' : '' }}>
                                        Homework
                                    </option>
                                    <option value="20%" {{ old('optionname') == 'Telugu' ? 'Selected' : '' }}>
                                        Exam Results
                                    </option>


                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-4">
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

                            <div class="col-md-4">
                                <label for="class"> Class </label>
                                <select id="class" name="courseid" class="custom-select form-control" required>
                                    <option value="" disabled selected> Select Class</option>
                                    {{--@foreach ($courses as $course)
                                    <option value="{{ $course->id }}" {{ old('courseid')==$course->id ? 'Selected' : '' }}>
                                        {{ $course->name }}
                                    </option>
                                    @endforeach --}}

                                </select>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <div class="col-md-8">
                                <label for="class"> </label>
                                <select id="class" name="courseid" class="custom-select form-control" required>
                                    <option value="" disabled selected> Select Academic Term</option>
                                    {{--@foreach ($courses as $course)
                                    <option value="{{ $course->id }}" {{ old('courseid')==$course->id ? 'Selected' : '' }}>
                                        {{ $course->name }}
                                    </option>
                                    @endforeach --}}

                                </select>
                            </div>
                        </div>



                        <div class="row mb-4">`
                            <div class="col-md-8 mb-4">
                                <label for="class"> </label>
                                <select id="class" name="optionname" class="custom-select form-control" required>
                                    <option value="" disabled selected> Select AI</option>

                                    <option value="10%" {{ old('optionname') == 'English' ? 'Selected' : '' }}>
                                        English
                                    </option>
                                    <option value="20%" {{ old('optionname') == 'Telugu' ? 'Selected' : '' }}>
                                        Telugu
                                    </option>


                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-8 mb-4">
                                <label for="class"> Percentage </label>
                                <select id="class" name="optionname" class="custom-select form-control" required>
                                    <option value="" disabled selected> Select Percentage</option>

                                    <option value="10%" {{ old('optionname') == '10%' ? 'Selected' : '' }}>
                                        10%
                                    </option>
                                    <option value="20%" {{ old('optionname') == '20%' ? 'Selected' : '' }}>
                                        20%
                                    </option>
                                    <option value="30%" {{ old('optionname') == '30%' ? 'Selected' : '' }}>
                                        30%
                                    </option>
                                    <option value="40%" {{ old('optionname') == '40%' ? 'Selected' : '' }}>
                                        40%
                                    </option>

                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="content">Value </label>
                                <!-- Hidden input to hold HTML content -->
                                <input type="hidden" name="content" id="hiddenContent">

                                <!-- <textarea id="editor" name="content" class="postcontent" rows="20"
                                                                                                                cols="100%"> {{ old('content') }}</textarea> -->
                                <div id="editor" style="height: 200px;"></div>

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


    <!-- functions plugin -->
    <!-- <script src="{{ asset ('backend/js/functions.min.js') }}"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.js"></script>
    <!-- HTML Edit Button plugin -->
    <script src="https://unpkg.com/quill-html-edit-button@2.2.7/dist/quill.htmlEditButton.min.js"></script>
    <script>
        // Make sure htmlEditButton is available globally
        Quill.register("modules/htmlEditButton", window.htmlEditButton);
    </script>



    <script>
        $(document).ready(function () {
            const toolbarOptions = [
                // [{ font: [] }, { 'size': ['small', false, 'large', 'huge'] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'script': 'sub' }, { 'script': 'super' }],
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                ['blockquote', 'code-block'],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }, { 'list': 'check' }],
                [{ 'indent': '-1' }, { 'indent': '+1' }],
                [{ 'align': [] }, { 'direction': 'rtl' }],
                ['link'],
                ['clean']
            ];

            var quill = new Quill("#editor", {

                theme: "snow",
                modules: {
                    toolbar: toolbarOptions,
                    htmlEditButton: {
                        debug: true,
                        msg: "Edit HTML here",
                        okText: "OK",
                        cancelText: "Cancel"
                    }


                    //     toolbar: [
                    //     [{ 'color': [] }, { 'background': [] }],
                    //     ['bold', 'italic', 'underline'],
                    //     ['clean']
                    // ]
                }

            });




            $('form').on('submit', function () {
                var htmlContent = quill.root.innerHTML;
                $('#hiddenContent').val(htmlContent);
            });
        });
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $('#school').on('change', function (e) {
                var cat_id = e.target.value;
                console.log(cat_id);
                $.ajax({
                    url: "{{ route('admin.courses.filterbys') }}",
                    type: "POST",
                    data: {
                        id: cat_id
                    },
                    success: function (data) {
                        $('#class').empty();
                        $('#class').append('<option value="" disabled selected> Select Class</option>');
                        $.each(data, function (index, course) {
                            $('#class').append('<option value="' + course.id + '">' + course.name + '</option>');
                            // $.each(subcategory.subcategories, function (index, subcategory) {
                            //     $('#subcategory').append('<option value="' + subcategory.id + '">&nbsp;&nbsp;' + subcategory.name + '</option>');
                            // })
                        })
                    }
                })
            });
        });
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $('#class').on('change', function (e) {
                var id = e.target.value;
                console.log(id);
                if (id != '') {
                    $.ajax({
                        url: "{{ route('admin.exams.filterbys') }}",
                        type: "POST",
                        data: {
                            id: id
                        },
                        success: function (data) {
                            $('#pvexam').empty();
                            $('#pvexam').append('<option value="" disabled selected> Select Previous Exam</option>');
                            $.each(data, function (index, exam) {
                                $('#pvexam').append('<option value="' + exam.id + '">' + exam.name + '</option>');
                                // $.each(subcategory.subcategories, function (index, subcategory) {
                                //     $('#subcategory').append('<option value="' + subcategory.id + '">&nbsp;&nbsp;' + subcategory.name + '</option>');
                                // })
                            })
                            $('#psexam').empty();
                            $('#psexam').append('<option value="" disabled selected> Select Present Exam</option>');
                            $.each(data, function (index, exam) {
                                $('#psexam').append('<option value="' + exam.id + '">' + exam.name + '</option>');
                                // $.each(subcategory.subcategories, function (index, subcategory) {
                                //     $('#subcategory').append('<option value="' + subcategory.id + '">&nbsp;&nbsp;' + subcategory.name + '</option>');
                                // })
                            })
                        }
                    })

                }
            });
        });
    </script>



@endsection