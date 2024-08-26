<?php

namespace App\Http\Controllers;

// use AccountMail;
use App\Interface\CodeInterface;
use App\Models\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountEmail;
use App\Mail\SendPasswordEmail;
use Illuminate\Support\Str;



use Illuminate\Http\Request;

class AdminController extends Controller
{


    public function index(){

       $users =  User::all();
        return view('login', compact('users'));
    }

    public function store(Request $request)
{
    // ici je cree l'admin
     $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|max:255',
        'password'=>'required|max:255',
    ]);
 
      $admin = new Admin;
    $admin->name= $request->name;
    $admin->email = $request->email;
    $admin->password = $request->password;
    $admin->save();
 
    return redirect()->route('dasboard');
}

public function link(){

    return view('create');
 }

 public function show($id)
 {
     $user = User::findOrFail($id);
     return view('show', compact('user'));
 }

 public function edit( $id)
 {
   
     $user = User::findOrFail($id);
     return view('edit', compact('user'));   
 }

 

public function update(Request $request, string $id)
{
        $request->validate([
        'name' => 'required',
        
       
    ]);

    $user= User::find($id);
    $user->name = $request->name;
    
    $user->save();

    return redirect()->route('dasboard');
}

public function destroy(string $id)
{
    User::find($id)->delete();
    return redirect()->route('dasboard')->with('success', 'utilisateur supprime');
}

public function MakeUp(Request $request)
{
    // Validation des données de la requête
    $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users,email',
    ]);

   
    $password = str::random(8);

    // Création de l'utilisateur
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($password); 

    $user->save();

    // Envoi de l'email avec le mot de passe généré
    // Mail::to($user->email)->send(new AccountMail($password));
    Mail::to($user->email)->send(new SendPasswordEmail($password));

    // Redirection vers le tableau de bord après la création de l'utilisateur
    return redirect()->route('dasboard')->with('success', 'Utilisateur créé avec succès et email envoyé.');
}

public function logout(){
    return view('logout');
}






   

}
