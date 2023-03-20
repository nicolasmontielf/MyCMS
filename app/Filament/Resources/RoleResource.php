<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoleResource\Pages;
use App\Models\Role;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\{TextInput, CheckboxList, Grid};
use Filament\Tables\Columns\{TextColumn};
use Filament\Tables\Actions\{EditAction, DeleteAction};

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static function getNavigationLabel(): string {
        return __('resources/role.navigation.label');
    }

    protected static function getNavigationGroup(): string {
        return __('resources/role.navigation.group');
    }

    public static function getModelLabel(): string {
        return __('resources/role.label');
    }

    public static function getPluralModelLabel(): string {
        return __('resources/role.labelPlural');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(1)
                ->schema([
                    TextInput::make('name')
                        ->label(__('resources/role.forms.name.label'))
                        ->placeholder(__('resources/role.forms.name.placeholder'))
                        ->autofocus()
                        ->required()
                        ->maxLength(255),

                    CheckboxList::make('permissions')
                        ->label(__('resources/role.forms.permissions.label'))
                        ->relationship('permissions', 'name')
                        ->columnSpan('full')
                        ->columns([ 'sm' => 1, 'md' => 2, 'lg' => 3 ])
                        ->required()
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('resources/role.table.name'))
                    ->sortable()
                    ->searchable(),

                TextColumn::make('users2_count')
                    ->label(__('resources/role.table.users2_count'))
                    ->counts('users2'),

                TextColumn::make('permissions_count')
                    ->label(__('resources/role.table.permissions_count'))
                    ->counts('permissions'),

                TextColumn::make('updated_at')
                    ->label(__('resources/role.table.updated_at'))
                    ->sortable()
                    ->searchable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make()
                    ->disabled(fn($record) => $record->users2()->count() > 0)
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
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('name', '<>', Role::SUPER_ADMIN);
    }
}
