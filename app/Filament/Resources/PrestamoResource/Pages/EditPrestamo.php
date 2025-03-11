<?php

namespace App\Filament\Resources\PrestamoResource\Pages;

use App\Filament\Resources\PrestamoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditPrestamo extends EditRecord
{
    protected static string $resource = PrestamoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->successNotification(Notification::make()->title('Prestamo eliminado')->body('el prestamo se elimino exitosamente')->success()),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');  //redirige a la vista listado de prestamos
    }

    //para bloquera el mensaje ya existente
    protected function getSavedNotification(): ?Notification
    {
        return null;
    }

    //nuevo mensaje para la alta del libro
    protected function afterSave()
    {
        Notification::make()->title('Prestamo actualizado exitosamente')->body('El prestamo se actualizo en base de datos de la manera correcta.')->success()->send();
       
    }
}
