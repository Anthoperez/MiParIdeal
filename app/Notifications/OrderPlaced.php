<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderPlaced extends Notification implements ShouldQueue
{
    use Queueable;

    protected $order;

    /**
     * Create a new notification instance.
     */
    public function __construct(Order $order)
    {
        $this->order=$order;
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
                    ->subject('Confirmación de tu pedido - Mi Par Ideal')
                    ->greeting('¡Hola, ' . $notifiable->name . '!')
                    ->line('Hemos recibido tu pedido con los siguientes detalles:')
                    ->line('**Producto:** ' . $this->order->product->name)
                    ->line('**Cantidad:** ' . $this->order->quantity)
                    ->line('**Precio unitario:** $' . number_format($this->order->product->price, 2))
                    ->line('**Total:** $' . number_format($this->order->product->price * $this->order->quantity, 2))
                    ->line('**Estado:** ' . ucfirst($this->order->status))
                    ->line('**Fecha:** ' . $this->order->created_at->format('d/m/Y'))
                    ->action('Ver tus pedidos', url('/orders'))
                    ->line('Gracias por comprar en Mi Par Ideal.');
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
