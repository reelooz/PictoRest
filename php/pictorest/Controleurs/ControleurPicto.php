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

            $s->display('tpl/header.tpl');
            $s->display('tpl/nav.tpl');
            /* $photoJson = $this->getPhotoScroll12($app);
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
              $s->assign('nbPhoto', $nbPhoto); */
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
        if ($jsonAlbum != null) {
            foreach ($jsonAlbum as $key) {
                $tab = array();
                $tab['idAlbum'] = $key->idAlbum;
                $tab['titreAlbum'] = $key->titreAlbum;
                $tab['desc'] = $key->desc;
                $tab['dateAlbum'] = $key->dateAlbum;
                $jsonPhotos = json_decode($this->getAPIAlbumPhotoClassique($app, $key->idAlbum));
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
        }
        //var_dump($photoRes);
        $s->assign('albums', $resAlbum);
        $s->display('tpl/profil.tpl');
        $s->display('tpl/footer.tpl');
    }

    public function afficherPhotosAlbum($s, $app, $idAlbum, $e) {
        $s->display('tpl/header.tpl');
        $photoRes = array();
        $jsonPhotos = json_decode($this->getAPIAlbumPhotoClassique($app, $idAlbum));
        //var_dump($jsonPhotos);
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
                //var_dump($key->idAlbum);
                $album = json_decode($this->getNomAlbumAppliClassique($key->idAlbum));
                //var_dump($album);
                foreach ($album as $albums) {
                    //var_dump($albums->titreAlbum);
                    $tab['titreAlbum'] = $albums->titreAlbum;
                }
                $photoRes[] = $tab;
            }
            //var_dump($photoRes);
            $s->assign('photos', $photoRes);
            $nbPhoto = Photo::all()->count();
            $s->assign('idAlbum', $idAlbum);
            $s->assign('msgError', $e);
            $s->display('tpl/nav.tpl');
            $s->display('tpl/affichePhotoProfil.tpl');
        } else {
            $s->assign('idAlbum', $idAlbum);
            $s->assign('msgError', "Pas de photos ajoutées à cet album.");
            $s->display('tpl/uploadPhoto.tpl');
        }
    }

    public function ajouterPhotoAlbum($s, $app, $id, $e) {
        $s->display('tpl/header.tpl');
        $s->display('tpl/nav.tpl');
        $s->assign('msgError', $e);
        $s->assign('idAlbum', $id);
        $s->display('tpl/uploadPhoto.tpl');
        $s->display('tpl/footer.tpl');
    }

    public function ajouterPhotoValidAlbum($s, $app, $id, $e) {
        $t = new tools();
        $path = "files/"; // Directory to upload files to.
        $paththumb = "files/thumb/";
        $valid_exts = array("jpg", "jpeg", "gif", "png"); // default image only extensions
        $rand = rand();

        //test de la source
        if ($_POST["source"] == "url") {
            if ($t->getRequestField('titrePhotoURL') != null && $t->getRequestField('descriptionPhotoURL') != null) {
                $url = trim($_POST["url"]);
                if ($url) {
                    $file = fopen($url, "rb");
                    if ($file) {
                        //type de fichier
                        $tmp = explode(".", strtolower(basename($url)));
                        $ext = end($tmp);
                        //validation de fichier
                        if (in_array($ext, $valid_exts)) {
                            //nom du fichier
                            $filename = md5(uniqid($rand, true)) . "." . $ext;                          //process upload


                            $newfile = fopen($path . $filename, "wb"); // creating new file on local server
                            if ($newfile) {
                                while (!feof($file)) {
                                    // Write the url file to the directory.
                                    fwrite($newfile, fread($file, 1024 * 8), 1024 * 8); // write the file to the new directory at a rate of 8kb/sec. until we reach the end.
                                }
                                $t->imagethumb($path . $filename, $paththumb . $filename, 150, FALSE, TRUE);
                                $photo = new Photo();
                                $photo->titrePhoto = $_POST['titrePhotoURL'];
                                $photo->desc = $_POST['descriptionPhotoURL'];
                                $photo->cheminThumb = "/PictoRest/" . $paththumb . $filename;
                                $photo->cheminFull = "/PictoRest/" . $path . $filename;
                                $photo->datePhoto = date('Y-m-d G:i:s');
                                $photo->idAlbum = $id;
                                $res = $photo->save();
                                $album = Album::find($id);
                                $album->photoCouv = $photo->idPhoto;
                                $album->save();
                                if ($res == true) {
                                    $this->afficherPhotosAlbum($s, $app, $id, "Votre photo a bien été ajoutée à votre album");
                                } else {
                                    $this->ajouterPhotoAlbum($s, $app, $id, "Problème lors du transfert de la photo, try again ! ");
                                }
                            } else {
                                $this->ajouterPhotoAlbum($s, $app, $id, "Problème de droit, contacter l'admin Doudou");
                            }
                        } else {
                            $this->ajouterPhotoAlbum($s, $app, $id, "L'extention n'est pas autorisée, merci de mettre une IMAGE");
                        }
                    } else {
                        $this->ajouterPhotoAlbum($s, $app, $id, "L'image de l'URL n'est pas accèssible");
                    }
                } else {
                    $this->ajouterPhotoAlbum($s, $app, $id, "L'URL n'est pas valide ou est indisponible");
                }
            } else {
                $this->ajouterPhotoAlbum($s, $app, $id, "Merci de remplir tous les champs correspondants à votre type d'upload. ");
            }
        } else {
            //test de la source
            if ($t->getRequestField('titrePhotoFILE') != null && $t->getRequestField('descriptionPhotoFILE') != null && $_FILES['file']['tmp_name'] != "") {
                //type de fichier
                $ext = strtolower(substr(strrchr($_FILES['file']['name'], '.'), 1));
                //validation de fichier
                if (in_array($ext, $valid_exts)) {
                    //nom du fichier
                    $filename = md5(uniqid($rand, true)) . "." . $ext;
                    //process upload
                    move_uploaded_file($_FILES['file']['tmp_name'], $path . $filename);
                    $t->imagethumb($path . $filename, $paththumb . $filename, 150, FALSE, TRUE);
                    $photo = new Photo();
                    $photo->titrePhoto = $_POST['titrePhotoFILE'];
                    $photo->desc = $_POST['descriptionPhotoFILE'];
                    $photo->cheminThumb = "/PictoRest/" . $paththumb . $filename;
                    $photo->cheminFull = "/PictoRest/" . $path . $filename;
                    $photo->datePhoto = date('Y-m-d G:i:s');
                    $photo->idAlbum = $id;
                    $res = $photo->save();
                    $album = Album::find($id);
                    $album->photoCouv = $photo->idPhoto;
                    $album->save();
                    if ($res == true) {
                        $this->afficherPhotosAlbum($s, $app, $id, "Votre photo a bien été ajoutée à votre album");
                    } else {
                        $this->ajouterPhotoAlbum($s, $app, $id, "Problème lors du transfert de la photo, try again ! ");
                    }
                    //success
                } else {
                    $this->ajouterPhotoAlbum($s, $app, $id, "L'extention n'est pas autorisée, merci de mettre une IMAGE");
                }
            } else {
                $this->ajouterPhotoAlbum($s, $app, $id, "Merci de remplir tous les champs correspondants à votre type d'upload. ");
            }
        }
    }

    public function afficherPhotoProfil($s, $app, $id) {
        $t = new tools();
        $s->display('tpl/header.tpl');
        $s->display('tpl/nav.tpl');
        $resPhoto = Photo::find($id)->toArray();
        $resAlbum = Album::find($resPhoto['idAlbum'])->toArray();
        $resUtil = Utilisateur::find($resAlbum['idUtil'])->toArray();
        $photo = array();
        $photo['idPhoto'] = $resPhoto['idPhoto'];
        $photo['titrePhoto'] = $resPhoto['titrePhoto'];
        $photo['descPhoto'] = $resPhoto['desc'];
        $photo['cheminFull'] = $resPhoto['cheminFull'];
        $dateFr = $t->dateEntoFr($resPhoto['datePhoto']);
        $photo['datePhoto'] = $dateFr;
        $photo['idAlbum'] = $resPhoto['idAlbum'];
        $photo['titreAlbum'] = $resAlbum['titreAlbum'];
        $photo['descAlbum'] = $resAlbum['desc'];
        $photo['identifiant'] = $resUtil['identifiant'];
        $s->assign('photo', $photo);
        $s->display('tpl/affichePhotoFull.tpl');
    }

    public function aPropos($s, $app) {
        $s->display('tpl/header.tpl');
        $s->display('tpl/aPropos.tpl');
        $s->display('tpl/footer.tpl');
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
            return $_GET['callback'] . '(' . $feeds . ')';
        } else {
            return $_GET['callback'] . '(' . $feeds . ')';
        }
    }

    public function getAPIAlbumsUser($app, $identifiant) {
        $albums = Album::where('idUtil', '=', $identifiant)->get()->toJson();
        if (strlen($albums) != 2) {
            return $albums;
            //return $_GET['callback'] . '(' . $albums.')';
        } else {
            $app->response->setStatus(404);
        }
    }
    
    public function getAPIAlbumsUserRest($app, $identifiant) {
        $albums = Album::where('idUtil', '=', $identifiant)->get()->toJson();
        if (strlen($albums) != 2) {
            return $_GET['callback'] . '(' . $albums.')';
        } else {
            $app->response->setStatus(404);
        }
    }

    /* MOD */

    public function getAPIAlbums($app, $query) {
        $albums = null;
        if (isset($query)) {
            $albums = Album::where('titreAlbum', 'LIKE', '%' . $query . '%')->get()->toJson();
        } else {
            $albums = Album::all()->toJson();
        }
        if (strlen($albums) != 2) {
            return $_GET['callback'] . '(' . $albums . ')';
        } else {
            return(false);
        }
    }

    public function getAPIAlbum($app, $idAlbum) {
        $albums = Album::find($idAlbum);
        if ($albums != null) {
            $albums = $albums->toJson();
            if (strlen($albums) != 2) {
                return $_GET['callback'] . '(' . $albums . ')';
            }
        } else {
            $app->response->setStatus(404);
        }
    }

    public function getAPIAlbumPhoto($app, $idAlbum) {
        $photos = Photo::where('idAlbum', '=', $idAlbum)->get()->toJson();
        if (strlen($photos) != 2) {
            return $_GET['callback'] . '(' . $photos . ')';
        } else {
            return $_GET['callback'] . '(' . $photos . ')';
        }
    }

    public function getAPIAlbumPhotoClassique($app, $idAlbum) {
        $photos = Photo::where('idAlbum', '=', $idAlbum)->get()->toJson();
        //var_dump($photos);
        if (strlen($photos) != 2) {
            return $photos;
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

    public function getPhotosScroll($app, $id) {
        $photos = Photo::where('idPhoto', '>', $id)->take(12)->get()->toJson();
        if (strlen($photos) != 2) {
            $app->response->headers->set('Content-type', 'application/json');
            return $_GET['callback'] . '(' . $photos . ')';
        } else {
            return false;
        }
    }

    public function getPhotoRecherche($app, $id) {
        $photos = Photo::find($id)->toJson();
        if (strlen($photos) != 2) {
            $app->response->headers->set('Content-type', 'application/json');
            return $_GET['callback'] . '(' . $photos . ')';
        } else {
            return false;
        }
    }

    public function getNomAlbum() {
        $album = Album::all()->toJson();
        if (strlen($album) != 2) {
            return $_GET['callback'] . '(' . $album . ')';
        } else {
            $app->response->setStatus(404);
        }
    }

    public function getNomAlbumAppliClassique($id) {
        $album = Album::where('idAlbum', '=', $id)->get()->toJson();
        var_dump($album);
        if (strlen($album) != 2) {
            return $album;
        } else {
            $app->response->setStatus(404);
        }
    }

}
