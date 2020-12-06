
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- VUE -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet"> <!--Añadimos el css generado con webpack-->
    <!-- TOKEN -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
 
    <script src="https://kit.fontawesome.com/ef87ffd06d.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400,400i,600,600i,700,700i&display=swap" rel="stylesheet">
    
    
</head>

<body>
    <div id="app" class="content"><!--La equita id debe ser app, como hemos visto en app.js-->
     <app></app>
    </div>
    <script src="{{asset('js/app.js')}}"></script> <!--Añadimos el js generado con webpack, donde se encuentra nuestro componente vuejs-->

  
    

    
</body>

</html>
