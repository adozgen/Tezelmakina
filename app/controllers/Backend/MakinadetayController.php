<?php

class Backend_MakinadetayController extends BackendController {
    /*
      |--------------------------------------------------------------------------
      | Default Home Controller
      |--------------------------------------------------------------------------
      |
      | Makinaya ait düzenlemelerin yapılması. 
        Yine burada makina ile resimler tabloları arasında birden birçoğa ilişkisinin varlığından dolayı silme işlemi
        makina ile beraber makinaya ait resimlerede uygulanması...
      |
     */
    
//    public function getResimyukle() {
//        return View::make('backend.resimyukle.index');
//    }
//    public function postResimyukle() {
//        
//    $file = Input::file('file');
////$resim_sayisi   = count($file);
//    if($file) {
//
//        $destinationPath = public_path() . '/uploads/';
//        $filename = $file->getClientOriginalName();
//
//        $upload_success = Input::file('file')->move($destinationPath, $filename);
//        
//        if ($upload_success) {
//
//            // resizing an uploaded file
//            Image::make($destinationPath . $filename)->resize(100, 100)->save($destinationPath . "100x100_" . $filename);
//
//            return Response::json('success', 200);
//        } else {
//            return Response::json('error', 100);
//        }
//    }
//    }
//    public function postResimsil() {
//            $destinationPath = public_path() . '/uploads/';
//    File::delete($destinationPath . Input::get('file'));
//    File::delete($destinationPath . "100x100_" . Input::get('file'));
//
//     return Response::json('success', 200);
//        
//    }
    public function getMakinaekle() {
        $kategoriler = Kategori::all();
        return View::make('backend.makinadetay.ekle')->with('kategoriler', $kategoriler);
    }

    public function postMakinaekle() {
        $validate = Validator::make(Input::all(), Makinadetay::$rules);/* Makina modelinde belirlenen kurallarla geçerlilik denetimi */
        $messages = $validate->messages();
        if ($validate->fails())
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Doğrulama Hatası', 'text' => '' . $messages->first() . '', 'type' => 'error'));

        $makina=new Makinadetay; /* Makina modelinin çağrılması ve input atamasının yapılması*/
        $makina->makinaisim = Input::get('makinaisim');
//        $makina->makinaozellik = Input::get('makinaozellik');
        $makina->kategori = Input::get('makinakategori');
//        $makina->makfiyat=  Input::get('makinafiyat');
        $makina->slug = Str::slug(Input::get('makinaisim'));
//        if (Input::hasFile('makinaresim')) {
//            $resim = Input::file('makinaresim');
////            $resim_sayisi   = count($resim);
//            $dosyaadi = $resim->getClientOriginalName();
//            $uzanti = $resim->getClientOriginalExtension();
//            $isim = Str::slug($dosyaadi) . Str::slug(str_random(5)) . '.' . $uzanti;
//            $dosya = $resim->move('Backend/makinaresim/', $isim);
//            $image = Image::open('Backend/makinaresim/' . $isim)->resize(900, 300)->save();
//            $makina->resim = $isim;
//            $makina->save();
//        }
        $makina->save();
        if ($makina->save()) {
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Makina Detayları Eklendi', 'text' => 'Makina Detayları Başarı İle Eklendi', 'type' => 'success'));
        } else {
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Makina Detayları Eklenemedi', 'text' => 'Makina Detayları Eklenirken Sorun İle Karşılaşıldı', 'type' => 'error'));
        }
    }

    public function getMakinalistele() {
        $makinadetay = Makinadetay::all();
            return View::make('backend.makinadetay.listele', array('makinadetay' => $makinadetay));
        
        
    }

    public function getMakinasil($id) {
        /* seçilen makinaya ait resimlerin belirlenmesi*/
        $resimler=DB::table('makresim')->where('makina', $id)->get();
        $makina = Makinadetay::findOrFail($id);
        if ($makina->resim != '') {
            File::delete('Backend/makinaresim/' . $makina->resim . '');
        }
        $makina->delete();
        if (!$makina->delete()) {
        if ($resimler) {  
        foreach ($resimler as $resim)
        { 
            $resimsil= Resim::find($resim->id);
            $resimsil->delete();/* makina ile beraber ilgili makinaya ait resimlerinde silinmesi*/
        }}
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Makina Silindi', 'text' => 'Makina Başarı İle Silindi', 'type' => 'success'));
        } else {
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Makina Silinemedi', 'text' => 'Makina Bilgileri Silinirken Sorun İle Karşılaşıldı', 'type' => 'error'));
        }
    }

    public function getMakinaduzenle($id) {
        $makina = Makinadetay::findOrFail($id);
        $kategoriler = Kategori::all();
        return View::make('backend.makinadetay.duzenle', array('makina' => $makina, 'kategoriler' => $kategoriler));
    }

    public function postMakinaduzenle($id) {
        $validate = Validator::make(Input::all(), Makinadetay::$rules);
        $messages = $validate->messages();
        if ($validate->fails())
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Doğrulama Hatası', 'text' => '' . $messages->first() . '', 'type' => 'error'));

        $makina = Makinadetay::findOrFail($id);
        $makina->makinaisim = Input::get('makinaisim');
//        $makina->makinaozellik = Input::get('makinaozellik');
//        $makina->makfiyat=  Input::get('makinafiyat');
        $makina->kategori = Input::get('makinakategori');
        $makina->slug = Str::slug(Input::get('makinaisim'));
//         if (Input::hasFile('makinaresim')) {
//            File::delete('Backend/makinaresim/' . $makina->resim . '');
//            $resim = Input::file('makinaresim');
//            $dosyaadi = $resim->getClientOriginalName();
//            $uzanti = $resim->getClientOriginalExtension();
//            $isim = Str::slug($dosyaadi) . Str::slug(str_random(5)) . '.' . $uzanti;
//            $dosya = $resim->move('Backend/makinaresim/', $isim);
//            $image = Image::open('Backend/makinaresim/' . $isim)->resize(900, 300)->save();
//            $makina->resim = $isim;
//            $makina->save();
//        }
        $makina->save();
        if ($makina->save()) {
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Makina Bilgileri Güncellendi', 'text' => 'Makina Bilgileri Başarı İle Güncellendi', 'type' => 'success'));
        } else {
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Makina Bilgileri Güncellenemedi', 'text' => 'Makina Bilgileri Güncellenirken Sorun İle Karşılaşıldı', 'type' => 'error'));
        }
    }

}
