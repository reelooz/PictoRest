<?php

namespace pictorest\Controleurs;

use \pictorest\Classe\Feed;
use \pictorest\Classe\Album;
use \pictorest\Classe\Photo;
use \pictorest\Classe\Utilisateur;
use \pictorest\Tools\tools;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControleurPicto
 *
 * @author Thomas
 */
class ControleurPicto {

    //put your code here
    public function displayAccueil($s, $app) {
        if (isset($_SESSION['idUtil'])) {
            /* //méthode affichage gallerie au hasard
              $s->display('tpl/header.tpl');
              $s->display('tpl/nav.tpl');
              $photos=Photo::All()->take(12)->toArray();
              $nbPhoto = Photo::all()->count();
              $s->assign('nbPhoto', $nbPhoto);
              $s->assign('photos', $photos);
              $s->display('tpl/affichePhoto.tpl'); */
            $s->display('tpl/header.tpl');
            $s->display('tpl/nav.tpl');
            $photoJson = $this->getPhotoScroll12($app);
            $photos = json_decode($photoJson);
            $photoRes = array();
            foreach ($photos as $key) {
                $tab = array();
                $tab['idPhoto'] = $key->idPhoto;
                $tab['titrePhoto'] = $key->titrePhoto;
                $tab['desc'] = $key->desc;
                $tab['cheminThumb'] = $key->cheminThumb;
                $tab['cheminFull'] = $key->cheminFull;
                $tab['datePhoto'] = $key->datePhoto;
                $album = json_decode($this->getNomAlbum($key->idAlbum));
                foreach ($album as $key) {
                    $tab['titreAlbum'] = $key->{'titreAlbum'};
                }
                $photoRes[] = $tab;
            }
            //var_dump($photoRes);
            $s->assign('photos', $photoRes);
            $nbPhoto = Photo::all()->count();
            $s->assign('nbPhoto', $nbPhoto);
            $s->display('tpl/affichePhoto.tpl');
        } else {
            $this->inscriptionForm($s, $app, null);
        }
    }

    public function inscriptionForm($s, $app, $e) {
        $s->display('tpl/header.tpl');
        $url = $app->UrlFor('connexion');
        $s->assign('url', $url);
        if ($e != null) {
            $s->assign('msgError', $e);
        } else {
            $s->assign('msgError', null);
        }
        $s->display('tpl/inscription.tpl');
        $s->display('tpl/footer.tpl');
    }

    public function inscriptionValid($s, $app) {
        $t = new tools();
        if ($_POST['choixAjout'] == "S'inscrire") {
            if ($t->getRequestField('logIns') != null && $t->getRequestField('passIns') != null) {
                $users = Utilisateur::where('identifiant', '=', $_POST['logIns'])->count();
                if ($users == 0) {
                    $user = new Utilisateur();
                    $user->identifiant = $_POST['logIns'];
                    $user->passwd = md5($_POST['passIns']);
                    $user->apiKey = md5($_POST['logIns']);
                    $user->save();
                    $_SESSION['idUtil'] = $user->idUtil;
                    $_SESSION['identifiant'] = $user->identifiant;
                    $_SESSION['passwd'] = $user->passwd;
                    $_SESSION['apiKey'] = $user->apiKey;
                    $this->displayAccueil($s, $app);
                } else {
                    $this->inscriptionForm($s, $app, "Le nom d'utilisateur est déjà pris !");
                }
            } else {
                $this->inscriptionForm($s, $app, "Veuillez remplir tous les champs");
            }
        } else {
            if ($t->getRequestField('logId') != null && $t->getRequestField('passId') != null) {
                $user = Utilisateur::where('identifiant', '=', $_POST['logId'])->get()->toArray();
                if (sizeof($user) != 0) {
                    foreach ($user as $key) {
                        if (md5($_POST['passId']) == $key['passwd']) {
                            $_SESSION['idUtil'] = $key['idUtil'];
                            $_SESSION['identifiant'] = $key['identifiant'];
                            $_SESSION['passwd'] = $key['passwd'];
                            $_SESSION['apiKey'] = $key['apiKey'];
                            $this->displayAccueil($s, $app);
                        } else {
                            $this->inscriptionForm($s, $app, "Identifiant ou mot de passe invalide");
                        }
                    }
                } else {
                    $this->inscriptionForm($s, $app, "Identifiant ou mot de passe invalide");
                }
            } else {
                $this->inscriptionForm($s, $app, "Veuillez remplir tous les champs");
            }
        }
    }

