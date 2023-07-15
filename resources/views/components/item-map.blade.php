@props([
    'latitude' => $latitude,
    'longitude' => $longitude
])
<x-row>
    <div x-data="{itemMap: null}"
         x-init="ymaps.load('https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=002208ba-6b10-4727-b26f-87bb07720529')
                          .then(ymaps => {
                            const itemMap = new ymaps.Map($refs.container, {
                                center: [{{$latitude}}, {{$longitude}}],
                                zoom: 7,
                                controls: []
                            })
                            itemMap.geoObjects.add(new ymaps.Placemark([{{$latitude}}, {{$longitude}}], {
                            }, {
                                preset: 'islands#dotIcon',
                                iconColor: '#EF4444'
                            }))
                          }).catch(error => console.log('Failed to load Yandex Maps', error));"
    >
        <div id="map" class="w-full h-[300px]" x-ref="container">
        </div>
    </div>
</x-row>
