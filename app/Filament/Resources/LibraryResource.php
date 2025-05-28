<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LibraryResource\Pages;
use App\Filament\Resources\LibraryResource\RelationManagers;
use App\Models\Library;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Illuminate\Support\HtmlString;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Placeholder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LibraryResource extends Resource
{
    protected static ?string $model = Library::class;

    protected static ?string $navigationGroup = 'Product Management';

    public static ?string $label = 'library video';

    protected static ?int $navigationSort = 11;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                
                TextInput::make('url')
                    ->prefix('Youtube Url')
                    ->suffixIcon('heroicon-m-globe-alt')
                    // ->helperText('Notes:- Copy Youtube Url - Refer Image Below  🔽')
                    // ->helperText('How to copy youtube url? Reference Image at right ->')
                    ->required(),
                    Placeholder::make('')
                    ->hint('Notes:- Right Click Youtube Video Select ( Copy Video url  ) - Refer Image Below ')
                    ->hintIcon('heroicon-s-arrow-down-on-square')
                    ->hintColor('danger')
                    ->content(function ($record): HtmlString {
                       return new HtmlString("<img src= '/assets/img/copy_video_url.jpg' >");
                    
                 })
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                
                TextColumn::make('url')->limit(100)->sortable()->searchable(),
                TextColumn::make('created_at')->dateTime()
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
            'index' => Pages\ListLibraries::route('/'),
            'create' => Pages\CreateLibrary::route('/create'),
            'edit' => Pages\EditLibrary::route('/{record}/edit'),
        ];
    }
}
