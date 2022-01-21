$(document).ready(function(){

    $("span").hide();

    const grid = getGrid();
    console.log(grid);

    if(checkRows(grid) && checkCols(grid) && checkSections(grid)){
        $(".win").show();
    } else {
        $("#lose").show();
    }

    function getGrid(){
        const grid = [];
        $("tr").each(function(){
            let row = [];
            $(this).children().each(function(){
                row.push(parseInt($(this).text()));
            });
            grid.push(row);
        });
        return grid;
    }

    function checkSet(set){
        for(let i = 1; i <= 9; i++){
            if(!set.includes(i)){
                console.log(set);
                return false;
            }
        }
        return true;
    }

    function checkRows(grid){
        for(let i = 0; i < 9; i++){
            if(!checkSet(grid[i])){
                return false;
            }
        }
        return true;
    }

    function checkCols(grid){
        for(let i = 0; i < 9; i++){
            const col = [];
            grid.forEach(row => {
                col.push(row[i]);
            });
            if(!checkSet(col)){
                return false;
            }
        }
        return true;
    }

    function checkSections(grid){
        for(let sectionRow = 0; sectionRow < 3; sectionRow++){
            const section = [];
            for(let sectionCol = 0; sectionCol < 3; sectionCol++){
                for(let i = 0; i < 3; i++){
                    for(let j = 0; j < 3; j++){
                        section.push(grid[sectionRow*3 + i][sectionCol*3 + j]);
                    }
                }
            }
            if(!checkSet(section)){
                return false;
            }
        }
        return true;
    }
});