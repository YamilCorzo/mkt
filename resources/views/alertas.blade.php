{{-- Message --}}
@if($errors->has('message'))
    <script>
        Swal.fire({
            icon: 'error',
            text: '{{$errors->first('message')}}'
        });
    </script>
{{-- Avisos --}}
@elseif (session('info'))
    <script>
        Swal.fire({
            icon: 'info',
            text: '{{session('info')}}'
        });
    </script>
{{-- Correcto --}}
@elseif (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            text: '{{session('success')}}'
        });
    </script>
{{-- Advertencia --}}
@elseif (session('warning'))
    <script>
        Swal.fire({
            icon: 'warning',
            text: '{{session('warning')}}',
        });
    </script>
{{-- Status --}}
@elseif (session('status'))
    <script>
        Swal.fire({
            icon: 'warning',
            text: '{{session('status')}}',
        });
    </script>
@elseif($errors->any())
    @php($html = '<ul>')
    @forelse ($errors->all() as $error)
        @php($html = $html.'<li>'.$error.'</li>')
    @empty
        @php($html = $html.'<li>'.$errors->first().'</li>')
    @endforelse
    @php($html = $html.'</ul>')
    <script>
        Swal.fire({
            icon: 'error',
            html: '{!!$html!!}',
        });
    </script>
@endif
@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            text: "{{session('success')}}"
        });
    </script>
@elseif (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            text: "{{session('error')}}"
        });
    </script>
@endif