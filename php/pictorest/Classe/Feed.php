<?php
namespace pictorest\Classe;
class Feed extends \Illuminate\Database\Eloquent\Model {
    protected $table = 'Feeds';
    protected $primaryKey = 'idFeed';
    public $timestamps=false;
    
    public function utilisateur() {
        return $this->belongsTo( 'pictorest\Classe\Utilisateur', 'idUtil' ) ;
    }
    
    public function album() {
        return $this->belongsTo( 'pictorest\Classe\Album', 'idAlbum' ) ;
    }
}