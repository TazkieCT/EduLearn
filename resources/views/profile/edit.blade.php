<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Profile</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <!-- Tabs -->
            <x-tabs :tabs="[
                'profile' => 'Profile Info', 
                'password' => 'Update Password', 
                'delete' => 'Delete Account'
            ]" active="profile">

                <!-- Profile Info Tab -->
                <div x-show="tab === 'profile'" x-cloak>
                    <x-card-form title="Profile Information" description="Update your account's profile information, email, and profile picture.">

                        @if(session('status') === 'profile-updated')
                            <div class="text-green-600 mb-4">Profile updated successfully!</div>
                        @endif

                        <form method="post" action="{{ route('profile.update') }}" class="space-y-6" enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <div class="flex flex-col sm:flex-row sm:space-x-6">

                                <!-- Profile Image -->
                                <div class="flex-shrink-0 mb-4 sm:mb-0">
                                    <x-profile-image :src="$user->profile_image ? asset('storage/profile_images/' . $user->profile_image) : asset('images/default-profile.png')" />
                                </div>

                                <!-- Input Fields -->
                                <div class="flex-1 space-y-4">
                                    <x-form-input label="First Name *" name="first_name" :value="$user->first_name" />
                                    <x-form-input label="Last Name *" name="last_name" :value="$user->last_name" />
                                    <x-form-input label="Email *" name="email" type="email" :value="$user->email" />
                                    <x-form-input label="Gender" name="gender" type="select" :value="$user->gender" :options="['male'=>'Male','female'=>'Female']" />
                                    <x-form-input label="Date of Birth" name="dob" type="date" :value="$user->dob" />
                                    <x-form-input label="Place of Birth" name="place_of_birth" :value="$user->place_of_birth" />
                                    <x-form-input label="Address" name="address" :value="$user->address" />
                                    <x-form-input label="City" name="city" :value="$user->city" />
                                    <x-form-input label="Country" name="country" :value="$user->country" />
                                    <x-form-input label="ZIP" name="zip" :value="$user->zip" />

                                    <div class="flex justify-end mt-4">
                                        <x-primary-button>Save</x-primary-button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </x-card-form>
                </div>

                <!-- Update Password Tab -->
                <div x-show="tab === 'password'" x-cloak>
                    <x-card-form title="Update Password" description="Ensure your account is using a long, random password to stay secure.">
                        <form method="post" action="{{ route('password.update') }}" class="space-y-4">
                            @csrf
                            @method('put')

                            <x-form-input label="Current Password" name="current_password" type="password" />
                            <x-form-input label="New Password" name="password" type="password" />
                            <x-form-input label="Confirm Password" name="password_confirmation" type="password" />

                            <div class="flex items-center justify-end mt-4 space-x-3">
                                <x-primary-button>Save</x-primary-button>
                            </div>
                        </form>
                    </x-card-form>
                </div>

                <!-- Delete Account Tab -->
                <div x-show="tab === 'delete'" x-cloak>
                    <x-card-form title="Delete Account" description="Once your account is deleted, all resources and data will be permanently deleted. Please confirm your password to proceed." color="red-600">
                        <form method="post" action="{{ route('profile.destroy') }}" class="space-y-4">
                            @csrf
                            @method('delete')

                            <x-form-input label="Password" name="password" type="password" />

                            <div class="flex justify-end space-x-3 mt-4">
                                <x-danger-button>Delete Account</x-danger-button>
                            </div>
                        </form>
                    </x-card-form>
                </div>

            </x-tabs>
        </div>
    </div>
</x-app-layout>
