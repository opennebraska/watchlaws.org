<?php

namespace App\Notifications;

use App\Models\Group;
use App\Models\LegiScan\Bill;
use App\Models\LegiScan\BillHistory;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BillHasProgressed extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(public BillHistory $bill_history) {}

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $bill_number = $this->bill_history->bill->number;
        $bill_history_action = $this->bill_history->action;
        $bill_title = $this->bill_history->bill->title;

        $related_groups = Group::query()
            ->hasMember($notifiable)
            ->hasBookmarked(Bill::class, $this->bill_history->bill->id)
            ->get();

        return (new MailMessage)
            ->subject($bill_number.' progress, '.$bill_history_action.' - '.$bill_title)
            ->markdown('mail.bill.hasProgressed',
            [
                'notifiable' => $notifiable,
                'billHistory' => $this->bill_history,
                'related_groups' => $related_groups,
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
