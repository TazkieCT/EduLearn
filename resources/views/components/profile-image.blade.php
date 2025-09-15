@props(['src'])

<div x-data="{ loading: false, imageUrl: '{{ $src }}' }" class="relative w-24 h-24 rounded-full overflow-hidden bg-gray-100 flex items-center justify-center border border-gray-300">
    <template x-if="loading">
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="w-12 h-12 border-4 border-indigo-400 border-dashed rounded-full animate-spin"></div>
        </div>
    </template>

    <img :src="imageUrl" alt="Profile Picture" class="w-full h-full object-cover" :class="{ 'opacity-50': loading }">

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
