<x-app-layout>
    <div class="flex sm:justify-center pt-10 sm:pt-0 bg-gray-100">
        <div class="my-6 px-6 py-4 bg-white shadow-md sm:rounded-lg">
            <x-slot name="header">
                <h2 class="text-xl leading-tight font-semibold text-gray-800">{{ __('Tambah Pasien') }}</h2>
            </x-slot>
            <form method="POST" action="{{ route('edit-data-pasien') }}">
                @csrf
                <x-text-input id="id" class="block mt-1 w-full" type="hidden" value="{{ $indexEditPasien->id }}"
                    name="id" />
                <!-- NIP -->
                <div>
                    <x-input-label for="no_rm" :value="__('NIP')" />
                    <x-text-input id="no_rm" class="block mt-1 w-full" type="text" name="no_rm" :value="old('no_rm')"
                        required autofocus autocomplete="no_rm" maxlength=12 value="{{ $indexEditPasien->no_rm }}" />
                    <x-input-error :messages="$errors->get('no_rm')" class="mt-2" />
                </div>

                <!-- Name -->
                <div class="mt-4">
                    <x-input-label for="nama_pasien" :value="__('Nama Pasien')" />
                    <x-text-input id="nama_pasien" class="block mt-1 w-full" type="text" name="nama_pasien"
                        :value="old('nama_pasien')" required autofocus autocomplete="nama_pasien"
                        value="{{ $indexEditPasien->nama_pasien }}" />
                    <x-input-error :messages="$errors->get('nama_pasien')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a href="{{ route('pasien') }}"
                        class="float-right text-center w-24 py-2 focus:outline-none text-white font-black border-x-orange-900 bg-amber-400 hover:bg-amber-600 focus:ring-purple-900 rounded-lg text-sm dark:bg-amber-400 dark:hover:bg-amber-600 dark:focus:ring-purple-900">
                        {{ __('BATAL') }}
                    </a>
                    <x-primary-button class="ms-4 confirm-submit" data-action="simpan">
                        {{ __('Edit') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>