@if (count($feed_items))
    @foreach ($feed_items as $status)
        @include('statuses._status', ['user' => $status->user])
    @endforeach
    <div class="pull-right">{!! $feed_items->render() !!}</div>
@else
    <p class="lead text-center" style="padding: 5rem;">~~ 暂无动态 ：）~~</p>
@endif
