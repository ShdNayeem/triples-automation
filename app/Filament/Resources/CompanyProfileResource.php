<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\CompanyProfile;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CompanyProfileResource\Pages;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\CompanyProfileResource\RelationManagers;

class CompanyProfileResource extends Resource
{
    protected static ?string $model = CompanyProfile::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    
    protected static ?string $navigationGroup = 'Admin Management';
    protected static ?int $navigationSort = 4;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Card::make()->schema([
                    SpatieMediaLibraryFileUpload::make('logo')
                            ->collection('logo')        
                            ->maxFiles(3)
                            ->preserveFilenames()
                            ->imageEditor()
                            ->imageResizeMode('cover')
                            ->maxSize(2048)
                            ->imageResizeTargetWidth('600')
                            ->imageResizeTargetHeight('600')
                            ->resize(50),
                            SpatieMediaLibraryFileUpload::make('signature')
                            ->collection('signature') 
                            ->maxFiles(3)
                            ->preserveFilenames()
                            ->imageEditor()
                            ->imageResizeMode('cover')
                            ->maxSize(2048)
                            ->imageResizeTargetWidth('600')
                            ->imageResizeTargetHeight('600')
                            ->resize(50)->required(),
                             TextInput::make('email_1')->label('Primary Email')->required(),
                            TextInput::make('email_2')->label('Email'),
                            TextInput::make('door_no')->label('DoorNo')->numeric(),
                            TextInput::make('street')->label('Street'),
                            TextInput::make('pincode')->label('Pincode')->numeric(),
                            TextInput::make('area')->label('Area'),
                            TextInput::make('city')->label('City'),
                            TextInput::make('state')->label('State'),
                            TextInput::make('country')->label('Country'),
                            TextInput::make('mobile_1')->label('Primary Mobile')->numeric()->length(10)->required(),
                            TextInput::make('mobile_2')->label('Mobile 2')->numeric()->length(10),
                            TextInput::make('landline_1')->label('Landline 1')->numeric(),
                            TextInput::make('landline_2')->label('Landline 2')->numeric(),
                            TextInput::make('GST')->label('GST')->autocapitalize(),
                            TextInput::make('website')->label('WebsiteLink'),
                            TextInput::make('googleBusiness')->label('GoogleBusiness Link'),
                            TextInput::make('facebook')->label('Facebook Link'),
                            TextInput::make('youtube')->label('Youtube Link'),
                            TextInput::make('linkedin')->label('Linkedin Link'),
                            TextInput::make('twitter')->label('Twitter Link'),
                            TextInput::make('instagram')->label('Instagram Link'),

                ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                SpatieMediaLibraryImageColumn::make('logo')
                ->collection('logo')        
                ->width(200)->height(50),
                SpatieMediaLibraryImageColumn::make('signature')
                ->collection('signature') 
                ->width(200)->height(50),
                TextColumn::make('email')->label('Email'),
                TextColumn::make('door_no')->label('DoorNo'),
                TextColumn::make('street')->label('Street'),
                TextColumn::make('pincode')->label('Pincode'),
                TextColumn::make('area')->label('Area'),
                TextColumn::make('city')->label('City'),
                TextColumn::make('state')->label('State'),
                TextColumn::make('country')->label('Country'),
                TextColumn::make('mobile_1')->label('Mobile 1'),
                TextColumn::make('mobile_2')->label('Mobile 2'),
                TextColumn::make('landline_1')->label('Landline 1'),
                TextColumn::make('landline_2')->label('Landline 2'),
                TextColumn::make('GST')->label('GST'),
                TextColumn::make('website')->label('WebsiteLink'),
                TextColumn::make('googleBusiness')->label('GoogleBusiness Link'),
                TextColumn::make('facebook')->label('Facebook Link'),
                TextColumn::make('youtube')->label('Youtube Link'),
                TextColumn::make('linkedin')->label('Linkedin Link'),
                TextColumn::make('twitter')->label('Twitter Link'), 
                TextColumn::make('instagram')->label('Instagram Link'),

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
            'index' => Pages\ListCompanyProfiles::route('/'),
            'create' => Pages\CreateCompanyProfile::route('/create'),
            'edit' => Pages\EditCompanyProfile::route('/{record}/edit'),
        ];
    }
}
