<?php

class Backend_PanelController extends BackendController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| kullanıcın profil ayarlarının yapılması
	|
	*/
    
        public function getIndex(){
            
            return View::make('backend.admin.index')->with('title','Giriş');
        }
        public function getHakkimizdaduzenle($id) {
            $hakkimizda=  Hakkimizda::findOrFail($id);
            return View::make('backend.admin.hakkimizda.listele',array('hakkimizda'=>$hakkimizda));
            
        }
        public function getProfil() {
            return View::make('backend.admin.profil',array('title'=>'Profil Güncelleme'));
            
        }
        public function postProfil() {
        $validate = Validator::make(Input::all(), ['adsoyad' => 'required', 'email' => 'required|email|unique:users,email,'.Auth::user()->id.'', 'profil' => 'mimes:jpg,png,gif,jpeg']);
        $messages = $validate->messages();
        if ($validate->fails())
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Doğrulama Hatası', 'text' => '' . $messages->first() . '', 'type' => 'error'));
        $user = User::findOrFail(Auth::user()->id);
        $user->namesurname = Input::get('adsoyad');
        if (Input::has('password')) {
            $user->password =Hash::make(Input::get('password')); 
            $user->save();
        }
        
        $user->email = Input::get('email');
        if (Input::hasFile('profil')) {
            if(Auth::user()->profil!=''){
                File::delete('Backend/avatar/'.Auth::user()->profil.'');
            }
            $profil = Input::file('profil');
            $dosyaadi = $profil->getClientOriginalName();
            $uzanti = $profil->getClientOriginalExtension();
            $isim = Str::slug($dosyaadi) . Str::slug(str_random(5)) . '.' . $uzanti;
            $dosya = $profil->move('Backend/avatar/', $isim);
            $image = Image::open('Backend/avatar/' . $isim)->resize(80, 80)->save();
            $user->profil = $isim;
            $user->save();
        }
        $user->save();
        if ($user->save()) {
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Kullanıcı Güncellendi', 'text' => 'Kullanıcı Başarı İle Güncellendi', 'type' => 'success'));
        } else {
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Kullanıcı Güncellenemedi', 'text' => 'Kullanıcı Güncellenirken Sorun İle Karşılaşıldı', 'type' => 'error'));
        }
        
        
        
    }
    
    


}
