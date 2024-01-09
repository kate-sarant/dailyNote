<form action='search' method="POST">
    @csrf
      <x-text-input
           
          aria-autocomplete="off" 
          type="text" 
          name="q" 
          placeholder="Search"
         
      
      ></x-text-input>
      <x-primary-button> Search </x-primary-button>
      </form>