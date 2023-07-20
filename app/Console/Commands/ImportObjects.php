<?php

namespace App\Console\Commands;

use App\Models\DealType;
use App\Models\Item;
use App\Models\ItemType;
use App\Models\User;
use Illuminate\Console\Command;

class ImportObjects extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-objects';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = 'https://quick-deal.ru/api/v3/feed/organisationObjects/2528?secret=GKR4qvO91vPH5A5hBX4ZLNNlWWp&format=yandex&descriptionType=html';

        $objects = simplexml_load_file($data);

        $data = 'https://quick-deal.ru/api/v3/feed/organisationObjects/2528?secret=GKR4qvO91vPH5A5hBX4ZLNNlWWp&format=quickDeal&descriptionType=html';

        $qdObjects = simplexml_load_file($data);

        $qdObjects = json_encode($qdObjects);

        $qdObjects = collect(json_decode($qdObjects, true));

        $qdObjects = collect($qdObjects['estate-object']);

        foreach ($objects->offer as $offer) {

            $item = Item::where('qd_id', $offer->qd_id)->first();

            if(!$item)
            {
                $dealType = DealType::where('name', $offer->type)->first();

                $itemType = ItemType::where('name', $offer->category)->first();

                $qdItem = $qdObjects->where('id', $offer->qd_id)->first();

                $item = Item::create([
                    'name' => $offer->title,
                    'text' => $offer->description,
                    'address' => $offer->location->{'locality-name'} . ' ' . $offer->location->address,
                    'latitude' => $qdItem['address']['geoLat'],
                    'longitude' => $qdItem['address']['geoLon'],
                    'qd_id' => $offer->qd_id,
                    'rooms' => $offer->rooms,
                    'floor' => $offer->floor,
                    'floors' => $offer->{'floors-total'},
                    'total_area' => $offer->area?->value,
                    'living_space' => $offer->{'living-space'}?->value,
                    'kitchen_area' => $offer->{'kitchen-space'}?->value,
                    'deal_type_id' => $dealType?->id,
                    'price' => $offer->price->value,
                    'category_id' => 2,
                    'item_type_id' => $itemType?->id,
                    'renovation' => $offer->renovation ?: null,
                    'window-view' => $offer->{'window-view'} ?: null,
                    'bathroom-unit' => $offer->{'bathroom-unit'} ?: null,
                    'balcony' => $offer->balcony ?: null,
                    'floor-covering' => $offer->{'floor-covering'} ?: null,
                    'room-furniture' => (boolean)$offer->{'room-furniture'},
                    'air-conditioner' => (boolean)$offer->{'air-conditioner'},
                    'phone' => (boolean)$offer->phone,
                    'built-year' => $offer->{'built-year'} ?: null,
                    'ceiling-height' => $offer->{'ceiling-height'} ?: null,
                    'guarded-building' => (boolean)$offer->{'guarded-building'},
                    'access-control-system' => (boolean)$offer->{'access-control-system'},
                    'lift' => (boolean)$offer->lift,
                    'rubbish-chute' => (boolean)$offer->{'rubbish-chute'},
                    'flat-alarm' => (boolean)$offer->{'flat-alarm'},
                    'alarm' => (boolean)$offer->alarm,
                    'toilet' => (boolean)$offer->toilet,
                ]);

                if(isset($qdItem['images']) && count($qdItem['images']['links'])) {
                    foreach($qdItem['images']['links'] as $image)
                        $item->addMediaFromUrl($image)->toMediaCollection();
                }

                $user = User::where('phone', $offer->{'sales-agent'}->phone)->first();

                if(!$user)
                {
                    $user = User::create([
                        'name' => $offer->{'sales-agent'}->name,
                        'phone' => $offer->{'sales-agent'}->phone,
                        'email' => $offer->{'sales-agent'}->email,
                        'password' => rand()
                    ]);

                    $user->assignRole('manager');
                }

                $item->user_id = $user->id;

                $item->save();
            }

        }
    }
}
