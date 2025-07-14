<?php

namespace App\Providers\Filament;

use App\Filament\Resources\Documents\Widgets\DocumentCreation;
use App\Filament\Resources\DocumentTypes\Widgets\DocumentTypeCreation;
use App\Filament\Widgets\CustomAccountWidget;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Width;
use Filament\Support\Facades\FilamentView;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class SuperadminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('superadmin')
            ->path('superadmin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                CustomAccountWidget::class,
                DocumentTypeCreation::class,
                DocumentCreation::class,
            ])
            ->maxContentWidth(Width::Full)
            ->sidebarWidth('15rem')
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])->spa();
    }

    public function boot(): void // <--- Tambahkan kode di dalam method ini
    {
        FilamentView::registerRenderHook(
            'panels::auth.login.form.after', // <- "Hook" untuk posisi setelah form login
            fn(): string => Blade::render('
                <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 100%; margin-top: 1.5rem; text-align: center; font-size: 0.875rem; color: rgb(107, 114, 128);">
                    <p style="margin-bottom: 1rem; width: 100%; text-align: center;"><strong>Powered by :</strong> Dema Saintek Uin Malang</p>
                    <a href="https://www.instagram.com/demafst.uinmalang/" target="_blank" rel="noopener noreferrer" style="display: block; text-align: center;">
                        <img src="{{ asset("images/logodema.png") }}" alt="Dema Saintek Uin Malang" style="height: 5rem; width: auto; margin: 0 auto;">
                    </a>
                </div>
            ')
        );
    }
}
