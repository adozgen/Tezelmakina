<?php

class Resim extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
        public $timestamps = false;
	protected $table = 'makresim';
        public static $rules = ['resimisim'=>'required','resim'=>'mimes:jpg,png,gif,jpeg'];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
        //makinadetay tablosuyla birden birçoga ilişki şeklini gösterme
        public function resimler(){
            return $this->belongsTo('Makinadetay','makina','id');
        }
      
        
        
        
        
        

}
