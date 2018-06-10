
<div class="media">
    <div class="media-left">
        <a href="{{ route('users.show', $user->id )}}">
            <img class="media-object" src="{{ $user->gravatar() }}" alt="{{ $user->name }}" />
        </a>
    </div>
    <div class="media-body">
        <h4 class="media-heading">
            <a href="{{ route('users.show', $user->id )}}">{{ $user->name }}</a> --
            {{ $status->created_at->diffForHumans() }}
            @can('destroy', $status)
                <form action="{{ route('statuses.destroy', $status->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-sm btn-danger pull-right">删除</button>
                </form>
            @endcan
        </h4>
        {{ $status->content }}
    </div>
</div>