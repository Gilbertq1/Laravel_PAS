<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServicesModelResource\Pages;
use App\Filament\Resources\ServicesModelResource\RelationManagers;
use App\Models\ServicesModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\FileUpload;

class ServicesModelResource extends Resource
{
    protected static ?string $model = ServicesModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                ->label('Title')
                ->required(),
                Forms\Components\TextArea::make('description')
                ->label('Deskripsi'),
                Forms\Components\FileUpload::make('picture'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('description'),
                ImageColumn::make('picture'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListServicesModels::route('/'),
            'create' => Pages\CreateServicesModel::route('/create'),
            'edit' => Pages\EditServicesModel::route('/{record}/edit'),
        ];
    }
}
