<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row align-items-center px-3">
            <h6 class="m-0 font-weight-bold text-primary mr-auto">Data {{ $title }}</h6>
            @if (Auth::user()->hasRole('admin') )
            <x-jet-button wire:click="openExpendingModal" wire:loading.attr="disabled">
                Request Supply
            </x-jet-button>
            @endif
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @livewire('expending-table')
        </div>
    </div>

    <x-jet-dialog-modal wire:model="detailModal" :maxWidth="'lg'">
        <x-slot name="title">
            {{ 'Supply Status' }}
        </x-slot>

        <x-slot name="close">
            <button type="button" class="close" aria-label="Close" wire:click="$set('detailModal', false)">
                <i class="fas fa-times"></i>
            </button>
        </x-slot>

        <x-slot name="content">
            @if ($detailOrder)
                <div class="card">
                    <div class="card-body row">
                        <div class="col">
                            <strong>Supplied date:</strong>
                            <br>
                            <span>{{ $detailOrder->created_at->format('M d, Y - H:m:s') }}</span>
                        </div>
                        <div class="col">
                            <strong>Status:</strong>
                            <br>
                            <span>{{ $detailOrder->statuses_nama }}</span>
                        </div>
                    </div>
                </div>
                <div class="row py-0">
                    <div class="col-12">
                        <hr>
                        <h6>{{ __('Product Details') }}</h6>
                        <hr>
                    </div>
                </div>

                <div class="row py-0">
                    <div class="col-12">
                        <div class="row my-0 py-0">
                            <div class="col-12">
                                <div class="row my-0 py-0">
                                    <div class="col-md-2">
                                        <span class="product-image media-middle">
                                            <img class="img-fluid" src="{{ asset('/storage/images/products/' . $detailOrder->stok_data['image']) }}">
                                        </span>
                                    </div>

                                    <div class="col-md-10 d-flex flex-column justify-content-center">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <h6 class="product-name">{{ $detailOrder->stok_data['nama'] }}</h6>
                                                <div class="product-meta">
                                                    <span class="product-price">{{ $detailOrder->jumlah }} x {{ currency($detailOrder->stok_data['hrg_jual']) }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-5 d-flex align-items-center">
                                                <div class="border-left pl-3">
                                                    <div>Total</div>
                                                    <div class="font-italic">{{ currency($detailOrder->stok_data['hrg_jual'] * $detailOrder->jumlah) }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="m-0">
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
            @endif

        </x-slot>

        @if ($detailOrder)
            @if (Auth::user()->hasRole('pemasok') && $detailOrder->statuses_nama == 'Pending')
                <x-slot name="footer">
                    <div class="d-flex">
                        <x-jet-secondary-button class="d-flex align-items-center mr-2" wire:click="tolakExpending" wire:loading.attr="disabled">
                            <span wire:loading wire:target="terimaExpending" class="spinner-border spinner-border-sm mr-2" role="status"></span>
                            {{ __('Tolak') }}
                        </x-jet-secondary-button>

                        <x-jet-button class="d-flex align-items-center" wire:click="terimaExpending" wire:loading.attr="disabled">
                            <span wire:loading wire:target="terimaExpending" class="spinner-border spinner-border-sm mr-2" role="status"></span>
                            {{ __('Terima Request') }}
                        </x-jet-button>
                    </div>
                </x-slot>
            @endif
        @endif

    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="expendingModal" :maxWidth="'sm'">
        <x-slot name="title">
            {{ __($buttonExpendingModal . ' Data Pemasok') }}
        </x-slot>

        <x-slot name="content">
            <div class="mb-3">
                <x-jet-label class="small" for="form.user_id" value="{{ __('Pemasok') }}" />
                <select id="form.user_id" class="form-control form-control-user {{ $errors->has('form.user_id') ? 'is-invalid' : '' }}" wire:model.defer="form.user_id" autocomplete="form.user_id">
                    <option {!! array_key_exists('user_id', $form) ? 'disabled' : 'selected' !!}>--Please choose an option--</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" wire:key="{{ $user->id }}" {!! array_key_exists('user_id', $form) ? ($form['user_id'] == $user->id ? 'selected' : '') : '' !!}>{{ $user->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="form.user_id" />
            </div>

            <div class="mb-3">
                <x-jet-label class="small" for="form.stok_id" value="{{ __('Jenis Barang') }}" />
                <select id="form.stok_id" class="form-control form-control-user {{ $errors->has('form.stok_id') ? 'is-invalid' : '' }}" wire:model.defer="form.stok_id" autocomplete="form.stok_id">
                    <option {!! array_key_exists('stok_id', $form) ? 'disabled' : 'selected' !!}>--Please choose an option--</option>
                    @foreach ($stoks as $stok)
                        <option value="{{ $stok->id }}" wire:key="{{ $stok->id }}" {!! array_key_exists('stok_id', $form) ? ($form['stok_id'] == $stok->id ? 'selected' : '') : '' !!}>{{ $stok->nama }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="form.stok_id" />
            </div>

            <div class="mb-3">
                <x-jet-label class="small" for="form.jumlah" value="{{ __('Jumlah Pasokan') }}" />
                <x-jet-input id="form.jumlah" type="number" class="{{ $errors->has('form.jumlah') ? 'is-invalid' : '' }}" wire:model="form.jumlah" autocomplete="form.jumlah" />
                <x-jet-input-error for="form.jumlah" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="d-flex d-md-flex">
                <x-jet-secondary-button class="mr-2" wire:click="$toggle('expendingModal')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-button class="d-flex align-items-center" wire:click="{{ $aksiExpendingModal }}" wire:loading.attr="disabled">
                    <span wire:loading wire:target="{{ $aksiExpendingModal }}" class="spinner-border spinner-border-sm mr-2" role="status"></span>
                    {{ __($buttonExpendingModal) }}
                </x-jet-button>
            </div>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-confirmation-modal wire:model="deleteExpendingModal">
        <x-slot name="title">
            {{ __('Hapus Data Stok Masuk ') }}<i>{{ array_key_exists('nama', $form) ? $form['nama'] : '' }}</i>
        </x-slot>

        <x-slot name="content">
            {{ __('Apakah Anda yakin ingin menghapus data stok keluar ') }}<i>{{ array_key_exists('nama', $form) ? $form['nama'] : '' }} ?</i>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('deleteExpendingModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="d-flex align-items-center" wire:loading.attr="disabled" wire:click="deleteExpending">
                <span wire:loading wire:target="deleteExpending" class="spinner-border spinner-border-sm mr-2" role="status"></span>
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
