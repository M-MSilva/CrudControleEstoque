$().ready(function() {
	setTimeout(function () {
		$('.msg').fadeOut();
	}, 3000);
});

function mudaFoto(foto)
{
	document.getElementById("icone").src = foto;
}

$('form').submit(function(e){
    var emptyinputs = $(this).find('input').filter(function(){
        return !$.trim(this.value).length;  // get all empty fields
    }).prop('disabled',true);
});

$().ready(function () {
    $('.produto-enable').on('click', function () {
        let idProduto = $(this).attr('data-id')
        let enabled = $(this).is(":checked")
        $('.produto-quantidade[data-id="' + idProduto + '"]').attr('disabled', !enabled)
        $('.produto-quantidade [data-id="' + idProduto + '"]').val(null)
    })
});
