<?php

namespace App\Filament\Resources\RevisionSheetResource\Pages;

use App\Filament\Resources\RevisionSheetResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRevisionSheet extends EditRecord
{
    protected static string $resource = RevisionSheetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
