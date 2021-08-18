@props(['trigger'])
<div x-data="{ show: false }">
    <div @click="show = !show">
        {{ $trigger }}
    </div>
    <div x-show="show" class="absolute bg-gray-100 lg:w-32 mt-2 rounded-xl overflow-auto max-h-52" style="display: none">
        {{ $slot }}
    </div>
</div>