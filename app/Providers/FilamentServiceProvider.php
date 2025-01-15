<?php

// app/Providers/FilamentServiceProvider.php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Filament\Widgets\UserCountWidget;
use Filament\Facades\Filament;

class FilamentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Enregistrer des widgets personnalisés
        Filament::registerWidgets([
            UserCountWidget::class,
        ]);
    }
}