function generaColonne(){
    let tot = 0;
    let values = [];
    $(`input[name*="col-"]`).each(function() {
        tot = tot + parseInt($(this).val());
        values.push(parseInt($(this).val()));
    });
    if(parseInt(tot) == 12){
        let newDiv = `<div class="row">`;
        for(let i=0; i<values.length;i=i+1){
            newDiv = newDiv + `<div class="col-${values[i]}"></div>`
        }
        newDiv = newDiv + `</div>`
        $(".container-fluid").append(newDiv);
        $(".container-fluid > div > div > button").next().html("");
    }
}

$(document).on("ready", function(){

    $(".container-fluid > div > div > button").on("click", function(){
        const col = $(`input[name="numerocolonne"`).val();
        $(this).next().html("");
        for(let i=0; i<col;i=i+1){
            $(this).next().append(`<label> <input type="number" name="col-${i}"></label>`);
        }
        $(this).next().append(`<button onclick="generaColonne()">Genera colonne</button>`);
    });

});