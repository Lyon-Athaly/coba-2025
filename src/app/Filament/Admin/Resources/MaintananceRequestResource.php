<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\MaintananceRequestResource\Pages;
use App\Filament\Admin\Resources\MaintananceRequestResource\RelationManagers;
use App\Models\MaintananceRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MaintananceRequestResource extends Resource
{
    protected static ?string $model = MaintananceRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('unit_id')
                ->label('Unit')
                ->required()
                ->maxLength(255)
                ->autocomplete(false),

            Forms\Components\DatePicker::make('tanggal')
                ->label('Tanggal')
                ->required(),

            Forms\Components\Textarea::make('deskripsi')
                ->label('Deskripsi')
                ->required()
                ->rows(3)
                ->maxLength(500),

            Forms\Components\Select::make('status')
                ->label('Status')
                ->required()
                ->options([
                    'pending' => 'Pending',
                    'on process' => 'On Process',
                    'finish' => 'Finish',
                    'cancel' => 'Cancel',
                ])
                ->native(false)
                ->default('pending')
                ->live(),

            Forms\Components\TextInput::make('staff')
                ->label('Staff Penanggung Jawab')
                ->maxLength(255)
                ->visible(fn ($get) => in_array($get('status'), ['on process', 'finish']))
                ->required(fn ($get) => in_array($get('status'), ['on process', 'finish']))
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('unit_id')
                    ->label('Unit')
                    ->searchable()
                    ->url(fn ($record) => route('filament.admin.resources.units.edit', $record->unit_id))
                    ->openUrlInNewTab(),

                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date(),

                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(30),

                Tables\Columns\TextColumn::make('staff')
                    ->label('Staff')
                    ->default('Belum ditugaskan'),

                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'pending' => 'warning',
                        'on process' => 'info',
                        'finish' => 'success',
                        'cancel' => 'danger',
                    ])
                    ->sortable(),

            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('tampilkan_finish')
                    ->label('Tampilkan Finish & Cancel')
                    ->queries(
                        true: fn ($query) => $query,
                        false: fn ($query) => $query->whereIn('status', ['pending', 'on process']),
                        ),
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
            'index' => Pages\ListMaintananceRequests::route('/'),
            'create' => Pages\CreateMaintananceRequest::route('/create'),
            'edit' => Pages\EditMaintananceRequest::route('/{record}/edit'),
        ];
    }
}
