$("#category-query").hide();
$("#categories").hide();
$("#rank").hide();

$(document).ready(function () {
    $("#categories").load("view/elements/getCategoriesOptionPane.php");
    $("#rank").load("view/elements/GetRankingTable.php");

    // animazione scritte nella pagina classifiche
    $("#d-0").animate({'margin-left': '+=150vw'}, 500);
    setTimeout(function () {
        $("#d-1").animate({'margin-left': '+=150vw'}, 1000);
        setTimeout(function () {
            $("#d-2").animate({'margin-left': '+=150vw'}, 1000);
            setTimeout(function () {
                $("#d-3").animate({'margin-left': '+=150vw'}, 1000);
                setTimeout(function () {
                    if (window.matchMedia("(max-width: 576px)").matches) {
                        $("#d-1").animate({'margin-top': '+=3rem'}, 500);
                        // $("#d-2").animate({'margin-top': '+=5vh'}, 500);
                        $("#d-3").animate({'margin-top': '-=4.8rem'}, 500);
                    }else if(window.matchMedia("(max-width: 768px)").matches){

                    }else if(window.matchMedia("(min-width: 992px)").matches){

                        $("#d-1").animate({'margin-top': '+=3rem'}, 500);
                        // $("#d-2").animate({'margin-top': '+=5vh'}, 500);
                        $("#d-3").animate({'margin-top': '-=6.8rem'}, 500);


                    }else if(window.matchMedia("(min-width: 1200px)").matches){
                        $("#d-1").animate({'margin-top': '+=3rem'}, 500);
                        // $("#d-2").animate({'margin-top': '+=5vh'}, 500);
                        $("#d-3").animate({'margin-top': '-=6.8rem'}, 500);
                    }

                },1500);

                $("#rank").fadeIn(1000);
                $("#categories").fadeIn(1000);
                $("#category-query").fadeIn(1000);

            },300);
        },300);
    },300);


});