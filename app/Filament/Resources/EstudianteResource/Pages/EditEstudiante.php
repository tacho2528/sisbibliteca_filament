<?php

namespace App\Filament\Resources\EstudianteResource\Pages;

use App\Filament\Resources\EstudianteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditEstudiante extends EditRecord
{
    protected static string $resource = EstudianteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->successNotification(Notification::make()->title('Estudiante eliminado')->body('El estudiante se elimino exitosamente')->success()),
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
        Notification::make()->title('Estudiante actualizado exitosamente')->body('El nuevo estudiante se actualizo en base de datos de la manera correcta.')->success()->send();
       
    }
}
