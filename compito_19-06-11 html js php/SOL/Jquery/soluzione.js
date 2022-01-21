$(document).on("ready", function(){

    $("button").on("click", function(){
        const base = $('input[name="base"]').val();
        const altezza = $('input[name="altezza"]').val();

        const rettangolo = new Rettangolo();
        rettangolo.base = parseInt(base);
        rettangolo.altezza = parseInt(altezza);
        rettangolo.stampaInConsole();
        rettangolo.visualizzaNelDom("body > div");
    });

    $(document).on("click", "div > a", function(){
        $(this).parent().remove();
    });

});

class Rettangolo{
    constructor() {
    }

    stampaInConsole(){
        console.log(`base: ${this.base}; altezza: ${this.altezza}; perimetro: ${this.base*2 + this.altezza*2}; area: ${this.base * this.altezza}`);
    }

    visualizzaNelDom(selettore){
        $(selettore).append(`<div style="border: 1px solid black; height: ${this.altezza}px; width: ${this.base}px">
            <a>x</a>
        </div>`);
    }
}