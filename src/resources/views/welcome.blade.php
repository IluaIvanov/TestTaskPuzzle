<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Puzzle food API</title>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body style="background: #4b0082;">
        <div style="color: white;">
            <p>The interface is not available at the moment, use the API:</p>
            <ul>
                <li>Get all order(GET): api/orders</li>
                <li>Create order(POST): api/orders</li>
                <li>Get show order(GET): api/orders/{order}</li>
                <li>Update order(PUT): api/orders/{order}</li>
            </ul>
        </div>
    </body>
</html>
