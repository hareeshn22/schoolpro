@extends('layouts.admin')

@section ('title') Images @endsection

@section('css')



@endsection



@section('content')

<h2 class="content-heading">Images</h2>

<div class="row items-push">
    @foreach ($images  as $image )
        <div class="col-md-3 animated fadeIn">
            <div class="options-container">
                <img class="img-fluid options-item" src="{{ asset('uploads/large/' . $image->name) }}" alt="">
                <div class="options-overlay bg-black-75">
                    <div class="options-overlay-content">
                        <h3 class="h4 text-white mb-1">{{$image->name}}</h3>
                        <h4 class="h6 text-white-75 mb-3">More Details</h4>
                        <!-- <a class="btn btn-sm btn-alt-primary" href="javascript:void(0)">
                            <i class="fa fa-pencil-alt opacity-50 me-1"></i> Edit
                        </a> -->
                        <a class="btn btn-sm btn-alt-danger" href="{{ route('admin.images.delete', [ 'id' => $image->id ]) }}">
                            <i class="fa fa-times opacity-50 me-1"></i> Delete
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection



@section ('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Images</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                            <li class="breadcrumb-item active">Images</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body ">

                        <div class="table-responsive">
                            <table class="table table-centered datatable dt-responsive nowrap "
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width: 20px;">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ordercheck">
                                                <label class="custom-control-label" for="ordercheck">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th style="width: 120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($images as $image)
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ordercheck1">
                                                <label class="custom-control-label" for="ordercheck1">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $image->name }}
                                        </td>

                                        <td>

                                            <img src="{{ asset('uploads/thumb/' . $image->name) }}" alt="" height="120">
                                        </td>


                                        <td>
                                            <!-- <a href="{{ route('admin.images.edit', [ 'id' => $image->id ]) }}" class="mr-3 text-dark"
                                                data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="Edit"><i
                                                    class="ri-edit-box-line font-size-18"></i></a> -->
                                            <a href="{{ route('admin.images.delete', [ 'id' => $image->id ]) }}"
                                                class="text-danger" data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="Delete"><i
                                                    class="ri-delete-bin-line font-size-18"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>

@endsection


@section('scripts')



@endsection