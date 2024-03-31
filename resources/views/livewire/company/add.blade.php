<form wire:submit.prevent="store">
    <div class="flex justify-between">
        <div class="mb-4">
            <div class="text-gray-500">Create Company</div>
        </div>
        <div class="mb-4">
            <a href="{{ route('dashboard') }}"  class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mr-2"> Back</a>
            <input type="submit" value="Submit" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded">
        </div>
    </div>
    
   <div class="flex mb-3 text-gray-500">
        COMPANY INFROMATION
   </div>

   @if (session()->has('success'))
        <div class="bg-green-200 text-green-800 border border-green-400 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session()->get('success') }}</span>
        </div>
   @endif
    <div class="flex">
        <div class="mb-4 flex-1 mr-2 mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
            <input type="text" id="name" wire:model="name" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded-md shadow-sm focus:outline-none focus:shadow-outline" placeholder="Enter company name">
            @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4 flex-1">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
            <input type="text" id="email" wire:model="email" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded-md shadow-sm focus:outline-none focus:shadow-outline" placeholder="Enter company email">
            @error('email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="flex mr-2">
        <div class="relative flex-1 mr-2">
            <label for="file" class="block text-gray-700 font-bold mt-2">Logo</label>
            <input type="file" id="file" accept="image/png, image/jpeg" wire:model="logo" class="w-full flex w-full px-3 py-2 leading-tight border-gray-500 border rounded-md shadow-sm focus:outline-none focus:shadow-outline" >       
            @error('logo')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
            @if ($logo)
                <img class="rounded w-20 h-20 mx-6 mt-4 block" src="{{ $logo->temporaryUrl() }}" >
            @endif
        </div>
        <div class="mb-4 flex-1">
            <label for="website" class="block text-gray-700 font-bold mb-2">Website</label>
            <input type="text" id="website" wire:model="website" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded-md shadow-sm focus:outline-none focus:shadow-outline" placeholder="Enter company website">
            @error('website')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
    </div>    
</form>
