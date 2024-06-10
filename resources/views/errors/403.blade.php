<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Esteshari | 403</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="text-center row">
                <div class=" col-md-6">
                    <img src="{{asset('403-Forbidden-HTML.png')}}" alt=""
                        class="img-fluid" width="450px">
                </div>
                <div class=" col-md-6 mt-5">
                    <p class="fs-3"> <span class="text-danger">Opps!</span> forbidden.</p>
                    <p class="lead">
                       You do not have access to this page
                    </p>
                     <p class="lead">
ليس لديك صلاحية الوصول لهذه الصفحة                    </p>
                    <a href="{{route('homepage')}}" class="btn btn-primary">Go Home</a>
                </div>

            </div>
        </div>
    </body>

</html>