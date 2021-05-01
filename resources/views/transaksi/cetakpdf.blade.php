<html>
    <head>
        <title>Laporan Barang Keluar</title>
    </head>
    <style>
        @page {
            margin:10px;
        }
        body {
            margin: 10px;
        } 
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table tr th {
            border: 1px solid black;
            background: #c5c5c5;
            padding: 5px;
        }
        table tr td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
    <body>
        <h1 align="center">Laporan Barang Masuk</h1>
        <br>
        <table>
            <thead>
                <tr>
                    <th style="width: 20px">NO</th>
                    <th>NAMA</th>
                    <th>TANGGAL</th>
                    <th>JUMLAH</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;?>
                @foreach($data as $item)
                    <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->jumlah }}</td>
                    </tr>
                <?php $no++;?>
                @endforeach
            </tbody>
        </table>
 </body>
</html> 