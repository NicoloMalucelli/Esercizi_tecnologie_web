$(document).ready(function(){

    $.ajax({
        url: "data.json",
        method: "POST",
        dataType: "json",
        success: function(data){
            const parola = data.parola;
            let nuovaParola = "";
            for(let i = 0; i < parola.length; i++){
                if(i != 0 && i != parola.length-1){
                    if(parola[i] == "a" || parola[i] == "e" || parola[i] == "i" || parola[i] == "o" || parola[i] == "u"){
                        nuovaParola += "+";
                    } else {
                        nuovaParola += "-";
                    }
                }else{
                    nuovaParola += parola[i];
                }
            }
            $("#parola").text(nuovaParola);
        },
        error: function(xhr, status, error) {
            $(".errore").html(`<p>${error}<p>`);
        }
    })

});