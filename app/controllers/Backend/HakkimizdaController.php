<?php

class Backend_HakkimizdaController extends BackendController {
    /*
      |--------------------------------------------------------------------------
      | Default Home Controller
      |--------------------------------------------------------------------------
      |
      | Frontend Hakkımızda sayfası için gerekli verileri düzenleme işlemleri yapılır.
      | 
      |
      |	
      |
     */


    
    public function getHakkimizdalistele(){
        $hakkimizda = Hakkimizda::all();
        return View::make('backend.hakkimizda.listele',array('hakkimizda'=>$hakkimizda));
    }
    
    public function getHakkimizdaduzenle($id){
       $hakkimizda = Hakkimizda::findOrFail($id);
       return View::make('backend.hakkimizda.duzenle',array('hakkimizda'=>$hakkimizda));
    }
    
    
    public function postHakkimizdaduzenle($id) {
        $validate = Validator::make(Input::all(), Hakkimizda::$rules);
        $messages = $validate->messages();
        if ($validate->fails())
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Doğrulama Hatası', 'text' => '' . $messages->first() . '', 'type' => 'error'));
        
        $hakkimizda = Hakkimizda::findOrFail($id);
        $hakkimizda->hakkimizda = Input::get('hakkimizda');
        $hakkimizda->save();
        if ($hakkimizda->save()) {
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Hakkimizda Güncellendi', 'text' => 'Hakkimizda Başarı İle Güncellendi', 'type' => 'success'));
        } else {
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Hakkimizda Güncellenemedi', 'text' => 'Hakkimizda Güncellenirken Sorun İle Karşılaşıldı', 'type' => 'error'));
        }

    }
    
    
    
    
    
    
    

}
