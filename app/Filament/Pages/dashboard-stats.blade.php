// resources/views/filament/pages/dashboard-stats.blade.php
<x-filament::page>
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold">Dashboard Stats</h2>
    </div>

    <div class="mt-4">
        <h3 class="text-xl">Nombre d'utilisateurs :</h3>
        <p class="text-lg font-semibold">{{ $userCount }}</p>
    </div>

    <!-- Vous pouvez ajouter d'autres statistiques ici -->
</x-filament::page>
