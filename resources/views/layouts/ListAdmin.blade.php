<span class="heading">@lang("Control.Admin")</span>
<ul class="list-unstyled">
    <li class="@yield('AddAdminUserActive')"><a href="{{route('AdminAddUser')}}"> <i
                class="fa fa-address-card"></i>@lang("Control.Add User")
        </a></li>
    <li class="@yield('Director')"><a href="{{route('Director')}}"> <i
                class="fa fa-address-card"></i>@lang("Control.Director")
        </a></li>

    @if (auth::isadmin())
    <li class="@yield('SendMess')"><a href="{{route('SendMess')}}"> <i
                class="fa fa-address-card"></i>@lang("Control.SendMess")
        </a></li>
    <li class="@yield('AdminProxy')"><a href="{{route('adminProxy')}}"> <i
                class="fa fa-address-card"></i>@lang("Control.AdminProxy")
        </a></li>
    <li class="@yield('AdminEmail')"><a href="{{route('AdminAddEmailsForBotAddAccount')}}"> <i
                class="fa fa-address-card"></i>@lang("Control.AdminAccount")
        </a></li>
    <li class="@yield('AddAndSaveNewNames')"><a href="{{route('AddAndSaveNewNames')}}"> <i
                class="fa fa-address-card"></i>@lang("Control.AddAndSaveNewNames")
        </a></li>
    <li class="@yield('ProxyHaveBeenDeleta')"><a href="{{route('ProxyHaveBeenDeleta')}}"> <i
                class="fa fa-address-card"></i>@lang("Control.ProxyHaveBeenDeleta")
        </a></li>

</ul>

<span class="heading">@lang("Control.FakeAcoounts")</span>
<ul class="list-unstyled">
    <li class="@yield('FakeEmails')"><a href="{{route('FakeAddEmails')}}"> <i
                class="fa fa-address-card"></i>@lang("Control.FakeAddEmails")
        </a></li>
    <li class="@yield('FakeAddNewTask')"><a href="{{route('FakeAddNewTask')}}"> <i
                class="fa fa-address-card"></i>@lang("Control.FakeAddNewTask")
        </a></li>


</ul>
<span class="heading">@lang("Control.server")</span>
<ul class="list-unstyled">
    <li class="@yield('ShowStatus')">
        <a href="{{route('ShowStatus')}}"><i class="fa fa-cog"></i>@lang("Control.ShowStatus")
        </a>
    </li>

    <li class="@yield('ShowPlan')">
        <a href="{{route('ShowPlan')}}"><i class="fa fa-cog"></i>@lang("Control.ShowPlan")
        </a>
    </li>
</ul>

@endif



@if (env("ShowLoadAvrge"))
<span class="heading">@lang("Control.status")</span>
<ul class="list-unstyled">

    <li>
        <a href="#"> <i
                class="fa fa-address-card"></i>AVR(15Min):<?php echo sys_getloadavg()[2]*env('AvergTo100')."%" ?>
        </a>
        <a href="#"> <i class="fa fa-address-card"></i>AVR(5Min):<?php echo sys_getloadavg()[1]*env('AvergTo100')."%" ?>
        </a>
        <a href="#"> <i class="fa fa-address-card"></i>AVR(1Min):<?php echo sys_getloadavg()[0]*env('AvergTo100')."%" ?>
        </a>
        <?php    Artisan::call('GetCountRuns'); $runsonserver = Cache::get('statusRuns'); ?>
        @if(isset($runsonserver->pro)) <a href="#"> <i class="fa fa-address-card"></i>Run
            Pro(1Min):{{$runsonserver->pro}}/{{DB::table('worldsettings')->where("run",true)->count()}}
        </a>@endif
        @if(isset($runsonserver->nopro)) <a href="#"> <i class="fa fa-address-card"></i>Run
            NonPro(1Min):{{$runsonserver->nopro}}/{{DB::table('worldsettings')->where("runnopro",true)->count()}}
        </a>@endif



    </li>

</ul>
@endif
