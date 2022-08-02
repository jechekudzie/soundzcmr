<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccreditedInstitution;
use App\Models\Episode;
use App\Models\EpisodeParticipant;
use App\Models\Event;
use Illuminate\Http\Request;
use function Sodium\add;
use function Symfony\Component\String\toString;

class EpisodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Event $event)
    {
        //
        return view('admin.episodes.index', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event)
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Event $event)
    {
        //
        $episode = request()->validate([
            'link' => 'required',
            'episode_number' => 'required',
        ]);

        $event->add_episode($episode);

        return back()->with('message', 'Episode added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Episode $episode)
    {
        //
        $event_participants = $episode->event->event_participants;

        return view('admin.episodes.show', compact('episode', 'event_participants'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function store_contestants(Episode $episode)
    {
        //
        $event_participants = request('event_participant_id');
        //dd($event_participants);
        $found = array();

        foreach ($event_participants as $event_participant_id) {
            $episode_participant['event_participant_id'] = $event_participant_id;
            $episode_participant['episode_id'] = $episode->id;

            if ($participant = EpisodeParticipant::where('episode_id', $episode->id)->where('event_participant_id', $event_participant_id)->first()) {
                $found [] = $participant->event_participant->name;
            } else {
                EpisodeParticipant::create($episode_participant);
            }

        }


        if (!empty($found)) {
            $message = 'Please note that the following participant were already added for this episode, so we did not add them: ' . implode(',',$found);
        } else {
            $message = 'Participants updated successfully';
        }

        return back()->with('message', $message);
    }


    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
