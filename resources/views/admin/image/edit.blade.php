@extends('layouts.admin')

@section ('title') Edit Image @endsection

@section ('css')


@endsection

@section ('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Edit Problem</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Problem</li>
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

                        <h4 class="card-title">Problems</h4>
                        <p class="card-title-desc">Fill all required info below</p>

                        <form action="{{ route('admin.problems.update') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <input type="hidden" name="id" value=" {{ $problem->id }}">
                            <div class="form-group">

                                <label for="problemname"> Name </label>

                                <input id="problemname" name="name" type="text" class="form-control" value="{{ $problem->name }}">
                            </div>

                            

                            <div class="form-group">
                                <label class="font-weight-semibold" for="image">Image</label>
                                <select class="custom-select" name="image" id="image" required>

                                    <option value=""> Choose Image</option>
                                    @foreach ($images as $image)
                                        <option value="{{ $image->id }}"> {{ $image->name }} </option>
                                    @endforeach

                                </select>
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




<script>
// bsCustomFileInput.init();


// on change of type

$('#linktype').on('change', function(e) {
    // console.log(e.target.value);
    $('#post').hide();
    $('#problem').hide();
    
     if(e.target.value == 'post') {
        $('#post').show();
        $('#problem').hide();
        $('#posts').prop("required", true);
        $('#problem').prop("required", false);
    } else if(e.target.value == 'problem') {
        $('#post').hide();
        $('#problem').show();
        $('#problems').prop("required", true);
        $('#posts').prop("required", false);
    }
});

</script>



@endsection