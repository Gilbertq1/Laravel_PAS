<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StreamResource\Pages;
use App\Filament\Resources\StreamResource\RelationManagers;
use App\Models\Stream;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class StreamResource extends Resource
{
    protected static ?string $model = Stream::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                    TextInput::make('title')
                        ->required()
                        ->label('Title'),
                    Textarea::make('description')
                        ->required()
                        ->label('Description'),
                    FileUpload::make('video_path')
                        ->required()
                        ->label('Video')
                        ->directory('videos') // Folder untuk menyimpan video
                        ->acceptedFileTypes(['video/mp4', 'video/avi', 'video/mov']) // Tipe file yang diizinkan
                        ->maxSize(300000), // Ukuran maksimal (300MB)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Title')->searchable()->sortable(),
                TextColumn::make('description')->label('Description')->limit(50),
                TextColumn::make('video_path')
                    ->label('Video')
                    ->url(fn ($record) => \Storage::url($record->video_path)),
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
            'index' => Pages\ListStreams::route('/'),
            'create' => Pages\CreateStream::route('/create'),
            'edit' => Pages\EditStream::route('/{record}/edit'),
        ];
    }
}
