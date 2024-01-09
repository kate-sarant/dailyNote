
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{request()->routeIs('notes.index')|| request()->path()  == "search" ? __('Notes'): __('Trash')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
              
                    <div class=''>
                        {{-- this display is for note index page and search-bar --}}
                @if(request()-> routeIs('notes.index') || request()->path()  == "search")
                    <div class='text-4xl'>Notes table</div>
                        
                    <div class='float-right'>     
                       <x-form-search></x-form-search>
                        <div class='lg:float-right mt-10 mr-5'> 
                        <p id="count" class="text-lg">You have {{ $count}} notes </p>
                    </div>
                        <span class='text-red-600'>{{ session('message') }}</span>
                    </div>
           
                    <x-success-note>
                        {{ session('success') }}
                    </x-success-note>
                @else
                 {{-- this display is for trash index page and search-bar --}}
                     <div class='text-4xl'>Trash table</div>
                     <div class='float-right'>
                        <x-trashed_form-search></x-trashed_form-search>
                        <div class='float-right mt-10 mr-5'> 
                            <p class="text-lg">You have {{ $count}} notes </p>
                        </div>
                        <span class='text-red-600'>{{ session('message') }}</span>
                </div>
                    <x-success-note>
                    {{ session('success') }}
                    </x-success-note>
                @endif

                   <br>
                                {{-- if page is note --}}
                   @if(request()->routeIs('notes.index'))
                        <a href="{{ route('notes.create') }}" class="btn-lg btn-link my-10">+ New Note</a>
                    @else  
                        <br> 
                        <br>
                    @endif

                <br>

                    {{-- display the notes from db  to the table--}}
                    @forelse  ($notes as $note)
                                    
                    <div  class='dark:bg-gray-700 my-6 p-6  rounded-lg border-gray-200 shadow-sm '>
                        <div class='font-bold text-3xl'>
                    
                            <a 
                            @if (request()->routeIs('notes.show'))

                            href="{{ route('notes.show',$note) }}" 
                            @else
                            href="{{ route('trashed.show',$note) }}" 
                            @endif
                            >{{ $note->title }}</a>
                    
                        </div>
                        <br>
                        <div class='text-lg wrap-nowrap'>{{ Str::limit($note->text,200) }}</div>
                        <br>
                        <div class='text-sm block mt-4 opacity-70'>{{ $note->updated_at->diffForHumans() }}</div>
                    </div>
                        <br> <br>
                    @empty
                        <br> 
                        @if(request()->routeIs('notes.index'))
                        <p>Create your first note! </p>
                        @else
                        <p>No items in the trash! </p>
                        @endif
                        <br>
                       
                    @endforelse
                    {{-- paginate --}}
                    <p> {{ $notes->links()}}</p>
                   
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
