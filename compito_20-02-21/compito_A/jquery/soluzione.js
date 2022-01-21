function stringaToID(stringa){
    return stringa.toLowerCase().replace(/[^a-zA-Z]/g, "");
}

$(document).on("ready", function(){
    $("main > button:first-of-type()").on("click", function(){
        $.ajax({
            url: "sw_b.json", 
            success: function(dati){
                const keys = Object.keys(dati[0]);
                let table = "<tr>";
                keys.forEach(key => {
                    table = table + `<th id="${key}">${key}</th>`;
                });
                table = table + `<th id="azione">Azione</th>`;
                table = table + "</tr>";
                for(let i = 0; i < dati.length; i++){
                    table = table + "<tr>"
                    table = table + `<th id="${dati[i][keys[0]]}" headers="${keys[0]}">${dati[i][keys[0]]}</th>`
                    for(let j = 1; j < keys.length; j++){
                        table = table + `<td headers="${keys[j]} ${dati[i][keys[0]]}">${dati[i][keys[j]]}</td>`
                    }
                    table = table + `<td headers="azione ${dati[i][keys[0]]}"><button>Azione</button></td>`
                    table = table + "</tr>"
                }

                $("table").html(table);
                $("p").text("caricamento dati avvenuto con successo");
            },
            error: function(err){
                $("p").text("caricamento dati fallito");
            }
        });
    });

    $(document).on('click', 'td > button', function(){ 
        const tr = $(this).parent().parent();
        $("tr:nth-child(2)").parent()[0].insertBefore(tr[0], $("tr:nth-child(2)")[0]);
    });

});