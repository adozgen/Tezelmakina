@extends('backend.admin.layout.master')
@section('breadcrumb')
<li>
    <a href="{{ URL::to('makinadetay/resimyukle') }}">Profil Düzenle</a>
</li>
@stop
@section('alttitle')
<h1 id="main-heading">
    Profil Düzenle <span>Bu Kısımdan Profilinizi Düzenleyebilirsiniz</span>
</h1>
@stop
@section('content')
<!doctype html>
    {{ HTML::style('dropzone/css/basic.css') }}
    {{ HTML::style('dropzone/css/dropzone.css') }}
    {{ HTML::script('assets/js/jquery.js') }}
    {{ HTML::script('dropzone/dropzone.js') }} 
<!--   <form id="my-Dropzone" class="dropzone" action="{{ URL::to('makinadetay/resimyukle') }}" method="post" enctype="Multipart/form-data">
<button type="button" class="btn">
Add File
</button>
<div class="dropzone-previews"></div>
{{Form::token()}}
   </form>
<script>

this.on("addedfile", function() {
if (this.files[1]!=null){
this.removeFile(this.files[0]);
}
});
</script>-->

    <style>

        .wrapper {

            width: 700px;
            margin: auto;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div id="dropzone">
        <form id="my-Dropzone" class="dropzone" action="{{ URL::to('makinadetay/resimyukle') }}" method="post" enctype="Multipart/form-data">
        {{ Form::open(array('url' => 'makinadetay/resimyukle', 'class'=>'dropzone', 'id'=>'myDropzone')) }}
         Single file upload 
        <div class="dz-default dz-message"><span>Drop files here to upl</span></div>
        
         Multiple file upload
        <div class="fallback">  
            <input name="file[]" type="file" multiple />
        </div>
        
        {{Form::token()}}
        </form>
<button type="button" class="btn">
Add File
</button>
<div class="dropzone-previews"></div>
{{Form::close()}}
    </div>
</div>
<script language="javascript">


// myDropzone is the configuration for the element that has an id attribute
  // with the value my-dropzone (or myDropzone)
  Dropzone.options.myDropzone = {
    init: function() {
      this.on("addedfile", function(file) {

        var removeButton = Dropzone.createElement('<a class="dz-remove">Remove file</a>');
        var _this = this;

        removeButton.addEventListener("click", function(e) {
          e.preventDefault();
          e.stopPropagation();

           var fileInfo = new Array();
           fileInfo['name']=file.name;

            $.ajax({
                type: "POST",
                url: "{{ url('/delete-image') }}",
                data: {file: file.name},
                beforeSend: function () {
                    // before send
                },
                success: function (response) {
               
                    if (response == 'success')
                       alert('deleted');
                },
                error: function () {
                    alert("error");
                }
            });


          _this.removeFile(file);

          // If you want to the delete the file on the server as well,
          // you can do the AJAX request here.
        });


        // Add the button to the file preview element.
        file.previewElement.appendChild(removeButton);
      });
    }
  };

</script>
</body>
</html>
@stop




<!-- Bu kısım bu viewe ait css dosyaları -->
@section('css')

@stop




<!-- Bu kısım bu viewe ait js dosyaları -->
@section('js')
{{HTML::script('Backend/custom-plugins/bootstrap-fileinput.min.js')}}
@stop