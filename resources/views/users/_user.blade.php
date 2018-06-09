
<div class="media">
    <div class="media-left">
        <img class="media-object img-circle" src="{{ $user->gravatar() }}" alt="{{ $user->name }}">
    </div>
    <div class="media-body">
        <h5 class="media-heading">
            <a href="{{ route('users.show', $user->id )}}" class="username">{{ $user->name }}</a>
        </h5>

        @can('destroy', $user)
            <form action="{{ route('users.destroy', $user->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-sm btn-danger delete-btn">删除</button>
            </form>
        @endcan
    </div>
</div>