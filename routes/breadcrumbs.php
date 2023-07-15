<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Главная', route('home'));
});

Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('home');
    $trail->push($category->name, route('categories.show', $category));
});

Breadcrumbs::for('page', function (BreadcrumbTrail $trail, $page) {
    $trail->parent('home');
    $trail->push($page->name, route('pages.show', $page));
});

Breadcrumbs::for('vacancies', function (BreadcrumbTrail $trail, $page) {
    $trail->parent('home');
    $trail->push($page->name, route('vacancies.index'));
});

Breadcrumbs::for('service', function (BreadcrumbTrail $trail, $service) {
    $trail->parent('page', \App\Models\Page::where('slug', 'services')->first());
    $trail->push($service->name, route('services.show', $service));
});

Breadcrumbs::for('insurance', function (BreadcrumbTrail $trail, $insurance) {
    $trail->parent('page', \App\Models\Page::where('slug', 'services')->first());
    $trail->push($insurance->name, route('insurances.show'));
});

Breadcrumbs::for('user', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('page', \App\Models\Page::where('slug', 'employees')->first());
    $trail->push($user->name . ' ' . $user->last_name, route('employees.show', $user));
});

Breadcrumbs::for('item', function (BreadcrumbTrail $trail, $item) {
    $trail->parent('category', $item->category);
    $trail->push($item->name, route('items.show', $item));
});
