<!doctype html>
<html>  
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">

        <style>
            .box {
                background-color: LightGoldenRodYellow;
                width: 300px;
                padding: 25px;
                border: 25px solid Lime;
                margin: 25px;
            }
        </style>
                    
     
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                   
                </div>
                <div class="card-body">
                    <a href="/promosi/export_excel" class="btn btn-primary">Download File</a>
                    <br/>
                    <br/>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Rating</th>
                                <th>Jumlah Pengunjung</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($promosi as $p)
                            <tr>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->rating }}</td>
                                <td>{{ $p->jumlah_pengunjung }}</td>
                                <td>{{ $p->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>