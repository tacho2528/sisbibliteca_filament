<?php

namespace App\Filament\Resources\EstudianteResource\Pages;

use App\Filament\Resources\EstudianteResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateEstudiante extends CreateRecord
{
    protected static string $resource = EstudianteResource::class;

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
        Notification::make()->title('Estudiante creado exitosamente')->body('El nuevo estudiante se ingreso a la base de datos de la manera correcta.')->success()->send();
       
    }
}
