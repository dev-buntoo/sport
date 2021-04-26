@foreach(\App\User::orderBy('updated_at','desc')->get() as $user)

    <div class="col-sm-3" style="padding-bottom: 20px;">
        <div class="user-details mr-auto">
            <div class="float-left user-img">
                <a class="avatar" href="#" title="{{ $user->roles->name }}">
                    <img src="{{ asset('main') }}/img/profile/{{ $user->photo }}" alt="Not Found" class="rounded-circle" style="width: 37px;height:37px">
                    <span class="status {{ $user->isOnline() }}"></span>
                </a>
            </div>
            <div class="user-info float-left">
                <a href="#" title="{{ $user->roles->name }}"><span style="display: inline-block;padding-top: 8px;">{{ $user->fname.' '.$user->lname }}</span></a>

            </div>
        </div>
    </div>
@endforeach
