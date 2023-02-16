<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
                <div class="col-md-12">
                        <form class="row g-3" action="{{route('import_nedra.post')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                          <div class="col-auto">
                              <label for="staticEmail2" class="visually-hidden">Excel</label>
                              <input type="file" readonly class="form-control" name="users.xlsx">
                          </div>
                          @error('excel_file')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                          <div class="col-auto">
                              <button type="submit" class="btn btn-primary mb-3">Upload excel file</button>
                          </div>
                        </form>
                </div>
            <div class="col-md-12">
            <table class="table">
  <thead>
    <tr>
      <th scope="col">ID_subject</th>
      <th scope="col">name</th>
      <th scope="col">short_name</th>
      <th scope="col">region</th>
    </tr>
  </thead>
  <tbody>
    @if(count($users))
    @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->ID_subject}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->short_name}}</td>
      <td>{{$user->region}}</td>
    </tr>
    @endforeach
    @else
      <td>No data found</td>
    </tr>
    @endif
    
  </tbody>
</table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>