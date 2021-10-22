<?php

namespace App\Http\Controllers\Organization\Event;

use App\Http\Controllers\Controller;
use App\Models\{Event, User};
use App\Services\EventService;
use Illuminate\Support\Facades\DB;

class EventPresenceController extends Controller
{
    public function __invoke(Event $event, User $user)
    {
        if(!EventService::eventStartDateHasPassed($event)){
            return back()->with(
                'warning',
                'Operação inválida! O evento ainda não iniciou'
            );
        }

        if(!EventService::userSubscribeOnEvent($user, $event)){
            return back()->with(
                'warning',
                'Operação inválida! Usuário não está inscrito no evento!'
            );
        }

        $userIsPresentOnEvent = EventService::userIsPresentOnEvent($event, $user);

        DB::table('event_user')
            ->where('event_id', $event->id)
            ->where('user_id', $user->id)
            ->update([
                'present' => $userIsPresentOnEvent ? 0 : 1
        ]);
        
        return back()->with(
            'success',
            $userIsPresentOnEvent ? 'Presença removida com sucesso!' : 'Presença assinada com sucesso!'
        );
    }
}
