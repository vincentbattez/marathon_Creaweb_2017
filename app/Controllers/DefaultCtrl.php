<?php

namespace App\Controllers;

use App\Core\Controller;

use App\Models\Commentaire;
use App\Models\Histoire;
use App\Models\User;
use View;

/**
 * Sample controller showing 2 methods and their typical usage.
 */
class DefaultCtrl extends Controller
{

    /**
     * Create and return a View instance.
     */
    public function index()
    {
        $hist = Histoire::all();

        return View::make('Default/Home')
            ->shares('title', __('Welcome'))
            ->with('histoires', $hist);
    }


    public function str()
    {
        $message = "str not auth";
        $hist = Histoire::all();
        echo $hist;

        return View::make('Default/Story')
            ->shares('title', __('Welcome'))
            ->with('histoires', $hist);
    }

    public function strs()
    {
        $hist = Histoire::all();

        return View::make('Default/Stories')
            ->shares('title', __('Welcome'))
            ->with('histoires', $hist);
    }

    public function users()
    {
        $users = User::all();

        return View::make('Default/Users')
            ->shares('title', __('Welcome'))
            ->with('usr', $users);
    }

    public function CreerStory()
    {
        $users = User::all();

        return View::make('AddStory/creerStory')
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

        return View::make('Default/User')
            ->shares('title', __('Welcome'))
            ->with('user', $usr)
            ->with('stories', $stories)
            ->with('nbCom', $nbCom)
            ->with('likes', $likes);
    }









}
