<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录页</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand text-white" href="{{ route('index') }}">Index</a>
        <a href="#" class="btn btn-primary btn-sm">登录</a>
    </nav>
    @include('home.error')
    <div class="container">
        <div class="row align-items-center justify-content-center" style="height: 40rem">
            <a href="{{ route('login.provider', 'github') }}" type="button" class="btn btn-dark btn-lg btn-block" data-provider="{{ $provider[0] }}">GitHub Login -> Go</a>
        </div>
        <div class="card-body">
            <a href="{{ route('index') }}">Back to home</a>
        </div>
    </div>
</body>
<script type="text/javascript">
    // $(document).on('click', '.row > a', function () {
    //     let drive = $(this).data('provider');
    //     $.ajax({
    //         type: "GET",
    //         url: "",
    //         data: {'drive' : drive},
    //         dataType: "json",
    //     });
    // });
</script>
</html>
