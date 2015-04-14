<?php

class Makinadetay extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
        public $timestamps = false;
	protected $table = 'makinadetay';
        public static $rules = ['makinaisim'=>'required','makinakategori'=>'required|numeric'];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
        //katagori tablosuyla birden birçoga ilişki şeklini gösterme
        public function kategoriler(){
            return $this->belongsTo('Kategori','kategori','id');
        }
      
        
        
        
        
        

}
