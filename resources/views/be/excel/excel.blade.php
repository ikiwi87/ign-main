<!DOCTYPE html>
<html>

<head>
    <title>Upload database </title>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>

<body>
    @include('msg')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="card bg-light mt-3">
                    <div class="card-header">
                        Upload database provinces
                    </div>
                    {{-- <div class="card-body">
                        <form action="{{ route('import_provinces') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" class="form-control">
                    <br>
                    <button class="btn btn-success">Import User Data</button>
                    <a class="btn btn-warning" href="{{ route('export_provinces') }}">Export User Data</a>
                    </form>
                </div>

                <div class="card-body">
                    import_districts
                    <form action="{{ route('import_districts') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" class="form-control">
                        <br>
                        <button class="btn btn-success">Import User Data</button>
                    </form>
                </div>

                <div class="card-body">
                    import_school
                    <form action="{{ route('import_school') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" class="form-control">
                        <br>
                        <button class="btn btn-success">Import User Data</button>
                    </form>
                </div> --}}


                <div class="card-body">
                    import_contestant school
                    <form action="{{ route('contestants_school') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input style="height=50px;" type="file" name="file" class="form-control">
                        <br>
                        <button class="btn btn-success">Import Data</button>
                        <a class="btn btn-warning" href="{{ route('export_combo') }}">Export for Son
                            Data</a>
                    </form>
                </div>
                <div class="card-body">
                    update payment school
                    <form action="{{ route('update_contestants_school') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" class="form-control">
                        <br>
                        <button class="btn btn-success">Import Data</button>
                    </form>
                </div>



                <div class="card-body">
                    Sendmail confirm
                    <form action="{{ route('sendmailconfirm') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" class="form-control">
                        <br>
                        <button class="btn btn-success">Import Data</button>
                        <a class="btn btn-warning" href="{{ route('export_confirmmail') }}">Export List mail confirm
                            Data</a>
                    </form>
                </div>


                <div class="card-body">
                    import_contestant
                    <form action="{{ route('import_contestants') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" class="form-control">
                        <br>
                        <button class="btn btn-success">Import Data</button>
                        <a class="btn btn-warning" href="{{ route('export_contestants') }}">Export Contestants
                            Data</a>
                    </form>
                </div>


                <div class="card-body">
                    update payment
                    <form action="{{ route('update_contestants') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" class="form-control">
                        <br>
                        <button class="btn btn-success">Import Data</button>
                    </form>
                </div>

            </div>
        </div>
        <div class="col-md-7">

            <div class="card bg-light mt-3">


                <div class="card-header">
                    data
                </div>
                <table>
                    <thead>
                        <tr>
                            <td>code</td>
                            <td>fullname</td>
                            <td>email</td>
                            <td>payments</td>
                        </tr>
                        <hr>
                    </thead>
                    <tbody>
                        @forelse ($students as $student)
                        <tr>
                            <td> {{$student->code}}
                                <hr>
                            </td>
                            <td>{{$student->last_name}} {{$student->first_name}}
                                <hr>
                            </td>
                            <td> {{$student->email}}
                                <hr>
                            </td>
                            <td> {{$student->payment}}
                                <hr>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="text-center">No data found !</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

</body>

</html>