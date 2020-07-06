<span class="heading">users</span>

<ul class="list-unstyled">
    <li class="@yield('HomeActive')"><a href="{{route('home')}}"> <i class="icon-home"></i>subscribe
        </a></li>
    <li class="@yield('ShowProjects')"><a href="{{route('showallprojects')}}"> <i class="fa fa-folder"></i>Show All
            Projects
        </a></li>
    <li class="@yield('Invoices')"><a href="{{route('Invoices')}}"> <i class="fa fa-file-word-o"></i>Invoices
        </a></li>
    {{--<li class="@yield('AddMoney')"><a href="{{route('ViewAddMoney')}}"> <i class="fa fa-money"></i> Add Money</a></li>--}}


</ul>
