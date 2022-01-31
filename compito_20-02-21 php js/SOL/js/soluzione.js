$(document).ready(function(){

    let trasposta = false;

    $("button:first-of-type()").on("click", function(){
        $("p").text("Caricamento dati in corso...");

        $.ajax({
            url: "sw_b.json",
            dataType: "json",
            success: function(result){
                const keys = Object.keys(result[0]);
                let table = "<thead><tr>";

                keys.forEach(key => {
                    table = table + `<th id="${stringToID(key)}">${key}</th>`
                });
                table = table + `<th id="azione">azione</th>`

                table = table + "</thead></tr><tbody>"

                result.forEach(row => {
                    table = table + "<tr>";
                    for(let i = 0; i < keys.length; i++){
                        if(i == 0){
                            table = table + `<th id="${stringToID(row[keys[i]])}" headers="${stringToID(keys[i])}">${row[keys[i]]}</th>`;
                        } else {
                            table = table + `<td headers="${stringToID(keys[i])} ${stringToID(row[keys[0]])}">${row[keys[i]]}</td>`;
                        }
                    }
                    table = table + `<td headers="azione ${stringToID(row[keys[0]])}"><button>Modifica riga</button></td>`
                    table = table + "</tr>";
                });
                table = table + "</tbody>";
                $("table").html(table);
                $("p").text("Caricamento dei dati avvenuto con successo");
            },
            error: function(){
                $("p").text("Caricamento dei dati fallito");
            }
        });
    });

    $("button:nth-of-type(2)").on("click", function(){
        trasposta = !trasposta;

        const newTable = [];
        const rows = $("tr");

        for(let i = 0; i < rows.length; i++){
            const children = rows[i].children;

            for(let j = 0; j < children.length; j++){
                if(i == 0){
                    newTable.push([])
                }
                newTable[j].push(children[j].innerHTML);
            }
        }
        
        const keys = [];
        for(let i = 0; i < newTable[0].length; i++){
            keys.push(newTable[0][i]);
        }

        let table = "<thead><tr>";

        keys.forEach(key => {
            table = table + `<th id="${stringToID(key)}">${key}</th>`
        });

        table = table + "</thead></tr><tbody>"

        for(let j = 1; j < newTable.length; j++){
            table = table + "<tr>";
            for(let i = 0; i < keys.length; i++){
                if(i == 0){
                    table = table + `<th id="${stringToID(newTable[j][i])}" headers="${stringToID(keys[i])}">${newTable[j][i]}</th>`;
                } else {
                    table = table + `<td headers="${stringToID(keys[i])} ${stringToID(newTable[j][0])}">${newTable[j][i]}</td>`;
                }
            }
            table = table + "</tr>";
        }
        table = table + "</tbody>";
        $("table").html(table);
    });

    $("table").on("click", "button", function(){
        if(!trasposta){
            const row = $(this).parent().parent();
            const firstRow = $("tbody tr:first-of-type()");
            firstRow.before(row);
        } else {
            
        }
    });

});

function stringToID(string){
    return string.replace(" ", "");
}