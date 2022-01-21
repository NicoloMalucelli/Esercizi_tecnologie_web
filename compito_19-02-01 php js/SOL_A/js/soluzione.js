$(document).on("ready", function(){

    let asterischi = 0;
    let maxAsterischi = 0;

    $("div > button").on("click", function(){
        const righe = $('input[name="righe"]').val();
        const colonne = $('input[name="colonne"]').val();

        console.log(righe);
        if(righe <= 0 || colonne <= 0){
            $("div > p").text("errore! righe o colonne minori di zero");
            return;
        } else {
            $("div > p").text("");
        }

        asterischi = 0;
        maxAsterischi = righe*colonne / 2;

        let table = "<table>";
        for(let i = 0; i < righe; i++){
            table = table + "<tr>";
            for(let j = 0; j < colonne; j++){
                table = table + "<td></td>";
            }
            table = table + "</tr>";
        }

        table = table + "</table>";
        $("div:last-of-type").html(table);
    });

    $(document).on("click", "td", function(){
        if($(this).text() == "*"){
            $("div > p").text("");
            asterischi--;
            $(this).text("");
        } else {
            if(asterischi >= maxAsterischi){
                $("div > p").text("massimo numero di asterischi raggiunto");
                return;
            } else {
                $("div > p").text("");
            }
            asterischi++;
            $(this).text("*");
        }
    });
});