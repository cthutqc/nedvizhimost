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

Breadcrumbs::for('item', function (BreadcrumbTrail $trail, $item) {
    $trail->parent('category', $item->category);
    $trail->push($item->name, route('items.show', $item));
});
