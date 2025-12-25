<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            margin: 20px;
            background: #fff;
        }

        .report-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: auto;
            max-width: 100%;
        }

        .report-table th,
        .report-table td {
            border: 1px solid #ddd;
            padding: 4px 8px;
            text-align: left;
            font-size: 8px;
            font-weight: 400;
            word-break: break-word;
        }

        .report-table th {
            font-size: 10px;
            background-color: #f4f6fa;
            font-weight: 600;
        }

        @media print {
            body {
                margin: 0;
            }

            .report-table {
                page-break-inside: avoid;
            }
        }
    </style>
</head>

<body>
    <h3 style="text-align:center; margin-bottom: 25px;">{{ $title ?? 'Relatório' }}</h2>
    <table class="report-table">
        <thead>
            <tr>
                @foreach($headers as $header => $key)
                <th>{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>

            @foreach($data as $key => $value)
            <tr>
                @foreach($headers as $header => $field)
                <td>{{ $value[$field] ?? '' }}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>