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
          request()->validate([
            'event_participant_id.*'  => 'array|min:3|required',
        ]);
        $event_participants = request('event_participant_id');

        $found = array();
        $from = array();

        foreach ($event_participants as $event_participant_id) {

            $episode_participant['event_participant_id'] = $event_participant_id;

            $participant = EpisodeParticipant::where('episode_id', $episode->id)->where('event_participant_id', $event_participant_id)->first();
            if ($participant == null) {

                $episode->add_episode_participants($episode_participant);

            } else {

                $found [] = $participant->event_participant->name;
            }

        }

        if (!empty($found)) {
            $message = 'Please note that the following participant were already added for this episode, so we did not add them: ' . implode(',', $found);
        } else {
            $message = 'Participants updated successfully';
        }

        return back()->with('message', $message);
    }


    public function edit_episode(Episode $episode)
    {
        //

        return view('admin.episodes.edit', compact('episode'));
    }

    public function update_episode(Episode $episode)
    {
        $hours = request('hours');
        $episode_update = request()->validate([
            'episode_number' => 'required',
            'link' => 'required',
        ]);

        if($hours != null){
            $duration = $hours / 24;
            $expiry_date = Date('Y-m-d', strtotime('+' .$duration . ' days'));
            $episode->update([
                'episode_number' => $episode_update['episode_number'],
                'link' => $episode_update['link'],
                'expiry_date' => $expiry_date,
                'hours' => $hours,
            ]);
        }else{
            $episode->update([
                'episode_number' => $episode_update['episode_number'],
                'link' => $episode_update['link'],
            ]);
        }


        return back()->with('message', 'Episode updated successfully');
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
