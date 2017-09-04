<ol class="breadcrumb">
    @foreach($breadcrum as $name=>$url)
    <li @if($loop->last) class="active" @endif >
        @if(!empty($url))
            <a href="{{ $url }}">{{ $name }}</a>
        @else
            {{ $name }}
        @endif
    </li>
    @endforeach
</ol>
