<?php
namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class UserApprovalController extends Controller
{
    private function ensureAdmin(): void
    {
        abort_unless(
            auth()->user()?->role?->slug === 'admin',
            403,
            'Kamu tidak memiliki akses untuk mengelola akun.'
        );
    }

    public function index(): View
    {
        $this->ensureAdmin();

        $users = User::with('role')
            ->where('account_status', 'pending')
            ->orderBy('created_at')
            ->paginate(10);

        return view('admin.index', compact('users'));
    }

    public function approve(Request $request, User $user): RedirectResponse
    {
        $this->ensureAdmin();

        abort_if($user->account_status !== 'pending', 404);

        $validated = $request->validate([
            'role_id' => [
                'required',
                'integer',
                Rule::exists('roles', 'id')->whereIn('slug', ['penglat', 'dalmut']),
            ],
        ]);

        $role = Role::findOrFail($validated['role_id']);

        $user->update([
            'role_id' => $role->id,
            'account_status' => 'approved',
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('status', 'Akun berhasil disetujui sebagai ' . $role->name . '.');
    }

    public function reject(User $user): RedirectResponse
    {
        $this->ensureAdmin();

        abort_if($user->account_status !== 'pending', 404);

        $user->update([
            'account_status' => 'rejected',
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('status', 'Pendaftaran akun berhasil ditolak.');
    }
}
