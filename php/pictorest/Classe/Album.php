<?php
namespace pictorest\Classe;
class Album extends \Illuminate\Database\Eloquent\Model {
    protected $table = 'Albums';
    protected $primaryKey = 'idAlbum';
    public $timestamps=false;
    
    public function utilisateur() {
        return $this->belongsTo( 'pictorest\Classe\Utilisateur', 'idUtil' ) ;
    }  

    public function photo() {
        return $this->hasMany( 'pictorest\Classe\Photo', 'idPhoto' ) ;
    }   
}