<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Shipped</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .email-header {

            background-color: #333;
            color: #ffffff;
            padding: 10px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .email-body {
            padding: 20px;
            text-align: center;
        }
        .email-footer {
            margin-top: 20px;
            font-size: 12px;
            color: #888;
            text-align: center;
        }
        .order-details {
            text-align: left;
            margin-top: 20px;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
        }
        .table, tr {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: 2px solid #333;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 2px solid #333;
        }
        td img{
            width: 80px;
            height: 80px;
            padding: 5px
        }
    </style>
</head>
<body>
    {{ $slot }}

    </body>
</html>