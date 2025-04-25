<x-app-layout>
    <div class="flex sm:justify-center pt-10 sm:pt-0 bg-gray-100">
        <div class="my-6 px-6 py-4 bg-white shadow-md sm:rounded-lg">
            <x-slot name="header">
                <h2 class="text-xl leading-tight font-semibold text-gray-800">{{ __('Tambah Petugas') }}</h2>
            </x-slot>
            <form method="POST" action="{{ route('input-data-petugas') }}">
                @csrf

                <!-- NIP -->
                <div>
                    <x-input-label for="nip" :value="__('NIP')" />
                    <x-text-input id="nip" class="block mt-1 w-full" type="text" name="nip" :value="old('nip')" required
                        autofocus autocomplete="nip" maxlength=12 />
                    <x-input-error :messages="$errors->get('nip')" class="mt-2" />
                </div>

                <!-- Name -->
                <div class="mt-4">
                    <x-input-label for="name" :value="__('Nama Petugas')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="nama_petugas"
                        :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('nama_petugas')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex flex-row gap-4 justify-between">
                    <!-- Status -->
                    <div class="mt-4">
                        <x-input-label for="status" :value="__('Status')" />
                        <select name="status" id="status"
                            class="block mt-1 w-36 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <option value="bk">BK</option>
                            <option value="pk">PK</option>
                        </select>
                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                    </div>

                    <!-- Unit -->
                    <div class="mt-4">
                        <x-input-label for="unit" :value="__('Unit')" />
                        <select name="unit" id="unit"
                            class="block mt-1 w-40 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <option value="bk">BK</option>
                            <option value="ugd">UGD</option>
                            <option value="rawat jalan">Rawat Jalan</option>
                            <option value="rawat inap">Rawat Inap</option>
                            <option value="perinatologi">Perina</option>
                            <option value="ok">OK</option>
                            <option value="icu">ICU</option>
                        </select>
                        <x-input-error :messages="$errors->get('unit')" class="mt-2" />
                    </div>

                    <!-- Role (Diisi Otomatis) -->
                    <div class="mt-4">
                        <x-input-label for="role" :value="__('Role')" />
                        <x-text-input id="role" name="role" value=""
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            readonly />
                    </div>
                </div>

                <!-- JavaScript -->
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                                    const statusDropdown = document.getElementById("status");
                                    const unitDropdown = document.getElementById("unit");
                                    const roleInput = document.getElementById("role");
                    
                                    function updateRole() {
                                    const statusValue = statusDropdown.value;
                                    const unitValue = unitDropdown.value.replace(/\s+/g, '-').toLowerCase(); // Mengubah spasi menjadi "-"
                                    
                                    // Jika nilai status dan unit sama, hanya gunakan salah satu
                                    if (statusValue === unitValue) {
                                            roleInput.value = statusValue;
                                        } else {
                                            roleInput.value = `${statusValue}-${unitValue}`;
                                        }
                                    }
                    
                                    // Event listener saat dropdown berubah
                                    statusDropdown.addEventListener("change", updateRole);
                                    unitDropdown.addEventListener("change", updateRole);
                    
                                    // Set nilai awal saat halaman dimuat
                                    updateRole();
                                });
                </script>

                <div class="flex flex-row gap-4 justify-between">
                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-64" type="password" name="password" required
                            autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-64" type="password"
                            name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a href="{{ route('petugas') }}"
                        class="float-right text-center w-24 py-2 focus:outline-none text-white font-black border-x-orange-900 bg-amber-400 hover:bg-amber-600 focus:ring-purple-900 rounded-lg text-sm dark:bg-amber-400 dark:hover:bg-amber-600 dark:focus:ring-purple-900">
                        {{ __('BATAL') }}
                    </a>
                    <x-primary-button class="ms-4 confirm-submit" data-action="simpan">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>