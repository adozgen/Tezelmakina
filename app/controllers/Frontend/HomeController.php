<?php

class Frontend_HomeController extends FrontendController {
    /*
      |--------------------------------------------------------------------------
      | Default Home Controller
      |--------------------------------------------------------------------------
      |
      |Mevcut verilerin son kullanıcıya gösterilme işlemleri...
      |
     */
   
    /*Makina resim ve bilgilerinin anasayfada gösterilmesi*/
    
    public function home() {
        $kategori= Kategori::all();
        
        //sayfalama işlemiyle 3 resim tek sayfada olacaktır.
        
        $resimler= Resim::paginate(3);
        $makaleler= Makinadetay::paginate(3); 
        return View::make('frontend.index',array('makaleler'=>$makaleler,'kategoriler'=>$kategori,'resimler'=>$resimler));
        
    }
    
    //Makina ve resimlerin detaylı olarak incelenebileceği sayfada gösterilmesi...
    
    public function kategoriler($slug) {
        $kategori= Kategori::where('slug',$slug)->get();
        foreach ($kategori as $kat) {
            Session::put('katid',$kat->id);
        }
        $katid=Session::get('katid');
        $makinalar= Makinadetay::where('kategori',$katid)->get();
        $makinalas= Makinadetay::where('slug',$slug)->get();
        foreach ($makinalas as $makina) {
            Session::put('makid',$makina->id);
        }
        $makid=Session::get('makid');
        $mbilgiler= Resim::where('makina',$makid)->get();
        return View::make('frontend.kategoriler',array('makinalar'=>$makinalar,'mbilgiler'=>$mbilgiler));
        
    }
    public function makinabilgileri($risim, $id) {
        $mbilgiler= Resim::where('id',$id)->get();
        
        return View::make('frontend.detay',array('mbilgiler'=>$mbilgiler));
        
    }
    
    public function hakkimizda() {
        $bilgiler= Hakkimizda::all();
        
        return View::make('frontend.hakkimizda',array('bilgiler'=>$bilgiler));
        
    }
    public function iletisim() {
        $bilgiler= Iletisim::all();
        
        return View::make('frontend.iletisim',array('bilgiler'=>$bilgiler));
        
    }
    
    

}
