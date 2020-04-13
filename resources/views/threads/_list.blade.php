@forelse ($threads as $thread)
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="level">
                <div class="flex">
                    <h4>
                        <a href="{{ $thread->path() }}">
                            @if (auth()->check() && $thread->hasUpdatesFor(auth()->user()))
                                <strong>
                                    {{ $thread->title }}
                                </strong>
                            @else
                                {{ $thread->title }}
                            @endif
                        </a>
                    </h4>

                    <h5>
                        {{trans('trans.Posted By')}} <a href="{{ route('profile', $thread->creator) }}">{{ $thread->creator->name }}</a>
                        <span style="margin-left: 50px">{{trans('trans.Created At')}} {{ $thread->created_at }}</span>
                        <span style="margin-left: 50px"> {{ $thread->visits }} {{trans('trans.Visits')}}</span>
                    </h5>
                </div>

                <a href="{{ $thread->path() }}">
                    {{ $thread->replies_count }} {{ trans('trans.reply') }}
                </a>
            </div>
        </div>

        <div class="panel-body">
            <div class="body">{!! $thread->body !!}</div>
        </div>
    </div>
@empty
    <p>{{ trans('trans.There are no relevant results at this time.') }}</p>
@endforelse