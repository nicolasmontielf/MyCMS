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
    protected static ?string $navigationLabel = 'Posts';
    protected static ?string $navigationIcon = 'heroicon-o-pencil';
    protected static ?string $navigationGroup = 'Blogs';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->autofocus()
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('category_id')
                    ->label('Blog Category')
                    ->relationship('category', 'name')
                    ->required(),

                Forms\Components\TextInput::make('subtitle')
                    ->nullable()
                    ->maxLength(255),

                Forms\Components\RichEditor::make('body')
                    ->required()
                    ->columnSpan('full'),

                Forms\Components\Select::make('tags')
                    ->multiple()
                    ->preload()
                    ->relationship('tags', 'name')
                    ->createOptionForm(function () {
                        $user = Auth::user();
                        return $user->hasPermissions('blog_tag.create')
                        ? [
                            Forms\Components\TextInput::make('name')
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
                    ->label('Post title')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.fullName')
                    ->label('Author')
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
