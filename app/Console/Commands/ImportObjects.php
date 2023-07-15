<?php

namespace App\Console\Commands;

use App\Models\DealType;
use App\Models\Item;
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
        $file = 'https://quick-deal.ru/api/v3/feed/organisationObjects/2528?secret=GKR4qvO91vPH5A5hBX4ZLNNlWWp&format=yandex&descriptionType=html';

        $data = simplexml_load_file($file);

        $offers = json_encode($data);

        foreach ($data->offer as $offer) {

            $dealType = DealType::where('name', $offer->type)->first();

            $item = Item::where('qd_id', $offer->qd_id)->first();

            if(!$item)
            {
                $item = Item::create([
                    'name' => $offer->title,
                    'text' => $offer->description,
                    'address' => $offer->location->{'locality-name'} . ' ' . $offer->location->address,
                    'qd_id' => $offer->qd_id,
                    'rooms' => $offer->rooms,
                    'floor' => $offer->floor,
                    'floors' => $offer->{'floors-total'},
                    'total_area' => $offer->area?->value,
                    'living_space' => $offer->{'living-space'}?->value,
                    'kitchen_area' => $offer->{'kitchen-space'}?->value,
                    'deal_type_id' => $dealType->id,
                    'price' => $offer->price->value,
                    'category_id' => 2
                ]);
            }

        }
    }
}
