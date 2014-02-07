<?php

namespace pictorest\Ajax;

require_once '../../../vendor/autoload.php';

use \pictorest\Base\App;
use \pictorest\Classe\Photo;
use \pictorest\Classe\Album;
use pictorest\Controleurs\Controler;
use pictorest\Controleurs\ControleurPicto as ControleurPicto;

App::EloConfig();
//var_dump($_GET['last']);
//$photos = Photo::where('idPhoto','>',$_GET['last'])->take(12)->get()->toArray();
//var_dump($photos);

$c = new ControleurPicto();
$json = json_decode($c->getPhotoScrollLoadMore($_GET['last']));

foreach ($json as $row) {
    ?>
    <a href=# class='aphoto'>
        <div class="photo" id="<?php echo $row->{'idPhoto'} ?>">
            <p class="titrePhoto"> <?php echo $row->{'titrePhoto'} ?> </p>
            <img src="<?php echo $row->{'cheminThumb'} ?>"/>
            <p class="description"><?php echo $row->{'desc'} ?></p>
            <p class="from">
                <?php
                $album = json_decode($c->getNomAlbum($row->{'idAlbum'}));
                foreach ($album as $key) {
                    echo $key->{'titreAlbum'};
                }
                ?>
            </p>
        </div>
    </a>

    <?php
}


/*
  $tabInfo = parse_ini_file("Connexion.ini");
  $dsn = "mysql:host=" . $tabInfo["host"] . ";dbname=" . $tabInfo["base_de_donnee"];
  $db = new \PDO($dsn, $tabInfo["utilisateur"], $tabInfo["mdp"], array(\PDO::ERRMODE_EXCEPTION => true, \PDO::ATTR_PERSISTENT => true));
  $db->exec("SET CHARACTER SET utf8");

  $req = "SELECT * FROM commentaire WHERE idcom < " . $_GET['last'] . " ORDER BY idcom DESC LIMIT 5";

  $quer = $db->prepare($req);
  $quer->execute();
  $quer->setFetchMode(\PDO::FETCH_OBJ);


  while ($object = $quer->fetch()) {
  if ($object->idcom == 1) {
  $id = 18;
  } else {
  $id = $object->idcom;
  }
  ?>
  <div class="commentaire" id="<?php echo $id ?>">
  <?php //echo $object->idcom.' '.$object->descriptif;  ?>
  <img src="images/<?php echo $object->idcom ?>.jpg"/>
  </br>
  </br>
  </br>
  </div>
  <?php
  } */
?>