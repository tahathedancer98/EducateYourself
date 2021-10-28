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

        if($params['email'] === 'admin@admin.com' && $params['password'] === 'password'){
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
