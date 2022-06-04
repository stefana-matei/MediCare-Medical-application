<div id="breadcrumbs">
    <ul class="page-breadcrumbs">

        @foreach($segments as $segment)
            <li class="item">
                <a href="{{ $segment['href'] }}" class="link">{{ $segment['name'] }}</a>

                <i class="separator icofont-thin-right"></i>
            </li>
        @endforeach
    </ul>
</div>
