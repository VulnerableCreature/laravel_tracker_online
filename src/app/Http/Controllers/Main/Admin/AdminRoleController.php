<?php

namespace App\Http\Controllers\Main\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminRoleController extends Controller
{
    public function index(): View
    {
        $roles = Role::all()->sortBy('title');
        return view('admin.role.index', compact('roles'));
    }

    public function create(): View
    {
        return view('admin.role.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string'
        ]);

        Role::query()->create($data);

        return redirect()->route('admin.roles.index');
    }

    public function edit(Role $role): View
    {
        return view('admin.role.edit', compact('role'));
    }

    public function update(Request $request, Role $role): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'nullable|string'
        ]);

        $role->update($data);

        return redirect()->route('admin.roles.index');
    }

    public function delete(Role $role): RedirectResponse
    {
        $role->delete();
        return redirect()->route('admin.roles.index');
    }
}
