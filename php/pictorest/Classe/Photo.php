<?php
namespace pictorest\Classe;
class Photo extends \Illuminate\Database\Eloquent\Model {
    protected $table = 'Photos';
    protected $primaryKey = 'idPhoto';
    public $timestamps=false;
    
    public function album() {
        return $this->belongsTo( 'pictorest\Classe\Album', 'idAlbum' ) ;
    }  
}