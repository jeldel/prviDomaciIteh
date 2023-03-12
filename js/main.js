$('#noviObrok').submit(function(){
    event.preventDefault();
    console.log("Dodaj je pokrenuto");

    const $form = $(this);
    const $inputs = $form.find('input, select, button, textarea');
    const $serijalizacija = $form.serialize();
    console.log($serijalizacija);

    request = $.ajax({
        url:'/Prvi-domaci-iteh/handler/dodajObrok.php',
        type: 'post',
        data: $serijalizacija
    });

    request.done(function (response, textStatus, jqXHR) {
        if (response === "Success") {
            alert("Dodali ste obrok");
            console.log("Uspešno ste dodali obrok");
            location.reload(true);
        }

        else
            console.log("Došlo je do greške");

        console.log(response);
    });

});