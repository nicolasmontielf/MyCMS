<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogTagResource\Pages;
use App\Models\BlogTag;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Forms\Components\{TextInput};
use Filament\Tables\Columns\{TextColumn};
use Filament\Tables\Actions\{DeleteAction};
use Str;

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
                TextInput::make('name')
                    ->label(__('resources/blog_tag.form.name.label'))
                    ->placeholder(__('resources/blog_tag.form.name.placeholder'))
                    ->autofocus()
                    ->required()
                    ->lazy()
                    ->afterStateUpdated(function (string $context, $state, callable $set) {
                        $context === 'create' ? $set('slug', Str::slug($state)) : null;
                    })
                    ->maxLength(255),

                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->unique(BlogTag::class, 'slug', ignoreRecord: true)
                    ->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('resources/blog_tag.table.name'))
                    ->sortable()
                    ->searchable(),

                TextColumn::make('slug')
                    ->label(__('resources/blog_tag.table.slug'))
                    ->sortable(),

                TextColumn::make('posts_count')
                    ->label(__('resources/blog_tag.table.posts_count'))
                    ->counts('posts'),

                TextColumn::make('updated_at')
                    ->label(__('resources/blog_tag.table.updated_at'))
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                DeleteAction::make()
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
