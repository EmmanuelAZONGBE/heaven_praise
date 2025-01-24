
<a href="{{route('detailsartistes',['heavenid'=>$artiste->heavenid])}}" class="artist">
    <div class="artist__cover">
        @if (empty($artiste->avatar))
            <img src="{{asset('usx_files/avatars/avatar.svg')}}">
        @else
            <img src="{{asset('usx_files/avatars/'.$artiste->avatar)}}">
        @endif
    </div>
    <h3 class="artist__title">{{$artiste->nomartiste}}</h3>
</a>