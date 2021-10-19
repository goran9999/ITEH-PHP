$('#dodajForm').submit(function(){
    event.preventDefault();
    console.log("Dodaj je pokrenut.")
    const $form = $(this);
    const $inputs=$form.find('input,select,button,textarea');
    const serijalizacija=$form.serialize();
    console.log(serijalizacija);
    request = $.ajax({
        url:'handler/add.php',
        type:'POST',
        data:serijalizacija
    });
    request.done(function(response,textStatus,jqXHR){
        if(response==='Success'){
            alert("Kolokvijum je zakazan");
            console.log("Uspesno zakazivanje");
            location.reload(true);
        }else{
            console.log("Kolokvijum nije zakazan"+response);
            console.log(response);
        }
    });
    request.fail(function(jqXHR,textStatus,errorThrown){
        console.error("Greska:"+textStatus,errorThrown);
    });
});