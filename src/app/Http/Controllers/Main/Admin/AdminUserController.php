<?php

namespace App\Http\Controllers\Main\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\DivisionUser;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdminUserController extends Controller
{
    public function index(): View
    {
        $users = User::all()->sortBy('surname');
        return view('admin.user.index', compact('users'));
    }

    public function create(): View
    {
        $roles = Role::all()->sortBy('title');
        $divisions = Division::all()->sortBy('title');
        return view('admin.user.create', compact('roles', 'divisions'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'middleName' => 'required|string',
            'password' => 'required|string',
            'role_id' => 'required|integer|exists:roles,id',
            'login' => 'required|string|unique:users',
            'division_id' => 'required|integer|exists:divisions,id',
        ]);

        DB::beginTransaction();
        try {
            /** @var User $user */
            $user = User::query()->create([
                'name' => $data['name'],
                'surname' => $data['surname'],
                'middleName' => $data['middleName'],
                'password' => $data['password'],
                'role_id' => $data['role_id'],
                'login' => $data['login'],
            ]);

            DivisionUser::query()->create([
                'user_id' => $user->id,
                'division_id' => $data['division_id']
            ]);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('admin.users.create');
        }

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user): View
    {
        $roles = Role::all()->sortBy('title');
        $divisions = Division::all()->sortBy('title');
        return view('admin.user.edit', compact('user', 'roles', 'divisions'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'nullable|string',
            'surname' => 'nullable|string',
            'middleName' => 'nullable|string',
            'role_id' => 'nullable|integer|exists:roles,id',
            'division_id' => 'nullable|integer|exists:divisions,id',
        ]);

        $user->update([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'middleName' => $data['middleName'],
            'role_id' => $data['role_id'],
        ]);

        $divisionUser = DivisionUser::query()->find($user->id);
        $divisionUser->update([
            'division_id' => $data['division_id']
        ]);

        return redirect()->route('admin.users.index');
    }

    public function delete(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
