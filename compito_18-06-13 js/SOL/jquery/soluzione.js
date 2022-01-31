$(document).ready(function(){

    $("div").hide();
    $selected = null;

    $("tr").on("click", "td", function(){
        $clicked = $(this);

        if($selected == null){
            $clicked.css("background-color", "red");
            $("div").show();
            $selected = $clicked;
        } else {
            if($selected[0] == $clicked[0]){
                $clicked.css("background-color", "white");
                $("div").hide();
                $selected = null;
            } else {
                $selected.css("background-color", "white");
                $clicked.css("background-color", "red");
                $selected = $clicked;
            }
        }
        
    });

    //muovi a sinistra
    $("button:nth-child(1)").on("click", function(){
        $selected.prev().before($clicked);
    });

    //muovi a destra
    $("button:nth-child(2)").on("click", function(){
        $selected.next().after($clicked);
    });

    //inserisci prima
    $("button:nth-child(4)").on("click", function(){
        $new = $("input").val();
        if($new != null){
            $newNode = document.createElement("td");
            $newNode.innerHTML = $new;
            console.log($newNode)
            $selected.before($newNode);
        }
    });

    //inserisci dopo
    $("button:nth-child(5)").on("click", function(){
        $new = $("input").val();
        if($new != null){
            $newNode = document.createElement("td");
            $newNode.innerHTML = $new;
            console.log($newNode)
            $selected.after($newNode);
        }
    });

});