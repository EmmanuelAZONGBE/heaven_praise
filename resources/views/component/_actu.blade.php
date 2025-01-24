<!-- post -->
<div class="col-12 col-sm-6 col-lg-4">
    <div class="post">
        <a href="{{route('detailsactualites',['slug'=>$actualite->slug])}}" class="post__img">
            <img src="{{asset('usx_files/actus/'.$actualite->banniere)}}" alt="">
        </a>

        <div class="post__content">
            {{-- <a href="#" class="post__category">Music</a> --}}
            <h3 class="post__title"><a href="{{route('detailsactualites',['slug'=>$actualite->slug])}}">{{$actualite->titre}}</a></h3>
            <div class="post__meta">
                <span class="post__date"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20ZM14.09814,9.63379,13,10.26807V7a1,1,0,0,0-2,0v5a1.00025,1.00025,0,0,0,1.5.86621l2.59814-1.5a1.00016,1.00016,0,1,0-1-1.73242Z"/></svg> Posté le {{ $actualite->created_at->format('d/m/Y') }}</span>
                <span class="post__comments"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17,9H7a1,1,0,0,0,0,2H17a1,1,0,0,0,0-2Zm-4,4H7a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2ZM12,2A10,10,0,0,0,2,12a9.89,9.89,0,0,0,2.26,6.33l-2,2a1,1,0,0,0-.21,1.09A1,1,0,0,0,3,22h9A10,10,0,0,0,12,2Zm0,18H5.41l.93-.93a1,1,0,0,0,0-1.41A8,8,0,1,1,12,20Z"/></svg> 0</span> 
            </div>
        </div>
    </div>
</div>
<!-- end post -->
