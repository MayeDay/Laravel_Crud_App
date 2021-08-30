<? require_once "./routes/api.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <script src="{{ asset('js/app.js') }}" defer></script>
   
   <!-- Styles -->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>Document</title>
</head>
<body>
  
  <div class="container">
    <div class="row p-5 mx-4 bg-light border">
      <div class="col-sm-12 my-3">
          <h1 class="text-center mt-5">Employee Registery</h1>
      </div>
    </div>

    <div class="new_employee m-5">
      <h3 class="text-center mb-4">Add New Employee</h3>
      <form action="api/addEmployee" method="POST">
        @csrf

        <div class="row p-4 border bg-light">
          

          <div class="col-sm-3">
            <label class="w-100" for="name">Name</label>
            <input type="text" name="name" id="" placeholder="name">
          </div>

          <div class="col-sm-3">
            <label class="w-100" for="name">Email</label>
            <input type="text" name="email" id="" placeholder="email">
          </div>

          <div class="col-sm-3">
            <label class="w-100" for="name">Desired Salary</label>
            <input class="d-block"type="text" name="salary" id="" placeholder="salary">
          </div>

          <div class="col-sm-3 text-center p-4">
            <button type="submit" class="btn btn-md btn-block btn-success">Add</button>
          </div>
        </div>
      </form>
    </div>
    
    <div class="content m-5">
      <h3 class="text-center mb-4"> Employee Rooster</h3>
      <form action="employees" method="GET">
        @csrf
        <div class="row text-center bg-light">
          <div class="col-sm-3 p-3 border">
            Name
          </div>

          <div class="col-sm-3 p-3 border">
            Salary
          </div>

          <div class="col-sm-3 p-3 border">
            Email
          </div>
          <div class="col-sm-3 py-3 border">
          </div>
        </div>
      </form>

      @foreach($employees as $employee)
      <form method="POST">
      @csrf
        <div class="row text-center">
        <div class="col-sm-3 p-3 border" >
           <input class="border-top-0 border-left-0 border-right-0 text-dark"type="text" name='name' placeholder="{{ $employee->name }}" value="{{ $employee->name }}">
          </div>

          <div class="col-sm-3 p-3 border">
          <input class="border-top-0 border-left-0 border-right-0 "type="text" name="salary" placeholder="{{ $employee->salary }}" value="{{ $employee->salary }}" id="">
          </div>

          <div class="col-sm-3 p-3 border">
          <input class="border-top-0 border-left-0 border-right-0 "type="text" name="email" placeholder="{{ $employee->email }}" value="{{ $employee->email }}" id="">
          </div>
          
          <div class="col-sm-3 p-3 border">
            <input type=submit value="Update"class="btn btn-sm btn-success" formaction='updateEmployee/{{$employee->id}}'>
            <input type=submit value="Delete"class="btn btn-sm btn-danger" formaction='deleteEmployee/{{$employee->id}}'>
          </div>
        </div>
      </form>
      @endforeach
      
    </div>
    
  </div>
</body>
</html>