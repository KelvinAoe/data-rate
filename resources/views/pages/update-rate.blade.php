<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Update Rate</h1>
                <form action="{{url('updaterate',$dat->id)}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="formGroupExampleInput">Date</label>
                        <input class="form-control" type="date" id="date" name="date" value="{{$dat->date}}">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput">Exchange Rate</label>
                        <input class="form-control" type="text" id="exchange_rate_usd" name="exchange_rate_usd" value="{{$dat->exchange_rate_usd}}">
                      </div>
                    {{-- <input type="date" id="date" name="date" value="{{$dat->date}}"> --}}
                    {{-- <input type="text" id="exchange_rate_usd" name="exchange_rate_usd" value="{{$dat->exchange_rate_usd}}"> --}}
                    <button class="btn btn-success"> update</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>