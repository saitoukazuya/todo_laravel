<!DOCTYPE html>
<!--レイアウトを作成-->
<html>
    <head>
        
        <title>Task List</title>
        <!-- CSS AND javaScript -->
        
        <!--<link rel="stylesheet" href="//fonts.googleapis.com/css? family=Roboto:300,300italic,700,700italic ">-->
        <!--<link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">-->
        <!--<link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">-->
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    
    <body>
        <style>
        body {
            padding-top: 100px;
            background-color: #B0E0E6;
        }
        
        .starter-template {
            padding: 30px 30px;
            background-color:snow;
        }
        </style>
        @include('nav')
        <div class="container">
            <div class="starter-template">
                @yield('content')
            </div>
        </div>
    </body>
</html>