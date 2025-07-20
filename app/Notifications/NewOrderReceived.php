<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewOrderReceived extends Notification implements ShouldQueue
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
                    ->subject('Nuevo pedido recibido - Mi Par Ideal')
                    ->greeting('¡Hola, ' . $notifiable->name . '!')
                    ->line('Has recibido un nuevo pedido con los siguientes detalles:')
                    ->line('**Producto:** ' . $this->order->product->name)
                    ->line('**Cantidad:** ' . $this->order->quantity)
                    ->line('**Comprador:** ' . $this->order->comprador->name)
                    ->line('**Estado:** ' . ucfirst($this->order->status))
                    ->line('**Fecha:** ' . $this->order->created_at->format('d/m/Y'))
                    ->action('Ver pedidos', url('/orders/order'))
                    ->line('Por favor, gestiona el pedido lo antes posible.');
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
