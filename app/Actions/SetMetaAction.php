<?php

namespace App\Actions;

use Abordage\LastModified\Facades\LastModified;
use App\Models\Setting;
use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Butschster\Head\Packages\Entities\TwitterCardPackage;

class SetMetaAction
{
    public function handle($data)
    {
        $title = $data->meta_title ?: (Setting::where('code', 'service_title')->first() ? str_replace('{NAME}', $data->name, Setting::where('code', 'service_title')->first()->value) : $data->name);

        $description = $data->meta_description ?: (Setting::where('code', 'service_description')->first() ? str_replace('{NAME}', $data->name, Setting::where('code', 'service_description')->first()->value) : $data->name);

        Meta::setTitle(env('APP_NAME'))
            ->prependTitle($title)
            ->setDescription($description)
            ->setCanonical(url()->current());

        LastModified::set($data->updated_at);

        $og = new OpenGraphPackage('og');

        $og->setTitle($title)
            ->setDescription($description)
            ->setUrl(url()->current());

        Meta::registerPackage($og);

        $card  = new TwitterCardPackage('card');

        Meta::registerPackage($card);
    }
}
