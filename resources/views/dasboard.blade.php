<h1>Tableau de Bord</h1>

<h2>Liste des utilisateurs</h2>

 <a href="{{route('users.create')}}">creer un utilisateur</a>

 @foreach ($users as $user)
 <div style="width: 200px; border: 1px solid #ccc; height: 100px">
     <h2><a href="{{route('show',$user->id)}} ">{{$user->name}}</a> </h2>
     <p>{{$user->email}} </p>
 </div> 
@endforeach



<button><a href="{{route('user.logout')}}">Se deconnecter</a></button>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Confirm identity</button>
      </div>

</body>
</html>