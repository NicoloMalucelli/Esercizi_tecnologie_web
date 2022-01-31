$(document).ready(function(){

    loadTable();

    $("button").on("click", function(){
        if($(`input[name="nome"]`).val() != "" && $(`input[name="peso"]`).val() != "" && $(`input[name="altezza"]`).val() != ""){
            $.ajax({
                url: "soluzione.php",
                type: "POST",
                data: {nome: $(`input[name="nome"]`).val(), peso: $(`input[name="peso"]`).val(), altezza: $(`input[name="altezza"]`).val()},
                success: function(data){
                    loadTable();
                },
                error: function(xhr,status,error){
                    console.log(error);
                }
            });
        }
    });

});

function stringToId(string){
    return string.replace(" ", "");
}

function loadTable(){
    $.ajax({
        url: "soluzione.php",
        type: "GET",
        dataType: "json",
        success: function(data){

            keys = Object.keys(data[0]);

            let table = "<thead><tr>";

            keys.forEach(key => {
                table += `<th id = ${stringToId(key)}>${key}</th>`;
            });

            table += "</tr></thead><tbody>"; 

            for(let i = 0; i < data.length; i++){
                table += "<tr>";

                for(let j = 0; j < keys.length; j++){
                    if(j == 0){
                        table += `<th id="${stringToId(data[i][keys[j]])}" headers="${stringToId(keys[j])}">${data[i][keys[j]]}</th>`
                    } else {
                        table += `<td headers="${stringToId(keys[j])} ${stringToId(data[i][keys[0]])}">${data[i][keys[j]]}</td>`
                    }
                }

                table += "</tr>";
            }

            table += "</tbody>";

            $("table").html(table);

        },
        error: function(xhr,status,error){
            console.log(error);
        }
    });
}