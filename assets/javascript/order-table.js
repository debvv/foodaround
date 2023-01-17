$(document).ready(function() {
    setInterval(function() {
        $.ajax({
            url: "././order_table_table.php",
            type: "GET",                    
            dataType: "html",
            success: function(data) { //если запрос успешен
                // Получаем ответ с сервера с помощью ajax
                // console.log(data);
                // console.log(data.responseText);
                console.log("The table was updated!+!");
                $("#order").html(data);
            },
            error: function(jqXhr, textStatus, errorThrown) {
                console.log("Ошибка '" + jqXhr.status + "' (textStatus: '" + textStatus + "', errorThrown: '" + errorThrown + "')");
            },
            complete: function() {
            }
        });
    }, 1000);
});