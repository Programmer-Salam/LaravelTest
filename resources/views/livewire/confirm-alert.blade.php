<div>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Livewire Example</title>
        
        <!-- SweetAlert CDN -->
      
        {{-- @livewireStyles --}}
    </head>
    <body>
        <div>
            <form wire:submit.prevent="createDocument">
                <button type="submit">Submit</button>
            </form>
            
            @livewireScripts
            <script>
                Livewire.on('swal', function(data) {
                    Swal.fire({
                        title: data.title || 'Alert',
                        text: data.text || '',
                        icon: data.icon || 'info',
                        confirmButtonText: 'OK',
                    });
                });
            </script>
        </div>
    </body>
    </html>
    
</div>
