<section class="panelV2">
    <h2 class="panel__heading">
        <i class="{{ config("other.font-awesome") }} fa-hammer-war"></i> {{ __('torrent.moderation') }}
    </h2>
    <div class="panel__body">
        <menu style="display: flex; justify-content: space-between; padding: 0; margin: 0; list-style-type: none; flex-wrap: wrap">
            @if (auth()->user()->group->is_modo || auth()->id() === $torrent->user_id)
                <li>
                    <menu style="display: flex; list-style-type: none; margin: 0; padding: 0; flex-wrap: wrap;">
                        <li>
                            <a class="form__button form__button--outlined" href="{{ route('torrents.edit', ['id' => $torrent->id]) }}"
                                role="button">
                                <i class="{{ config('other.font-awesome') }} fa-pencil-alt"></i> {{ __('common.edit') }}
                            </a>
                        </li>
                        @if (auth()->user()->group->is_modo || ( auth()->id() === $torrent->user_id && Illuminate\Support\Carbon::now()->lt($torrent->created_at->addDay())))
                            <li x-data>
                                <button class="form__button form__button--outlined" x-on:click.stop="$refs.dialog.showModal()">
                                    <i class="{{ config('other.font-awesome') }} fa-times"></i> {{ __('common.delete') }}
                                </button>
                                <dialog class="dialog" x-ref="dialog">
                                    <h4 class="dialog__heading">
                                        {{ __('common.delete') }}: {{ $torrent->name }}
                                    </h4>
                                    <form
                                        class="dialog__form"
                                        method="POST"
                                        action="{{ route('torrents.destroy', ['id' => $torrent->id]) }}"
                                        x-on:click.outside="$refs.dialog.close()"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <input id="type" name="type" type="hidden" value="Torrent">
                                        <input id="id" name="id" type="hidden" value="{{ $torrent->id }}">
                                        <input id="title" name="title" type="hidden" value="{{ $torrent->name }}">
                                        <p class="form__group">
                                            <textarea
                                                id="message"
                                                class="form__textarea"
                                                name="message"
                                                required
                                            ></textarea>
                                            <label for="message" class="form__label form__label--floating">
                                                {{ __('common.reason') }}
                                            </label>
                                        </p>
                                        <p class="form__group">
                                            <button class="form__button form__button--filled">
                                                {{ __('common.delete') }}
                                            </button>
                                            <button formmethod="dialog" formnovalidate class="form__button form__button--outlined">
                                                {{ __('common.cancel') }}
                                            </button>
                                        </p>
                                    </form>
                                </dialog>
                            </li>
                        @endif
                    </menu>
                </li>
            @endif
            @if (auth()->user()->group->is_modo || auth()->user()->group->is_internal)
                <menu style="display: flex; list-style-type: none; margin: 0; padding: 0; flex-wrap: wrap;">
                    <li x-data>
                        <button class="form__button form__button--outlined" x-on:click.stop="$refs.dialog.showModal()">
                            <i class="{{ config('other.font-awesome') }} fa-star"></i> 免费下载
                        </button>
                        <dialog class="dialog" x-ref="dialog">
                            <h4 class="dialog__heading">
                                编辑
                            </h4>
                            <div x-on:click.outside="$refs.dialog.close()">
                                <form
                                    class="dialog__form"
                                    action="{{ route('torrent_fl', ['id' => $torrent->id]) }}"
                                    method="POST"
                                >
                                    @csrf
                                    <p class="form__group">
                                        <select name="freeleech" class="form__select">
                                            <option value="0" @selected($torrent->free === 0)>No</option>
                                            <option value="25" @selected($torrent->free === 25)>25%</option>
                                            <option value="50" @selected($torrent->free === 50)>50%</option>
                                            <option value="75" @selected($torrent->free === 75)>75%</option>
                                            <option value="100" @selected($torrent->free === 100)>100%</option>
                                        </select>
                                        <label class="form__label form__label--floating" for="free">
                                            免费下载
                                        </label>
                                    </p>
                                    <p class="form__group">
                                        <select class="form__select" name="fl_until">
                                            <option value="">永久</option>
                                            <option value="1">1 天</option>
                                            <option value="2">2 天</option>
                                            <option value="3">3 天</option>
                                            <option value="4">4 天</option>
                                            <option value="5">5 天</option>
                                            <option value="6">6 天</option>
                                            <option value="7">7 天</option>
                                        </select>
                                        <label for="fl_until" class="form__label form__label--floating">
                                            持续时间
                                        </label>
                                    </p>
                                    <p class="form__group">
                                        <button class="form__button form__button--filled">
                                            {{ __('common.save') }}
                                        </button>
                                        <button formmethod="dialog" formnovalidate class="form__button form__button--outlined">
                                            {{ __('common.cancel') }}
                                        </button>
                                    </p>
                                </form>
                            </div>
                        </dialog>
                    </li>
                    <li x-data>
                        <button class="form__button form__button--outlined" x-on:click.stop="$refs.dialog.showModal()">
                            <i class="{{ config('other.font-awesome') }} fa-chevron-double-up"></i> 双倍上传
                        </button>
                        <dialog class="dialog" x-ref="dialog">
                            <h4 class="dialog__heading">
                                编辑
                            </h4>
                            <div x-on:click.outside="$refs.dialog.close()">
                                <form
                                    class="dialog__form"
                                    action="{{ route('torrent_doubleup', ['id' => $torrent->id]) }}"
                                    method="POST"
                                >
                                    @csrf
                                    <p class="form__group">
                                        <select class="form__select" name="du_until">
                                            <option value="">永久</option>
                                            <option value="1">1 天</option>
                                            <option value="2">2 天</option>
                                            <option value="3">3 天</option>
                                            <option value="4">4 天</option>
                                            <option value="5">5 天</option>
                                            <option value="6">6 天</option>
                                            <option value="7">7 天</option>
                                        </select>
                                        <label for="fl_until" class="form__label form__label--floating">
                                            持续时间
                                        </label>
                                    </p>
                                    <p class="form__group">
                                        <button class="form__button form__button--filled">
                                            {{ __('common.save') }}
                                        </button>
                                        <button formmethod="dialog" formnovalidate class="form__button form__button--outlined">
                                            {{ __('common.cancel') }}
                                        </button>
                                    </p>
                                </form>
                            </div>
                        </dialog>
                    </li>
                    <li>
                        @if ($torrent->refundable == 0)
                            <form action="{{ route('refundable', ['id' => $torrent->id]) }}"
                                  method="POST"
                                  style="display: inline;">
                                @csrf
                                <button type="submit" class="form__button form__button--outlined">
                                    <i class="{{ config('other.font-awesome') }} fa-repeat"></i> {{ __('torrent.refundable') }}
                                </button>
                            </form>
                        @else
                            <form action="{{ route('refundable', ['id' => $torrent->id]) }}"
                                  method="POST"
                                  style="display: inline;">
                                @csrf
                                <button type="submit" class="form__button form__button--outlined">
                                    <i class="{{ config('other.font-awesome') }} fa-repeat"></i> {{ __('torrent.revoke') }} {{ __('torrent.refundable') }}
                                </button>
                            </form>
                        @endif
                    </li>
                    <li>
                        @if ($torrent->sticky == 0)
                            <form
                                action="{{ route('torrent_sticky', ['id' => $torrent->id]) }}"
                                method="POST"
                                style="display: inline;"
                            >
                                @csrf
                                <button class="form__button form__button--outlined">
                                    <i class="{{ config('other.font-awesome') }} fa-thumbtack"></i> {{ __('torrent.sticky') }}
                                </button>
                            </form>
                        @else
                            <form
                                action="{{ route('torrent_sticky', ['id' => $torrent->id]) }}"
                                method="POST"
                                style="display: inline;"
                            >
                                @csrf
                                <button class="form__button form__button--outlined">
                                    <i class="{{ config('other.font-awesome') }} fa-thumbtack"></i> {{ __('torrent.unsticky') }}
                                </button>
                            </form>
                        @endif
                    </li>
                    <li>
                        <form
                            action="{{ route('bumpTorrent', ['id' => $torrent->id]) }}"
                            method="POST"
                            style="display: inline;"
                        >
                            @csrf
                            <button class="form__button form__button--outlined">
                                <i class="{{ config('other.font-awesome') }} fa-arrow-to-top"></i> {{ __('torrent.bump') }}
                            </button>
                        </form>
                    </li>
                    <li>
                        @if ($torrent->featured == 0)
                            <form
                                method="POST"
                                action="{{ route('torrent_feature', ['id' => $torrent->id]) }}"
                                style="display: inline-block;"
                            >
                                @csrf
                                <button class="form__button form__button--outlined">
                                    <i class='{{ config('other.font-awesome') }} fa-certificate'></i> {{ __('torrent.feature') }}
                                </button>
                            </form>
                        @else
                            <form
                                method="POST"
                                action="{{ route('torrent_revokefeature', ['id' => $torrent->id]) }}"
                                style="display: inline-block;"
                            >
                                @csrf
                                <button class="form__button form__button--outlined">
                                    <i class='{{ config('other.font-awesome') }} fa-certificate'></i> {{ __('torrent.revokefeatured') }}
                                </button>
                            </form>
                        @endif
                    </li>
                </menu>
            @endif
            @if (auth()->user()->group->is_modo)
                <menu style="display: flex; list-style-type: none; margin: 0; padding: 0; align-items: center; flex-wrap: wrap;">
                    @if ($torrent->status !== \App\Models\Torrent::APPROVED)
                        <li>
                            <form role="form" method="POST"
                                    action="{{ route('staff.moderation.update', ['id' => $torrent->id]) }}"
                                    style="display: inline-block;">
                                @csrf
                                <input type="hidden" name="old_status" value="{{ $torrent->status }}">
                                <input type="hidden" name="status" value="{{ \App\Models\Torrent::APPROVED }}">
                                <button class="form__button form__button--outlined">
                                    <i class="{{ config('other.font-awesome') }} fa-thumbs-up"></i> {{ __('common.moderation-approve') }}
                                </button>
                            </form>
                        </li>
                    @endif
                    @if ($torrent->status !== \App\Models\Torrent::POSTPONED)
                        <li x-data>
                            <button class="form__button form__button--outlined" x-on:click.stop="$refs.dialog.showModal()">
                                <i class="{{ config('other.font-awesome') }} fa-pause"></i> {{ __('common.moderation-postpone') }}
                            </button>
                            <dialog class="dialog" x-ref="dialog">
                                <h4 class="dialog__heading">
                                    {{ __('common.moderation-postpone') }}: {{ $torrent->name }}
                                </h4>
                                <form
                                    class="dialog__form"
                                    method="POST"
                                    action="{{ route('staff.moderation.update', ['id' => $torrent->id]) }}"
                                    x-on:click.outside="$refs.dialog.close()"
                                >
                                    @csrf
                                    <input id="type" name="type" type="hidden" value="{{ __('torrent.torrent') }}">
                                    <input id="id" name="id" type="hidden" value="{{ $torrent->id }}">
                                    <input type="hidden" name="old_status" value="{{ $torrent->status }}">
                                    <input type="hidden" name="status" value="{{ \App\Models\Torrent::POSTPONED }}">
                                    <p class="form__group">
                                        <textarea
                                            id="message"
                                            class="form__textarea"
                                            name="message"
                                            required
                                        ></textarea>
                                        <label for="report_reason" class="form__label form__label--floating">
                                            {{ __('common.reason') }}
                                        </label>
                                    </p>
                                    <p class="form__group">
                                        <button class="form__button form__button--filled">
                                            {{ __('common.moderation-postpone') }}
                                        </button>
                                        <button formmethod="dialog" formnovalidate class="form__button form__button--outlined">
                                            {{ __('common.cancel') }}
                                        </button>
                                    </p>
                                </form>
                            </dialog>
                        </li>
                    @endif
                    @if ($torrent->status !== \App\Models\Torrent::REJECTED)
                        <li x-data>
                            <button class="form__button form__button--outlined" x-on:click.stop="$refs.dialog.showModal()">
                                <i class="{{ config('other.font-awesome') }} fa-fw fa-thumbs-down"></i> {{ __('common.moderation-reject') }}
                            </button>
                            <dialog class="dialog" x-ref="dialog">
                                <h4 class="dialog__heading">
                                    {{ __('common.moderation-reject') }}: {{ $torrent->name }}
                                </h4>
                                <form
                                    class="dialog__form"
                                    method="POST"
                                    action="{{ route('staff.moderation.update', ['id' => $torrent->id]) }}"
                                    x-on:click.outside="$refs.dialog.close()"
                                >
                                    @csrf
                                    <input id="type" name="type" type="hidden" value="{{ __('torrent.torrent') }}">
                                    <input id="id" name="id" type="hidden" value="{{ $torrent->id }}">
                                    <input type="hidden" name="old_status" value="{{ $torrent->status }}">
                                    <input type="hidden" name="status" value="{{ \App\Models\Torrent::REJECTED }}">
                                    <p class="form__group">
                                        <textarea
                                            id="message"
                                            class="form__textarea"
                                            name="message"
                                            required
                                        ></textarea>
                                        <label for="report_reason" class="form__label form__label--floating">
                                            {{ __('common.reason') }}
                                        </label>
                                    </p>
                                    <p class="form__group">
                                        <button class="form__button form__button--filled">
                                            {{ __('common.moderation-reject') }}
                                        </button>
                                        <button formmethod="dialog" formnovalidate class="form__button form__button--outlined">
                                            {{ __('common.cancel') }}
                                        </button>
                                    </p>
                                </form>
                            </dialog>
                        </li>
                    @endif
                    <li>
                        @switch ($torrent->status)
                            @case(\App\Models\Torrent::APPROVED)
                                批准人: <x-user_tag :user="$torrent->moderated" :anon="false" />
                                @break
                            @case(\App\Models\Torrent::POSTPONED)
                                推迟人: <x-user_tag :user="$torrent->moderated" :anon="false" />
                                @break
                            @case(\App\Models\Torrent::REJECTED)
                                拒收人: <x-user_tag :user="$torrent->moderated" :anon="false" />
                                @break
                            @default
                                未处理
                        @endswitch
                    </li>
                </menu>
            @endif
        </menu>
    </div>
</section>
