<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Paises</title>
</head>
<body>
    <h1>Paises Del Mundo</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>PAIS</th>
                <th>CAPITAL</th>
                <th>MONEDA</th>
                <th>POBLACION</th>
                <th>CIUDADES</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paises as $pais => $infopais)
                <tr>
                    <td rowspan="{{ count($infopais ["Ciudades"] as $ciudad)}}">{{ $pais }}</td>
                    <td rowspan="3">{{ $infopais ["Capital"] }}</td>
                    <td rowspan="3">{{ $infopais ["Moneda"] }}</td>
                    <td rowspan="3">{{ $infopais ["Poblacion"] }} Millones Hab.</td>
                    @foreach($infopais ["Ciudades"] as $ciudad)
                        <td>{{ $ciudad }}</td>
                </tr>
                    @endforeach
            @endforeach
        </tbody>
    </table>
</body>
</html>