<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogPostResource\Pages;
use App\Filament\Resources\BlogPostResource\RelationManagers;
use App\Models\BlogPost;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BlogPostResource extends Resource
{
    protected static ?string $model = BlogPost::class;
    protected static ?string $navigationIcon = 'heroicon-o-pencil';

    protected static function getNavigationLabel(): string {
        return __('resources/blog_post.navigation.label');
    }

    protected static function getNavigationGroup(): string {
        return __('resources/blog_post.navigation.group');
    }

    public static function getModelLabel(): string {
        return __('resources/blog_post.label');
    }

    public static function getPluralModelLabel(): string {
        return __('resources/blog_post.labelPlural');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label(__('resources/blog_post.form.title.label'))
                    ->placeholder(__('resources/blog_post.form.title.placeholder'))
                    ->autofocus()
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('category_id')
                    ->label(__('resources/blog_post.form.category.label'))
                    ->placeholder(__('resources/blog_post.form.category.placeholder'))
                    ->relationship('category', 'name')
                    ->required(),

                Forms\Components\TextInput::make('subtitle')
                    ->label(__('resources/blog_post.form.subtitle.label'))
                    ->placeholder(__('resources/blog_post.form.subtitle.placeholder'))
                    ->nullable()
                    ->maxLength(255),

                Forms\Components\RichEditor::make('body')
                    ->label(__('resources/blog_post.form.body.label'))
                    ->placeholder(__('resources/blog_post.form.body.placeholder'))
                    ->required()
                    ->columnSpan('full'),

                Forms\Components\Select::make('tags')
                    ->label(__('resources/blog_post.form.tags.label'))
                    ->placeholder(__('resources/blog_post.form.tags.placeholder'))
                    ->multiple()
                    ->preload()
                    ->relationship('tags', 'name')
                    ->createOptionForm(function () {
                        $user = Auth::user();
                        return $user->hasPermissions('blog_tag.create') || $user->isSuperAdmin()
                        ? [
                            Forms\Components\TextInput::make('name')
                                ->label(__('resources/blog_post.form.new_tag.label'))
                                ->placeholder(__('resources/blog_post.form.new_tag.placeholder'))
                                ->autofocus()
                                ->required()
                        ]
                        : [];
                    })

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label(__('resources/blog_post.table.name'))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label(__('resources/blog_post.table.category'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.fullName')
                    ->label(__('resources/blog_post.table.author'))
                    ->searchable(),

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
            'index' => Pages\ListBlogPosts::route('/'),
            'create' => Pages\CreateBlogPost::route('/create'),
            'edit' => Pages\EditBlogPost::route('/{record}/edit'),
        ];
    }
}
