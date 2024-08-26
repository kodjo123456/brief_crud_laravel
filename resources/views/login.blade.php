<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
</head>
<body>

    @if($errors->any())
    <div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error) 
        <li>{{ $error}} </li>
    
        @endforeach
    </ul>
    </div>
    
    
    @endif

    <form action="{{route('login.process')}}" method="POST">
        @csrf
        <h1>Admin</h1>
        <label for="name">Nom</label>

        <br/>
        <input type="text" name="name" id="name">
        <br/>

        <label for="email">Saisir email</label>
        <br/>
        <input type="text" name="email" id="email">
        <br/>
        <label for="password" >Mot de Passe</label>
        <br/>
        <input type="password" name="password" id="password">
        <input type="submit" value="soumettre">
    </form>
    
</body>
</html>