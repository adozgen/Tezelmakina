<?php

class Backend_IletisimController extends BackendController {
    /*
      |--------------------------------------------------------------------------
      | Default Home Controller
      |--------------------------------------------------------------------------
      |
      | Frontend İletişim sayfası için gerekli verileri düzenleme işlemleri yapılır.
      |
     */


    
    public function getIletisim(){
        $iletisim = Iletisim::all();
        return View::make('backend.iletisim.listele',array('iletisim'=>$iletisim));
    }
    
    public function getIletisimduzenle($id){
       $iletisim = Iletisim::findOrFail($id);
       return View::make('backend.iletisim.duzenle',array('iletisim'=>$iletisim));
    }
    
    
    public function postIletisimduzenle($id) {
        $validate = Validator::make(Input::all(), Iletisim::$rules);
        $messages = $validate->messages();
        if ($validate->fails())
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Doğrulama Hatası', 'text' => '' . $messages->first() . '', 'type' => 'error'));
        
        $iletisim = Iletisim::findOrFail($id);
        $iletisim->tel = Input::get('tel');
        $iletisim->email = Input::get('email');
        $iletisim->adres = Input::get('adres');
        $iletisim->save();
        if ($iletisim->save()) {
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Iletisim Güncellendi', 'text' => 'Iletisim Başarı İle Güncellendi', 'type' => 'success'));
        } else {
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Iletisim Güncellenemedi', 'text' => 'Iletisim Güncellenirken Sorun İle Karşılaşıldı', 'type' => 'error'));
        }

    }
    
    
    
    
    
    
    

}
