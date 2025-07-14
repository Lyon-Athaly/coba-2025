<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\TowerResource\Pages;
use App\Filament\Admin\Resources\TowerResource\RelationManagers;
use App\Models\Tower;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TowerResource extends Resource
{
    protected static ?string $model = Tower::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tower_id')
                    ->label('Tower ID')
                    ->rule('regex:/^[A-Z]$/')
                    ->maxLength(1)
                    ->required(),
                Forms\Components\TextInput::make('jumlah_lantai')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jumlah_unit')
                    ->label('Jumlah Unit')
                    ->disabled()
                    ->dehydrated(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('tower_id')
                ->label('Tower ID')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('jumlah_lantai')
                ->label('Jumlah Lantai')
                ->sortable(),
            Tables\Columns\TextColumn::make('jumlah_unit')
                ->label('Jumlah Unit')
                ->sortable(),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTowers::route('/'),
            'create' => Pages\CreateTower::route('/create'),
            'edit' => Pages\EditTower::route('/{record}/edit'),
        ];
    }
}
