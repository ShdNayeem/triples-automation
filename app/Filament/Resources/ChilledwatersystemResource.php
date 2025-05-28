<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChilledwatersystemResource\Pages;
use App\Filament\Resources\ChilledwatersystemResource\RelationManagers;
use App\Models\Chilledwatersystem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class ChilledwatersystemResource extends Resource
{
    protected static ?string $model = Chilledwatersystem::class;

    protected static ?string $navigationGroup = 'Category Management';

    public static ?string $label = 'Chilled  Water System';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // public static function getNavigationBadge(): ?string
    // {
    //     return static::getModel()::count();
    // }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('title')
                ->required(),
                TextInput::make('image_id')->placeholder('0'),
                SpatieMediaLibraryFileUpload::make('chilledwatersystem')
                ->collection('chilledwatersystems')
                ->maxFiles(3)
                ->preserveFilenames()
                ->imageEditor()
                ->imageResizeMode('cover')
                ->maxSize(2048)
                ->imageEditorAspectRatios([
                    '16:9',
                ])
                ->required(),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('image_id')
            ->reorderable('image_id')
            ->columns([
                //
                // TextColumn::make('id'),
                TextColumn::make('title')->limit(50)->html()->searchable(),
                // TextColumn::make('image_id')->searchable()->sortable(),
                SpatieMediaLibraryImageColumn::make('Image')
                ->collection('chilledwatersystems')
                ->limit(1)->width(150)->height(50),
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
            'index' => Pages\ListChilledwatersystems::route('/'),
            'create' => Pages\CreateChilledwatersystem::route('/create'),
            'edit' => Pages\EditChilledwatersystem::route('/{record}/edit'),
        ];
    }
}
