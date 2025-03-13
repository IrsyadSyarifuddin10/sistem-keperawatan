<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- NIP -->
        <div>
            <x-input-label for="name" :value="__('NIP')" />
            <x-text-input id="nip" class="block mt-1 w-full" type="text" name="nip" :value="old('nip')" required
                autofocus autocomplete="nip" />
            <x-input-error :messages="$errors->get('nip')" class="mt-2" />
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Status -->
        <div class="mt-4">
            <x-input-label for="status" :value="__('Status')" />
            <select name="status" id="status"
                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="bk">BK</option>
                <option value="pk">PK</option>
            </select>
            <x-input-error :messages="$errors->get('status')" class="mt-2" />
        </div>

        <!-- Unit -->
        <div class="mt-4">
            <x-input-label for="unit" :value="__('Unit')" />
            <select name="unit" id="unit"
                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
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

        <!-- JavaScript -->
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const statusDropdown = document.getElementById("status");
                const unitDropdown = document.getElementById("unit");
                const roleInput = document.getElementById("role");

                function updateRole() {
                    const statusValue = statusDropdown.value;
                    const unitValue = unitDropdown.value.replace(/\s+/g, '-').toLowerCase(); // Mengubah spasi menjadi "-"
                    roleInput.value = `${statusValue}-${unitValue}`;
                }

                // Event listener saat dropdown berubah
                statusDropdown.addEventListener("change", updateRole);
                unitDropdown.addEventListener("change", updateRole);

                // Set nilai awal saat halaman dimuat
                updateRole();
            });
        </script>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>