<?php

class Kategori extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    //Makinadetay tablosuyla birden birçoga ilişki şeklini gösterme
        public function makinalar() {
            return $this->hasMany('Makinadetay');
            
        }
        public $timestamps = false;
	protected $table = 'kategoriler';
        public static $rules = ['kategoriadi'=>'required'];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
        
        

}
