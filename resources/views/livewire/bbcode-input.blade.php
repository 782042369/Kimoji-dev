
<div
    class="bbcode-input"
    x-data="{
        insert(openTag, closeTag) {
            input = $refs.bbcode;
            start = input.selectionStart;
            end = input.selectionEnd;
            input.value = input.value.substring(0, start)
                + openTag
                + input.value.substring(start, end)
                + closeTag
                + input.value.substring(end)
            input.dispatchEvent(new Event('input'));
            input.focus();
            if (openTag.charAt(openTag.length - 2) === '=') {
                input.setSelectionRange(start + openTag.length - 1, start + openTag.length - 1);
            } else if (start == end) {
                input.setSelectionRange(start + openTag.length, end + openTag.length);
            } else {
                input.setSelectionRange(start, end + openTag.length + closeTag.length);
            }
        },
        showButtons: false,
        bbcodePreviewHeight: null,
        isPreviewEnabled: @entangle('isPreviewEnabled'),
        isOverInput: false,
        previousActiveElement: document.activeElement,
    }"
>
    <p class="bbcode-input__tabs">
        <input class="bbcode-input__tab-input" type="radio" id="{{ $name }}-bbcode-preview-disabled" name="isPreviewEnabled" value="0" wire:model="isPreviewEnabled" />
        <label class="bbcode-input__tab-label" for="{{ $name }}-bbcode-preview-disabled">编辑</label>
        <input class="bbcode-input__tab-input" type="radio" id="{{ $name }}-bbcode-preview-enabled" name="isPreviewEnabled" value="1" wire:model="isPreviewEnabled" />
        <label class="bbcode-input__tab-label" for="{{ $name }}-bbcode-preview-enabled">{{ __('common.preview') }}</label>
    </p>
    <p class="bbcode-input__icon-bar-toggle">
        <button type="button" class="form__button form__button--text" x-on:click="showButtons = ! showButtons">BBCode</button>
    </p>
    <menu class="bbcode-input__icon-bar" x-cloak x-show="showButtons">
        <li>
            <button type="button" class="form__standard-icon-button" x-on:click="insert('[b]', '[/b]')">
                <abbr title="Bold">
                    <i class="{{ config('other.font-awesome') }} fa-bold"></i>
                </abbr>
            </button>
        </li>
        <li>
            <button type="button" class="form__standard-icon-button" x-on:click="insert('[i]', '[/i]')">
                <abbr title="Italics">
                    <i class="{{ config('other.font-awesome') }} fa-italic"></i>
                </abbr>
            </button>
        </li>
        <li>
            <button type="button" class="form__standard-icon-button" x-on:click="insert('[u]', '[/u]')">
                <abbr title="Underline">
                    <i class="{{ config('other.font-awesome') }} fa-underline"></i>
                </abbr>
            </button>
        </li>
        <li>
            <button type="button" class="form__standard-icon-button" x-on:click="insert('[s]', '[/s]')">
                <abbr title="Strikethrough">
                    <i class="{{ config('other.font-awesome') }} fa-strikethrough"></i>
                </abbr>
            </button>
        </li>
        <hr class="bbcode-input__icon-separator">
        <li>
            <button type="button" class="form__standard-icon-button" x-on:click="insert('[img=350]', '[/img]')">
                <abbr title="Insert Image">
                    <i class="{{ config('other.font-awesome') }} fa-image"></i>
                </abbr>
            </button>
        </li>
        <li>
            <button type="button" class="form__standard-icon-button" x-on:click="insert('[video=&quot;youtube&quot;]', '[/video]')">
                <abbr title="Insert YouTube">
                    <i class="fab fa-youtube"></i>
                </abbr>
            </button>
        </li>
        <li>
            <button type="button" class="form__standard-icon-button" x-on:click="insert('[url]', '[/url]')">
                <abbr title="Link">
                    <i class="{{ config('other.font-awesome') }} fa-link"></i>
                </abbr>
            </button>
        </li>
        <hr class="bbcode-input__icon-separator">
        <li>
            <button type="button" class="form__standard-icon-button" x-on:click="insert('\n[list]\n[*]', '\n[/list]\n')">
                <abbr title="Unordered List">
                    <i class="{{ config('other.font-awesome') }} fa-list"></i>
                </abbr>
            </button>
        </li>
        <li>
            <button type="button" class="form__standard-icon-button" x-on:click="insert('\n[list=1]\n[*]', '\n[/list]\n')">
                <abbr title="Ordered List">
                    <i class="{{ config('other.font-awesome') }} fa-list-ol"></i>
                </abbr>
            </button>
        </li>
        <hr class="bbcode-input__icon-separator">
        <li>
            <button type="button" class="form__standard-icon-button" x-on:click="insert('[color=]', '[/color]')">
                <abbr title="Font Color">
                    <i class="{{ config('other.font-awesome') }} fa-palette"></i>
                </abbr>
            </button>
        </li>
        <li>
            <button type="button" class="form__standard-icon-button" x-on:click="insert('[size=]', '[/size]')">
                <abbr title="Font Size">
                    <i class="{{ config('other.font-awesome') }} fa-text-size"></i>
                </abbr>
            </button>
        </li>
        <li>
            <button type="button" class="form__button form__button--text" x-on:click="insert('[font=]', '[/font]')">
                <abbr title="Font Family">
                    Font
                </abbr>
            </button>
        </li>
        <hr class="bbcode-input__icon-separator">
        <li>
            <button type="button" class="form__standard-icon-button" x-on:click="insert('\n[left]\n', '\n[/left]\n')">
                <abbr title="Align left">
                    <i class="{{ config('other.font-awesome') }} fa-align-left"></i>
                </abbr>
            </button>
        </li>
        <li>
            <button type="button" class="form__standard-icon-button" x-on:click="insert('\n[center]\n', '\n[/center]\n')">
                <abbr title="Align center">
                    <i class="{{ config('other.font-awesome') }} fa-align-center"></i>
                </abbr>
            </button>
        </li>
        <li>
            <button type="button" class="form__standard-icon-button" x-on:click="insert('\n[right]\n', '\n[/right]\n')">
                <abbr title="Align right">
                    <i class="{{ config('other.font-awesome') }} fa-align-right"></i>
                </abbr>
            </button>
        </li>
        <hr class="bbcode-input__icon-separator">
        <li>
            <button type="button" class="form__standard-icon-button" x-on:click="insert('[quote]', '[/quote]')">
                <abbr title="Quote">
                    <i class="{{ config('other.font-awesome') }} fa-quote-right"></i>
                </abbr>
            </button>
        </li>
        <li>
            <button type="button" class="form__standard-icon-button" x-on:click="insert('[code]', '[/code]')">
                <abbr title="Code">
                    <i class="{{ config('other.font-awesome') }} fa-code"></i>
                </abbr>
            </button>
        </li>
        <li>
            <button type="button" class="form__standard-icon-button" x-on:click="insert('[spoiler]', '[/spoiler]')">
                <abbr title="Spoiler">
                    <i class="{{ config('other.font-awesome') }} fa-eye-slash"></i>
                </abbr>
            </button>
        </li>
        <li>
            <button type="button" class="form__standard-icon-button" x-on:click="insert('[note]', '[/note]')">
                <abbr title="Note">
                    <i class="{{ config('other.font-awesome') }} fa-sticky-note"></i>
                </abbr>
            </button>
        </li>
        <li>
            <button type="button" class="form__standard-icon-button" x-on:click="insert('[alert]', '[/alert]')">
                <abbr title="Alert">
                    <i class="{{ config('other.font-awesome') }} fa-file-exclamation"></i>
                </abbr>
            </button>
        </li>
        <li>
            <button type="button" class="form__standard-icon-button" x-on:click="insert('[table]\n[tr]\n[td]', '[/td]\n[/tr]\n[/table]')">
                <abbr title="Table">
                    <i class="{{ config('other.font-awesome') }} fa-table"></i>
                </abbr>
            </button>
        </li>
        <li>
            <button
                type="button"
                class="form__standard-icon-button"
                x-on:click="Swal.fire({
                    title: 'Emoji Picker',
                    html: 'If using MacOS, press Ctrl + Cmd + Space bar<br>If using Windows or Linux, press Windows logo key + .',
                    icon: 'info',
                    showConfirmButton: true,
                })"
            >
                <abbr title="If using MacOS, press Ctrl + Cmd + Space bar&NewLine;If using Windows or Linux, press Windows logo key + .">
                    <i class="{{ config('other.font-awesome') }} fa-face-smile"></i>
                </abbr>
            </button>
        </li>
    </menu>
    <div class="bbcode-input__tab-pane">
        <div class="bbcode-input__preview bbcode-rendered" x-show="isPreviewEnabled">
            @joypixels($contentHtml)
        </div>
        <p class="form__group" x-show="! isPreviewEnabled">
            <textarea
                id="bbcode-{{ $name }}"
                name="{{ $name }}"
                class="form__textarea bbcode-input__input"
                placeholder=" "
                x-ref="bbcode"
                x-on:mouseup="
                    if (isOverInput) {
                        bbcodePreviewHeight = $el.style.height;
                    }
                "
                x-on:mousedown="previousActiveElement = document.activeElement;"
                x-on:mouseover="isOverInput = true"
                x-on:mouseleave="isOverInput = false"
                wire:model.defer="contentBbcode"
                x-bind:style="{ height: bbcodePreviewHeight !== null && bbcodePreviewHeight, transition: previousActiveElement === $el ? 'none' : 'border-color 600ms cubic-bezier(0.25, 0.8, 0.25, 1), height 600ms cubic-bezier(0.25, 0.8, 0.25, 1)' }"
                @if ($isRequired)
                    required
                @endif
            ></textarea>
            <label class="form__label form__label--floating" for="bbcode-{{ $name }}">
                {{ $label }}
            </label>
        </p>
    </div>
</div>
