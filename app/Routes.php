<?php
/**
 * Routes - all Module's specific Routes are defined here.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */


/** Define static routes. */




//Route::get( '/', (! Auth::check()) ? 'App\Controllers\DefaultCtrl@index : 'App\Controllers\');
Route::get('/', (! Auth::check()) ? 'App\Controllers\DefaultCtrl@index' : 'App\Controllers\Logged@index');
Route::get('users', (! Auth::check()) ? 'App\Controllers\DefaultCtrl@users' : 'App\Controllers\Logged@users');
Route::get('user/{id}', (! Auth::check()) ? 'App\Controllers\DefaultCtrl@user' : 'App\Controllers\Logged@user') ->where('id','[0-9]+');


Route::get('strs', (! Auth::check()) ? 'App\Controllers\DefaultCtrl@strs' : 'App\Controllers\Logged@strs');
Route::get('str/{id}', (! Auth::check()) ? 'App\Controllers\DefaultCtrl@str' : 'App\Controllers\Logged@str') ->where('id','[0-9]+');
Route::get('moi', (! Auth::check()) ? 'App\Controllers\DefaultCtrl@index' : 'App\Controllers\Logged@moi');





Route::get('addStr', array('before' => 'auth', 'uses' => 'App\Controllers\Logged@addStr'));
Route::get('modStr', array('before' => 'auth', 'uses' => 'App\Controllers\Logged@modStr'));


Route::filter('auth', function($route, $request) {
    if (! Auth::check()) {
        // User is not logged in, redirect him to Login Page.
        return Redirect::to('login');
    }
});





Route::get('/~groupe2_2016/marathon2016/com', 'App\Controllers\Logged@Commentaire');
Route::get('/~groupe2_2016/marathon2016/com/AjoutCommentaire', 'App\Controllers\Logged@AjoutCommentaire');

Route::get('/~groupe2_2016/marathon2016/com/SuppressionCommentaire/{id}', 'App\Controllers\Logged@SuppressionCommentaire');
Route::post('/~groupe2_2016/marathon2016/com/CommentaireSupprime/{id}', 'App\Controllers\Logged@CommentaireSupprime');
Route::post('/ajouterHistoire','\App\Controllers\Logged@ajoutHistoire');
Route::post('/histoireRegister','\App\Controllers\Logged@histoireRegister');

//Route::get('/pageAjout','\App\Controllers\Logged@pageAjout');
//<<<<<<< HEAD
//
//=======
Route::get('/ajouterHistoire','\App\Controllers\Logged@ajoutHistoire');
//
Route::get('/pageAjout','\App\Controllers\Logged@pageAjout');
Route::get('afficheStory/{id}','\App\Controllers\Logged@affichageHistoireById')->where('id','[0-9]+');
//Route::post('afficheStory/{id}','\App\Controllers\Logged@affichageHistoireById')->where('id','[0-9]+');

Route::get('allStory','\App\Controllers\Logged@allStory');
Route::get('/~groupe2_2016/marathon2016/public/allStory','\App\Controllers\Logged@allStory');



//>>>>>>> bae74c3ea11c67c70f40c791e4acbd6ad8b16e75

Route::get('/com', 'App\Controllers\Logged@Commentaire');
Route::post('/com/AjoutCommentaire/{id}', 'App\Controllers\Logged@AjoutCommentaire');
Route::post('/com/CommentaireAjoute/{id}', 'App\Controllers\Logged@CommentaireAjoute');

Route::get('/com/SuppressionCommentaire/{id}', 'App\Controllers\Logged@SuppressionCommentaire');
Route::get('/com/CommentaireSupprime/{id}', 'App\Controllers\Logged@CommentaireSupprime');
Route::post('/com/CommentaireEdite/{id}', 'App\Controllers\Logged@CommentaireEdite');
Route::get('/com/EditionCommentaire/{id}', 'App\Controllers\Logged@EditionCommentaire');

Route::get('/supprimerHistoire/{id}','App\Controllers\Logged@supprimerHistoire');

Route::get('/com/ajouterLike/{idHist}', 'App\Controllers\Logged@ajouterLike');


Route::post('/CommentaireEdite/{id}', 'App\Controllers\Logged@CommentaireEdite');

Route::post('verifCompte', 'App\Controllers\Logged@verifCompte');
Route::post('inscription', 'App\Controllers\Logged@inscription');

