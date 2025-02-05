@extends('layouts.admin')

@section ('title') Posts @endsection

@section('css')



@endsection



@section ('content')


<h2 class="content-heading"> Posts </h2>

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
                    <th>Title</th>
                    <th>Image</th>
                    <th>Type</th>
                    <th class="text-center" style="width: 100px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="ordercheck1">
                            <label class="custom-control-label" for="ordercheck1">&nbsp;</label>
                        </div>
                    </td>
                    <td>
                        {{ $post->title }}
                    </td>

                    <td>
                        @if ($post->image)
                            <img src="{{ asset('uploads/thumb/' . $post->image->name) }}" alt="" height="120">
                            
                        @else
                            <img src="{{ asset('uploads/thumb/post-thumb.webp') }}" alt="" height="120">
                        @endif
                        
                    </td>

                    <td>
                        {{ $post->type }}
                    </td>


                    <td>
                        <a href="{{ route('admin.posts.edit', [ 'id' => $post->id ]) }}" class="mr-3 text-dark"
                            data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                            <i class="fa-regular fa-pen-to-square" style="font-size:24px;"></i>
                        </a>
                        <a href="{{ route('admin.posts.delete', [ 'id' => $post->id ]) }}" class="text-danger"
                            data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                            <i class="fa-regular fa-trash-can" style="font-size:24px;"></i>
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