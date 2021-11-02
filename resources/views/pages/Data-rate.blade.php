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
    <style type="text/css">
		.pagination li{
			float: left;
			list-style-type: none;
			margin:5px;
		}
	</style>
    <div class="container">
		<div class="card">
			<div class="card-body">
        <h3>Data Rate</h3>
         <a href="{{url('uploadform')}}"class="btn btn-primary">Upload CSV File</a>
         <br/>
                <form action="{{url('/add-rate')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="formGroupExampleInput">Date</label>
                        <input class="form-control" type="date" id="date" name="date" placeholder="Date">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput">Exchange Rate</label>
                        <input class="form-control" type="text" id="exchange_rate_usd" name="exchange_rate_usd">
                      </div>
                    <button class="btn btn-success">Add</button>
                </form>
        <br/>
        <div>
            <table class="table table-bordered">
                <tr>
                    <th>Date</th>
                    <th>Exchange Rate</th>
                    <th>Action</th>
                </tr>
                @foreach ($rates as $item)
                <tr>
                    <th>{{$item->date}}</th>
                    <th>{{$item->exchange_rate_usd}}</th>
                    <th><a href="{{url('update-rate',$item->id)}}">Edit</a>|<a href="{{url('deleterate',$item->id)}}">Delete</a></th>
                </tr>
                @endforeach
            </table>
        </div>
        <div>
        {!!$rates->links()!!}
         </div>
            </div>
        </div>
    </div>
 
</body>
</html>