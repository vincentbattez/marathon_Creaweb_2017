<?php

namespace App\Controllers;

use App\Core\Controller;

use App\Models\Commentaire;
use App\Models\User;
use Nova\Redis\Database;
use Nova\Support\Facades\Redirect;
use View;
use App\Models\Aime;
use Session;
use Auth;
use App\Models\Histoire;
use Input;
use App\Models\Image;
use App\Modules\System;
use Nova\Support\Facades\DB;
use App\Controllers\Hash;
use Nova\Helpers;
use Nova\Support\Facades\File;


/**
 * Sample controller showing 2 methods and their typical usage.
 */
class Logged extends Controller
{


    public function users()
    {
        $users = User::all();

        return View::make('Default/Users')
            ->shares('title', __('Welcome'))
            ->with('usr', $users);
    }

    public function user($id)
    {
        $usr = User::find($id);
        $stories = $usr->histoires;
        $nbCom = count($usr->commentaires);
        $likes = count($usr->aime);

        $message = "single user not auth";

        return View::make('Logged/User')
            ->shares('title', __('Welcome'))
            ->with('user', $usr)
            ->with('histoires', $stories)
            ->with('stories', $stories)
            ->with('nbCom', $nbCom)
            ->with('likes', $likes);
    }


    public function index()
    {

      $histoire=Histoire::all();

        $message = "Bienvenue dans le projet marathon 2016 user connecté";

        return View::make('Logged/Home')
            ->shares('title', __('Welcome'))
            ->with('welcomeMessage', $message)
            ->with('histoires',$histoire);
    }

    public function str()
    {
        $message = "str auth";

        return View::make('Logged/Story')
            ->shares('title', __('Welcome'))
            ->with('welcomeMessage', $message);

    }

    public function verifCompte(){
        $users=array();
        $users=User::all();

        $tmp = array();
        $tmp = Input::all();



        foreach ($users as $user){
            if($user->username==$tmp['username'] and password_verify($tmp['password'],$user->getAuthPassword())){

                // Retrieve the Authentication credentials.
                $credentials = Input::only('username', 'password');

                // Prepare the 'remember' parameter.
                $remember = (Input::get('remember') == 'on');

                // Make an attempt to login the Guest with the given credentials.
                if(! Auth::attempt($credentials, $remember)) {
                    // An error has happened on authentication.
                    $status = __d('system', 'Wrong username or password.');

                    return Redirect::back()->withStatus($status, 'danger');
                }

                // The User is authenticated now; retrieve his Model instance.
                $user = Auth::user();



                if($user->active == 0) {
                    Auth::logout();

                    // User not activated; go logout and redirect him back.
                    $status = __d('system', 'There is a problem. Have you activated your Account?');

                    return Redirect::back()->withStatus($status, 'warning');
                }

                // Prepare the flash message.
                $status = __d('system', '<b>{0}</b>, you have successfully logged in.', $user->username);

                // Redirect to the User's Dashboard.
//        return Redirect::intended('admin/dashboard')->withStatus($status);
                return Redirect::intended('/')->withStatus($status);
            }

        }
        //return Redirect::to('/');

    }


    public function inscription(){
        $information=array();
        $information = Input::all();
        $user=new User();
        $user->username=$information['username'];
        $user->realname=$information['realname'];
        $user->email=$information['email'];
        //$user->password=password_hash($information['password']);
        $user->setCreatedAt(date('Y-m-d'));


        $user->save();

        return Redirect::to('/');
    }






    public function strs()
    {
        $message = "strs lol auth";

        return View::make('Logged/Stories')
            ->shares('title', __('Welcome'))
            ->with('welcomeMessage', $message);
    }

    public function addStr()
    {
        $histoire=array();
        $histoire=Input::all();



        $h = new Histoire();
        $h->titre=$histoire["titre"];
        echo $h->titre;

    }

    public function moi(){
        return Redirect::to('user/'.Auth::id());
    }


    public function modStr()
    {
        echo "modStr";
    }


    public function rmStr()
    {
        echo "rmStr";
    }




    public function AjoutCommentaire($id){
        $this->page="Ajout Commentaire";
        if(Auth::check()){
            $lecommentaire=new Commentaire();



            return View::make('AjoutCommentaire/index')
             ->shares('title','AjoutCommentaire')
             ->with('com', $lecommentaire)
             ->with('idHist', $id);
        }else{
            return View::make('Histoire/Erreur')
                ->with('idHist', $id());


        }

    }

    //fonction post ajout pour page confirmation

    public function CommentaireAjoute($id){
        if (Auth::check()) {
            $tmp = array();
            $tmp = Input::all();


            $com = new Commentaire();
            $com->texte = $tmp["commentaire"];
            $com->datePost = date('Y-m-d H:i:s');
            $com->idUtilisateur = Auth::id();
            $com->idHistoire = $id;


            $com->save();

            return View::make('AjoutCommentaire/done')
                ->shares('title', 'CommentaireAjoute')
                ->with('com', $com);

        } else {
            return View::make('Histoire/Erreur')
                ->with('idHist', $id());


        }



    }

