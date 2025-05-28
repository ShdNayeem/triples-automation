<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Threedfloor;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ThreedfloorResource\Pages;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\ThreedfloorResource\RelationManagers;

class ThreedfloorResource extends Resource
{
    protected static ?string $model = Threedfloor::class;

    protected static ?string $navigationGroup = 'Category Management';

    public static ?string $label = '3D Floors';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

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
                SpatieMediaLibraryFileUpload::make('threedFloor')
                ->collection('threedfloors')
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
                ->collection('threedfloors')
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
            'index' => Pages\ListThreedfloor::route('/'),
            'create' => Pages\CreateThreedfloor::route('/create'),
            'edit' => Pages\EditThreedfloor::route('/{record}/edit'),
        ];
    }
}
