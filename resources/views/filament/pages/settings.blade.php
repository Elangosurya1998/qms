<x-filament-panels::page>
    <form wire:submit.prevent="submit" class="space-y-6">
        {{ $this->form }}

        <!-- Submit Button -->
        <div class="flex justify-start">
            <x-filament::button type="submit" class="bg-primary-600 hover:bg-primary-700">Save</x-filament::button>
        </div>
    </form>
</x-filament-panels::page>
