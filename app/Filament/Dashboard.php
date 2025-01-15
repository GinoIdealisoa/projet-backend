<?php

namespace App\Filament;

use Filament\Widgets\Widget;
use App\Filament\Widgets\UsersListWidget;

class Dashboard
{
    /**
     * Get the widgets for the dashboard.
     *
     * @return array
     */
    public static function getWidgets(): array
    {
        return [
            UsersListWidget::class, // Ajoutez votre widget ici
        ];
    }
}