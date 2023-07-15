@props([
    'address' => $address,
])
<x-row>
    <div x-data="{itemMap: null}"
         x-init="ymaps.load('https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=002208ba-6b10-4727-b26f-87bb07720529')
                  .then(ymaps => {
                    const itemMap = new ymaps.Map($refs.container, {
                        center: [55.753994, 37.622093],
                        zoom: 7,
                        controls: []
                    })
                    ymaps.geocode('{{$address}}', {
                        results: 1
            })
            .then(function (res) {
                let firstGeoObject = res.geoObjects.get(0),
                coords = firstGeoObject.geometry.getCoordinates(),
                bounds = firstGeoObject.properties.get('boundedBy');
                firstGeoObject.options.set('preset', 'islands#dotIcon');
                firstGeoObject.options.set('iconColor', '#EF4444');
                firstGeoObject.options.set('isOpen');
                firstGeoObject.properties.set('iconCaption', firstGeoObject.getAddressLine());
                itemMap.geoObjects.add(firstGeoObject);
                itemMap.setBounds(bounds, {
                    checkZoomRange: true
                });
             })
         })"
    >
        <div id="map" class="w-full h-[300px]" x-ref="container">
        </div>
    </div>
</x-row>
