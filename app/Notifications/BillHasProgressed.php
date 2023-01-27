<?php

namespace App\Notifications;

use App\Models\Group;
use App\Models\LegiScan\Bill\History;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

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

        // dd($this->history->bill->number);

        $groups = collect();
        foreach ($user->groups as $group) {
            if ($this->history->bill->bookmarks()->perGroup($group)->count()) {
                $groups->push($group);
            }
        }

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
