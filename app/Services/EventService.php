<?php

namespace App\Services;

use App\Models\{Event, User};

class EventService
{
    public static function userSubscribeOnEvent(User $user, Event $event)
    {
        return $user->events()->where('id', $event->id)->exists();
    }

    public static function eventStartDateHasPassed(Event $event)
    {
        return $event->start_date < now();
    }

    public static function eventEndDateHasPassed(Event $event)
    {
        return $event->end_date < now();
    }

    public static function eventParticipantLimitHasReached(Event $event)
    {
        return $event->users->count() === $event->participants_limit;
    }

    public static function userIsPresentOnEvent(Event $event, User $user)
    {
        $subscription = $event->users()->where('user_id', $user->id)->first();

        if(!$subscription){
            return false;
        }

        if($subscription->pivot->present){
            return true;
        }

        return false;
    }
}