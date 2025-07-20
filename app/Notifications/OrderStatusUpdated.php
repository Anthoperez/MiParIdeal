<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderStatusUpdated extends Notification implements ShouldQueue
{
    use Queueable;

    protected $order;

    /**
     * Create a new notification instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Actualización de tu pedido - Mi Par Ideal')
                    ->greeting('¡Hola, ' . $notifiable->name . '!')
                    ->line('El estado de tu pedido ha sido actualizado:')
                    ->line('**Producto:** ' . $this->order->product->name)
                    ->line('**Cantidad:** ' . $this->order->quantity)
                    ->line('**Nuevo estado:** ' . ucfirst($this->order->status))
                    ->line('**Fecha del pedido:** ' . $this->order->created_at->format('d/m/Y'))
                    ->action('Ver tus pedidos', url('/orders'))
                    ->line('Gracias por confiar en Mi Par Ideal.');
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
