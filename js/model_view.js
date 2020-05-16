function show_hide_logged_panel(is_logged){

    if(is_logged){
        // se loggato
        // nascondo i bottoni di login e registrazione
        $("#access-panel").removeClass("visible").addClass("invisible");
        // mostro il menu del profilo
        $("#account-panel").removeClass("invisible").addClass("visible");
    }else{
        // altrimenti
        // mostro i bottoni di login e registrazione
        $("#access-panel").addClass("visible").removeClass("invisible");
        // nascondo il menu del profilo
        $("#account-panel").addClass("invisible").removeClass("visible");
    }
}
