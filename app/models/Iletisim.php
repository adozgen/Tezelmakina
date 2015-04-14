<?php

class Iletisim extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
        public $timestamps = false;
	protected $table = 'iletisim';
        public static $rules = ['email'=>'required|email','tel'=>'required|min:11','adres'=>'required'];
        
      
        
        
        
        
        

}
