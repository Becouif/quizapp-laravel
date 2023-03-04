
<!-- *** NOTE: sidebar was not copied right, make sure to do it right **** -->

</div>
    <!-- /navbar -->
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="span3">
                    <div class="sidebar">
                        <ul class="widget widget-menu unstyled">
                            <li class="active"><a href="{{url('/')}}"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                            <li><a href="{{route('quiz.create')}}"><i class="menu-icon icon-bullhorn"></i>Create Quiz</a>
                            </li>
                            
                            <li><a href="{{route('quiz.index')}}"><i class="menu-icon icon-inbox"></i>View Quiz</a></li>
                            
                        </ul>
                        <!--/.widget-nav for question-->
                        <ul class="widget widget-menu unstyled">
                            <li><a href="{{route('question.create')}}"><i class="menu-icon icon-bold"></i> Create Question </a></li>
                            <li><a href="{{route('question.index')}}"><i class="menu-icon icon-book"></i>View Questions </a></li>
                        </ul>

                        <!--/.widget-nav for exam-->
                        <ul class="widget widget-menu unstyled">
                            <li><a href="{{route('exam.assign.create')}}"><i class="menu-icon icon-bold"></i>Assign Exam </a></li>
                            <li><a href="{{route('exam.assign.user')}}"><i class="menu-icon icon-book"></i>View Exam User </a></li>
                        </ul>

                        <ul class="widget widget-menu unstyled">
                            <li><a href="{{route('user.create')}}"><i class="menu-icon icon-bold"></i> Create User </a></li>
                            <li><a href="{{route('user.index')}}"><i class="menu-icon icon-book"></i>View Users </a></li>
                        </ul>
                        <ul class="widget widget-menu unstyled">
                            <li><a href="{{route('result')}}"><i class="menu-icon icon-paste"></i>Result </a></li>
                            <li><a href="table.html"><i class="menu-icon icon-table"></i>Tables </a></li>
                            <li><a href="charts.html"><i class="menu-icon icon-bar-chart"></i>Charts </a></li>
                        </ul>
                        <!--/.widget-nav-->
                        <ul class="widget widget-menu unstyled">
                            
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="menu-icon icon-signout"></i>
                                        {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                </form>
                            </li>
                            
                        </ul>
                    </div>