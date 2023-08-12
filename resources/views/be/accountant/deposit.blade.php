@extends('be.layouts.index')
@section('title')
    Danh sách thí sinh đã xác nhận
@endsection
@section('content')
    @section('style')
        <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
        <style>
            #filter_ct {
                width: 200px;
            }
            #filter_csdk {
                width: 200px;
            }
        </style>
    @endsection

    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">List Candidate {{$students->count()}}</div>
                <a class="btn btn-success"
                   href="{{route('export_students')}}"><i class="fa fa-download fa-fw"></i>
                    Export list</a>
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
                        <th>Tên phụ huynh</th>
                        <th>SDT</th>
                        <th>Hình thức thanh toán</th>
                        <th>Tình trạng</th>
                        <th>Ghi chú</th>
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
                    "url": "{{ route('accountant_deposit_list_data') }}",
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
                    { "data": "name_cha" },
                    { "data": "phone_cha" },
                    { "data": "act_payment" },
                    { "data": "payment_done" },
                    { "data": "update_info" },
                    { "data": "options" },
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

                        console.log(response)
                    })

                    $('#btn_chon').on('click', function() {
                        console.log('121212121')
                    })

                    $(".act_payment").each(function(index, el) {
                        $(el).on('change', function(event) {
                            $.ajax({
                                url: "{{ route('accountant_deposit_update') }}",
                                method: 'POST',
                                data: {
                                    id: $(el).data('id'),
                                    payment_method: $(el).val(),
                                    _token: "{{csrf_token()}}"
                                }
                            })
                        })
                    })
                }
            });
        });
    </script>
@endsection
