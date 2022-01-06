$(document).ready(function(){
    $('.select-kota').on('change', function(){
        var token = $('meta[name="csrf-token"]').attr('content');
        const id_kota = JQuery(this).val();

        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN' : token
            },
            url:'/laporankegiatan/data-kecamatan',
            data: {id : id_kota},
            dataType: 'json',
            success: function(data){
                $('.select-kecamatan').empty();
                $.each(data, function (key, name){
                    $('.select-kecamatan').append(new Option(name, key));
                });
            }
        });
    });

     // Tampilkan kelurahan saat kecamatan dipilih
     $('.select-kecamatan').on('change', function () { 
        var token = $('meta[name="csrf-token"]').attr('content');
        const id_kecamatan = jQuery(this).val();

            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                url: '/laporankegiatan/data-kelurahan',
                data: {id : id_kecamatan},
                dataType: 'json',
                success: function(data){
                    $('.select-kelurahan').empty();
                    $.each(data, function (key, name) {
                        $('.select-kelurahan').append(new Option(name, key));
                    });
                }
            });
    });

});