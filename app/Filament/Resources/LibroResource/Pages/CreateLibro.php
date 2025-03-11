<?php

namespace App\Filament\Resources\LibroResource\Pages;

use App\Filament\Resources\LibroResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateLibro extends CreateRecord
{
    protected static string $resource = LibroResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');  //redirige a la vista listado de libros
    }

    //para bloquera el mensaje ya existente
    protected function getCreatedNotification(): ?Notification
    {
        return null;
    }

    //nuevo mensaje para la alta del libro
    protected function afterCreate()
    {
        Notification::make()->title('Libro creado exitosamente')->body('El nuevo libro se ingreso a la base de datos de la manera correcta.')->success()->send();
       
    }
}
