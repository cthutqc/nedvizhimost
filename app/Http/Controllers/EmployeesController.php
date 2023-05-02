<?php

namespace App\Http\Controllers;

use App\Actions\SetMetaAction;
use App\Models\Page;
use App\Models\User;

class EmployeesController extends Controller
{
    public function index(SetMetaAction $action)
    {
        $page = Page::where('slug', 'employees')->first();

        $action->handle($page);

        $users = User::role('manager')->get();

        return view('employees.index', compact('page', 'users'));
    }

    public function show(User $user, SetMetaAction $action)
    {
        $action->handle($user);

        return view('employees.show', compact('user'));
    }
}
