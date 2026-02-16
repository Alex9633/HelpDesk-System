<?php

namespace App\Filament\Resources\TicketResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class HistoriesRelationManager extends RelationManager
{
    protected static string $relationship = 'histories';

    protected static ?string $title = 'Edit History';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('field')
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Changed By')
                    ->default('System'),
                Tables\Columns\TextColumn::make('field')
                    ->label('Field Changed')
                    ->formatStateUsing(fn (string $state): string => ucwords(str_replace('_', ' ', $state))),
                Tables\Columns\TextColumn::make('old_value')
                    ->label('Old Value')
                    ->default('-'),
                Tables\Columns\TextColumn::make('new_value')
                    ->label('New Value'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->defaultSort('created_at', 'desc');
    }
}
