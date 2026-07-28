<?php

namespace App\Filament\Widgets;

use App\Models\StockMovement;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Model;

class RecentActivities extends BaseWidget
{
    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                StockMovement::query()
                    ->with(['itemVariant', 'user'])
                    ->latest('moved_at')
                    ->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('moved_at')
                    ->label('Waktu Aktivitas')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),

                Tables\Columns\TextColumn::make('itemVariant.variant_name')
                    ->label('Barang')
                    ->searchable(),

                Tables\Columns\TextColumn::make('type')
                    ->label('Jenis Mutasi')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'in' => 'success',
                        'out' => 'danger',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('quantity')
                    ->label('Jumlah')
                    ->numeric(),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Petugas'),
            ])
            ->heading('Aktivitas Mutasi Stok Terbaru')
            ->paginated(false)
            ->recordUrl(
                fn (Model $record): string => '#'
            );
    }
}