    public function ajouterAlbumForm($s, $app, $e) {
        $s->display('tpl/header.tpl');
        $url = $app->UrlFor('creerAlbum');
        $s->assign('url', $url);
        if ($e != null) {
            $s->assign('msgError', $e);
        } else {
            $s->assign('msgError', null);
        }
        $s->display('tpl/addAlbum.tpl');
        $s->display('tpl/footer.tpl');
    }

    public function ajouterAlbumValid($s, $app) {
        $t = new tools();
        $date = date('Y-m-d G:i:s');
        if ($t->getRequestField('titreAlbum') != null && $t->getRequestField('description') != null) {
            $album = new Album();
            $album->titreAlbum = $_POST['titreAlbum'];
            $album->desc = $_POST['description'];
            $album->dateAlbum = $date;
            $album->idUtil = $_SESSION['idUtil'];
            $album->photoCouv = -1;
            $res = $album->save();
            if ($res) {
                $this->afficherMonProfil($s, $app);
            } else {
                ajouterAlbumForm($s, $app, "Une erreur s'est produite lors de l'ajout");
            }
        } else {
            $this->ajouterAlbumForm($s, $app, "Veuillez remplir tous les champs");
        }
    }

    public function disconnect($s, $app) {
        $_SESSION = array();
        session_destroy();
        $this->displayAccueil($s, $app);
    }

    public function afficherMonProfil($s, $app) {
        $s->display('tpl/header.tpl');
        $s->display('tpl/nav.tpl');
        $jsonAlbum = json_decode($this->getAPIAlbumsUser($app, $_SESSION['idUtil']));
        //var_dump($resAlbum);
        $resAlbum = array();
        foreach ($jsonAlbum as $key) {
            $tab = array();
            $tab['idAlbum'] = $key->idAlbum;
            $tab['titreAlbum'] = $key->titreAlbum;
            $tab['desc'] = $key->desc;
            $tab['dateAlbum'] = $key->dateAlbum;
            $jsonPhotos = json_decode($this->getAPIAlbumPhoto($app, $key->idAlbum));
            if ($jsonPhotos != null) {
                foreach ($jsonPhotos as $row) {
                    $tab['photoCouv'] = $row->cheminThumb;
                    break;
                }
            } else {
                $tab['photoCouv'] = "/PictoRest/web/images/imageFail.png";
            }

            $tab['idUtil'] = $key->idUtil;
            $resAlbum[] = $tab;
        }
        //var_dump($photoRes);
        $s->assign('albums', $resAlbum);
        $s->display('tpl/profil.tpl');
        $s->display('tpl/footer.tpl');
    }

    public function afficherPhotosAlbum($s, $app, $idAlbum) {
        $s->display('tpl/header.tpl');
        $photoRes = array();
        $jsonPhotos = json_decode($this->getAPIAlbumPhoto($app, $idAlbum));
        if ($jsonPhotos != null) {
            $photoRes = array();
            foreach ($jsonPhotos as $key) {
                $tab = array();
                $tab['idPhoto'] = $key->idPhoto;
                $tab['titrePhoto'] = $key->titrePhoto;
                $tab['desc'] = $key->desc;
                $tab['cheminThumb'] = $key->cheminThumb;
                $tab['cheminFull'] = $key->cheminFull;
                $tab['datePhoto'] = $key->datePhoto;
                $album = json_decode($this->getNomAlbum($key->idAlbum));
                foreach ($album as $key) {
                    $tab['titreAlbum'] = $key->{'titreAlbum'};
                }
                $photoRes[] = $tab;
            }
            $s->assign('photos', $photoRes);
            $nbPhoto = Photo::all()->count();
            $s->assign('nbPhoto', $nbPhoto);
            $s->display('tpl/affichePhotoProfil.tpl');
        } else {
            $s->assign('idAlbum',$idAlbum);
            $s->assign('msgError', "Pas de photos ajoutées à cet album");
            $s->display('tpl/ajouterPhoto.tpl');
        }
    }
    
