$(document).ready(function(){

    const values = [];
    let cell1 = null;
    let cell2 = null;
    let sqrt;

    $("form").on("submit", function(e){
        e.preventDefault();
        
        const val = $('input[name="numero"]').val();
        if(!Number.isInteger(Math.sqrt(val))){
            console.log("errore, il numero non è un quadrato perfetto")
            return;
        }
        sqrt = Math.sqrt(val);
        if(sqrt%2 != 0){
            console.log("errore, la radice quadrata del numero non è pari")
            return;
        }

        let table = "<table>";
        for(let i = 0; i < sqrt; i++){
            table = table + "<tr>";
            for(let j = 0; j < sqrt; j++){
                table = table + `<td id="${i}-${j}">[ ]</td>`;
            }
            table = table + "</tr>";
        }
        table = table + "</table>";

        for(let i = 0; i < val/2; i++){
            values.push(i);
            values.push(i);
        }
        for(let i = 0; i < val; i++){
            const swapIndex = Math.floor((Math.random() * val));
            const tmp = values[swapIndex];
            values[swapIndex] = values[i];
            values[i] = tmp;
        }


        $("main > div").html(table);
    });

    $(document).on("click", "td", function(){
        const cell =  $(this).attr("id").split("-");
        //console.log(getCellContent(cell[0], cell[1], sqrt));
        $(this).text(`[${getCellContent(parseInt(cell[0]), parseInt(cell[1]), sqrt)}]`);

        if(cell1 == null){
            cell1 = $(this);
        } else if(cell2 == null) {
            cell2 = $(this);
        } else {
            if(cell1.text() != cell2.text()){
                cell1.text("[ ]");
                cell2.text("[ ]");
            }
            cell1 = $(this);
            cell2 = null;
        }
    })

    function getCellContent(row, col, colLen){
        console.log(values);
        console.log(row*colLen + col);
        return values[row*colLen + col];
    }
});