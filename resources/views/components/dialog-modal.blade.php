@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="border-y-4 border-black">
        <div class="px-6 py-4">
            <div class="text-xl font-medium text-gray-900 text-center">
                {{ $title }}
            </div>

            <div class="mt-4 text-sm text-gray-600">
                {{ $content }}
            </div>
        </div>

        <div class="flex flex-row justify-end px-6 border-t-4 m-3 border-black py-4 text-end">
            {{ $footer }}
        </div>
    </div>
</x-modal>
