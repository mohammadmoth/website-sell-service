<span class="heading">@lang("Control.users")</span>

<ul class="list-unstyled">
    <li class="@yield('HomeActive')"><a href="{{route('home')}}"> <i class="icon-home"></i>@lang("Control.subscribe")
        </a></li>
    <li class="@yield('HomeActive')"><a href="{{route('showallprojects')}}"> <i class="fa fa-folder"></i>@lang("Control.ShowAllProjects")
        </a></li>
</ul>
