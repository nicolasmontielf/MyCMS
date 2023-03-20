<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Models\Banner;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Forms\Components\{TextInput, Textarea, FileUpload, Toggle, DatePicker, Grid};
use Filament\Tables\Columns\{ImageColumn, BadgeColumn, TextColumn};
use Filament\Tables\Actions\{EditAction, DeleteAction};

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;
    protected static ?string $navigationIcon = 'heroicon-o-photograph';

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
                Grid::make(6)
                ->schema([
                    TextInput::make('title')
                        ->label(__('resources/banner.form.title.label'))
                        ->placeholder(__('resources/banner.form.title.placeholder'))
                        ->autofocus()
                        ->required()
                        ->columnSpan(['sm' => 1, 'lg' => 3])
                        ->maxLength(255),

                    TextInput::make('subtitle')
                        ->label(__('resources/banner.form.subtitle.label'))
                        ->placeholder(__('resources/banner.form.subtitle.placeholder'))
                        ->columnSpan(['sm' => 1, 'lg' => 3])
                        ->maxLength(255),

                    Textarea::make('text')
                        ->label(__('resources/banner.form.text.label'))
                        ->placeholder(__('resources/banner.form.text.placeholder'))
                        ->columnSpan('full'),

                    TextInput::make('cta')
                        ->label(__('resources/banner.form.cta.label'))
                        ->placeholder(__('resources/banner.form.cta.placeholder'))
                        ->columnSpan(['sm' => 1, 'lg' => 3])
                        ->maxLength(255),

                    TextInput::make('cta_url')
                        ->label(__('resources/banner.form.cta_url.label'))
                        ->placeholder(__('resources/banner.form.cta_url.placeholder'))
                        ->columnSpan(['sm' => 1, 'lg' => 3])
                        ->maxLength(255),

                    FileUpload::make('image')
                        ->required()
                        ->label(__('resources/banner.form.image.label'))
                        ->placeholder(__('resources/banner.form.image.placeholder'))
                        ->directory('banners')
                        ->columnSpan(['sm' => 1, 'lg' => 3])
                        ->image(),

                    FileUpload::make('image_responsive')
                        ->label(__('resources/banner.form.image_responsive.label'))
                        ->placeholder(__('resources/banner.form.image_responsive.placeholder'))
                        ->directory('banners')
                        ->columnSpan(['sm' => 1, 'lg' => 3])
                        ->image(),

                    DatePicker::make('start_date')
                        ->displayFormat("d/m/Y")
                        ->label(__('resources/banner.form.start_date.label'))
                        ->columnSpan(['sm' => 1, 'lg' => 2])
                        ->placeholder(__('resources/banner.form.start_date.placeholder')),

                    DatePicker::make('end_date')
                        ->displayFormat("d/m/Y")
                        ->label(__('resources/banner.form.end_date.label'))
                        ->columnSpan(['sm' => 1, 'lg' => 2])
                        ->placeholder(__('resources/banner.form.end_date.placeholder')),

                    Toggle::make('active')
                        ->label(__('resources/banner.form.active.label'))
                        ->columnSpan(['sm' => 1, 'lg' => 2])
                        ->inline(false),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label(__('resources/banner.table.image')),

                ImageColumn::make('image_responsive')
                    ->label(__('resources/banner.table.image_responsive'))
                    ->default(__('resources/banner.aux.image_responsive_default')),

                BadgeColumn::make('active')
                    ->label(__('resources/banner.table.active'))
                    ->enum([
                        '0' => __('resources/banner.aux.inactive'),
                        '1' => __('resources/banner.aux.active'),
                    ]),

                TextColumn::make('start_date')
                    ->label(__('resources/banner.table.start_date'))
                    ->sortable()
                    ->default(__('resources/banner.aux.start_date_default')),

                TextColumn::make('end_date')
                    ->label(__('resources/banner.table.end_date'))
                    ->sortable()
                    ->default(__('resources/banner.aux.end_date_default')),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make()
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
