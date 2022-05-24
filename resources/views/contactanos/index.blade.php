<x-app-layout>
    <div class="container py-8"> 
        <div>
          <br>
          <br>
          <br>
            <h1 class="text text-3xl font-extrabold">Contact</h1>
            <br>
            <h1>hey, feel free to ask me anything here.</h1>
            <br>
            <br>
            <br>
            <form action="{{route('contactanos.store')}}" method="POST" class="w-full max-w-lg">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                      First Name
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" name="firstname" placeholder="">
                    {{-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> --}}
                  </div>
                  <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                      Last Name
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" name="lastname" placeholder="">
                  </div>
                  @error('firstname')
                    <p><strong>{{$message}}</strong></p>  
                  @enderror
                </div>
                
                <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                      E-mail
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" name="mail" type="email">
                   {{--  <p class="text-gray-600 text-xs italic">Some tips - as long as needed</p> --}}
                  </div>
                   @error('mail')
                        <p><strong>{{$message}}</strong></p>  
                    @enderror
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                      Message
                    </label>
                    <textarea class=" no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none" id="message" name="message"></textarea>
                    {{-- <p class="text-gray-600 text-xs italic">Re-size can be disabled by set by resize-none / resize-y / resize-x / resize</p> --}}
                  </div>
                  @error('message')
                    <p><strong>{{$message}}</strong></p>  
                @enderror
                </div> 
                <div class="md:flex md:items-center">
                  <div class="md:w-1/3">
                    <br>
                    <button class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                      Send
                    </button>
                  </div>
                  <div class="md:w-2/3"></div>
                </div>
              </form>

              @if (session('info'))
                  <script>
                      alert("{{session('info')}}");
                  </script>
              @endif
        </div>
        <br>
        <br>
        <h1>or you can also email me here.</h1>
        <br>
        <br>
        <h1>lara.martina8mjm@outlook.com</h1>
        <h1>+33 6 68 57 49 99</h1>
    </div>
</x-app-layout>

        
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    











      

