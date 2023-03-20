<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogCategoryResource\Pages;
use App\Models\BlogCategory;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Forms\Components\{TextInput, Textarea};
use Filament\Tables\Columns\{TextColumn};
use Filament\Tables\Actions\{EditAction, DeleteAction};

class BlogCategoryResource extends Resource
{
    protected static ?string $model = BlogCategory::class;
    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static function getNavigationLabel(): string {
        return __('resources/blog_category.navigation.label');
    }

    protected static function getNavigationGroup(): string {
        return __('resources/blog_category.navigation.group');
    }

    public static function getModelLabel(): string {
        return __('resources/blog_category.label');
    }

    public static function getPluralModelLabel(): string {
        return __('resources/blog_category.labelPlural');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('resources/blog_category.forms.name.label'))
                    ->placeholder(__('resources/blog_category.forms.name.placeholder'))
                    ->autofocus()
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->label(__('resources/blog_category.forms.description.label'))
                    ->placeholder(__('resources/blog_category.forms.description.placeholder'))
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('resources/blog_category.table.name'))
                    ->sortable()
                    ->searchable(),

                TextColumn::make('slug')
                    ->label(__('resources/blog_category.table.slug'))
                    ->sortable(),

                TextColumn::make('posts_count')
                    ->label(__('resources/blog_category.table.posts_count'))
                    ->counts('posts'),

                TextColumn::make('updated_at')
                    ->label(__('resources/blog_category.table.updated_at'))
                    ->sortable()
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make()
                    ->disabled(fn($record) => $record->posts_count > 0)

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
            'index' => Pages\ListBlogCategories::route('/'),
            'create' => Pages\CreateBlogCategory::route('/create'),
            'edit' => Pages\EditBlogCategory::route('/{record}/edit'),
        ];
    }
}
