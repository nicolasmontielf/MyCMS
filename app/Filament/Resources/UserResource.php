<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static function getNavigationLabel(): string {
        return __('resources/user.navigation.label');
    }

    protected static function getNavigationGroup(): string {
        return __('resources/user.navigation.group');
    }

    public static function getModelLabel(): string {
        return __('resources/user.label');
    }

    public static function getPluralModelLabel(): string {
        return __('resources/user.labelPlural');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('document')
                    ->label(__('resources/user.forms.document.label'))
                    ->placeholder(__('resources/user.forms.document.placeholder'))
                    ->maxLength(15),

                Forms\Components\TextInput::make('first_name')
                    ->label(__('resources/user.forms.firstName.label'))
                    ->placeholder(__('resources/user.forms.firstName.placeholder'))
                    ->autofocus()
                    ->required()
                    ->maxLength(100),

                Forms\Components\TextInput::make('last_name')
                    ->label(__('resources/user.forms.lastName.label'))
                    ->placeholder(__('resources/user.forms.lastName.placeholder'))
                    ->required()
                    ->maxLength(100),

                Forms\Components\TextInput::make('email')
                    ->label(__('resources/user.forms.email.label'))
                    ->placeholder(__('resources/user.forms.email.placeholder'))
                    ->type('email')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('password')
                    ->label(__('resources/user.forms.password.label'))
                    ->placeholder(__('resources/user.forms.role.placeholder'))
                    ->type('password')
                    ->required()
                    ->visibleOn('create')
                    ->maxLength(255),

                Forms\Components\TextInput::make('phone')
                    ->label(__('resources/user.forms.phone.label'))
                    ->placeholder(__('resources/user.forms.phone.placeholder'))
                    ->maxLength(20),

                Forms\Components\Select::make('role_id')
                    ->relationship('role', 'name')
                    ->label(__('resources/user.forms.role.label'))
                    ->placeholder(__('resources/user.forms.role.placeholder'))
                    ->required()
                    ->preload()
                    ->visibleOn('create')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fullName')
                    ->label(__('resources/user.table.name'))
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->label(__('resources/user.table.email'))
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('role.name')
                    ->label(__('resources/user.table.role'))
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                //Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('email', '!=', 'nicolasmontielf@gmail.com');
    }
}
