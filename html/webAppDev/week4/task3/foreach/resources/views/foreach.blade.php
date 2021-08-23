
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Foreach loop example</title>
        <link rel="stylesheet" href="{{asset('css/wp.css')}}" type="text/css">

    </head>
    <body>
            <table class="bordered">
                    <!-- table header -->
                    <tr><th>Name</th><th>Value</th></tr>
                @forelse ($get as $name => $value)
                {{-- loop through the array --}}
                    @if ($loop->index %2 == 1) 
                    {{--get the index of the present loop--}}
                        <tr class="alt"><td>{{$name}}:</td><td>{{$value}}</td></tr>
                    @else 
                        <tr><td>{{$name}}:</td><td>{{$value}}</td></tr>
                    @endif
                @empty
                    <tr><td colspan="2">No URL variable</td></tr>
                    {{--if there's no content in the array, print the string out and this string will occupy two columns--}}
                @endforelse
            </table>
    </body>
</html>