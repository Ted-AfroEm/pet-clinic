<?php

namespace App\Filament\Resources\Pets\Schemas;

use App\Enums\PetSpecies;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;


class PetForm
{
    public static function configure(Schema $schema): Schema
    {

        return $schema
            ->components([
                FileUpload::make('avatar')->avatar(),
                TextInput::make('name')
                    ->required(),
                DatePicker::make('date_of_birth')->native(false),
                Select::make('species')
                    ->options(PetSpecies::class)
                    ->native(false)
                    ->required(),
                Select::make('owner_id')
                    ->relationship('owner', 'name')
                    ->required(),
            ]);
    }
}
