<?php

namespace App\Filament\Widgets;

use App\Models\Disaster;
use App\Models\ItemVariant;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $lowStockCount = ItemVariant::whereColumn('stock_quantity', '<=', 'minimum_stock')->count();

        $expiringSoonCount = ItemVariant::whereNotNull('expired_at')
            ->where('expired_at', '<=', Carbon::now()->addDays(30))
            ->where('expired_at', '>=', Carbon::now())
            ->count();

        $activeDisastersCount = Disaster::where('status', 'aktif')->count();

        return [
            Stat::make('Peringatan Stok Menipis', $lowStockCount)
                ->description('Barang di bawah batas minimum')
                ->descriptionIcon('heroicon-m-exclamation-triangle')
                ->color($lowStockCount > 0 ? 'warning' : 'success'),

            Stat::make('Hampir Kedaluwarsa', $expiringSoonCount)
                ->description('Dalam 30 hari ke depan')
                ->descriptionIcon('heroicon-m-clock')
                ->color($expiringSoonCount > 0 ? 'danger' : 'success'),

            Stat::make('Bencana Aktif', $activeDisastersCount)
                ->description('Membutuhkan penyaluran bantuan')
                ->descriptionIcon('heroicon-m-map-pin')
                ->color($activeDisastersCount > 0 ? 'danger' : 'gray'),
        ];
    }
}
