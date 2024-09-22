$(document).ready(function(){

    window.addEventListener('DOMContentLoaded', () => {
        const menu = document.querySelector('.menu_320px'),
        menuItem = document.querySelectorAll('.nav__item'),
        hamburger = document.querySelector('.hamburger');
    
        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('hamburger_active');
            menu.classList.toggle('menu_320px_active');
        });
    
        menuItem.forEach(item => {
            item.addEventListener('click', () => {
                hamburger.classList.toggle('hamburger_active');
                menu.classList.toggle('menu_320px_active');
            })
        })
    });

    $modal = $('.modal-frame');
    $overlay = $('.modal-overlay');

    $modal.bind('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e){
      if($modal.hasClass('state-leave')) {
        $modal.removeClass('state-leave');
      }
    });

    $('.close, .modal-overlay').on('click', function() {
      $overlay.removeClass('state-show');
      $modal.removeClass('state-appear').addClass('state-leave');
    });

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
        var nameVal = $('.form-inner input#name').val().length;
        var phoneVal = $('.form-inner input#phone').val().length;
        
        if(nameVal >= 2 && phoneVal != 0) {
            $.ajax({
                type: "POST",
                url: "mailer/smart.php",
                data: $(this).serialize()
            }).done(function() {
                $(this).find("input").val("");
                $overlay.addClass('state-show');
                $modal.removeClass('state-leave').addClass('state-appear');
    
                $('form').trigger('reset');
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.error("Error: " + textStatus, errorThrown);
            }).always(function() {
                // This code will always run regardless of the success or failure of the request.
                console.log("Request completed");
            });
        }

        
        return false;
    });

});