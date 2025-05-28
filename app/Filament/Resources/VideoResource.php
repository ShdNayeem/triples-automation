<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Video;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\HtmlString;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Placeholder;
use App\Filament\Resources\VideoResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\VideoResource\RelationManagers;

class VideoResource extends Resource
{
    protected static ?string $model = Video::class;

    protected static ?string $navigationGroup = 'Product Management';

    public static ?string $label = 'banner video';

    protected static ?int $navigationSort = 6;

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';

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
                // Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListVideos::route('/'),
            'create' => Pages\CreateVideo::route('/create'),
            'view' => Pages\ViewVideo::route('/{record}'),
            'edit' => Pages\EditVideo::route('/{record}/edit'),
        ];
    }
}
