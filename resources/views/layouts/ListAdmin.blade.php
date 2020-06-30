<span class="heading">Admin</span>
<ul class="list-unstyled">
    <li class="@yield('ShowAllUsers')"><a href="{{route('ShowAllUsers')}}"> <i class="fa fa-address-card"></i>Show Users
        </a></li>

    <li class="@yield('ShowAllFreelancser')"><a href="{{route('ShowAllFreelancser')}}"> <i
                class="fa fa-address-card"></i>Show Freelancer
        </a></li>


    <li class="@yield('ShowAllProjects')"><a href="{{route('ShowAllProjects')}}"> <i class="fa fa-address-card"></i>Show All projects
        </a></li>
    <li class="@yield('ShowProjectNotConf')"><a href="{{route('ShowProjectNotConf')}}"> <i
                class="fa fa-address-card"></i>Show Porject Active
        </a></li>

