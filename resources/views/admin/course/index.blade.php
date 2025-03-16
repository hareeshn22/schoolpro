@extends('layouts.admin')

@section ('title') Slides @endsection

@section('css')


@endsection


@section ('content')


<h2 class="content-heading"> Sliders </h2>

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

<div class="block block-rounded">

    <div class="block-content">
        <table class="table table-vcenter">
            <thead>
                <tr>
                    <th class="text-center" style="width: 50px;"></th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Link</th>
                    <!-- <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th> -->
                    <th class="text-center" style="width: 100px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($slides as $slide)
                <tr>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="ordercheck1">
                            <label class="custom-control-label" for="ordercheck1">&nbsp;</label>
                        </div>
                    </td>
                    <td>
                        {{ $slide->name }}
                    </td>

                    <td>
                        {{ $slide->image->name }}
                        <!-- <img src="{{ asset('uploads/slide/small/' . $slide->image) }}" alt="" height="120"> -->
                    </td>
                    <td>
                        @if ($slide->post)
                        Post: {{ $slide->post->title }}
                        @endif
                        @if ($slide->problem)
                        Problem: {{  $slide->problem->name }}
                        @endif
                    </td>


                    <td>
                        <a href="{{ route('admin.slides.edit', [ 'id' => $slide->id ]) }}" class="mr-3 text-dark"
                            data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                            <i class="fa-regular fa-pen-to-square" style="font-size:24px;"></i>
                        </a>
                        <a href="{{ route('admin.slides.delete', [ 'id' => $slide->id ]) }}" class="text-danger"
                            data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                            <i class="fa-regular fa-trash-can" style="font-size:24px;"></i>
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>



@endsection




@section('scripts')


@endsection