<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\{TextInput, Select, Grid};
use Filament\Tables\Columns\{TextColumn};
use Filament\Tables\Actions\{EditAction, DeleteAction};

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
                Grid::make([
                    'sm' => 1,
                    'lg' => 2,
                ])
                ->schema([
                    TextInput::make('document')
                        ->label(__('resources/user.forms.document.label'))
                        ->placeholder(__('resources/user.forms.document.placeholder'))
                        ->columnSpan([ 'sm' => 1, 'lg' => 2 ])
                        ->maxLength(15),

                    TextInput::make('first_name')
                        ->label(__('resources/user.forms.firstName.label'))
                        ->placeholder(__('resources/user.forms.firstName.placeholder'))
                        ->autofocus()
                        ->required()
                        ->columnSpan([ 'sm' => 1, 'lg' => 1 ])
                        ->maxLength(100),

                    TextInput::make('last_name')
                        ->label(__('resources/user.forms.lastName.label'))
                        ->placeholder(__('resources/user.forms.lastName.placeholder'))
                        ->required()
                        ->columnSpan([ 'sm' => 1, 'lg' => 1 ])
                        ->maxLength(100),

                    TextInput::make('email')
                        ->label(__('resources/user.forms.email.label'))
                        ->placeholder(__('resources/user.forms.email.placeholder'))
                        ->type('email')
                        ->required()
                        ->columnSpan([ 'sm' => 1, 'lg' => 1 ])
                        ->maxLength(255),

                    TextInput::make('password')
                        ->label(__('resources/user.forms.password.label'))
                        ->placeholder(__('resources/user.forms.role.placeholder'))
                        ->type('password')
                        ->required()
                        ->visibleOn('create')
                        ->columnSpan([ 'sm' => 1, 'lg' => 1 ])
                        ->maxLength(255),

                    TextInput::make('phone')
                        ->label(__('resources/user.forms.phone.label'))
                        ->placeholder(__('resources/user.forms.phone.placeholder'))
                        ->columnSpan([ 'sm' => 1, 'lg' => 1 ])
                        ->maxLength(20),

                    Select::make('role_id')
                        ->relationship('role', 'name')
                        ->label(__('resources/user.forms.role.label'))
                        ->placeholder(__('resources/user.forms.role.placeholder'))
                        ->required()
                        ->preload()
                        ->columnSpan([ 'sm' => 1, 'lg' => 1 ])
                        ->visibleOn('create')
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('fullName')
                    ->label(__('resources/user.table.name'))
                    ->sortable()
                    ->searchable(),

                TextColumn::make('email')
                    ->label(__('resources/user.table.email'))
                    ->sortable()
                    ->searchable(),

                TextColumn::make('role.name')
                    ->label(__('resources/user.table.role'))
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
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
