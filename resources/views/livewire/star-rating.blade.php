<div class="flex items-center space-x-2">
    @for ($i = 1; $i <= 5; $i++)
        <svg wire:click="setRating({{ $i }})" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 cursor-pointer {{ $i <= $rating ? 'text-yellow-500' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M10 15.27l3.93 2.07a1 1 0 0 0 1.47-1.06l-1.5-4.6L18 7.72a1 1 0 0 0-.62-1.7l-4.73-.34L10 2.77 7.35 5.68 2.62 6.02a1 1 0 0 0-.62 1.7l4.2 4.16-1.5 4.6a1 1 0 0 0 1.47 1.06L10 15.27z" clip-rule="evenodd" />
        </svg>
    @endfor
    <span class="text-sm">{{ $rating }} / 5</span>
</div>