    public function SuppressionCommentaire($id){
        $this->page="Suppression Commentaire";
        $lecommentaire=Commentaire::find($id);

        if(Auth::check()&& Auth::id()==$lecommentaire->idUtilisateur){
            return View::make('SuppressionCommentaire/index')
                ->shares('title','SuppressionCommentaire')
                ->with('com', $lecommentaire);
        }else{
            return View::make('Histoire/Erreur')
                ->with('idHist', $lecommentaire->histoire->id)
                ->shares('title','Erreur');
        }

    }

    //fonction post ajout pour page confirmation

    public function CommentaireSupprime($id){
        $com = Commentaire::find($id);
        $com->delete();

        return View::make('SuppressionCommentaire/done')
            ->shares('title','SuppressionCommentaire')
            ->with('com', $com);

    }

    public function EditionCommentaire($id){
        $this->page="Edition Commentaire";
        $lecommentaire=Commentaire::find($id);
        if(Auth::check()&& Auth::id()==$lecommentaire->idUtilisateur){


            return View::make('EditionCommentaire/index')
                ->shares('title','EditionCommentaire')
            ->with('com', $lecommentaire);
        }else{
            return View::make('Histoire/Erreur')
                ->with('idHist', $lecommentaire->histoire->id)
                ->shares('title','Erreur');
        }

    }



    public function CommentaireEdite($id){
        $this->page="Commentaire Edité";
        $com=Commentaire::find($id);
        $commentaire=Input::all();
        $com->texte=$commentaire["texte"];
        $com->datePost=date('Y-m-d H:i:s');
        $com->save();

        return View::make('EditionCommentaire/done')
            ->shares('title','CommentaireEdite')
            ->with('com', $com)
            ->with('id', $id);

    }

    public function pageAjout(){

        $donnees = array();
        $donnees = Input::all();

        $h->titre = $donnees["titrehistoire"];
        $h->texte = $donnees["description"];
        $h->idUtilisateur = Auth::id();
        $h->save();


        $i = new Image();
        $i->titre = $donnees["titrephoto"];
        $i->texte = $donnees["descriptionphoto"];
        $i->url = $donnees["image"];
        $i->idHistoire = $h->id;
        $i->url = uniqid() .
            "." .
            Input::file('image')->getClientOriginalExtension();


        Input::file('image')
            ->move("assets/images/uploads/", $i->url);

        $i->url = "assets/images/uploads/" . $i->url;

        $i->save();

    }


    public function histoireRegister(){

        $donnees = array();
        $donnees = Input::all();

//        return $donnees;

        $h=new Histoire();
        $h->titre = $donnees["titreHistoire"];
        $h->texte = $donnees["descriptionHistoire"];
        $h->idUtilisateur = Auth::id();

        $h->save();




        $cpt=1;
        foreach($donnees as $d) {

            if (Input::hasFile('imgHistoire'.$cpt.'')) {
                if (Input::file('imgHistoire'.$cpt.'')->isValid()) {
                    $filename = Input::file('imgHistoire'.$cpt.'')->getClientOriginalName(); // le nom du fichier téléchargé
                    $ext = Input::file('imgHistoire'.$cpt.'')->getClientOriginalExtension();  // son extension
                    $basename = explode('.', $filename);                        // le nom est sous la forme xxx.xxx.xxx
                    $basename = $basename[0];                                   // on ne veut que le premier terme
                    $filename = $basename . '_' . $h->id . '.' . $ext;           // on définit son nouveau nom sur le serveur
                    Input::file('imgHistoire'.$cpt.'')->move('/export/etu/florent.legru/Bureau/MARATHON_BRUTE/Marathon/' . 'assets/images/uploads/', $filename);
                    $i = new Image();
                    $i->titre = 'Reveil';
                    $i->texte = $donnees["descriptionIMGHistoire".$cpt];
                    $i->url = $donnees["imgHistoire".$cpt];
                    $i->idHistoire = $h->id;
                    $i->save();
                    // on déplace en renommant
                    $cpt++;
                    //return "Image Ajoutée";
                } //else return "Image invalide";
            } //else return $donnees;
        }
        return Redirect::to(PATH.'afficheStory/'.$h->id);
/*

        $cpt=1;

        foreach($donnees as $d){

            $i = new Image();
            $i->titre = 'Reveil';
            $i->texte = $donnees["descriptionIMGHistoire".$cpt];
            $i->url = $donnees["imgHistoire".$cpt];
            $i->idHistoire = $h->id;
            $i->url = uniqid() .
                "." .
                Input::file('imgHistoire1')->getClientOriginalExtension();


            Input::file('image')
                ->move("assets/images/uploads/", $i->url);

            $i->url = "assets/images/uploads/" . $i->url;

            $i->save();

            $cpt++;
        }






        return Input::all();*/
        //$h->save();


       /* $i = new Image();
        $i->titre = $donnees["titrephoto"];
        $i->texte = $donnees["descriptionphoto"];
        $i->url = $donnees["image"];
        $i->idHistoire = $h->id;
        $i->url = uniqid() .
            "." .
            Input::file('image')->getClientOriginalExtension();


        Input::file('image')
            ->move("assets/images/uploads/", $i->url);

        $i->url = "assets/images/uploads/" . $i->url;

        $i->save();*/


    }


