<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\Widget;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;

class UsersListWidget extends Widget
{
    protected static string $view = 'filament.widgets.users-list-widget'; // Vue Blade à afficher

    // Récupérer les utilisateurs
    public function mount()
    {
        $this->users = User::all(); // Récupère tous les utilisateurs
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable(),
                TextColumn::make('email')->sortable(),
                BooleanColumn::make('is_admin')->label('Admin')->sortable(),
                TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->actions([]);
    }
}