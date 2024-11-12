<nav class="sidebar d-flex flex-column p-3">
    <a href="{{ url('/') }}" class="navbar-brand text-white mb-3">LaprasUI</a>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="18" height="18" fill="currentColor"><path d="M32 419L0 479.2l.8-328C.8 85.3 54 32 120 32h327.2c-93 28.9-189.9 94.2-253.9 168.6C122.7 282 82.6 338 32 419M448 32S305.2 98.8 261.6 199.1c-23.2 53.6-28.9 118.1-71 158.6-28.9 27.8-69.8 38.2-105.3 56.3-23.2 12-66.4 40.5-84.9 66h328.4c66 0 119.3-53.3 119.3-119.2-.1 0-.1-328.8-.1-328.8z"/></svg> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('account') }}" class="nav-link {{ request()->routeIs('account') ? 'active' : '' }}">
                <i class="fa-solid fa-landmark"></i> Account
            </a>
        </li>

        {{-- Additional links from modules --}}
        @if(!empty($additionalLinks))
        @foreach($additionalLinks as $link)
                @if(isset($link['group']))
                    {{-- Render grouped links as a dropdown --}}
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            {!! $link['icon'] ?? '' !!} {{ $link['group'] }}
                        </a>
                        <ul class="dropdown-menu">
                            @foreach($link['links'] as $groupedLink)
                                <li>
                                    <a href="{{ $groupedLink['route'] }}" class="dropdown-item {{ $groupedLink['active'] ? 'active' : '' }}">
                                        {!! $groupedLink['icon'] ?? '' !!}
                                        {{ $groupedLink['name'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @else
                    {{-- Render single link --}}
                    <li>
                        <a href="{{ $link['route'] }}" class="nav-link {{ $link['active'] ? 'active' : '' }}">
                            {!! $link['icon'] ?? '' !!}
                            {{ $link['name'] }}
                        </a>
                    </li>
                @endif
            @endforeach
        @endif
    </ul>
</nav>
