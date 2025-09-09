<div x-show="tab === 'delete'" x-cloak>
    <div class="bg-white shadow rounded-lg p-6 space-y-6">
        <h3 class="text-lg font-semibold text-red-600">{{ __('Delete Account') }}</h3>
        <p class="text-sm text-gray-600">{{ __('Once your account is deleted, all resources and data will be permanently deleted. Please confirm your password to proceed.') }}</p>

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