    public function ajoutHistoire()
    {





        $donnees = array();
        $donnees = Input::all();

        print_r($donnees);


        return View::make('AddStory/creerStory')
            ->shares('title','Ajout');

        /*$h = new Histoire();
        $h->titre = $donnees["titreHistoire"];
        $h->texte = $donnees["descriptionHistoire"];
        $h->idUtilisateur = Auth::id();
        $h->save();*/







/*
        $i = new Image();
        $i->url = uniqid() .
            "." .
            Input::file('image')->getClientOriginalExtension();


        Input::file('image')
            ->move("assets/images/uploads/", $i->url);

        $i->url = "assets/images/uploads/" . $i->url;

        $i->save();



        $photos=array();
        foreach($donnees as $d){
            $photos=$d;
        }

        echo $h;*/



        //$title='Ajouter une Histoire';

        //return Input::all();

        //return View::make('AddStory/creerStory')
            //->shares('title','Ajout');

        /*$


        $i = new Image();
        $i->titre = $donnees["titrephoto"];
        $i->texte = $donnees["descriptionphoto"];
        $i->url = $donnees["image"];
        $i->idHistoire = $h->id;
        $i->url = uniqid() .
            "." .
            Input::file('image')->getClientOriginalExtension();


        Input::file('image')
            ->move("assets/images/uploads/", $i->url);

        $i->url = "assets/images/uploads/" . $i->url;

        $i->save();*/

        return Redirect::to('/afficheStory/' . $h->id);

    }

    public function supprimerHistoire($id)
    {
        $h = Histoire::find($id);
        if (Auth::check() && Auth::id()==$h->idUtilisateur) {

            $h->delete();

            $comments = Commentaire::all();
            foreach ($comments as $com) {
                if ($com->idHistoire == $id) {
                    $com->delete();
                }
            }

            $likes = Aime::all();
            foreach ($likes as $like) {
                if ($like->idHistoire == $id) {
                    $like->delete();
                }
            }

            return Redirect::to('/allStory/');
        } else {
            return View::make('Histoire/Erreur')
                ->with('idHist', $id)
                ->shares('title','Erreur');


        }
    }

    public function affichageHistoireById($id){




        $like=array();
        $like=Aime::all();


        $title='Histoire';

        $histoire=Histoire::find($id);

        $image=Array();

        $image=Image::all();
        $imageTab=array();

        foreach($image as $i){
            if($i->idHistoire==$id ){
                array_push($imageTab,$i);
            }

        }
        $coms=array();
        $coms=Commentaire::all();



        return View::make('Histoire/StoryDetail')
            ->shares('title', __('Welcome'))
            ->with('histoires', $imageTab)

            ->with('commentaires', $coms)
            ->with('likes', $like)
            ->with('histoire',$histoire);


    }

    public function allStory(){

        $histoire=Histoire::all();
        $photos=array();


        return View::make('Histoire/StoryDetail')
            ->shares('title', __('Welcome'))
            ->with('histoires', $histoire);

    }



    public function ajouterLike($idHist){

        if (Auth::check()) {
            $likes = array();
            $likes = Aime::all();
            $found = false;
            foreach ($likes as $like) {
                if ($like->idHistoire == $idHist and $like->idUtilisateur == Auth::id()) {
                    $dejalike = $like;
                    $found = true;
                }
            }
            if (!$found) {
                $like = new Aime();
                $like->idUtilisateur = Auth::id();
                $like->idHistoire = $idHist;

                $like->save();
            } else {
                $dejalike->delete();
            }


            $histoire = new Histoire();
            $histoire = Histoire::find($idHist);
            $user = new User();
            $user = User::find($histoire->idUtilisateur);

            echo Histoire::find(1) . '<br/><br/>';


            echo $histoire->titre . '<br/><br/>';
            echo $histoire->texte . '<br/><br/>';
            echo 'By : ' . $user->username . '<br/><br/>';

            $tmphistoire = Histoire::find($idHist);

            $lecommentaire = array();
            $lecommentaire = Commentaire::all();

            $likes = array();
            $likes = Aime::all();


            $title = 'Histoire';

            return Redirect::to('/afficheStory/' . $idHist);
        } else {
            return View::make('Histoire/Erreur')
                ->with('idHist', $idHist)
                ->shares('title','Erreur');


        }




    }






}
