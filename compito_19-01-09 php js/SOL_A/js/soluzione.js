$(document).on("ready", function(){
    $(".insert").on("click", function(){
        const val = $(".numero").val();
        let err = false;

        if(val < 1 || val > 90){
            const p = document.createElement("p");
            p.innerText = "errore! numero non valido";
            if($(".error").children().length == 0){
                $(".error").append(p);
            } else {
                $(".error p:first-child()").before(p);
            }
            err = true;
        }
        if($(".col-md-1").length >= 5){
            const p = document.createElement("p");
            p.innerText = "errore! già 5 numeri presenti";
            if($(".error").children().length == 0){
                $(".error").append(p);
            } else {
                $(".error p:first-child()").before(p);
            }
            err = true;
        }
        $(".col-md-1").each(function(){
            const p = document.createElement("p");
            p.innerText = "errore! numero duplicato";
            if($(this).text() == val){
                if($(".error").children().length == 0){
                    $(".error").append(p);
                } else {
                    $(".error p:first-child()").before(p);
                }
                err = true;
            }
        });
        if(err){
            return;
        }

        const div = document.createElement("div");
        //let div = `<div class="col-md-1">${val}</div>`;
        div.classList.add("col-md-1");
        div.innerText = val;
        const primoDiv = $(".row div:first-child()");
        if($(".row").children().length == 0){
            $(".row").append(div);
        } else {
            primoDiv[0].before(div);
        }
    });

    $(document).on("click", "div > button:last-of-type()", function(){
        $(".error").html("");
        $(".row").html("");
    });
});