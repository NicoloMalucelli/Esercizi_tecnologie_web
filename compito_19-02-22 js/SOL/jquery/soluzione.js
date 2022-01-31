$(document).ready(function(){

    $("tr:last-of-type() td:nth-child(1)").html("<ul></ul>");
    $("tr:last-of-type() td:nth-child(2)").html("<ul></ul>");
    $("tr:last-of-type() td:nth-child(3)").html("<ul></ul>");
    $("tr:last-of-type() td:nth-child(4)").html("<ul></ul>");

    //add
    $("div > button").on("click", function(){

        $text = $("input").val();

        if($text == null || $text == ""){
            $("p").html("Errore, input vuoto");
        } else {
            $("p").html("");
            $("input").val("");
            $("tr:last-of-type() td:nth-child(1) ul").append(`<li><button>Delete</button><button>Doing</button><span>${$text}</span></li>`);
        }

    });

    //delete
    $("td").on("click", "button:first-of-type()", function(){
        $(this).parent().remove();
    });

    //doing
    $("td:nth-child(1)").on("click", "button:last-of-type()", function(){
        $text = $(this).next().text();
        $("tr:last-of-type() td:nth-child(2) ul").append(`<li><button>Delete</button><button>Testing</button><span>${$text}</span></li>`);
        $(this).parent().remove();
    });

    //testing
    $("td:nth-child(2)").on("click", "button:last-of-type()", function(){
        $text = $(this).next().text();
        $("tr:last-of-type() td:nth-child(3) ul").append(`<li><button>Delete</button><button>Done</button><span>${$text}</span></li>`);
        $(this).parent().remove();
    });

    //done
    $("td:nth-child(3)").on("click", "button:last-of-type()", function(){
        $text = $(this).next().text();
        $("tr:last-of-type() td:nth-child(4) ul").append(`<li><button>Delete</button><span>${$text}</span></li>`);
        $(this).parent().remove();
    });

});