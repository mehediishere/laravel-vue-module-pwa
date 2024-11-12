<nav class="sidebar d-flex flex-column p-3">
    <a href="{{ url('/') }}" class="navbar-brand text-white mb-3">LaprasUI</a>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page">
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('account') }}" class="nav-link {{ request()->routeIs('account') ? 'active' : '' }}">
                Account
            </a>
        </li>

        {{-- Additional links from modules --}}
        @if(!empty($additionalLinks))
            @foreach($additionalLinks as $link)
                @if(isset($link['group']))
                    {{-- Render grouped links as a dropdown --}}
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ $link['group'] }}
                        </a>
                        <ul class="dropdown-menu">
                            @foreach($link['links'] as $groupedLink)
                                <li>
                                    <a href="{{ $groupedLink['route'] }}" class="dropdown-item {{ $groupedLink['active'] ? 'active' : '' }}">
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
                            {{ $link['name'] }}
                        </a>
                    </li>
                @endif
            @endforeach
        @endif
    </ul>
</nav>
