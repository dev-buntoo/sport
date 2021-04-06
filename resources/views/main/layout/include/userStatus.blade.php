<style>
    /* The heart of the matter */
.testimonial-group > .row {
  overflow-x: auto;
  white-space: nowrap;
}
.testimonial-group > .row > .col-sm-4 {
  display: inline-block;
  float: none;
}
</style>
<div class="container testimonial-group">
    <div class="row flex-nowrap">
        @foreach ($onlineUsers as $onlineUser)
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <div class="user-details mr-auto">
                        <div class="float-left user-img">
                            <a class="avatar" href="profile.html">
                                @if ($onlineUser->photo != null)
                                <img src="{{asset('main')}}/img/profile/{{ $onlineUser->photo }}" alt="" class="rounded-circle">
                                @else
                                <img src="" alt="" class="rounded-circle">
                                @endif

                            </a>
                        </div>
                        <div class="user-info float-left">
                            <a><span>{{$onlineUser->fname}}</span></a>
                            <span class="last-seen"><span class="badge badge-success">Online</span></span>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        @endforeach
        @foreach ($offlineUsers as $offlineUser)
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <div class="user-details mr-auto">
                        <div class="float-left user-img">
                            <a class="avatar" href="profile.html">
                                @if ($offlineUser->photo != null)
                                <img src="{{asset('main')}}/img/profile/{{ $offlineUser->photo }}" alt="" class="rounded-circle">
                                @else
                                <img src="" alt="" class="rounded-circle">
                                @endif
                            </a>
                        </div>
                        <div class="user-info float-left">
                            <a><span>{{$offlineUser->fname}}</span></a>
                            <span class="last-seen text-white"><span class="badge badge-secondary">Offline</span></span>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        @endforeach
    </div>
  </div>
