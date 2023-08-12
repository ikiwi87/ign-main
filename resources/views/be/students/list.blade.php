@extends('be.layouts.index')
@section('title')
Danh sách Thí sinh
@endsection
@section('content')
@section('style')
    <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
    <style>
        #filter_ct1 {
            width: 200px;
        }
        #filter_csdk1 {
            width: 200px;
        }

    </style>
@endsection

<!-- START PAGE CONTENT-->
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">List Candidate {{$students->count()}}</div>
            <div>
                <a class="btn btn-success" href="{{route('export_students')}}">
                    <i class="fa fa-download fa-fw"></i>
                    Export list
                </a>
                <a type="button" class="btn btn-success" href="{{route('import_students')}}">
                    <i class="fa fa-upload fa-fw"></i>
                    <label for="file">Import list</label>
                </a>
                <input type="file" name="file" hidden id="file" />
            </div>
        </div>
        <div class="ibox-body" style="overflow-x:auto;">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Mã ĐK</th>
                        <th>Họ và Tên</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Cơ Sở ĐK</th>
                        <th>Chương trình</th>
                        <th>Email</th>
                        <th>Tên phụ huynh</th>
                        <th>SDT</th>
                        <th>Tình trạng duyệt HS</th>
                        <th>Mail</th>
                        {{-- <th>Giấy khai sinh</th>
                        <th>Giấy báo</th> --}}
                        <th>Thao tác</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT-->
@endsection
@section('script')
<script src="assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>
<script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>

<script>
    $(document).ready(function () {
        let oTable = $('#example-table').DataTable({
            "columnDefs": [
                {
                    "targets": 0,
                    "checkboxes": {
                        "selectRow": 0
                    }
                }
            ],
            "order": [[0, "desc"]],
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": "{{ route('json_students') }}",
                "dataType": "json",
                "type": "POST",
                "data":{ _token: "{{csrf_token()}}"}
            },
            "columns": [
                { "data": "id" },
                { "data": "code" },
                { "data": "fullname" },
                { "data": "dob" },
                { "data": "gender" },
                { "data": "schools_id" },
                { "data": "chuong_trinh" },
                { "data": "email" },
                { "data": "parent_name" },
                { "data": "parent_phone" },
                { "data": "payment" },
                { "data": "send_mail" },
                { "data": "options" }


            ],
            initComplete: async function (settings, json) {
                $('.dataTables_length').parent().removeClass('col-md-4').addClass('col-md-8');
                $('#example-table_filter').parent().removeClass('col-md-6').addClass('col-md-4');
                $('.dataTables_length').append('<select class="form-control input-sm ml-2"  id="filter_ct1"></select>');
                $('.dataTables_length').append('<select class="form-control input-sm ml-2"  id="filter_csdk1"></select>');
                $('.dataTables_length').append(`<button class="btn btn-success mt-1 ml-2" id="btn_huy" >Huỷ tất cả</button>`);
                $('.dataTables_length').append(`<a href='{{ route('accept_all') }}'><button class="btn btn-primary mt-1 ml-2" >Xác nhận tất cả </button></a>`);

                const response = await fetch("api/student/data");
                const jsonData = await response.json();

                jsonData.chuong_trinh.forEach(el => {
                    $('#filter_ct1').append('<option value="' + el.chuong_trinh + '">' + el.chuong_trinh + '</option>');
                })

                jsonData.schools_id.forEach(el => {
                    $('#filter_csdk1').append('<option value="' + el.schools_id + '">' + el.schools_id + '</option>');
                })

                $('#filter_ct1').on('change', function () {

                    const searchValue = $(this).val();
                    console.log(oTable);
                    oTable.columns(6).search(searchValue).draw();
                });

                $('#filter_csdk1').on('change', function () {
                    const searchValue = $(this).val();
                    oTable.columns(7).search(searchValue).draw();
                });


                $('#btn_huy').on('click', async function() {
                    updateStatus('huy');
                })

                $('#btn_chon').on('click', function() {
                    updateStatus('xacnhan');
                })

                function updateStatus(type) {
                    const selectedValues = oTable.column(0).checkboxes.selected();
                    let studentIds = [];
                    $.each(selectedValues, function(key, value) {
                        studentIds.push(value)
                    })

                    const uniqueIds = [...new Set(studentIds)];

                    $.ajax({
                        url: "{{ route('students_update_status') }}",
                        method: 'POST',
                        data: {
                            student_ids: uniqueIds,
                            type: type,
                            _token: "{{csrf_token()}}"
                        },
                        success: function() {
                            window.location.reload();
                        }
                    })
                }
            }
        });
    });
</script>


{{-- <script>
    $(document).ready(function () {
        let oTable = $('#example-table').DataTable({
            "columnDefs": [
                {
                    "targets": 0,
                    "checkboxes": {
                        "selectRow": 0
                    }
                }
            ],
            "order": [[0, "desc"]],
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": "{{ route('accountant_list_data') }}",
                "dataType": "json",
                "type": "GET",
                "data":{
                    _token: "{{csrf_token()}}"
                }
            },
            "columns": [
                { "data": "id" },
                { "data": "code" },
                { "data": "fullname" },
                { "data": "dob" },
                { "data": "gender" },
                { "data": "schools_id" },
                { "data": "chuong_trinh" },
                { "data": "email" },
                { "data": "name_cha" },
                { "data": "phone_cha" },
                { "data": "act_deposit" },
                { "data": "options" }
            ],
            initComplete: async function (settings, json) {
                $('.dataTables_length').parent().removeClass('col-md-4').addClass('col-md-8');
                $('#example-table_filter').parent().removeClass('col-md-6').addClass('col-md-4');
                $('.dataTables_length').append('<select class="form-control input-sm ml-2"  id="filter_ct"></select>');
                $('.dataTables_length').append('<select class="form-control input-sm ml-2"  id="filter_csdk"></select>');
                $('.dataTables_length').append(`<button class="btn btn-success mt-1 ml-2" id="btn_huy" >Huỷ tất cả</button>`);
                $('.dataTables_length').append(`<button class="btn btn-primary mt-1 ml-2" id="btn_chon" >Xác nhận tất cả</button>`);

                const response = await fetch("api/student/data");
                const jsonData = await response.json();

                jsonData.chuong_trinh.forEach(el => {
                    $('#filter_ct').append('<option value="' + el.chuong_trinh + '">' + el.chuong_trinh + '</option>');
                })

                jsonData.schools_id.forEach(el => {
                    $('#filter_csdk').append('<option value="' + el.schools_id + '">' + el.schools_id + '</option>');
                })

                $('#filter_ct').on('change', function () {
                    const searchValue = $(this).val();
                    oTable.columns(6).search(searchValue).draw();
                });

                $('#filter_csdk').on('change', function () {

                    const searchValue = $(this).val();
                    oTable.columns(7).search(searchValue).draw();
                });


                $('#btn_huy').on('click', async function() {
                    const selectedValues = oTable.column(0).checkboxes.selected();
                    let studentIds = [];
                    $.each(selectedValues, function(key, value) {
                        studentIds.push(value)
                    })
                    const uniqueIds = [...new Set(studentIds)];

                    const response = await fetch("api/student/update-status", {
                        method: 'POST',
                        data: {
                            student_ids: uniqueIds,
                            type: 'huy'
                        },
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                })

                $('#btn_chon').on('click', function() {
                    console.log('121212121')
                })

                $(".act_payment").each(function(el) {
                    el.on('change', function(event) {
                        console.log($(el).data('id'));
                    })
                })

            }
        });
    });
</script> --}}
@endsection
