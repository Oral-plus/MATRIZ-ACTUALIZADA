jQuery(document).ready(function($){
    $(".table tr").click(function(e){
        $prueba=($(this).find("td").eq(0).text());
        $("#orden").val($prueba);
    });
    $(".table tr").click(function(e){
        $prueba1=($(this).find("td").eq(1).text());
        $("#codigo").val($prueba1);
    });
    $(".table tr").click(function(e){
        $prueba2=($(this).find("td").eq(2).text());
        $("#descripcion").val($prueba2);
    });
    $(".table tr").click(function(e){
        $prueba3=($(this).find("td").eq(3).text());
        $("#cantidad").val($prueba3);
    });

    
});