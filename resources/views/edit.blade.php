<h1>Editer un utilisateur</h1>
<br/>


@if($errors->any())
<div class="alert alert-danger">
<ul>
    @foreach($errors->all() as $error) 
    <li>{{ $error}} </li>

    @endforeach
</ul>
</div>


@endif


<form action="{{route('users.update', $user->id)}}" method="POST">
    @csrf
    @method('PUT')
<label for="name">Entrer le nom de l'utilisateur</label>

<input type="text" name="name" id="name" >
<label for="email">E-mail</label>
<input type="email" name="email" id="email">
<br/>

<input type="submit" value="modifier un utilisateur">

</form>