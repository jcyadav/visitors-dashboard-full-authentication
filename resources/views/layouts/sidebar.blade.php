<aside>
    <div id="sidebar" class="nav-collapse">

        <ul class="sidebar-menu" id="nav-accordion">

            @foreach($menus as $menu)

                @if($menu->children->count())

                    <li class="sub-menu">

                        <a href="javascript:;">
                            <i class="{{ $menu->tab_icon_class }}"></i>
                            <span>{{ $menu->tab_name }}</span>
                        </a>

                        <ul class="sub">

                            @foreach($menu->children as $child)

                                @php

                                    $route = '#';

                                    switch ($child->link_url) {

                                        case 'MyAccount/MyProfile.php':
                                            $route = route('MyProfile');
                                            break;

                                        case 'Assessment/qone.php':
                                            $route = route('qone');
                                            break;

                                        case 'Assessment/qtwo.php':
                                            $route = route('qtwo');
                                            break;

                                        case 'Assessment/qthree.php':
                                            $route = route('qthree');
                                            break;
                                    }

                                @endphp

                                <li>
                                    <a href="{{ $route }}">
                                        {{ $child->tab_name }}
                                    </a>
                                </li>

                            @endforeach

                        </ul>

                    </li>

                @else

                    @php

                        $route = '#';

                        switch ($menu->link_url) {

                            case 'Dashboard.php':
                                $route = route('Dashboard');
                                break;

                            case 'Logout.php':
                                $route = route('Logout');
                                break;
                        }

                    @endphp

                    <li>

                        <a href="{{ $route }}">

                            <i class="{{ $menu->tab_icon_class }}"></i>

                            <span>{{ $menu->tab_name }}</span>

                        </a>

                    </li>

                @endif

            @endforeach

        </ul>

    </div>
</aside>