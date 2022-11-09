<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table id="table-agama">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Item</th>
                    <th>Created Date</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($keranjang as $k)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $k->nama_item }}</td>
                    <td>{{ $k->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
</body>
</html>