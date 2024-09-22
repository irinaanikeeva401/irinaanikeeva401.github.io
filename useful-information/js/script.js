$(document).ready(function(){

    $('#appointment-form').validate({
        rules: {
            name: "required",
            phone: "required",
            address: "required"
        },
        messages: {
            name: "Будь ласка, введіть фамілію та ім'я",
            phone: "Будь ласка, введіть номер телефону"
        }
    }); 
    
    $('input[name=phone]').mask("+38 (999) 999-99-99");

    $('form').submit(function(e) {
        e.preventDefault();

        var volume = $('#select-address').val();

        console.log(volume);

        if(volume == "вул. Мостицька, 9") {
            $.ajax({
                type: "POST",
                url: "mailer/smart1.php",
                data: $(this).serialize()
            }).done(function() {
                $(this).find("input").val("");
    
                $('form').trigger('reset');
            });
        } else if(volume == "вул. Маршала Малиновського, 13 (м. Оболонь)") {
            $.ajax({
                type: "POST",
                url: "mailer/smart1.php",
                data: $(this).serialize()
            }).done(function() {
                $(this).find("input").val("");
    
                $('form').trigger('reset');
            });
        } else if(volume == "проспект Миколи Бажана, 12 (м. Осокорки)") {
            $.ajax({
                type: "POST",
                url: "mailer/smart.php",
                data: $(this).serialize()
            }).done(function() {
                $(this).find("input").val("");
    
                $('form').trigger('reset');
            });
        } else if(volume == "вул. Михайла Бойчука, 5 (м. Дружби народів)") {
            $.ajax({
                type: "POST",
                url: "mailer/smart1.php",
                data: $(this).serialize()
            }).done(function() {
                $(this).find("input").val("");
    
                $('form').trigger('reset');
            });
        } else if(volume == "вул. Івана Мазепи, 2 (м. Арсенальна)") {
            $.ajax({
                type: "POST",
                url: "mailer/smart.php",
                data: $(this).serialize()
            }).done(function() {
                $(this).find("input").val("");
    
                $('form').trigger('reset');
            });
        } else if(volume == "вул. Краківська, 13в (м. Чернігівська/Дарниця)") {
            $.ajax({
                type: "POST",
                url: "mailer/smart1.php",
                data: $(this).serialize()
            }).done(function() {
                $(this).find("input").val("");
    
                $('form').trigger('reset');
            });
        } else if(volume == "вул. Турівська, 26 (м. Тараса Шевченко)") {
            $.ajax({
                type: "POST",
                url: "mailer/smart.php",
                data: $(this).serialize()
            }).done(function() {
                $(this).find("input").val("");
    
                $('form').trigger('reset');
            });
        } else if(volume == "вул. Вадима Гетьмана, 1а (м. Шулявська)") {
            $.ajax({
                type: "POST",
                url: "mailer/smart1.php",
                data: $(this).serialize()
            }).done(function() {
                $(this).find("input").val("");
    
                $('form').trigger('reset');
            });
        }

        
        return false;
    });

});