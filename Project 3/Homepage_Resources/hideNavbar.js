$(window).scroll(function() {
    if (window.pageYOffset > 200) {
        $("#navbar").css("display", "flex");
    } else {
        if ($("#navbar").css("display") == "flex") {
            $("#navbar").css("display", "none");
        }
    }
});
