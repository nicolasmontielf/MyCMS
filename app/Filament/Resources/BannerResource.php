<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Filament\Resources\BannerResource\RelationManagers;
use App\Models\Banner;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;
    //protected static ?string $navigationIcon = 'heroicon-o-image';

    protected static function getNavigationLabel(): string {
        return __('resources/banner.navigation.label');
    }

    public static function getModelLabel(): string {
        return __('resources/banner.label');
    }

    public static function getPluralModelLabel(): string {
        return __('resources/banner.labelPlural');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label(__('resources/banner.form.title.label'))
                    ->placeholder(__('resources/banner.form.title.placeholder'))
                    ->autofocus()
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('subtitle')
                    ->label(__('resources/banner.form.subtitle.label'))
                    ->placeholder(__('resources/banner.form.subtitle.placeholder'))
                    ->maxLength(255),

                Forms\Components\Textarea::make('text')
                    ->label(__('resources/banner.form.text.label'))
                    ->placeholder(__('resources/banner.form.text.placeholder'))
                    ->columnSpan('full'),

                Forms\Components\TextInput::make('cta')
                    ->label(__('resources/banner.form.cta.label'))
                    ->placeholder(__('resources/banner.form.cta.placeholder'))
                    ->maxLength(255),

                Forms\Components\TextInput::make('cta_url')
                    ->label(__('resources/banner.form.cta_url.label'))
                    ->placeholder(__('resources/banner.form.cta_url.placeholder'))
                    ->maxLength(255),

                Forms\Components\FileUpload::make('image')
                    ->required()
                    ->label(__('resources/banner.form.image.label'))
                    ->placeholder(__('resources/banner.form.image.placeholder'))
                    ->directory('banners')
                    ->image(),

                Forms\Components\FileUpload::make('image_responsive')
                    ->label(__('resources/banner.form.image_responsive.label'))
                    ->placeholder(__('resources/banner.form.image_responsive.placeholder'))
                    ->directory('banners')
                    ->image(),

                Forms\Components\Toggle::make('active')
                    ->label(__('resources/banner.form.active.label'))
                    ->inline(false),

                Forms\Components\DatePicker::make('start_date')
                    ->label(__('resources/banner.form.start_date.label'))
                    ->placeholder(__('resources/banner.form.start_date.placeholder')),

                Forms\Components\DatePicker::make('end_date')
                    ->label(__('resources/banner.form.end_date.label'))
                    ->placeholder(__('resources/banner.form.end_date.placeholder'))
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label(__('resources/banner.table.image')),

                Tables\Columns\ImageColumn::make('image_responsive')
                    ->label(__('resources/banner.table.image_responsive')),

                Tables\Columns\BadgeColumn::make('active')
                    ->enum([
                        '0' => __('resources/banner.aux.inactive'),
                        '1' => __('resources/banner.aux.active'),
                    ]),

                Tables\Columns\TextColumn::make('start_date')
                    ->label(__('resources/banner.table.start_date'))
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('end_date')
                    ->label(__('resources/banner.table.end_date'))
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}
