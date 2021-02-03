<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/datatables2.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/mdb.min.css')}}" rel="stylesheet">

        <!-- JQuery -->
        <script type="text/javascript" src="{{asset('js/mdb/jquery.min.js')}}"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="{{asset('js/mdb/popper.min.js')}}"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="{{asset('js/mdb/bootstrap.min.js')}}"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="{{asset('js/mdb/mdb.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/mdb/datatables2.min.js')}}"></script>
    </head>
    <body>
        <div class="container">
            <table id="images" class="w-100 table table-striped table-bordered table-sm" cellspacing="0">
                <thead>
                <tr>
                    <th class="th-sm">Image Name</th>
                    <th class="th-sm">User Name</th>
                    <th class="th-sm">User Id</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </body>
    <script !src="">
        $(document).ready(function () {
            $('#images').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                   "url":  "api/images"
                },
                "pagingType": "full_numbers",
                "search": {"search": null},
                "columnDefs": [ {
                    "targets": 0,
                    "data": function ( row, type, val, meta ) {
                        return  row.title;
                    },
                    "searchable": false,
                    "orderable": false
                }, {
                    "targets": 1,
                    "data": function ( row, type, val, meta ) {
                        return  row.user.name;
                    },
                    "searchable": true,
                    "orderable": false
                }, {
                    "targets": 2,
                    "data": function ( row, type, val, meta ) {
                        return  row.user.id;
                    },
                    "searchable": false,
                    "orderable": false
                }]


            });
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
</html>
