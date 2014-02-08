<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

require_once 'vendor/autoload.php';

use pictorest\Base\App;
use pictorest\Classe\Utilisateur;
use pictorest\Classe\Album;
use pictorest\Classe\Photo;
use pictorest\Classe\Feed;
use pictorest\Controleurs\Controler;
use pictorest\Controleurs\ControleurPicto as ControleurPicto;

App::EloConfig();
$app = new Slim\Slim;

$app->get('/', function() use ($app) {
    $Smarty = new Smarty();
    $c = new ControleurPicto();
    $c->displayAccueil($Smarty, $app);
}
);

$app->get('/connexion', function() use ($app) {
    $Smarty = new Smarty();
    $c = new ControleurPicto();
    $c->inscriptionForm($Smarty, $app, null);
}
)->name('connexion');

$app->post('/connexion', function() use ($app) {
    $Smarty = new Smarty();
    $c = new ControleurPicto();
    $c->inscriptionValid($Smarty, $app);
}
);

$app->get('/deconnexion', function() use ($app) {
    $Smarty = new Smarty();
    $c = new ControleurPicto();
    $c->disconnect($Smarty, $app);
}
);

$app->get('/profil', function() use ($app) {
    $Smarty = new Smarty();
    $c = new ControleurPicto();
    $c->afficherMonProfil($Smarty, $app);
}
);

$app->get('/profil/creerAlbum', function() use ($app) {
    $Smarty = new Smarty();
    $c = new ControleurPicto();
    $c->ajouterAlbumForm($Smarty, $app, null);
}
) -> name("creerAlbum");

$app->post('/profil/creerAlbum', function() use ($app) {
    $Smarty = new Smarty();
    $c = new ControleurPicto();
    $c->ajouterAlbumValid($Smarty, $app);
}
);

$app->get('/profil/:id', function($id) use ($app) {
    $Smarty = new Smarty();
    $c = new ControleurPicto();
    $c->afficherPhotosAlbum($Smarty, $app, $id,null);
}
);

$app->get('/profil/ajouterPhotoAlbum/:id', function($id) use ($app) {
    $Smarty = new Smarty();
    $c = new ControleurPicto();
    $c->ajouterPhotoAlbum($Smarty, $app, $id, null);
}
);


$app->post('/profil/ajouterPhotoAlbum/:id', function($id) use ($app) {
    $Smarty = new Smarty();
    $c = new ControleurPicto();
    $c->ajouterPhotoValidAlbum($Smarty, $app, $id, null);
}
);

$app->get('/photo/:id', function($id) use ($app) {
    $Smarty = new Smarty();
    $c = new ControleurPicto();
    $c->afficherPhotoProfil($Smarty, $app, $id);
}
);

$app->get('/aPropos', function() use ($app) {
    $Smarty = new Smarty();
    $c = new ControleurPicto();
    $c->aPropos($Smarty, $app);
}
);



/* * ********************************REST************************************** */

$app->get('/rest/users/auth', function() use ($app) {
    $c = new ControleurPicto();
    echo $c->getAPIUser($app, $app->request()->params('userid'));
});

$app->get('/rest/users/:identifiant/feeds', function($identifiant) use ($app) {
    $c = new ControleurPicto();
    echo $c->getAPIFeeds($app, $identifiant);
});

$app->get('/rest/users/:identifiant/albums', function($identifiant) use ($app) {
    $c = new ControleurPicto();
    echo $c->getAPIAlbumsUserRest($app, $identifiant);
});

$app->get('/rest/albums', function() use($app) {
    $c = new ControleurPicto();
    if ($app->request()->params('filter')) {
        echo $c->getAPIAlbums($app, $app->request()->params('filter'));
    } else {
        echo $c->getAPIAlbums($app, null);
    }
});

$app->get('/rest/albums/:idAlbum', function($idAlbum) use ($app) {
    $c = new ControleurPicto();
    echo $c->getAPIAlbum($app, $idAlbum);
});

$app->get('/rest/albums/:id/photos', function($idAlbum) use ($app) {
    $c = new ControleurPicto();
    echo $c->getAPIAlbumPhoto($app, $idAlbum);
});

$app->post('/rest/users/:id/feeds', function($idUtil) use ($app) {
    $c = new ControleurPicto();
    echo $c->addAPIPhoto($app, $idUtil);
});

$app->get('/rest/photos/:idPhoto', function($idPhoto) use ($app){
    $c = new ControleurPicto();
    echo $c->getPhotosScroll($app, $idPhoto);
});

$app->get('/rest/photoRecherche/:idPhoto', function($idPhoto) use ($app){
    $c = new ControleurPicto();
    echo $c->getPhotoRecherche($app, $idPhoto);
});
$app->run();
