<?php

namespace App\Filament\Resources;

use App\Models\User;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms;
use App\Filament\Resources\UserResource\Pages\ListUsers;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationLabel = 'Users';
    protected static ?string $navigationGroup = 'Admin';
    protected static ?int $navigationSort = 2;

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-user'; // Icône pour la ressource
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('email')->required()->email(),
                Forms\Components\TextInput::make('password')->required()->password(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable(),
                TextColumn::make('email')->sortable(),
                BooleanColumn::make('is_admin')->label('Admin')->sortable(),
                TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->filters([/* Ajoutez des filtres si nécessaire */])
            ->actions([
                EditAction::make()
                    ->icon('heroicon-o-pencil'),  // Icône de modification
                DeleteAction::make()
                    ->icon('heroicon-o-trash'),   // Icône de suppression
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUsers::route('/'),
        ];
    }
}
