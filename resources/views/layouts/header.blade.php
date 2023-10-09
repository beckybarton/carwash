<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>C-ONE Sports Center : Car Wash Job Order</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Replace this: -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.x.x/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- With this: -->
        <!-- <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> -->

        <!-- Similarly for JS: -->

        <!-- Replace this: -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.x.x/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>

        <!-- With this: -->
        <!-- <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script> -->
        <!-- <script src="{{ asset('js/app.js') }}"></script> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
        <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

        <!-- jQuery library, DataTables needs it -->
        <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- DataTables JS -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>



        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>


        <style>
            .custom-green-btn {
                background-color: #28a745; /* This is the color often used by Bootstrap's .btn-success */
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 1rem;
                transition: background-color 0.3s ease;
            }

            .custom-green-btn:hover {
                background-color: #218838; /* Darken the button a bit on hover */
            }

            .custom-red-btn {
                background-color: #c75744; /* This is the color often used by Bootstrap's .btn-success */
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 1rem;
                transition: background-color 0.3s ease;
            }

            .custom-red-btn:hover {
                background-color: #a12d18; /* Darken the button a bit on hover */
            }


        </style>


    </head>