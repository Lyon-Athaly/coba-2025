<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\UnitResource\Pages;
use App\Filament\Admin\Resources\UnitResource\RelationManagers;
use App\Models\Unit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\Pages\CreateRecord;
use Filament\Facades\Filament;



class UnitResource extends Resource
{
    protected static ?string $model = Unit::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('unit_id')
                    ->maxLength(255)
                    ->required(),
                Forms\Components\TextInput::make('lantai')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('luas')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'avaiable' => 'Avaiable',
                        'unavaiable' => 'Unavaiable',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('tower_id')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('unit_id')
                ->label('Unit ID')
                ->searchable()
                ->sortable()
                ->copyable(),
                Tables\Columns\TextColumn::make('lantai')
                ->label('Lantai')
                ->alignCenter()
                ->sortable(),
                Tables\Columns\TextColumn::make('luas'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('tower_id')
                ->label('Tower ID')
                ->sortable()
                ->badge(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('tower_id')
                ->label('Tower')
                ->relationship('tower', 'tower_id'),

            Tables\Filters\SelectFilter::make('lantai')
                ->label('Lantai')
                ->options(
                    fn () => range(1, 50) // atau ambil dari database jika dinamis
                )
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
            'index' => Pages\ListUnits::route('/'),
            'create' => Pages\CreateUnit::route('/create'),
            'edit' => Pages\EditUnit::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->whereIn('tower_id', [1, 3])
            ->orderBy('tower_id')
            ->orderBy('unit_id');
    }

}
