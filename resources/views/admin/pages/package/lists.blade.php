<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Bootstrap 4 Pricing Page</title>
  

</head>
<body>
<!-- partial:index.partial.html -->
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>Pricing Page | My Security</title>
</head>

<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-4 mb-3 bg-dark text-white">
      <h5 class="my-0 mr-md-auto">Packages</h5>
      <a href="{{ route("users.admin_all_web") }}" class="btn btn-outline-warning">Admin</a>
    </div>


    <div class="p-5 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Our All Package Lists</h1>
    </div>

    <div class="container">
        <div class="card-deck mb-5 text-center row">

            @foreach ($dataType as $item)
                <div class="card m-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0">{{ $item->name }}</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title">{{ $item->amount }}<small>BDT</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Device login <strong>{{ $item->login_time }}</strong> Time</li>
                            <li>Package Validity <strong>{{ $item->validity }}</strong> Days</li>
                        </ul>
                    </div>
                </div>
            @endforeach

        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>
<!-- partial -->
  
</body>
</html>
