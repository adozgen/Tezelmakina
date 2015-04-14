<?php

class Backend_ResimController extends BackendController {
    /*
      |--------------------------------------------------------------------------
      | Default Home Controller
      |--------------------------------------------------------------------------
      |
      |Makinaya ait resim verilerinin alınan input değerlerine göre girilmesi...
      |
     */
    
    public function getResimyukle() {
        $makinalar= Makinadetay::all();
        return View::make('backend.resim.ekle')->with('makinalar',$makinalar);
    }
    public function postResimyukle() {
        $validate = Validator::make(Input::all(), Resim::$rules);/* Resim modelinde tanımlanan kurallarla validation kontrolü..*/
        $messages = $validate->messages();
        if ($validate->fails())
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Doğrulama Hatası', 'text' => '' . $messages->first() . '', 'type' => 'error'));
        
        $risim = Input::get('resimisim');
//        $risim=$makina->resimisim;
        $rkat = Input::get('resimkategori');
        $rslug = Str::slug(Input::get('resimisim'));
            $resim1 = Input::file('resim1');
            $ricerik1=Input::get('icerik1');
//            $resim_sayisi   = count($resim);
            $dosyaadi = $resim1->getClientOriginalName();
            $uzanti = $resim1->getClientOriginalExtension();
            $isim1 = Str::slug($dosyaadi) . Str::slug(str_random(5)) . '.' . $uzanti;
            $dosya = $resim1->move('Backend/makinaresim/', $isim1);
            $image = Image::open('Backend/makinaresim/' . $isim1)->resize(900, 500)->save();
            $resim2 = Input::file('resim2');
            $ricerik2=Input::get('icerik2');
//            $resim_sayisi   = count($resim);
            $dosyaadi = $resim2->getClientOriginalName();
            $uzanti = $resim2->getClientOriginalExtension();
            $isim2 = Str::slug($dosyaadi) . Str::slug(str_random(5)) . '.' . $uzanti;
            $dosya = $resim2->move('Backend/makinaresim/', $isim2);
            $image = Image::open('Backend/makinaresim/' . $isim2)->resize(900, 500)->save();
            
            /*Makinaya ait resim verilerinin makina resimleri tablosuna kaydedilmesi..*/
            
            $ekle=DB::table('makresim')->insert(array(
            array(
                'resimisim'=>$risim,
                'resimbilgi'=>$ricerik1,
                'makina'=>$rkat,
                'slug'=>$rslug,
            'resim' => $isim1
            ),
            array(
                'resimisim'=>$risim,
                 'resimbilgi'=>$ricerik2,
                'makina'=>$rkat,
                'slug'=>$rslug,
            'resim' => $isim2
            )
        ));
        
        if ($ekle) {
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Makina Detayları Eklendi', 'text' => 'Makina Detayları Başarı İle Eklendi', 'type' => 'success'));
        } else {
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Makina Detayları Eklenemedi', 'text' => 'Makina Detayları Eklenirken Sorun İle Karşılaşıldı', 'type' => 'error'));
        }
    }
   public function getResimlistele(){
        $resimler = Resim::all();
        return View::make('backend.resim.listele',array('resimler'=>$resimler));
    }
   public function getResimduzenle($id) {
        $resim = Resim::findOrFail($id);
        $makinalar = Makinadetay::all();
        return View::make('backend.resim.duzenle', array('makinalar' => $makinalar, 'resim' => $resim));
    }
        public function postResimduzenle($id) {
        $validate = Validator::make(Input::all(), Resim::$rules);
        $messages = $validate->messages();
        if ($validate->fails())
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Doğrulama Hatası', 'text' => '' . $messages->first() . '', 'type' => 'error'));

        $resim = Resim::findOrFail($id);
//        $resim->resimisim = Input::get('resimisim');
//        $resim->resimbilgi = Input::get('resimbilgi');
//        $resim->makina = Input::get('resimkategori');
//        $resim->slug = Str::slug(Input::get('resimisim'));
                
        $risim = Input::get('resimisim');
//        $risim=$makina->resimisim;
        $rkat = Input::get('resimkategori');
        $rslug = Str::slug(Input::get('resimisim'));
        
         $ricerik=Input::get('resimbilgi');
        if (Input::hasFile('resim')) {
            File::delete('Backend/makinaresim/' . $resim->resim . '');
            $resim = Input::file('resim');
            $dosyaadi = $resim->getClientOriginalName();
            $uzanti = $resim->getClientOriginalExtension();
            $isim = Str::slug($dosyaadi) . Str::slug(str_random(5)) . '.' . $uzanti;
            $dosya = $resim->move('Backend/makinaresim/', $isim);
            $image = Image::open('Backend/makinaresim/' . $isim)->resize(900, 300)->save();
           
        }
        $ekle=DB::table('makresim')->insert(array(
            
                'resimisim'=>$risim,
                'resimbilgi'=>$ricerik,
                'makina'=>$rkat,
                'slug'=>$rslug,
            'resim' => $isim
            
        ));
        if ($ekle) {
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Resim Bilgileri Güncellendi', 'text' => 'Resim Bilgileri Başarı İle Güncellendi', 'type' => 'success'));
        } else {
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Resim Bilgileri Güncellenemedi', 'text' => 'Resim Bilgileri Güncellenirken Sorun İle Karşılaşıldı', 'type' => 'error'));
        }
    }
     public function getResimsil($id) {
        $resim = Resim::findOrFail($id);
        if ($resim->resim != '') {
            File::delete('Backend/makinaresim/' . $resim->resim . '');
        }
        $resim->delete();
        if (!$resim->delete()) {
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Resim Silindi', 'text' => 'Resim Başarı İle Silindi', 'type' => 'success'));
        } else {
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Resim Silinemedi', 'text' => 'Resim Bilgileri Silinirken Sorun İle Karşılaşıldı', 'type' => 'error'));
        }
    }
}
