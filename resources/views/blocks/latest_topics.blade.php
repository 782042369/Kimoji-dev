<section class="panelV2">
    <header class="panel__header">
        <h2 class="panel__heading">
            <a href="{{ route('topics.index') }}">
                {{ __('blocks.latest-topics') }}
            </a>
        </h2>
    </header>
    @if($topics->count() > 0)
        <ul class="topic-listings">
            @foreach ($topics as $topic)
                @if ($topic->viewable())
                    <li class="topic-listings__item">
                        <x-forum.topic-listing :topic="$topic" />
                    </li>
                @endif
            @endforeach
        </ul>
    @else
        <div class="panel__body">
            暂无主题
        </div>
    @endif
</section>
