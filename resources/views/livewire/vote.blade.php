<div>
    <div class="container px-4 py-5" id="custom-cards">
        <h2 class="pb-2 border-bottom">Episode Participants</h2>
        @if($message != null)
            <div class="col-md-6 col-lg-6 alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Message!</strong> {{$message}}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            @foreach($episode->episode_participants as $episode_participant)

                <div class="col-md-4 col-lg-4">
                    <form
                        wire:submit.prevent="vote_cast({{$episode_participant->id}},{{$episode_participant->episode_id}})"
                        method="post">
                        @csrf
                        <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                            @if($episode_participant->event_participant->image == null)
                                <img src="{{asset('user.jpg')}}" alt="twbs"
                                     width="70"
                                     height="70"
                                     class="rounded-circle flex-shrink-0">
                            @else

                                <img src="{{asset($episode_participant->event_participant->image)}}" alt="twbs"
                                     width="70"
                                     height="70"
                                     class="rounded-circle flex-shrink-0">

                            @endif
                            <div>
                                <h6 class="mb-0">{{$episode_participant->event_participant->name}}</h6>
                                <p class="mb-0 opacity-75">Participant
                                    ID: {{$episode_participant->event_participant->participant_id}}</p>
                                <hr/>
                                <button type="submit" class="btn {{$button}} btn-block btn-sm">
                                    vote <i class="fas fa-vote-yea" aria-hidden="true"></i>
                                </button>
                            </div>
                            {{-- <span>(votes:</span>--}}
                            {{--<small class="opacity-50 text-nowrap">
                                <span class="badge bg-primary rounded-pill">
                                    {{$vote_count = \App\Models\EpisodeParticipantVote::where('episode_id', $episode->id)->
                                            where('episode_participant_id', $episode_participant->id)->
                                            where('vote', 1)->count()}}
                                </span>)
                            </small>--}}

                            @if(\App\Models\EpisodeParticipantVote::where('episode_id', $episode->id)->
                                              where('episode_participant_id', $episode_participant->id)->
                                              where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->first()&& $message!=null)
                                <div style="font-size: smaller"
                                     class="alert alert-warning alert-dismissible fade show"
                                     role="alert">
                                    {{$message}}.
                                    <button type="button" class="btn-close btn-sm"
                                            data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                        </div>
                    </form>
                </div>
            @endforeach
        </div>

    </div>
</div>

