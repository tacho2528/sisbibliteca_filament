<?php

namespace App\Filament\Resources\LibroResource\Pages;

use App\Filament\Resources\LibroResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditLibro extends EditRecord
{
    protected static string $resource = LibroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->successNotification(Notification::make()->title('Libro eliminado')->body('el libro se elimino exitosamente')->success()),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');  //redirige a la vista listado de libros
    }

    //para bloquera el mensaje ya existente
    protected function getSavedNotification(): ?Notification
    {
        return null;
    }

    //nuevo mensaje para la alta del libro
    protected function afterSave()
    {
        Notification::make()->title('Libro actualizado exitosamente')->body('El nuevo libro se actualizo en base de datos de la manera correcta.')->success()->send();
       
    }
}
