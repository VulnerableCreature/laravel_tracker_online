<?php

namespace App\Http\Controllers\Main\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminDivisionController extends Controller
{
    public function index(): View
    {
        $divisions = Division::all()->sortBy('title');
        return view('admin.division.index', compact('divisions'));
    }

    public function create(): View
    {
        return view('admin.division.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string'
        ]);

        Division::query()->create($data);

        return redirect()->route('admin.divisions.index');
    }

    public function edit(Division $division): View
    {
        return view('admin.division.edit', compact('division'));
    }

    public function update(Request $request, Division $division): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'nullable|string'
        ]);

        $division->update($data);

        return redirect()->route('admin.divisions.index');
    }

    public function delete(Division $division): RedirectResponse
    {
        $division->delete();
        return redirect()->route('admin.divisions.index');
    }
}
