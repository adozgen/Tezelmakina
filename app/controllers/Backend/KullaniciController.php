<?php

class Backend_KullaniciController extends BackendController {
    /*
      |--------------------------------------------------------------------------
      | Default Home Controller
      |--------------------------------------------------------------------------
      |kullanıcı işlemlerinin gerçekleştirilmesi...
      |
     */

    public function getKullaniciekle() {
        return View::make('backend.kullanici.ekle');
    }

    public function postKullaniciekle() {
        $validate = Validator::make(Input::all(), User::$rules);//user modelinde tanımlanan kurallarla geçerlilik denetimi...
        $messages = $validate->messages();
        if ($validate->fails())
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Doğrulama Hatası', 'text' => '' . $messages->first() . '', 'type' => 'error'));

        $user = new User; // user modelinin çagrılması ve sütun değerlerine input atamalarının yapılması
        $email = Input::get('email');
        $namesurname = Input::get('adsoyad');
        $password = Hash::make(Input::get('password'));
    
        //Kullanıcının seçmiş oldugu profil resminin düzenlenmesi
        
        if (Input::hasFile('profil')) { 
            $profil = Input::file('profil');
            $dosyaadi = $profil->getClientOriginalName();
            $uzanti = $profil->getClientOriginalExtension();
            $isim = Str::slug($dosyaadi) . Str::slug(str_random(5)) . '.' . $uzanti;
            $dosya = $profil->move('Backend/avatar/', $isim);
            $image = Image::open('Backend/avatar/' . $isim)->resize(80, 80)->save();
            $user->profil = $isim;
            $user->save();
        }

        $user->email = $email;
        $user->namesurname = $namesurname;
        $user->password = $password;
        $user->save();

        if ($user->save()) {
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Kullanıcı Eklendi', 'text' => 'Kullanıcı Başarı İle Eklendi', 'type' => 'success'));
        } else {
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Kullanıcı Eklenemedi', 'text' => 'Kullanıcı Eklenirken Sorun İle Karşılaşıldı', 'type' => 'error'));
        }
    }

    public function getKullanicilistele() {
        $kullanicilar = User::all();
        return View::make('backend.kullanici.listele', array('users' => $kullanicilar));
    }

    public function getKullaniciaktif($id, $aktif) {
        $user = User::find($id);
        $user->is_active = $aktif;
        $user->save();
        if ($user->save()) {
            return Response::json(array('mesaj' => 'true', 'title' => 'Kullanıcı Güncellendi', 'text' => 'Kullanıcı Başarı İle Güncellendi', 'type' => 'success'));
        } else {
            return Response::json(array('mesaj' => 'true', 'title' => 'Kullanıcı Güncellenemedi', 'text' => 'Kullanıcı Güncellenirken Sorun Oluştu', 'type' => 'error'));
        }
    }

    public function getKullanicisil($id) {
        $user = User::find($id);
        if($user->profil!=''){
        File::delete('Backend/avatar/'.$user->profil.'');
        }
        $user->delete();
        if (!$user->delete()) {
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Kullanıcı Silindi', 'text' => 'Kullanıcı Başarı İle Silindi', 'type' => 'success'));
        } else {
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Kullanıcı Silinemedi', 'text' => 'Kullanıcı Silinirken Sorun İle Karşılaşıldı', 'type' => 'error'));
        }
    }
    
    public function getKullaniciduzenle($id){
        $user = User::find($id);
        return View::make('backend.kullanici.duzenle')->with('user',$user);
    }
    
    public function postKullaniciduzenle($id){
        $rules = ['adsoyad'=>'required','email'=>'required|email'];
        $validate = Validator::make(Input::all(), $rules);
        $messages = $validate->messages();
        if ($validate->fails())
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Doğrulama Hatası', 'text' => '' . $messages->first() . '', 'type' => 'error'));

        $user = User::find($id);
        $email = Input::get('email');
        $namesurname = Input::get('adsoyad'); 
        if(Input::has('password')){
        $password = Hash::make(Input::get('password'));
        $user->password = $password;
        $user->save();
        }
        if (Input::hasFile('profil')) {
            File::delete('Backend/avatar/'.$user->profil.'');
            $profil = Input::file('profil');
            $dosyaadi = $profil->getClientOriginalName();
            $uzanti = $profil->getClientOriginalExtension();
            $isim = Str::slug($dosyaadi) . Str::slug(str_random(5)) . '.' . $uzanti;
            $dosya = $profil->move('Backend/avatar/', $isim);
            $image = Image::open('Backend/avatar/' . $isim)->resize(80, 80)->save();
            $user->profil = $isim;
            $user->save();
        }

        $user->email = $email;
        $user->namesurname = $namesurname;
        $user->save();

        if ($user->save()) {
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Kullanıcı Güncellendi', 'text' => 'Kullanıcı Başarı İle Güncellendi', 'type' => 'success'));
        } else {
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Kullanıcı Güncellenemedi', 'text' => 'Kullanıcı Güncellenirken Sorun İle Karşılaşıldı', 'type' => 'error'));
        }
        
    }
    
    
    

}
