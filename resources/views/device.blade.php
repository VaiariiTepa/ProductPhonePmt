<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <style>
        .colonne{
            background-color: #000000;
            color: #ffffff;
        }

        tr td {
    background-color: #ffffff;
}
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>



        <table class="table table-hover">
            @foreach($device as $key => $phone)
                <tr>
                    <th scope="col"></th>
                </tr>
                <tr>
                    <th scope="col">DeviceName</th>
                    <td>
                            {{$phone->DeviceName}}
                    </td>
                </tr>
                <tr>
                    <th> </th>
                    <td> </td>
                </tr>
                <tr>
                    <th scope="col">Taille écrant</th>
                    <td>
                        {{$phone->size}}"
                    </td>
                </tr>
                <tr>
                    <th scope="col">Poids et Dimensions</th>
                    <td>
                        {{$phone->dimensions}},{{$phone->weight}}
                    </td>
                </tr>
                <tr>
                    <th scope="col">Réseau</th>
                    <td>
                        {{$phone->status_reseaux}}
                    </td>
                </tr>
                <tr>
                    <td>
                    <form method="post" action="{{ route('export')}}">

                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$key}}">
                        <input type="hidden" name="searchdevice" value="{{$searchdevice}}">
                        <input type="hidden" name="devicename" value="{{$phone->DeviceName}}">

                        <button type="submit">
                                exporter
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>








<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
