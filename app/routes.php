<?php

//Route::post('password/remind', function()
// {
// $kimlikbilgileri = array('email' => Input::get('email'));
//
//return Password::remind($kimlikbilgileri);
// });
// Route::get('password/reset/{token}', function($token)
// {
// return View::make('auth.reset')->with('token', $token);
// });
// Route::post('password/reset/{token}', function()
// {
// $kimlikbilgileri = array('email' => Input::get('email'));
//
// return Password::reset($kimlikbilgileri, function($uye, $password)
// {
// $uye->password = Hash::make($password);
//
// $uye->save();
//
// return Redirect::to('home');
// });
// });
/* Ön kısım rotasyonları */
Route::get('/',array('as'=>'anasayfa', 'uses'=>'Frontend_HomeController@home')) ;
Route::get('/giris', 'HomeController@showWelcome');
Route::get('kategoriler/{name}', array('as'=>'makinalar','uses'=>'Frontend_HomeController@kategoriler'));
Route::get('hakkimizda', array('as'=>'hakkimizda','uses'=>'Frontend_HomeController@hakkimizda'));
Route::get('iletisim', array('as'=>'iletisim','uses'=>'Frontend_HomeController@iletisim'));
Route::get('kategoriler/{name}/{id}', 'Frontend_HomeController@makinabilgileri');
Route::get('makinalar/{name}', 'Frontend_HomeController@makinabilgileri');
Route::get('login','Backend_LoginController@login');
Route::post('user/request','Backend_LoginController@sifreYenile');
//Route::controller('kullanici','Backend_KullaniciController');
////Route::controller('kullanici','Backend_KullaniciController@kekle');
Route::post('adminpost','Backend_LoginController@loginpost');
Route::get('logout','Backend_LoginController@logout');
Route::controller('reminders','RemindersController');

/* Admin kısmı rotasyonları */
Route::group(array('before' => 'auth'), function()
{
Route::controller('panel','Backend_PanelController');
Route::controller('kullanici','Backend_KullaniciController');
Route::controller('iletisim','Backend_IletisimController');
Route::controller('hakkimizda','Backend_HakkimizdaController');
Route::controller('kategori','Backend_KategoriController');
Route::controller('makinadetay','Backend_MakinadetayController');
Route::controller('makale','Backend_MakaleController');
Route::controller('resim','Backend_ResimController');
});



