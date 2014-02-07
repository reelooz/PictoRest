<?php
namespace pictorest\Classe;
class Utilisateur extends \Illuminate\Database\Eloquent\Model {
    protected $table = 'Utilisateurs';
    protected $primaryKey = 'idUtil';
    public $timestamps=false; 

    public function album(){
    	return $this->hasMany( 'pictorest\Classe\Album', 'idAlbum' );
    }

    public function photo(){
    	return $this->hasMany( 'pictorest\Classe\Photo', 'idPhoto' );
    }

    public function feed(){
    	return $this->hasMany( 'pictorest\Classe\Feed', array('idUtil', 'idAlbum'));
    }
}