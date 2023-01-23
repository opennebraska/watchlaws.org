<?php

namespace App\Notifications;

use App\Models\Group;
use Illuminate\Bus\Queueable;
use App\Models\LegiScan\Bill\History;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class BillHasProgressed extends Notification
{
    use Queueable;

    public function __construct(public History $history)
    {
    }

    public function via($user)
    {
        return ['mail'];
    }

    public function toMail($user)
    {
        $number = $this->history->bill->number;
        $action = $this->history->action;
        $title  = $this->history->bill->title;

        $groups = Group::query()
            ->hasMember($user)
            ->hasBookmarked($this->history->bill)
            ->get();

        return (new MailMessage)
            ->subject($number . ' progress, ' . $action . ' - ' . $title)
            ->markdown(
                'mail.bill.hasProgressed',
                [
                    'notifiable'    => $user,
                    'history'       => $this->history,
                    'relatedGroups' => $groups,
                ]
            );
    }
}
