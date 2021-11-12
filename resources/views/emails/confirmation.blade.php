<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="login-form bg-light mt-4 p-4">
                    <hr class="mt-4">
                    <form method="post" action="{{route('sendConfirmUser',['id'=>$id,'confirmation_token'=>$confirmation_token])}}">
                        @csrf
                        <button type="submit" class="btn btn-primary offset-md-3">Confirmer le compte</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if(session('error'))
        <div class="col-md-4 offset-md-4">
            <div class="login-form bg-light mt-4 p-4">
                <div class="alert alert-error" style="background-color: crimson;color: #e3f2fd">
                    {{ session('error') }}
                </div>
            </div>
        </div>
    @endif
</body>
</html>
