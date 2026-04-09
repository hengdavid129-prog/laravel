<x-layout>

    <form method="POST" action="/ideas">
        @csrf

        <div class="col-span-full">
            <label for="description" class="block text-sm/6 font-medium text-white">Create New Idea</label>
            <div class="mt-2">
                <textarea id="description" name="description" rows="3" class="textarea w-full @error('description') textarea-error @enderror"></textarea>
                <x-form.error name="description" />
                {{-- @if ($errors->has('description'))
                    <p class="text-xs text-red-500 mt-1">{{ $errors->first('description') }}</p>
                @endif --}}
            </div>
            <p class="mt-3 text-sm/6 text-gray-400">Have an idea you want to save later?</p>
        </div>
        <div class="mt-6 flex items-center gap-x-6">
            <button type="submit" class="btn">Save</button>
        </div>
    </form>

</x-layout>
