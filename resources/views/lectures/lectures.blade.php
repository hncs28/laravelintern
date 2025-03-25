<!DOCTYPE html>
<html>
<head>
    <title>Lectures</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            line-height: 1.6;
            padding: 30px;
            background-color: #f0f2f5;
            color: #1a1a1a;
        }

        h1 {
            text-align: center;
            margin-bottom: 40px;
            color: #1a1a1a;
            font-size: 2.5em;
            font-weight: 600;
            letter-spacing: 1px;
        }

        table {
            width: 100%;
            max-width: 900px;
            margin: 0 auto 30px auto;
            border-collapse: separate;
            border-spacing: 0;
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05), 0 1px 3px rgba(0,0,0,0.08);
        }

        th, td {
            padding: 15px 20px;
            text-align: left;
        }

        th {
            background-color: #4a90e2;
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.9em;
            letter-spacing: 0.5px;
        }

        td {
            border-bottom: 1px solid #ececec;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover {
            background-color: #f8fafc;
            transition: background-color 0.2s ease;
        }

        a {
            color: #4a90e2;
            text-decoration: none;
            font-weight: 500;
        }

        a:hover {
            color: #357abd;
            text-decoration: underline;
        }

        button {
            background-color: #ff4d4f;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.9em;
            font-weight: 500;
            transition: background-color 0.2s ease;
        }

        button:hover {
            background-color: #e64446;
        }

        .addnewbutton {
            display: block;
            margin: 0 auto;
            background-color: #28c76f;
            padding: 12px 24px;
            font-size: 1em;
            font-weight: 500;
            border-radius: 6px;
            text-align: center;
            color: white;
            text-decoration: none;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .addnewbutton:hover {
            background-color: #23b360;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }

        @media (max-width: 600px) {
            body {
                padding: 15px;
            }

            table {
                border-radius: 8px;
            }

            table, thead, tbody, th, td, tr {
                display: block;
            }

            thead {
                display: none;
            }

            tr {
                margin-bottom: 20px;
                border: none;
                box-shadow: 0 2px 4px rgba(0,0,0,0.05);
                border-radius: 8px;
            }

            td {
                border: none;
                position: relative;
                padding: 12px 15px 12px 50%;
            }

            td:before {
                content: attr(data-label);
                position: absolute;
                left: 15px;
                width: 40%;
                padding-right: 10px;
                font-weight: 600;
                color: #4a4a4a;
            }

            .addnewbutton {
                width: 100%;
                max-width: 250px;
            }
        }
    </style>
</head>
<body>
    <h1>All Lectures</h1>
    <table id="lectures-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lectures as $lecture)
                <tr>
                    <td data-label="Name">{{ $lecture->lectureName }}</td>
                    <td data-label="Phone">{{ $lecture->lecturePhone }}</td>
                    <td data-label="Actions">
                        <a href="{{ route('lectures.edit', $lecture->id) }}" class="btn btn-primary">Edit</a>
                        <form method="POST" action="{{ route('lectures.destroy', $lecture->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <button href="{{ route('lectureform') }}" class="addnewbutton">Add New Lecture</button>

    <script>
        $(document).ready(function() {
            $('#lectures-table').DataTable({
                "pageLength": 5
            });
        });
    </script>
</body>
</html>