<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
           Test
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
               Dashboard
            </a>
        </li>
        @if(auth()->user()->role->title == 'Admin')
        <li class="c-sidebar-nav-item">
            <a href="{{ route("users.index") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-user fa-tachometer-alt">

                </i>
              Student
            </a>
        </li>
      
        <li class="c-sidebar-nav-item">
        <a href="{{ route("questions.index") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-question"></i>
                Questions
            </a>
        </li>
        @endif
        <li class="c-sidebar-nav-item">
        <a href="{{ route('indexexam') }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-graduation-cap"></i>
                
               Exam
            </a>
        </li>
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    Logout
                </a>
            </li>
    </ul>

</div>