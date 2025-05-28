<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;


    protected static ?string $navigationIcon = 'heroicon-o-users';
   
    protected static ?string $navigationGroup = 'Product Management';

    protected static ?int $navigationSort = 7;
    
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    // public static function form(Form $form): Form
    // {
    //     return $form
    //         ->schema([
    //             //
    //         ]);
    // }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id')->sortable(),
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('profile.mobile')->label('Mobile'),
                TextColumn::make('profile.GST')->label('GST'),
                TextColumn::make('profile.street')->label('State'),
                TextColumn::make('profile.area')->label('Area'),
                TextColumn::make('profile.city')->label('City'),
                TextColumn::make('profile.state')->label('State'),
                TextColumn::make('profile.country')->label('Country'),
                
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    public static function getEloquentQuery(): Builder{
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
            'index' => Pages\ListCustomers::route('/'),
            // 'create' => Pages\CreateCustomer::route('/create'),
            // 'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
