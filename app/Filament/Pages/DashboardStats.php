<?php 

// app/Filament/Pages/DashboardStats.php
namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\User;

class DashboardStats extends Page
{
    protected static string $view = 'filament.pages.dashboard-stats';

    // Vous pouvez ajouter des variables publiques pour les données que vous souhaitez afficher
    public $userCount;

    public function mount()
    {
        // Récupère le nombre d'utilisateurs dans la base de données
        $this->userCount = User::count();
    }

    // Vous pouvez également ajouter des méthodes pour d'autres statistiques
}