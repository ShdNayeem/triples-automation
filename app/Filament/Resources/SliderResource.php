<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Slider;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SliderResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use App\Filament\Resources\SliderResource\RelationManagers;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class SliderResource extends Resource
{
    protected static ?string $model = Slider::class;

    protected static ?string $navigationGroup = 'Product Management';

    public static ?string $label = 'Sliders';

    protected static ?int $navigationSort = 8;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //   
                TextInput::make('title')
                ->required(),  
                TextInput::make('url')
                ->prefix('Product Url')  
                ->suffixIcon('heroicon-m-globe-alt')
                ->url()              
                ->required(),           
                RichEditor::make('content')->required(),
                SpatieMediaLibraryFileUpload::make('slider')
                ->collection('sliders')                
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
            ->columns([
                //
                TextColumn::make('title')->limit(50)->html()->searchable(),
                TextColumn::make('url')->limit(50)->html()->searchable(),
                // TextColumn::make('content')->limit(50)->html()->searchable(),
                SpatieMediaLibraryImageColumn::make('slider')
                ->collection('sliders')
                ->limit(1)->width(150)->height(50), 
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListSliders::route('/'),
            'create' => Pages\CreateSlider::route('/create'),
            'view' => Pages\ViewSlider::route('/{record}'),
            'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }
}
