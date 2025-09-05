@extends('layouts.admin')

@section ('title') Add Page @endsection

@section ('css')

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
            Add Page
        </h2>
        <!-- <h3 class="fs-base fw-medium text-muted mb-0">
                                                                            This is the 7th property you are adding to your portfolio.
                                                                        </h3> -->
    </div>


    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Page <small>Fill Required fields</small></h3>
        </div>
        <div class="block-content">
            <form action="{{ route('admin.pages.store') }}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="row items-push">

                    <div class="col-12">
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <label class="form-label" for="appname">App Name</label>
                                <input type="text" class="form-control form-control-lg" id="appname" name="appname">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-8">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" class="form-control form-control-lg" id="name" name="name">
                            </div>
                        </div>

                        

                        <div class="row mb-4">
                            <div class="col-md-8">
                                <label class="form-label" for="lang">Language</label>
                                <select id="school" name="language" class="select2 custom-select form-control" required>
                                    <option value="" disabled selected> Select Language</option>

                                    <option value="english" {{ old('language') == 'english' ? 'Selected' : '' }}>
                                        English
                                    </option>
                                    <option value="telugu" {{ old('language') == 'telugu' ? 'Selected' : '' }}>
                                        Telugu
                                    </option>

                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class="form-label" for="content"> Content </label>
                                <!-- Hidden input to hold HTML content -->
                                <input type="hidden" name="info" id="hiddenContent">

                                <!-- <textarea id="editor" name="content" class="postcontent" rows="20"
                                                                            cols="100%"> {{ old('content') }}</textarea> -->
                                <div id="editor" style="height: 400px;"></div>

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



@endsection