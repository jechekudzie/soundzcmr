<?php

namespace App\Http\Livewire;

use App\Models\EpisodeParticipant;
use App\Models\EpisodeParticipantVote;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Vote extends Component
{

    public $episode;
    public $user_id;
    public $check_vote;
    public $message = '';

    public $ep;
    public $epc;
    public $button = 'btn-success';

    //variables for count
    public $vote_count = [];

    public function vote_cast($episode_participant, $episode_id)
    {

        $user = Auth::user();
        $participant = EpisodeParticipant::where('id', $episode_participant)->first();

        $this->check_vote = $this->check_vote_existence($user, $episode_participant, $episode_id);

        if ($this->check_vote == null) {
            $vote = EpisodeParticipantVote::create([
                'episode_id' => $episode_id,
                'episode_participant_id' => $episode_participant,
                'user_id' => $user->id,
                'vote' => 1,
            ]);
            //$this->message = 'New vote cast for ' . $participant->event_participant->name . ' was successful';
            $this->message = 'Vote casted';
            $this->button = 'btn-warning';
        } else {
            if ($this->check_vote->episode_participant_id == $episode_participant && $this->check_vote->vote == 1) {
                $this->check_vote->update([
                    'vote' => 0,
                ]);

                //$this->message = 'You revoked your vote for ' . $participant->event_participant->name;
                $this->message = 'Voted revoked';
                $this->button = 'btn-success';
            } elseif ($this->check_vote->episode_participant_id == $episode_participant && $this->check_vote->vote == 0) {
                $this->check_vote->update([
                    'vote' => 1,
                ]);

                //$this->message = 'Casted vote for same contestant, ' . $participant->event_participant->name;
                $this->message = 'Vote casted';
                $this->button = 'btn-primary';
            } else {
                $this->check_vote->update([
                    'episode_id' => $episode_id,
                    'episode_participant_id' => $episode_participant,
                    'user_id' => $user->id,
                    'vote' => 1,
                ]);

                //$this->message = 'New vote cast for ' . $participant->event_participant->name . ' was successful';
                $this->message = 'Vote casted';
                $this->button = 'btn-warning';
            }

        }

    }

    public function check_vote_existence($user, $episode_participant, $episode_id)
    {
        return $this->check_vote = EpisodeParticipantVote::where('user_id', $user->id)->where('episode_id', $episode_id)->first();
    }

    public function check_like_existence($user, $episode_participant, $episode_id)
    {
        return $this->check_vote = EpisodeParticipantVote::where('user_id', $user->id)->where('episode_id', $episode_id)->first();
    }



    public function render()
    {
        return view('livewire.vote',
            [
                'episode' => $this->episode,
            ]
        );
    }
}
