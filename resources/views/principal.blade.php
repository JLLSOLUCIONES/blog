<x-app-layout>
  <div class="bg-gray-100 text-center" style="display: flex; justify-content: center;">
        <div class="wp-block-cover alignfull is-light bg-gray-100 text-center" style="width: auto; padding: 2em;
        color: #000000;
        font-family: Poppins, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen-Sans, Ubuntu, Cantarell, Helvetica Neue, sans-serif;height: 600px;
        font-size: 85px;">
    THE DISASTER BOX
    </div>
      </div>
    
    <div style="background-color: #f4db89; display: flex; justify-content: center;">
        <div style="background: #f4db89; width: auto; padding: 4em; margin: 0 auto;margin: 0;
        color: #ffffff;
        font-family: Poppins, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen-Sans, Ubuntu, Cantarell, Helvetica Neue, sans-serif;
        font-size: 75px;min-height:100px;">
    hi. my name is Lara and i am many things.
    </div>
      </div>
    
    <div style="background-color: #afd3e9; display: flex; justify-content: center;">
        <div style="background: #afd3e9; width: auto; padding: 4em; margin: 0 auto;margin: 0;
        color: #ffffff;
        font-family: Poppins, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen-Sans, Ubuntu, Cantarell, Helvetica Neue, sans-serif;
        font-size: 75px;">
    i am an interior designer and a psychologist and a painter. a visual merchandiser, a decorator, a flower and art lover.
    </div>
      </div>
    
    <div style="background-color: #769f73; display: flex; justify-content: center;">
        <div style="background: #769f73; width: auto; padding: 4em; margin: 0 auto;margin: 0;
        color: #ffffff;
        font-family: Poppins, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen-Sans, Ubuntu, Cantarell, Helvetica Neue, sans-serif;
        font-size: 75px;">
    a photographer and a set designer for my breakfast and lunch.
    </div>
      </div>
    
    <div style="background-color: #d7664a; display: flex; justify-content: center;">
        <div style="background: #d7664a; width: auto; padding: 4em; margin: 0 auto;margin: 0;
        color: #ffffff;
        font-family: Poppins, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen-Sans, Ubuntu, Cantarell, Helvetica Neue, sans-serif;
        font-size: 75px;">
    i can be many things… join me and let’s become many more together.
    </div>
    </div>
  
          <!--
          This example requires Tailwind CSS v2.0+ 
  
          This example requires some changes to your config:
  
          ```
          // tailwind.config.js
          module.exports = {
            // ...
            plugins: [
              // ...
              require('@tailwindcss/aspect-ratio'),
            ],
          }
          ```
          -->       
        {{-- Aqui saldra el grid de imagenes de instagram --}}
        <div class="bg-gray-100 z-0">
            <div class="max-w-xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                <h2 class="text-lg text-center">@the.disasterbox</h2>
                <br>
                <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                    @foreach ($files as $file)
                        <a href="{{$file->link}}" target="_blank" class="group">
                            <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-4 xl:aspect-h-5">
                                <img src="{{Storage::url($file->url)}}" alt="" class="w-full h-72 object-center object-cover group-hover:opacity-75">
                            </div>
                        </a>
                    @endforeach
              </div>
            </div>
          </div>
  
         
  </x-app-layout>