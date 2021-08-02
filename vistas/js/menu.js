var oculto = false;
    $("#ocultar").click(function() {
    if (oculto) {
        $("#logo").attr("src", "vistas/dist/img/logo-blanco.png").attr("width", "240px").attr(
                        "height", "100%");
        oculto = false;
    } else {
            $("#logo").attr("src", "vistas/dist/img/logo.png").attr("width", "60px").attr("height",
                        "100%");
            oculto = true;
        }
    });
    $("#barra").hover(function() {
        if (oculto) {
            $("#logo").attr("src", "vistas/dist/img/logo-blanco.png").attr("width", "240px").attr(
                "height", "100%");
                }
    }, function() {
        if (oculto) {
            $("#logo").attr("src", "vistas/dist/img/logo.png").attr("width", "60px").attr("height",
                 "100%");
        }
    })