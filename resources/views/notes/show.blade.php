<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{!$note->trashed()? __('Notes'): __('Trash')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-success-note >
                        {{ session('success') }}
                    </x-success-note>
                 
                        <div class='text-4xl'> {{ $note->title }}</div>
                        @if(!$note->trashed())
                            <div class=''>
                                <p  class='text-sm block mt-4 opacity-70'>
                                <strong> Created at:</strong> {{ $note->created_at->diffForHumans() }}
                                </p>
                                <p  class='text-sm block mt-1 opacity-70'><strong>Updated :</strong> {{ $note->updated_at->diffForHumans() }}</p>   
                            </div>  
                        <div class=' dark:bg-gray-700 my-6 p-6  rounded-lg border-gray-200 shadow-sm '>
                        <div class='text-lg tracking-wide whitespace-pre-wrap'>{{ $note->text }}</div>
                            <div>
                                <a href="{{ route('notes.edit',$note) }}"  class='btn-link mt-4 bg-blue-700 uppercase'>Update Note</a>
                                <form class="float-right m-4" action="{{ route('notes.destroy',$note) }}" method="POST"  >
                                    @method('delete')
                                    @csrf
                                <button type='submit' class='btn-link btn-danger' onclick="return confirm('Are you sure you want to move this to trash?')">Move to Trash</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class=''>
                       <p  class='text-sm block mt-1 opacity-70'><strong>Deleted at:</strong> {{ $note->deleted_at->diffForHumans() }}</p>   
                       </div>  
                        <div class=' dark:bg-gray-700 my-6 p-6  rounded-lg border-gray-200 shadow-sm '>
                        <div class='text-lg tracking-wide whitespace-pre-wrap'>{{ $note->text }}</div>
                            <div class='flex justify-between'>
                                {{-- move from soft delete page to note.index --}}
                               <form action="{{ route('trashed.update',$note)}}" method='POST'>
                                @method('PUT')
                                @csrf
                                <button type="submit" class='btn-link uppercase mt-10 '>Restore Note</button>
                               </form>
                               {{-- delete note --}}
                                <form class="float-right m-4" action="{{ route('trashed.destroy',$note) }}" method="POST"  >
                                    @method('delete')
                                    @csrf
                                <button type='submit' class='btn-link btn-danger mt-8' onclick="return confirm('Are you sure you want to delete this note permantly, this action can not be undone?')">Delete</button>
                                </form>
                            </div>
                        </div>

                    @endif
                        <br><br>
                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
