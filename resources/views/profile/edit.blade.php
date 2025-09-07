<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Profile</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8" x-data="{ tab: 'profile', direction: 'left' }">

            <!-- Tabs -->
            <div class="bg-white rounded-lg shadow p-4 mb-6 flex space-x-4">
                <button @click="direction = tab === 'profile' ? 'left' : 'right'; tab = 'profile'" 
                        :class="{ 'border-b-2 border-indigo-500 font-semibold': tab === 'profile' }"
                        class="px-3 py-2 text-gray-700 hover:text-gray-900 focus:outline-none">
                    Profile Info
                </button>

                <button @click="direction = tab === 'password' ? 'left' : 'right'; tab = 'password'" 
                        :class="{ 'border-b-2 border-indigo-500 font-semibold': tab === 'password' }"
                        class="px-3 py-2 text-gray-700 hover:text-gray-900 focus:outline-none">
                    Update Password
                </button>

                <button @click="direction = tab === 'delete' ? 'left' : 'right'; tab = 'delete'" 
                        :class="{ 'border-b-2 border-red-500 font-semibold': tab === 'delete' }"
                        class="px-3 py-2 text-gray-700 hover:text-gray-900 focus:outline-none">
                    Delete Account
                </button>
            </div>

            <!-- Tab Contents -->
            <div class="relative">

                <!-- Profile Info -->
                <div x-show="tab === 'profile'" x-cloak>
                    <div class="bg-white shadow rounded-lg p-6 space-y-6">
                        <h3 class="text-lg font-semibold text-gray-800">Profile Information</h3>
                        <p class="text-sm text-gray-600">Update your account's profile information, email, and profile picture.</p>

                        <form method="post" action="{{ route('profile.update') }}" class="space-y-6" enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <div class="flex flex-col sm:flex-row sm:space-x-6">
                                <!-- Profile Image -->
                                <div class="flex-shrink-0 mb-4 sm:mb-0">
                                    <div class="relative" x-data="{ loading: false, imageUrl: '{{ $user->profile_image ?? '' }}' }">
                                        <div class="w-24 h-24 rounded-full overflow-hidden bg-gray-100 flex items-center justify-center">
                                            <template x-if="loading">
                                                <div class="absolute inset-0 flex items-center justify-center">
                                                    <div class="w-12 h-12 border-4 border-indigo-400 border-dashed rounded-full animate-spin"></div>
                                                </div>
                                            </template>

                                            <img :src="imageUrl" alt="Profile Picture" class="w-full h-full object-cover" :class="{ 'opacity-50': loading }">
                                        </div>

                                        <input type="file" name="profile_image" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                            @change="
                                                const file = $event.target.files[0];
                                                if(file) {
                                                    loading = true;
                                                    const reader = new FileReader();
                                                    reader.onload = e => {
                                                        imageUrl = e.target.result;
                                                        setTimeout(() => loading = false, 800);
                                                    }
                                                    reader.readAsDataURL(file);
                                                }
                                            "
                                        >
                                    </div>
                                </div>

                                <!-- Input Fields -->
                                <div class="flex-1 space-y-4">
                                    <!-- Name Row -->
                                    <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                                        <label class="w-32 text-gray-700 font-medium">First Name *</label>
                                        <input type="text" name="first_name" class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full"
                                            value="{{ old('first_name', $user->first_name) }}" required>
                                    </div>

                                    <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                                        <label class="w-32 text-gray-700 font-medium">Last Name *</label>
                                        <input type="text" name="last_name" class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full"
                                            value="{{ old('last_name', $user->last_name) }}" required>
                                    </div>

                                    <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                                        <label class="w-32 text-gray-700 font-medium">Email *</label>
                                        <input type="email" name="email" class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full"
                                            value="{{ old('email', $user->email) }}" required>
                                    </div>

                                    <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                                        <label class="w-32 text-gray-700 font-medium">Gender</label>
                                        <select name="gender" class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full">
                                            <option value="" disabled selected>Select Gender</option>
                                            <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                    </div>

                                    <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                                        <label class="w-32 text-gray-700 font-medium">Date of Birth</label>
                                        <input type="date" name="dob" class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full"
                                            value="{{ old('dob', $user->dob) }}">
                                    </div>

                                    <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                                        <label class="w-32 text-gray-700 font-medium">Place of Birth</label>
                                        <input type="text" name="place_of_birth" class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full"
                                            value="{{ old('place_of_birth', $user->place_of_birth) }}">
                                    </div>

                                    <!-- Address -->
                                    <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                                        <label class="w-32 text-gray-700 font-medium">Address</label>
                                        <input type="text" name="address" class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full"
                                            value="{{ old('address', $user->address) }}">
                                    </div>

                                    <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                                        <label class="w-32 text-gray-700 font-medium">City</label>
                                        <input type="text" name="city" class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full"
                                            value="{{ old('city', $user->city) }}">
                                    </div>

                                    <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                                        <label class="w-32 text-gray-700 font-medium">Country</label>
                                        <input type="text" name="country" class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full"
                                            value="{{ old('country', $user->country) }}">
                                    </div>

                                    <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                                        <label class="w-32 text-gray-700 font-medium">ZIP</label>
                                        <input type="text" name="zip" class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full"
                                            value="{{ old('zip', $user->zip) }}">
                                    </div>

                                    <div class="flex justify-end mt-4">
                                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <!-- Update Password -->
                <div x-show="tab === 'password'" x-cloak>
                    <div class="bg-white shadow rounded-lg p-6 space-y-6">
                        <h3 class="text-lg font-semibold text-gray-800">Update Password</h3>
                        <p class="text-sm text-gray-600">Ensure your account is using a long, random password to stay secure.</p>

                        <form method="post" action="{{ route('password.update') }}" class="space-y-4">
                            @csrf
                            @method('put')

                            <div>
                                <x-input-label for="current_password" :value="__('Current Password')" />
                                <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="password" :value="__('New Password')" />
                                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="flex items-center justify-end mt-4 space-x-3">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Delete Account -->
                <div x-show="tab === 'delete'" x-cloak>
                    <div class="bg-white shadow rounded-lg p-6 space-y-6">
                        <h3 class="text-lg font-semibold text-red-600">Delete Account</h3>
                        <p class="text-sm text-gray-600">Once your account is deleted, all resources and data will be permanently deleted. Please confirm your password to proceed.</p>

                        <form method="post" action="{{ route('profile.destroy') }}" class="space-y-4">
                            @csrf
                            @method('delete')

                            <div>
                                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                                <x-text-input
                                    id="password"
                                    name="password"
                                    type="password"
                                    class="mt-1 block w-full"
                                    placeholder="{{ __('Password') }}"
                                />
                                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                            </div>

                            <div class="flex justify-end space-x-3 mt-4">
                                <x-danger-button>{{ __('Delete Account') }}</x-danger-button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
