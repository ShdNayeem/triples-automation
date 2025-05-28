<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use App\Models\Format;
use App\Models\Product;
use Filament\Forms\Get;
use Filament\Forms\Set;
use App\Models\Category;
use Filament\Forms\Form;
use App\Models\Component;
use Filament\Tables\Table;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Forms\Components\BelongsToSelect;
use App\Filament\Resources\ProductResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\ProductResource\RelationManagers;


class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationGroup = 'Product Management';

    protected static ?int $navigationSort = 3;


    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Card::make()->schema([
                    BelongsToSelect::make('category_id')->required()->relationship('category', 'name')->live(),
                    BelongsToSelect::make('subcategory_id')->required()->relationship('subcategory', 'name')
                        ->options(fn(Get $get): array => Subcategory::query()
                            ->where('category_id', $get('category_id'))
                            ->pluck('name', 'id')->toArray()),

                    TextInput::make('title')->default('BAS Category')->unique(ignorable: fn($record) => $record)->required(),
                    TextInput::make('slug')->unique(ignorable: fn($record) => $record)->required(),

                    TextInput::make('product_id')->placeholder('0'),
                    // TextInput::make('title')
                    //     ->lazy()
                    //     ->reactive()
                    //     ->afterStateUpdated(function (Closure $set, $state) {
                    //         $set('slug', Str::slug($state));
                    //     })->required()->unique(ignoreRecord: true),
                    // TextInput::make('slug')->required(),
                    SpatieMediaLibraryFileUpload::make('thumbnail')
                        ->collection('product')
                        ->multiple()
                        ->preserveFilenames()
                        ->imageEditor()
                        ->imageResizeMode('cover')
                        // ->maxSize(1024)
                        // ->imageResizeTargetWidth('600')
                        // ->imageResizeTargetHeight('600')
                        // ->resize(50)
                        ->required(),
                    FileUpload::make('product_attachments')
                        ->preserveFilenames()
                        ->maxSize(12288)
                        // ->acceptedFileTypes(['application/x-zip-compressed', 'application/vnd.rar', 'application/octet-stream'])
                        ->acceptedFileTypes(['application/zip', 'application/octet-stream', 'application/x-compressed', 'application/x-zip-compressed', 'multipart/x-zip', 'application/rar', 'application/x-rar-compressed', 'application/vnd.rar', 'application/x-rar'])
                        ->hint('Accepeted File Types Zip/Rar')
                        ->hintIcon('heroicon-s-arrow-down-on-square')
                        ->hintColor('danger'),
                    // ->multiple()
                    // ->imageEditor()
                    // ->imageResizeMode('cover')
                    // ->imageResizeTargetWidth('600')
                    // ->imageResizeTargetHeight('600')
                    // ->resize(50)
                    // ->storeFileNamesIn('product_attachments'),
                    TagsInput::make('available_size')->label('Available Size')->required(),
                    RichEditor::make('description')->maxLength(17000)->required(),
                    TextInput::make('price')->label('Price')->numeric()->numeric()
                        ->inputMode('decimal')->required(),
                    TextInput::make('offer_price')->label('Offer Price')->numeric()
                        ->inputMode('decimal')->required(),
                    Repeater::make('ProductComponent')
                        ->label('Add Components to Products')
                        ->relationship()
                        ->schema([

                            Select::make('component_id')
                                ->label('Component')
                                ->options(Component::all()->pluck('comp_name', 'id'))->live()
                                ->required()
                                ->searchable()->disableOptionsWhenSelectedInSiblingRepeaterItems(),
                            Select::make('format_id')
                                ->label('Format')
                                ->options(Format::all()->pluck('type', 'id'))->live()
                                ->required()
                                ->searchable(),

                        ])
                        ->collapsible()->reorderable(true)->reorderableWithButtons()->reorderableWithDragAndDrop(true)->addActionLabel('Add Component')->columns(2),
                    Toggle::make('is_published'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('product_id')
            ->reorderable('product_id')
            ->columns([
                //
                TextColumn::make('id')->sortable(),
                TextColumn::make('category.name'),
                TextColumn::make('subcategory.name'),
                TextColumn::make('title')->limit(50)->sortable()->searchable(),
                SpatieMediaLibraryImageColumn::make('thumbnail')
                    ->collection('product')->limit(1)->width(150)->height(50),
                TextColumn::make('price')->limit(50)->sortable()->searchable(),
                TextColumn::make('offer_price')->limit(50)->sortable()->searchable(),
                BooleanColumn::make('is_published'),
            ])
            ->filters([
                //
                Filter::make('Published')
                    ->query(fn(Builder $query): Builder => $query->where('is_published', true))
                    ->label('Published')
                    ->toggle(),
                Filter::make('Unpublished')
                    ->query(fn(Builder $query): Builder => $query->where('is_published', false))
                    ->label('Unpublished')
                    ->toggle(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        return $query->latest();
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
