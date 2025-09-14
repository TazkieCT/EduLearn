<div x-show="tab === 'profile'" x-cloak>
    <div class="bg-white shadow rounded-lg p-6 space-y-6">
        <h3 class="text-lg font-semibold text-gray-800">{{ __('Profile Information') }}</h3>
        <p class="text-sm text-gray-600">{{ __('Update your account\'s profile information, email, and profile picture.') }}</p>

        @if(session('status') === 'profile-updated')
            <div class="text-green-600 mb-4">{{ __('Profile updated successfully!') }}</div>
        @endif

        <form method="post" action="{{ route('profile.update') }}" class="space-y-6" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div class="flex flex-col sm:flex-row sm:space-x-6">
                <!-- Profile Image -->
                <div class="flex-shrink-0 mb-4 sm:mb-0">
                    <div class="relative" x-data="{ 
                        loading: false, 
                        imageUrl: '{{ $user->profile_image ? asset("storage/profile_images/" . $user->profile_image) : asset("images/default-profile.png") }}' 
                    }">
                    <div class="w-24 h-24 rounded-full overflow-hidden bg-gray-100 flex items-center justify-center border border-gray-300">
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
                    <label class="w-32 text-gray-700 font-medium">{{ __('First Name *') }}</label>
                    <input type="text" name="first_name" class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full"
                        value="{{ old('first_name', $user->first_name) }}" required>
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                    <label class="w-32 text-gray-700 font-medium">{{ __('Last Name *') }}</label>
                    <input type="text" name="last_name" class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full"
                        value="{{ old('last_name', $user->last_name) }}" required>
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                    <label class="w-32 text-gray-700 font-medium">{{ __('Email *') }}</label>
                    <input type="email" name="email" class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full"
                        value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                    <label class="w-32 text-gray-700 font-medium">{{ __('Gender') }}</label>
                    <select name="gender" class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full">
                        <option value="" disabled selected>{{ __('Select Gender') }}</option>
                        <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>{{ __('Male') }}</option>
                        <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>{{ __('Female') }}</option>
                    </select>
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                    <label class="w-32 text-gray-700 font-medium">{{ __('Date of Birth') }}</label>
                    <input type="date" name="dob" class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full"
                        value="{{ old('dob', $user->dob) }}">
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                    <label class="w-32 text-gray-700 font-medium">{{ __('Place of Birth') }}</label>
                    <input type="text" name="place_of_birth" class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full"
                        value="{{ old('place_of_birth', $user->place_of_birth) }}">
                </div>

                <!-- Address -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                    <label class="w-32 text-gray-700 font-medium">{{ __('Address') }}</label>
                    <input type="text" name="address" class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full"
                        value="{{ old('address', $user->address) }}">
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                    <label class="w-32 text-gray-700 font-medium">{{ __('City') }}</label>
                    <input type="text" name="city" class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full"
                        value="{{ old('city', $user->city) }}">
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                    <label class="w-32 text-gray-700 font-medium">{{ __('Country') }}</label>
                    <input type="text" name="country" class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full"
                        value="{{ old('country', $user->country) }}">
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                    <label class="w-32 text-gray-700 font-medium">{{ __('ZIP') }}</label>
                    <input type="text" name="zip" class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full"
                        value="{{ old('zip', $user->zip) }}">
                </div>

                <div class="flex justify-end mt-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                </div>
            </div>
        </form>
    </div>
</div>