<?php

namespace App\Filament\Resources\BlogTagResource\Pages;

use App\Filament\Resources\BlogTagResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBlogTag extends EditRecord
{
    protected static string $resource = BlogTagResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
