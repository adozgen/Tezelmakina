<?php

class Backend_KategoriController extends BackendController {
    /*
      |--------------------------------------------------------------------------
      | Default Home Controller
      |--------------------------------------------------------------------------
      |
      | Makinalara ait kategori oluşturma, silme ve düzenleme işlemleri yapılır.
        Burada dikkat edilmesi gereken method kategori silme metodudur. Kategori->makina->makina_resimleri birden birçoğa ilişki apısına sahiptir.
      | Kategori silindiginde ilgili makina ve resimlerde silinmektedir. Method üzereinde açıklanmıştır.
     */
    
    public function getKategoriekle() {
        return View::make('backend.kategori.ekle');
    }
    //Kataegori ekliyoruz...
    public function postKategoriekle() {
        $validate = Validator::make(Input::all(), Kategori::$rules);//Kategori modelinde tanımlanan kurallara göre geçerlilik denetimi..
        $messages = $validate->messages();
        if ($validate->fails())
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Doğrulama Hatası', 'text' => '' . $messages->first() . '', 'type' => 'error'));
        
        $kategori = new Kategori;//Kategori modelinin çagrılması ve ilgili sütunlara input verilerinin geçirilmesi...
        $kategori->kategoriadi = Input::get('kategoriadi');
        $kategori->slug = Str::slug(Input::get('kategoriadi'));
        $kategori->save();
        if ($kategori->save()) {
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Kategori Eklendi', 'text' => 'Kategori Başarı İle Eklendi', 'type' => 'success'));
        } else {
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Kategori Eklenemedi', 'text' => 'Kategori Eklenirken Sorun İle Karşılaşıldı', 'type' => 'error'));
        }

    }
    //Kategorilerin listelenmesi..
    public function getKategorilistele(){
        $kategoriler = Kategori::all();
        return View::make('backend.kategori.listele',array('kategoriler'=>$kategoriler));
    }
    
    public function getKategorisil($id){
        //kategoriler ile makinalar arasında birden birçoğa ilişkisi olduğundan dolayı ilgili kategoriye ait makinalarında silinme işlemleri gerçekleştirilmesi...
        $makina=DB::table('makinadetay')->where('kategori', $id)->get();//kategoriye ait makinaların belirlenmesi...
        $kategoriler = Kategori::findOrFail($id);
        $kategoriler->delete();
        if (!$kategoriler->delete()) {
              
        if ($makina) {  
        foreach ($makina as $mak)
        {   
            $mid=  Makinadetay::find($mak->id);
            $mid->delete();//Makinaların bulunup silinme işlemlerinin gerçekleşmesi
            //makinalar ile makina resimleri arasında birden birçoğa ilişkisinden dolayı ilgili makinaya ait resimlerinde silinme işlemi..
            $resimler=DB::table('makresim')->where('makina', $mak->id)->get();//makinaya ait resimlerin belirlenmesi..
            if ($mid) {  
        foreach ($resimler as $resim)
        { 
            $resimsil= Resim::find($resim->id);
            $resimsil->delete();//resimlerin bulunup silinmesi..
        }}
        }}
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Kategori Silindi', 'text' => 'Kategori Başarı İle Silindi', 'type' => 'success'));
        } else {
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Kategori Silinemedi', 'text' => 'Kategori Silinirken Sorun İle Karşılaşıldı', 'type' => 'error'));
        }
    }
    
    
    
    public function getKategoriduzenle($id){
       $kategori = Kategori::findOrFail($id);
       return View::make('backend.kategori.duzenle',array('kategori'=>$kategori));
    }
    
    //Seçilen kategorinin düzenlenmesi 
    
    public function postKategoriduzenle($id) {
        $validate = Validator::make(Input::all(), Kategori::$rules);
        $messages = $validate->messages();
        if ($validate->fails())
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Doğrulama Hatası', 'text' => '' . $messages->first() . '', 'type' => 'error'));
        
        $kategori = Kategori::findOrFail($id);
        $kategori->kategoriadi = Input::get('kategoriadi');
        $kategori->slug = Str::slug(Input::get('kategoriadi'));
        $kategori->save();
        if ($kategori->save()) {
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Kategori Güncellendi', 'text' => 'Kategori Başarı İle Güncellendi', 'type' => 'success'));
        } else {
            return Redirect::back()->with(array('mesaj' => 'true', 'title' => 'Kategori Güncellenemedi', 'text' => 'Kategori Güncellenirken Sorun İle Karşılaşıldı', 'type' => 'error'));
        }

    }
    
    
    
    
    
    
    

}
