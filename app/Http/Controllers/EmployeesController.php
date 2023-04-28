<?php

namespace App\Http\Controllers;

use Abordage\LastModified\Facades\LastModified;
use App\Models\Page;
use App\Models\Setting;
use App\Models\User;
use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Butschster\Head\Packages\Entities\TwitterCardPackage;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index()
    {
        $page = Page::where('slug', 'employees')->first();

        $title = $page->meta_title ?? $page->name;

        $description = $page->meta_descriptioncode ?? $page->name;

        Meta::setTitle(env('APP_NAME'))
            ->prependTitle($title)
            ->setDescription($description)
            ->setCanonical(url()->current());

        LastModified::set($page->updated_at);

        $og = new OpenGraphPackage('og');

        $og->setTitle($title)
            ->setDescription($description)
            ->setUrl(url()->current());

        Meta::registerPackage($og);

        $card  = new TwitterCardPackage('card');

        Meta::registerPackage($card);

        $users = User::role('manager')->get();

        return view('employees.index', compact('page', 'users'));
    }

    public function show(User $user)
    {
        $title = $user->meta_title ?: (Setting::where('code', 'user_title')->first() ? str_replace('{NAME}', $user->name . ' ' . $user->last_name, Setting::where('code', 'user_title')->first()->value) : $user->name . ' ' . $user->last_name);

        $description = $user->meta_description ?: (Setting::where('code', 'user_description')->first() ? str_replace('{NAME}', $user->name . ' ' . $user->last_name, Setting::where('code', 'user_description')->first()->value) : $user->name . ' ' . $user->last_name);

        Meta::setTitle(env('APP_NAME'))
            ->prependTitle($title)
            ->setDescription($description)
            ->setCanonical(url()->current());

        LastModified::set($user->updated_at);

        $og = new OpenGraphPackage('og');

        $og->setTitle($title)
            ->setDescription($description)
            ->setUrl(url()->current());

        Meta::registerPackage($og);

        $card  = new TwitterCardPackage('card');

        Meta::registerPackage($card);

        return view('employees.show', compact('user'));
    }
}