    public function ajouterPhotoAlbum($s, $app, $id){
        $s->display('tpl/header.tpl');
        $s->display('tpl/nav.tpl');
        $url = $app->UrlFor('creerAlbum');
        $s->assign('url', $url);
        $s->assign('idAlbum',$id);
        $s->display('tpl/uploadPhoto.tpl');
        $s->display('tpl/header.tpl');
    }

    /*     * *****************************REST********************************** */

    public function getAPIUser($app, $identifiant) {
        $user = Utilisateur::where('identifiant', '=', $identifiant)->get()->toJson();
        if (strlen($user) != 2) {
            return ($user);
        } else {
            $app->response->setStatus(404);
        }
    }

    public function userAPIkey($token) {
        if (isset($token)) {
            $utilisateur = Utilisateur::where('apiKey', '=', $token)->get()->toJson();
            if (strlen($utilisateur) != 2) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getAPIFeeds($app, $identifiant) {
        $feeds = Feed::where('idUtil', '=', $identifiant)->get()->toJson();
        if (strlen($feeds) != 2) {
            return ($feeds);
        } else {
            $app->response->setStatus(404);
        }
    }

    public function getAPIAlbumsUser($app, $identifiant) {
        $albums = Album::where('idUtil', '=', $identifiant)->get()->toJson();
        if (strlen($albums) != 2) {
            return ($albums);
        } else {
            $app->response->setStatus(404);
        }
    }

    /* MOD */

    public function getAPIAlbums($app, $query) {
        $album = null;
        if (isset($query)) {
            $albums = Album::where('titreAlbum', 'LIKE', '%' . $query . '%')->get()->toJson();
        } else {
            $albums = Album::all()->toJson();
        }
        if (strlen($albums) != 2) {
            return ($albums);
        } else {
            $app->response->setStatus(404);
        }
    }

    public function getAPIAlbum($app, $idAlbum) {
        $albums = Album::find($idAlbum);
        if ($albums != null) {
            $albums = $albums->toJson();
            if (strlen($albums) != 2) {
                return ($albums);
            }
        } else {
            $app->response->setStatus(404);
        }
    }

    public function getAPIAlbumPhoto($app, $idAlbum) {
        $photos = Photo::where('idAlbum', '=', $idAlbum)->get()->toJson();
        if (strlen($photos) != 2) {
            return ($photos);
        } else {
            $app->response->setStatus(404);
        }
    }

    public function addAPIPhoto($app, $idUtil) {
        $feed = new Feed();
        $feed->idUtil = $idUtil;
        $feed->idAlbum = (int) ($_POST['idAlbum']);
        $feed->dateFeed = date('Y-m-d G:i:s');
        $feed->save();
    }

    public function getPhotoScroll12($app) {
        $photos = Photo::All()->take(12)->toJson();
        if (strlen($photos) != 2) {
            return ($photos);
        } else {
            $app->response->setStatus(404);
        }
    }

    public function getPhotoScrollLoadMore($id) {
        $photos = Photo::where('idPhoto', '>', $id)->take(12)->get()->toJson();
        if (strlen($photos) != 2) {
            return ($photos);
        } else {
            $app->response->setStatus(404);
        }
    }

    public function getNomAlbum($id) {
        $album = Album::where('idAlbum', '=', $id)->get(array('titreAlbum'))->toJson();
        if (strlen($album) != 2) {
            return ($album);
        } else {
            $app->response->setStatus(404);
        }
    }

}
