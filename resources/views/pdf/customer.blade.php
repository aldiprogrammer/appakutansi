<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $data['title'] }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        thead {
            background-color: #3490dc;
            color: white;
        }

        th,
        td {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tfoot {
            margin-top: 10px;
            font-style: italic;
        }

    </style>
</head>
<body>
    <h2>Daftar Customer</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>No Telp</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data['customer'] as $item)
            <tr>
                <td>{{ $no++}}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->nik }}</td>
                <td>{{ $item->no_telp }}</td>
                <td>{{ $item->alamat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

