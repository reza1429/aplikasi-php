$(document).ready(function() {
    $('#tombol').hide();
    $('#keyword').on('keyup', function() {
        // munculkan loading
        $('.loader').show();

        // ajax menggunakan load
        // $('#container').load('./ajax/siswa.php?keyword=' + $('#keyword').val());

        // ajax menggunakan s.get()
        $.get('./ajax/siswa.php?keyword=' + $('#keyword').val(), function(data) {
            $('#container').html(data);
            $('.loader').hide();
        });
    })       
});