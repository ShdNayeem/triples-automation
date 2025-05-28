<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\Facades\Blade;




class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = 'Product Management';

    protected static ?int $navigationSort = 5;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id'),
                // TextColumn::make('product_id'),
                TextColumn::make('product.title')->label('Product Name'),
                TextColumn::make('order_payment_id')->label('Order Id'),
                TextColumn::make('method')->label('Mode'),
                TextColumn::make('currency')->label('Currency Type'),
                TextColumn::make('amount')->label('Amount'),
                TextColumn::make('created_at')->label('Purchase Date')->date(),
                BooleanColumn::make('status')->label('Status'),
                BooleanColumn::make('flag')->label('Flag'),
                TextColumn::make('user_email')->label('User Email'),


            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('pdf')
                ->label('PDF')
                ->color('success')
                ->icon('heroicon-o-arrow-down-tray')
                ->url(fn (Order $record) => route('order.pdf.download', $record))
                ->openUrlInNewTab(),

                // ViewAction::make()
                //     ->form([
                //         TextInput::make('id'),
                //         TextInput::make('product.title')->label('Product Name'),
                //         TextInput::make('order_payment_id')->label('Order Id'),
                //         TextInput::make('method')->label('Mode'),
                //         TextInput::make('currency')->label('Currency Type'),
                //         TextInput::make('amount')->label('Amount'),
                //         Toggle::make('status')->label('Status'),
                //         Toggle::make('flag')->label('Flag'),
                //         TextInput::make('user_email')->label('User Email'),

                        // ...
                    // ]),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

public static function getEloquentQuery(): Builder{
        $query = parent::getEloquentQuery();
        return $query->latest();
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            // 'view' => Pages\ViewOrder::route('/{record}'),
            // 'create' => Pages\CreateOrder::route('/create'),
            // 'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return false;
    }
}
