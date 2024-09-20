<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Tareas;

class TareaNotification extends Notification
{
    use Queueable;
    public $tareas;
    public $accion;

    /**
     * Create a new notification instance.
     */
    public function __construct(Tareas $tareas, $accion) // Acepta la tarea en el constructor
    {
        $this->tareas = $tareas;
        $this->accion = $accion;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        //NOTIFICAR CUANDO SE CREA UNA TAREA
        if($this->accion === 'crear'){
            return (new MailMessage)
            ->line('Has creado una nueva tarea: ' . $this->tareas->titulo)
            ->action('Ver Tarea', url('/tareas' . '/'.$this->tareas->id))
            ->line('Gracias por usar nuestro sistema de gestión de tareas!');

        }elseif($this->accion === 'completado'){//NOTIFICAR QUE UNA TAREA SE VA A COMPLETAR PARA QUE EL USUARIO LO CONFIRME
            $url = url('/tareas/confirmar/' . $this->tareas->codigo_confirmacion);

            return (new MailMessage)
                ->line('¿Esta Seguro que Desea completar la Tarea: "' . $this->tareas->titulo . '" ?')
                ->action('Confirmar Proceso', $url)
                ->line('Gracias por usar nuestro sistema de gestión de tareas!');
        }
        
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
