$(function() {

    if ($.fn.validate) {

        $('.validate').validate();

    }


    if ($.fn.dataTable) {

        $('.data').dataTable({
            "oLanguage": {
                "sProcessing": "İşleniyor...",
                "sLengthMenu": "Sayfada _MENU_ Kayıt Göster",
                "sZeroRecords": "Eşleşen Kayıt Bulunmadı",
                "sInfo": "  _TOTAL_ Kayıttan _START_ - _END_ Arası Kayıtlar",
                "sInfoEmpty": "Kayıt Yok",
                "sInfoFiltered": "( _MAX_ Kayıt İçerisinden Bulunan)",
                "sInfoPostFix": "",
                "sSearch": "Bul:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "İlk",
                    "sPrevious": "Önceki",
                    "sNext": "Sonraki",
                    "sLast": "Son"
                }
            }});
    }

    if ($.fn.select2) {

        $('.select2').select2();
    }
    
    if($.fn.cleditor) {
			
			$( '.cleditor').cleditor({ width: '100%' });
		}


});


function geridon() {
    history.go(-1);
}