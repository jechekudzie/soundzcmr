<div class="row">
    @foreach($episode->episode_participants as $episode_participant)
        <div style="padding-bottom: 10px;" class="col-md-3">
            <form wire:submit.prevent="voting({{$episode_participant->id}},{{$episode_participant->episode_id}})"
                  method="post">
                @csrf
                <div class="card">
                    <img style="width: 100%;" src="{{asset($episode_participant->event_participant->image)}}"
                         class="img-responsive card-img-top" alt="...">
                    <div class="card-body">
                        <div class="profile__meta">
                            <h3 style="text-align: center!important;"> {{$episode_participant->event_participant->name}}</h3>
                            <span
                                style="text-align: center!important;">Participant ID: {{$episode_participant->event_participant->participant_id}}</span>
                        </div>
                        <button type="submit"
                                class="sign__btn">@if($check_vote){{'Vote'}}@else{{'Unvote'}}@endif</button>
                    </div>
                </div>
            </form>
        </div>
    @endforeach
</div>
