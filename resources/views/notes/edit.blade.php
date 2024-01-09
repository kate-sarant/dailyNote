<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <div class='text-4xl'>{{ __('Edit Note') }}
                                
                   <div class=' dark:bg-gray-700 my-6 p-6  rounded-lg border-gray-200 shadow-sm '>
                

                    <form action="{{ route('notes.update',$note) }}" method="POST">
                        @method('put')
                      @csrf
                        <x-text-input
                            class='w-full' 
                            aria-autocomplete="off" 
                            type="text" 
                            name="title" 
                            placeholder="Title"
                            :value="$note->title,@old('title')"
                        
                        ></x-text-input>
                     
                        {{-- error message --}}
                        @error('title')
                            <span class="error-msg">{{ $message }}</span>
                        @enderror
                        {{-- error message --}}
                        
                        <x-textarea class='w-full mt-6' name="text"  placeholder="Start typing here..." rows="10"
                        :value="$note->text,@old('text'),"></x-textarea>
                 
                        {{-- error message --}}
                        @error('text')
                            <span class="error-msg">{{ $message }}</span>
                        @enderror
                        {{-- error message --}}
                        <div>
                            <x-primary-button class='mt-6'>Save Note</x-primary-button>
                        </div>
                    </form>
                </div>
                    <br> <br>
                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
