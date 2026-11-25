<x-layout>
    <x-slot:title>Utilisateurs - Administration</x-slot:title>

    <x-page-header title="Utilisateurs" subtitle="Gestion des comptes et des rôles." />

    <div class="mt-6 overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Nom</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Adresse e-mail</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Rôle</th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider text-gray-500">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @foreach ($users as $user)
                    <tr>
                        <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">{{ $user->name }}</td>
                        <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">{{ $user->email }}</td>
                        <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                            <span class="inline-flex rounded-full px-2 text-xs font-semibold leading-5 {{ $user->isAdmin() ? 'bg-purple-100 text-purple-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $user->role }}
                            </span>
                        </td>
                        <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                            @can('updateRole', $user)
                                <form method="POST" action="{{ route('admin.users.role', $user) }}" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="role" value="{{ $user->isAdmin() ? 'author' : 'admin' }}">
                                    <button type="submit" class="text-indigo-600 hover:text-indigo-900 text-xs font-medium">
                                        Passer en {{ $user->isAdmin() ? 'author' : 'admin' }}
                                    </button>
                                </form>
                            @else
                                <span class="text-xs text-gray-400 italic">Non modifiable</span>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
