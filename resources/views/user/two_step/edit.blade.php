@extends('layout.default')

@section('title')
    <title>{{ $user->username }} - Security - {{ __('common.members') }} - {{ config('other.title') }}</title>
@endsection

@section('breadcrumbs')
    <li class="breadcrumbV2">
        <a href="{{ route('users.show', ['user' => $user]) }}" class="breadcrumb__link">
            {{ $user->username }}
        </a>
    </li>
    <li class="breadcrumbV2">
        <a href="{{ route('users.general_settings.edit', ['user' => $user]) }}" class="breadcrumb__link">
            {{ __('user.settings') }}
        </a>
    </li>
    <li class="breadcrumb--active">
        {{ __('user.passkey') }}
    </li>
@endsection

@section('nav-tabs')
    @include('user.buttons.user')
@endsection

@section('main')
    <section class="panelV2">
        <h2 class="panel__heading">两步验证</h2>
        <div class="panel__body">
            <form
                class="form"
                action="{{ route('users.two_step.update', ['user' => $user]) }}"
                method="POST"
            >
                @csrf
                @method('PATCH')
                <p>目前，仅支持基于电子邮件的两步验证。启用后，您将收到一封包含代码的电子邮件发送到您注册的邮箱地址。</p>
                <p>基于令牌的双因素认证计划在未来推出。</p>
                <p class="form__group">
                    <input type="hidden" name="twostep" value="0">
                    <input
                        type="checkbox"
                        class="form__checkbox"
                        id="twostep"
                        name="twostep"
                        value="1"
                        @checked($user->twostep)
                    >
                    <label class="form__label" for="internal">开启两步验证</label>
                </p>
                <p class="form__group">
                    <button class="form__button form__button--filled">
                        {{ __('common.save') }}
                    </button>
                </p>
            </form>
        </div>
    </section>
@endsection
