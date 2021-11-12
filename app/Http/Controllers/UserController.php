<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\User;
use App\Notifications\RegisteredUser;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->all();
        $params['password'] = bcrypt('password');
        $params['confirmation_token'] = Str::replace('/','AA',bcrypt(Str::random(22)));
        $params['validated'] = 0;
        $user = User::create($params);
        $params['lien'] = url("/user/confirm/{$user['id']}/{$params['confirmation_token']}");
        $num = 1;
        Mail::to('admin@admin.com')
            ->send(new ContactMail($num,$params));
        return back()
            ->with('success','Votre demande a bien été envoyé');
    }

    public function confirmView(Request $request){
        $lien = url()->current();
        $lien = substr($lien,35);
        $id = substr($lien, 0, 2);
        $id = str_replace('/','',$id);
        $confirmation_token = str_replace($id,'',$lien);
        $confirmation_token = str_replace('/','',$lien);


        return view('emails.confirmation', compact(['id','confirmation_token']));
    }
    public function confirmAction(Request $request, $id, $confirmation_token){
        $params = $request->all();
        $user = User::find($id);

        if($params['email'] === 'admin@admin.com' && $params['password'] === 'admin'){
            if($user['validated']!=1){
                $user['validated']=1;
                $user->save();
                $num = 2;
                Mail::to($user->email)
                    ->send(new ContactMail($num,$user));

                return view('emails.confirmation_valide');
            }else{
                return back()
                    ->with('error',"L'utilisateur a été déjà confirmé");
            }
        }
        return back()
            ->with('error',"Veuillez saisir les coordonnées de l'admin");
    }
    public function profil($id){
        $user = User::find($id);
        return view('user.details',compact('user'));
    }
    public function updatePassword(Request $request,$id){
        $request->validate([
            'old_password' => 'required|min:5|max:100',
            'new_password' => 'required|min:5|max:100',
            'confirm_password'=>'required|min:5|max:100'
        ]);
        $current_user = auth()->user();
        if($request->new_password != $request->confirm_password){
            return redirect()->back()->with('mdp',"Le nouveau mot de passe est différent de la confirmation");
        }else if(Hash::check($request->old_password,$current_user->password)){
            $current_user->update([
                'password' => bcrypt($request->new_password)
            ]);
            return back()
                ->with('ok', "Mot de passe a été bien modifié !");
        }else{
            return redirect()->back()->with('mdp',"L'ancien mot de passe n'est pas correct");
        }

    }
    public function updateProfil(Request $request, $id){
        $request->validate([
            'nom' => 'required|string|min:2|max:100',
            'prenom' => 'required|string|min:2|max:100',
            'email'=>'required|email|min:5|max:100'
        ]);
        $current_user = auth()->user();
        $current_user->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email
        ]);
        return back()
            ->with('ok', "Le profil a été bien modifié !");
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(users $users)
    {
        //
    }
}
