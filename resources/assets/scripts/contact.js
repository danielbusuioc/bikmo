jQuery(document).ready(() => {

    var lat = ($('.location_section__map').length > 0 ? $('.location_section__map').data('lat') : '');
    var lng = ($('.location_section__map').length > 0 ? $('.location_section__map').data('lng') : '');

    setTimeout(() => {
        const map = new window.google.maps.Map(document.getElementById('map'), {
            center: { lat: lat, lng: lng },
            zoom: 13,
            mapTypeId: 'terrain',
            disableDefaultUI: true,
        });

        new window.google.maps.Marker({
            position: { lat: lat, lng: lng },
            map,
          });
    }, 100)

});