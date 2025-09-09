<div class="bg-white rounded-lg shadow p-4 mb-6 flex space-x-4">
    <button @click="direction = tab === 'profile' ? 'left' : 'right'; tab = 'profile'" 
            :class="{ 'border-b-2 border-indigo-500 font-semibold': tab === 'profile' }"
            class="px-3 py-2 text-gray-700 hover:text-gray-900 focus:outline-none">
        {{ __('Profile Info') }}
    </button>

    <button @click="direction = tab === 'password' ? 'left' : 'right'; tab = 'password'" 
            :class="{ 'border-b-2 border-indigo-500 font-semibold': tab === 'password' }"
            class="px-3 py-2 text-gray-700 hover:text-gray-900 focus:outline-none">
        {{ __('Update Password') }}
    </button>

    <button @click="direction = tab === 'delete' ? 'left' : 'right'; tab = 'delete'" 
            :class="{ 'border-b-2 border-red-500 font-semibold': tab === 'delete' }"
            class="px-3 py-2 text-gray-700 hover:text-gray-900 focus:outline-none">
        {{ __('Delete Account') }}
    </button>
</div>