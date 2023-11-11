<div style="display: flex; flex-direction: column; gap: 16px">
    @if ($checked && $user->group->is_modo)
        <menu style="list-style-type: none; padding: 0; margin: 0">
            <li>
                <button class="form__button form__button--filled" wire:click="alertConfirm()">
                    Delete ({{ count($checked) }})
                </button>
            </li>
        </menu>
    @endif
    <table class="data-table" id="torrent-similar">
        <thead>
            <tr>
                @if ($user->group->is_modo)
                    <th><input type="checkbox" wire:model="selectPage" style="vertical-align: middle;"></th>
                @endif
                <th class="torrents-filename" wire:click="sortBy('name')" :direction="$sortField === 'name' ? $sortDirection : null" role="columnheader button">
                    {{ __('common.name') }}
                    @include('livewire.includes._sort-icon', ['field' => 'name'])
                </th>
                <th wire:click="sortBy('created_at')" :direction="$sortField === 'created_at' ? $sortDirection : null" role="columnheader button">
                    {{ __('common.created_at') }}
                    @include('livewire.includes._sort-icon', ['field' => 'created_at'])
                </th>
                <th wire:click="sortBy('size')" :direction="$sortField === 'size' ? $sortDirection : null" role="columnheader button">
                    <i class="{{ config('other.font-awesome') }} fa-database"></i>
                    @include('livewire.includes._sort-icon', ['field' => 'size'])
                </th>
                <th wire:click="sortBy('seeders')" :direction="$sortField === 'seeders' ? $sortDirection : null" role="columnheader button">
                    <i class="{{ config('other.font-awesome') }} fa-arrow-alt-circle-up"></i>
                    @include('livewire.includes._sort-icon', ['field' => 'seeders'])
                </th>
                <th wire:click="sortBy('leechers')" :direction="$sortField === 'leechers' ? $sortDirection : null" role="columnheader button">
                    <i class="{{ config('other.font-awesome') }} fa-arrow-alt-circle-down"></i>
                    @include('livewire.includes._sort-icon', ['field' => 'leechers'])
                </th>
                <th wire:click="sortBy('times_completed')" :direction="$sortField === 'times_completed' ? $sortDirection : null" role="columnheader button">
                    <i class="{{ config('other.font-awesome') }} fa-check-circle"></i>
                    @include('livewire.includes._sort-icon', ['field' => 'times_completed'])
                </th>
            </tr>
        </thead>
    </table>
    @foreach($torrents->sortBy('type.position')->values()->groupBy('type.name') as $type => $torrents)
        <section class="panelV2" x-data>
            <h2 class="panel__heading">{{ $type }}</h2>
            <div class="data-table-wrapper">
                <table class="data-table">
                    @foreach($torrents->sortBy('resolution.position')->values()->groupBy('resolution.name') as $resolution => $torrents)
                        <tbody>
                            <tr>
                                <th colspan="100">{{ $resolution }}</th>
                            </tr>
                            @foreach($torrents as $torrent)
                                @if ($user->group->is_modo)
                                    <tr>
                                        <td colspan="0" rowspan="2" x-on:click.self="$el.firstElementChild.click()">
                                            <input
                                                id="torrent_checkbox_{{ $torrent->id }}"
                                                type="checkbox"
                                                value="{{ $torrent->id }}"
                                                wire:model="checked"
                                            >
                                        </td>
                                    </tr>
                                @endif
                                <x-torrent.row :torrent="$torrent" :meta="$work" :personal_freeleech="$personalFreeleech" />
                            @endforeach
                        </tbody>
                    @endforeach
                </table>
            </div>
        </section>
    @endforeach
</div>

@section('javascripts')
    @if ($user->group->is_modo)
        <script nonce="{{ HDVinnie\SecureHeaders\SecureHeaders::nonce('script') }}">
          window.addEventListener('swal:modal', event => {
            Swal.fire({
              title: event.detail.message,
              text: event.detail.text,
              icon: event.detail.type,
            })
          })

          window.addEventListener('swal:confirm', event => {
            const { value: text } = Swal.fire({
              input: 'textarea',
              inputLabel: 'Delete Reason',
              inputPlaceholder: 'Type your reason here...',
              inputAttributes: {
                'aria-label': 'Type your reason here'
              },
              inputValidator: (value) => {
                if (!value) {
                  return 'You need to write something!'
                }
              },
              title: event.detail.message,
              html: event.detail.body,
              icon: event.detail.type,
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!',
            }).then((result) => {
              if (result.isConfirmed) {
              @this.set('reason', result.value);
                Livewire.emit('destroy')
              }
            })
          })
        </script>
    @endif
@endsection