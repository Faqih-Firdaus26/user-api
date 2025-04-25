<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>User Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            background: #fff;
            padding: 20px;
            margin: auto;
            max-width: 800px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        .form {
            display: flex;
            flex-direction: column;
        }

        .form label {
            margin-top: 10px;
            font-weight: bold;
        }

        .form input {
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn {
            margin-top: 15px;
            padding: 10px 15px;
            background-color: #4CAF50;
            border: none;
            color: white;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            border-radius: 4px;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .btn-edit {
            background-color: #2196F3;
        }

        .btn-edit:hover {
            background-color: #0b7dda;
        }

        .btn-delete {
            background-color: #f44336;
        }

        .btn-delete:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>
