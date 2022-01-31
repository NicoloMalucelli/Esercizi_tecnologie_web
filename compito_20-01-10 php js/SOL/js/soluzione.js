$(document).ready(function(){

    $("button").on("click", function(){
        const n = $("input[name=numerocolonne]").val();
        let div = "";

        for(let i = 0; i < n; i++){
            div = div + `<lable>Dimensione colonna ${i+1}: <input type="number" name="${i}"/>`;
        }
        div = div + `<button>Genera colonne</button>`;
        $("button + div").html(div);
    });

    $("button + div").on("click", "button", function(){
        const inputs = $("button + div input");

        let sum = 0;
        inputs.each(function(){
            sum += parseInt($(this).val());
        });

        if(sum == 12){
            $("button + div").html("");

            let row = '<div class="row">';

            inputs.each(function(){
                row = row + `<div class="col-${$(this).val()}"></div>`;
            });

            $(".container-fluid").append(row);
        }

    });

});