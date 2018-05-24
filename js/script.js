function esport(sport_id){
    
    if(sport_id=="home"){
        var results = document.getElementsByClassName('results-table'), i;
        for (var i = 0; i < results.length; i ++) {
            results[i].style.display = 'table';
        }
    }

    else{
        var results = document.getElementsByClassName('results-table'), i;
        for (var i = 0; i < results.length; i ++) {
            results[i].style.display = 'none';
        }

        results = document.getElementsByClassName(sport_id);
        for (var i = 0; i < results.length; i ++) {
            results[i].style.display = 'table';
        }
    }
}

function openNav() {
    document.getElementById("myNav").style.height = "100%";
}

function closeNav() {
    document.getElementById("myNav").style.height = "0%";
}

function phone_menu(atr){
    esport(atr);
    closeNav()
}