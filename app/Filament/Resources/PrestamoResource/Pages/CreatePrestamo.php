<?php

namespace App\Filament\Resources\PrestamoResource\Pages;

use App\Filament\Resources\PrestamoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreatePrestamo extends CreateRecord
{
    protected static string $resource = PrestamoResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');  //redirige a la vista listado de libros
    }

    //para bloquera el mensaje ya existente
    protected function getCreatedNotification(): ?Notification
    {
        return null;
    }

    //nuevo mensaje para la alta del prestamo
    protected function afterCreate()
    {
        Notification::make()->title('Prestamo exitoso')->body('El nuevo prestamo se ingreso a la base de datos de la manera correcta.')->success()->send();
       
    }
}
