<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Models\Event;
use App\Models\User;

class EventsController extends Controller
{
    use HasFactory, Notifiable;

    
    public function index()
    {

        $events = User::find( Auth::user()->id )->events()->where('user_id', Auth::user()->id)->get();
        $events->toArray();

        return response()->json([
            'event' => $events
        ],200);

    }

   
    public function store(Request $request)
    {
        
        $event = new Event;

        $event->user_id =  Auth::user()->id;
        $event->content =  $request->content;
        $event->date =  $request->date;
        $event->time =  $request->time;
        $event->save();

        return $event;
    }

    public function getEvents(Request $request)
    {
 
       
        return 0;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
