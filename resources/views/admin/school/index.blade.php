@extends('layouts.admin')

@section ('title') School @endsection

@section('css')

<meta name="csrf-token" content="{{ csrf_token() }}" />

<link rel="stylesheet" href="{{ asset('backend/css/data.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/functions.css') }}">
@endsection


@section ('content')


<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Schools</h3>
            </div>
            <!-- <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"> <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Channels</li>
                    <li class="breadcrumb-item active">Channels List</li>
                </ol>
            </div> -->
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">



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
                    <!-- <span>DataTables has most features enabled by default, so all you
                        need to do to use it with your own tables is to call the construction
                        function:<code>$().DataTable();</code>.</span><span>Searching, ordering and paging goodness
                        will be immediately added to the table, as shown in this example.</span> -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display table table-centered datatable dt-responsive nowrap" id="school">
                            <thead>
                                <tr>
                                <tr>
                                    <th class="text-center" style="width: 50px;"></th>
                                    <th>Name</th>
                                    <th>Logo</th>
                                    <!-- <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th> -->
                                    <th class="text-center" style="width: 130px;">Actions</th>
                                </tr>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






@endsection







@section('scripts')

<script src="{{ asset('backend/js/data.js') }}"></script>
<script src="{{ asset('backend/js/functions.js') }}"></script>

<script>
$(".select2").select2();

// $('.datepicker').datepicker("setDate", new Date());


$(document).ready(function() {

    // $('#duration').on('change', function(e) {
    //     var dur = $('#duration').val();
    //     if (dur == 'today') {
    //         $('.datepicker').datepicker("setDate", new Date());
    //         // console.log($( '#startDate' ).val());
    //         $('#period').hide();

    //     }
    //     if (dur == 'week') {
    //         var date = new Date();
    //         var sdate = new Date();
    //         sdate.setDate(date.getDate() - 7);
    //         $('#startDate').datepicker("setDate", sdate);
    //         // console.log($( '#startDate' ).val());
    //         $('#endDate').datepicker("setDate", date);
    //         $('#period').hide();

    //     }
    //     if (dur == 'month') {
    //         var date = new Date();
    //         var m = date.getMonth();
    //         var y = date.getFullYear();
    //         var sdate = new Date(y, m, 1);
    //         var edate = new Date(y, m + 1, 0);
    //         // sdate.setDate( date.getDate(1));
    //         $('#startDate').datepicker("setDate", sdate);
    //         // console.log($( '#startDate' ).val());
    //         // edate.setDate( date.Month() + 1, );
    //         $('#endDate').datepicker("setDate", edate);
    //         $('#period').hide();

    //     }
    //     if (dur == 'custom') {
    //         $('#period').show();
    //     }
    // });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var oTable = $('#school').DataTable({
        processing: true,
        serverSide: true,

        ajax: {
            url: "{{ route('admin.schools') }}",
            type: "GET",
            // data: function(d) {
                // d.langId = $('#lang').val();
                // d.startDate = $('#startDate').val();
                // console.log(d.startDate);
                // d.endDate = $('#endDate').val();
            // }
        },
        columns: [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'logo',
                name: 'logo'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false
            },
        ],
        order: [
            [0, 'desc']
        ]
    });

    // $('.datepicker').on('change', function() {
    //     var from = $("#startDate").val();
    //     var to = $("#endDate").val();
    //     if(from && to) {
    //         oTable.draw();
    //     }
    // });
    $('#search-form').on('submit', function(e) {
        oTable.draw();
        e.preventDefault();
    });
});


// $(document).ready(function() {
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     $('#channel').DataTable({
//         processing: true,
//         serverSide: true,
//         ajax: "{{ route('admin.schools') }}",
//         columns: [
//             // { data: 'id', name: 'id' },
//             {
//                 data: 'DT_RowIndex',
//                 name: 'DT_RowIndex',
//                 orderable: false,
//                 searchable: false
//             },
//             {
//                 data: 'name',
//                 name: 'name'
//             },
//             {
//                 data: 'logo',
//                 name: 'logo'
//             },
//             {
//                 data: 'action',
//                 name: 'action',
//                 orderable: false
//             },
//         ],
//         order: [
//             [0, 'desc']
//         ]
//     });
// });

function add() {
    $('#PatientForm').trigger("reset");
    $('#SchoolModal').html("Add Image");
    $('#school-modal').modal('show');
    $('#id').val('');
}

function editFunc(id) {
    // var id = pid;
    var currentUrl = document.URL;
    window.location.href=currentUrl+'/edit/'+id ;
}

function editSaveFunc(id) {
    $.ajax({
        type: "POST",
        url: "{{ url('channels/edit') }}",
        data: {
            id: id
        },
        dataType: 'json',
        success: function(res) {
            $('#PatientModal').html("Edit Patient");
            $('#patient-modal').modal('show');
            $('#id').val(res.id);
            $('#name').val(res.name);
            $('#gender').val(res.gender);
            if (res.gender == 'male') {
                $("#genm").prop("checked", true);
                $("#genm").click();
            }
            if (res.gender == 'female') {
                $("#genf").prop("checked", true);
                $("#genf").click();
            }

            $('#age').val(res.age);
            $('#phone').val(res.phone);
            $('#address').val(res.address);
        }
    });
}

function deleteFunc(id) {
    if (confirm("Delete School?") == true) {
        var id = id;
        // var url = 
        // ajax
        $.ajax({
            type: "GET",
            url: document.URL+'/delete/'+id,
            // data: {
            //     id: id
            // },
            dataType: 'json',
            success: function(res) {
                var oTable = $('#school').dataTable();
                oTable.fnDraw(false);
            }
        });
    }
}
$('#PatientForm').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type: 'POST',
        url: "{{ url('patients/store')}}",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            $("#patient-modal").modal('hide');
            var oTable = $('#patient').dataTable();
            oTable.fnDraw(false);
            $("#btn-save").html('Submit');
            $("#btn-save").attr("disabled", false);
        },
        error: function(data) {
            console.log(data);
        }
    });
});
</script>

@endsection
