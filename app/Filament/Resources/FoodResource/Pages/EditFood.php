<?php

namespace App\Filament\Resources\FoodResource\Pages;

use App\Filament\Resources\FoodResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFood extends EditRecord
{
    protected static string $resource = FoodResource::class;
    protected static ?string $title = '1233';

    public function getTitle(): string
    {
        return '12333';
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->slideOver(),
        ];
    }
}
