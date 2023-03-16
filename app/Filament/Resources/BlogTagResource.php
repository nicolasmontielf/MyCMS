<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogTagResource\Pages;
use App\Filament\Resources\BlogTagResource\RelationManagers;
use App\Models\BlogTag;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BlogTagResource extends Resource
{
    protected static ?string $model = BlogTag::class;
    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static function getNavigationLabel(): string {
        return __('resources/blog_tag.navigation.label');
    }

    protected static function getNavigationGroup(): string {
        return __('resources/blog_tag.navigation.group');
    }

    public static function getModelLabel(): string {
        return __('resources/blog_tag.label');
    }

    public static function getPluralModelLabel(): string {
        return __('resources/blog_tag.labelPlural');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('resources/blog_tag.form.name.label'))
                    ->placeholder(__('resources/blog_tag.form.name.placeholder'))
                    ->autofocus()
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('resources/blog_tag.table.name'))
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('slug')
                    ->label(__('resources/blog_tag.table.slug'))
                    ->sortable(),

                Tables\Columns\TextColumn::make('posts_count')
                    ->label(__('resources/blog_tag.table.posts_count'))
                    ->counts('posts'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('resources/blog_tag.table.updated_at'))
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make()
                    ->disabled(fn($record) => $record->posts_count > 0)
            ])
            ->bulkActions([
                //Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageBlogTags::route('/'),
        ];
    }
}
