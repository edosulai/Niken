<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update profile information and your account email address.') }}
    </x-slot>

    <x-slot name="form">

        <x-jet-action-message on="saved">
            {{ __('Saved') }}
        </x-jet-action-message>


        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div class="mb-3" x-data="{ photoName: null, photoPreview: null }">

                <input type="file" hidden wire:model="photo" x-ref="photo" x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label class="small" for="photo" value="{{ __('Photo') }}" />


                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" class="rounded-circle" height="80px" width="80px">
                </div>


                <div class="mt-2" x-show="photoPreview">
                    <img x-bind:src="photoPreview" class="rounded-circle" width="80px" height="80px">
                </div>

                <x-jet-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        <span wire:loading wire:target="deleteProfilePhoto" class="spinner-border spinner-border-sm" role="status"></span>
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <div class="w-md-75">

            <div class="mb-3">
                <x-jet-label class="small" for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}" wire:model.defer="state.name" autocomplete="name" />
                <x-jet-input-error for="name" />
            </div>


            <div class="mb-3">
                <x-jet-label class="small" for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}" wire:model.defer="state.email" />
                <x-jet-input-error for="email" />
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <div class="d-flex align-items-baseline justify-content-between w-100">
            @if (Auth::user()->hasVerifiedEmail())
                <span class="text-success">
                    {{ __('Your email address has been verified.') }}
                </span>
            @else
                <a href="{{ route('verification.notice') }}" class="btn btn-primary btn-user">
                    {{ __('Verify Email') }}
                </a>
            @endif

            <x-jet-button class="d-flex align-items-center justify-content-center">
                <span wire:loading class="spinner-border spinner-border-sm mr-2" role="status"></span>
                {{ __('Save') }}
            </x-jet-button>
        </div>
    </x-slot>
</x-jet-form-section>
