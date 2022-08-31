
import Cookie from 'js.cookie';

jQuery(document).ready(() => {

    var localization_modal = $('#client_localization_modal');

    if (localization_modal.length > 0) {
        if (Cookie.get( 'user_localization' ) != 'yes' ) {
            $.getJSON('https://api.ipify.org?format=json', function(data){
                var theClientIP = data.ip;

                fetch('https://ipapi.co/' + theClientIP + '/json/')
                .then(function(response) {
                    response.json().then(jsonData => {
            
                        var exclidedCountry = localization_modal.data('excluded');

                        if (jsonData && jsonData.country_code && jsonData.country_code != exclidedCountry) {
                            
                            setTimeout(() => {
                                localization_modal.addClass('popup-modal--active');
                                setTimeout(() => {
                                    localization_modal.addClass('popup-modal--in-view');
                                }, 10);
                            }, 1000);
            
                        }
                    }) 
                }).catch(function(error) {
                    console.log(error)
                });
            });
        }
    
        Cookie.set('user_localization', 'yes');
    }


    $('.current-country-link').on('click', function () {
        $(this).closest('.popup-modal').removeClass('popup-modal--in-view');
        setTimeout(() => {
          $(this).closest('.popup-modal').removeClass('popup-modal--active');
        }, 400)
    })
});