<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogCategoryResource\Pages;
use App\Models\BlogCategory;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                Forms\Components\TextInput::make('name')
                    ->label(__('resources/blog_category.forms.name.label'))
                    ->placeholder(__('resources/blog_category.forms.name.placeholder'))
                    ->autofocus()
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('description')
                    ->label(__('resources/blog_category.forms.description.label'))
                    ->placeholder(__('resources/blog_category.forms.description.placeholder'))
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('resources/blog_category.table.name'))
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('slug')
                    ->label(__('resources/blog_category.table.slug'))
                    ->sortable(),

                Tables\Columns\TextColumn::make('posts_count')
                    ->label(__('resources/blog_category.table.posts_count'))
                    ->counts('posts'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('resources/blog_category.table.updated_at'))
                    ->sortable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
