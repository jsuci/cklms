<!DOCTYPE html>
<!-- saved from url=(0060)# -->
<html lang="en" class=""><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Basic Page Needs
    ================================================== -->
    <title>Courseplus Learning HTML Template</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Courseplus - Professional Learning Management HTML Template">

    <!-- Favicon -->
    <link href="#" rel="icon" type="image/png">

    <!-- CSS 
    ================================================== -->
    <link rel="stylesheet" href="{{asset('templatefiles/style.css')}}">
    <link rel="stylesheet" href="{{asset('templatefiles/night-mode.css')}}">
    <link rel="stylesheet" href="{{asset('templatefiles/framework.css')}}">
    <link rel="stylesheet" href="{{asset('templatefiles/bootstrap.css')}}">

    <!-- icons
    ================================================== -->
    <link rel="stylesheet" href="{{asset('templatefiles/icons.css')}}">


</head>

<body>

    <div id="wrapper" class="admin-panel">

        <!-- menu -->
        <div class="page-menu">
            <!-- btn close on small devices -->
            <span class="btn-menu-close" uk-toggle="target: #wrapper ; cls: mobile-active"></span>
            <!-- traiger btn -->
            <span class="btn-menu-trigger" uk-toggle="target: .page-menu ; cls: menu-large"></span>

            <!-- logo -->
            <div class="logo uk-visible@s">
                <a href="#"> <i class=" uil-graduation-hat"></i> <span> Courseplus</span> </a>
            </div>
            <div class="page-menu-inner" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content" style="padding: 0px; height: 100%; overflow: hidden;">
                <ul class="mt-0">
                    <li><a href="#"><i class="uil-home-alt"></i> <span> Dashboard</span></a> </li>
                    <li><a href="#"><i class="uil-youtube-alt"></i> <span> Courses</span></a> </li>
                    <li><a href="#"><i class="uil-envelope-alt"></i> <span> Message</span></a> </li>
                    <li><a href="#"><i class="uil-users-alt"></i> <span> students</span></a> </li>
                    <li><a href="#"><i class="uil-graduation-hat"></i> <span> Instructers</span></a>
                    </li>
                    <li><a href="#"><i class="uil-tag-alt"></i> <span> Catagories</span></a> </li>
                    <li><a href="#"><i class="uil-file-alt"></i> <span> Blogs</span></a> </li>
                    <li><a href="#"><i class="uil-layers"></i> <span> Pages</span></a> </li>
                    <li><a href="#"><i class="uil-chart-line"></i> <span> Report</span></a> </li>
                    <li><a href="#"><i class="uil-question-circle"></i> <span> Help</span></a> </li>
                </ul>

                <ul data-submenu-title="Setting">
                    <li><a href="#"><i class="uil-cog"></i> <span> General </span></a> </li>
                    <li><a href="#"><i class="uil-edit-alt"></i> <span> Site </span></a> </li>
                    <li class="#"><a href="#"><i class="uil-layers"></i> <span> simple link
                            </span></a>
                        <ul>
                            <li><a href="#"> simple link <span class="nav-tag">3</span></a>
                            </li>
                            <li><a href="#"> simple link </a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="uil-sign-out-alt"></i> <span> Sign-out</span></a> </li>
                </ul>

            </div></div></div><div class="simplebar-placeholder" style="width: 250px; height: 794px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div></div>
        </div>

        <!-- Header Container
        ================================================== -->
        <header class="header uk-light">

            <div class="container">
                <nav uk-navbar="" class="uk-navbar">

                    <!-- left Side Content -->
                    <div class="uk-navbar-left">

                        <!-- menu icon -->
                        <span class="mmenu-trigger" uk-toggle="target: #wrapper ; cls: mobile-active">
                            <button class="hamburger hamburger--collapse" type="button">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </span>


                        <!-- logo -->
                        <a href="#" class="logo">
                            <img src="{{asset('templatefiles/logo-dark.svg')}}" alt="">
                            <span> Courseplus</span>
                        </a>

                        <div class="searchbox uk-visible@s" aria-expanded="false">

                            <input class="uk-search-input" type="search" placeholder="Search...">
                            <button class="btn-searchbox"> </button>

                        </div>
                        <!-- Search box dropdown -->
                        <div uk-dropdown="pos: top;mode:click;animation: uk-animation-slide-bottom-small" class="dropdown-search uk-dropdown">
                            <div class="erh BR9 MIw" style="top: -26px;position: absolute ; left: 24px;fill: currentColor;height: 24px;pointer-events: none;color: #f5f5f5;">
                                <svg width="22" height="22">
                                    <path d="M0 24 L12 12 L24 24"></path>
                                </svg></div>
                            <!-- User menu -->

                            <ul class="dropdown-search-list">
                                <li class="list-title">
                                    Recent Searches
                                </li>
                                <li>
                                    <a href="#">
                                        Ultimate Web Designer And Developer Course</a>
                                </li>
                                <li><a href="#">
                                        The Complete Ruby on Rails Developer Course </a>
                                </li>
                                <li><a href="#">
                                        Bootstrap 4 From Scratch With 5 Real Projects </a>
                                </li>
                                <li> <a href="#">
                                        The Complete 2020 Web Development Bootcamp </a>
                                </li>
                                <li class="menu-divider">
                                </li><li><a href="#">
                                        Bootstrap 4 From Scratch With 5 Real Projects </a>
                                </li>
                                <li> <a href="#">
                                        The Complete 2020 Web Development Bootcamp </a>
                                </li>
                            </ul>

                        </div>
                    </div>


                    <!--  Right Side Content   -->

                    <div class="uk-navbar-right">



                        <div class="header-widget">

                            <!-- notificiation icon  -->

                            <a href="#" class="header-widget-icon" uk-tooltip="title: Notificiation ; pos: bottom ;offset:21" title="" aria-expanded="false">
                                <i class="uil-bell"></i>
                                <span>4</span>
                            </a>

                            <!-- notificiation dropdown -->
                            <div uk-dropdown="pos: top-right;mode:click ; animation: uk-animation-slide-bottom-small" class="dropdown-notifications uk-dropdown">

                                <!-- notivication header -->
                                <div class="dropdown-notifications-headline">
                                    <h4>Notifications </h4>
                                    <a href="#">
                                        <i class="icon-feather-settings" uk-tooltip="title: Notifications settings ; pos: left" title="" aria-expanded="false"></i>
                                    </a>
                                </div>

                                <!-- notification contents -->
                                <div class="dropdown-notifications-content" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: -17px; bottom: 0px;"><div class="simplebar-content" style="padding: 0px; height: 100%; overflow: hidden scroll;">

                                    <!-- notiviation list -->
                                    <ul>
                                        <li class="notifications-not-read">
                                            <a href="#">
                                                <span class="notification-icon btn btn-soft-danger disabled">
                                                    <i class="icon-feather-thumbs-up"></i></span>
                                                <span class="notification-text">
                                                    <strong>Adrian Mohani</strong> Like Your Comment On Course
                                                    <span class="text-primary">Javascript Introduction </span>
                                                    <br> <span class="time-ago"> 9 hours ago </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="notification-icon btn btn-soft-primary disabled">
                                                    <i class="icon-feather-message-circle"></i></span>
                                                <span class="notification-text">
                                                    <strong>Stella Johnson</strong> Replay Your Comments in
                                                    <span class="text-primary">Programming for Games</span>
                                                    <br> <span class="time-ago"> 12 hours ago </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="notification-icon btn btn-soft-success disabled">
                                                    <i class="icon-feather-star"></i></span>
                                                <span class="notification-text">
                                                    <strong>Alex Dolgove</strong> Added New Review In Course
                                                    <span class="text-primary">Full Stack PHP Developer</span>
                                                    <br> <span class="time-ago"> 19 hours ago </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="notifications-not-read">
                                            <a href="#">
                                                <span class="notification-icon btn btn-soft-danger disabled">
                                                    <i class="icon-feather-share-2"></i></span>
                                                <span class="notification-text">
                                                    <strong>Jonathan Madano</strong> Shared Your Discussion On Course
                                                    <span class="text-primary">Css Flex Box </span>
                                                    <br> <span class="time-ago"> Yesterday </span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>

                                </div></div></div><div class="simplebar-placeholder" style="width: 338px; height: 454px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 218px; transform: translate3d(0px, 0px, 0px); visibility: visible;"></div></div></div>


                            </div>


                            <!-- Message  -->

                            <a href="#" class="header-widget-icon" uk-tooltip="title: Message ; pos: bottom ;offset:21" title="" aria-expanded="false">
                                <i class="uil-envelope-alt"></i>
                                <span>1</span>
                            </a>

                            <!-- Message  notificiation dropdown -->
                            <div uk-dropdown=" pos: top-right;mode:click" class="dropdown-notifications uk-dropdown">

                                <!-- notivication header -->
                                <div class="dropdown-notifications-headline">
                                    <h4>Messages</h4>
                                    <a href="#">
                                        <i class="icon-feather-settings" uk-tooltip="title: Message settings ; pos: left" title="" aria-expanded="false"></i>
                                    </a>
                                </div>

                                <!-- notification contents -->
                                <div class="dropdown-notifications-content" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: -17px; bottom: 0px;"><div class="simplebar-content" style="padding: 0px; height: 100%; overflow: hidden scroll;">

                                    <!-- notiviation list -->
                                    <ul>
                                        <li class="notifications-not-read">
                                            <a href="#">
                                                <span class="notification-avatar">
                                                    <img src="{{asset('templatefiles/avatar-2.jpg')}}" alt="">
                                                </span>
                                                <div class="notification-text notification-msg-text">
                                                    <strong>Jonathan Madano</strong>
                                                    <p>Okay.. Thanks for The Answer I will be waiting for your...
                                                    </p>
                                                    <span class="time-ago"> 2 hours ago </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="notification-avatar">
                                                    <img src="{{asset('templatefiles/avatar-3.jpg')}}" alt="">
                                                </span>
                                                <div class="notification-text notification-msg-text">
                                                    <strong>Stella Johnson</strong>
                                                    <p> Alex will explain you how to keep the HTML structure and all
                                                        that...</p>
                                                    <span class="time-ago"> 7 hours ago </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="notification-avatar">
                                                    <img src="{{asset('templatefiles/avatar-1.jpg')}}" alt="">
                                                </span>
                                                <div class="notification-text notification-msg-text">
                                                    <strong>Alex Dolgove</strong>
                                                    <p> Alia Joseph just joined Messenger! Be the first to send a
                                                        welcome message..</p>
                                                    <span class="time-ago"> 19 hours ago </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="notification-avatar">
                                                    <img src="{{asset('templatefiles/avatar-4.jpg')}}" alt="">
                                                </span>
                                                <div class="notification-text notification-msg-text">
                                                    <strong>Adrian Mohani</strong>
                                                    <p> Okay.. Thanks for The Answer I will be waiting for your...
                                                    </p>
                                                    <span class="time-ago"> Yesterday </span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>

                                </div></div></div><div class="simplebar-placeholder" style="width: 338px; height: 463px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 214px; transform: translate3d(0px, 0px, 0px); visibility: visible;"></div></div></div>
                                <div class="dropdown-notifications-footer">
                                    <a href="#"> sell all <i class="icon-line-awesome-long-arrow-right"></i> </a>
                                </div>
                            </div>


                            <!-- profile-icon-->

                            <div class="dropdown-user-details" aria-expanded="false">
                                <div class="dropdown-user-avatar">
                                    <img src="{{asset('templatefiles/avatar-2.jpg')}}" alt="">
                                </div>
                                <div class="dropdown-user-name">
                                    Richard Ali <span>Adminstrator</span>
                                </div>
                            </div>


                            <div uk-dropdown="pos: top-right ;mode:click" class="dropdown-notifications small uk-dropdown">

                                <!-- User menu -->

                                <ul class="dropdown-user-menu">
                                    <li>
                                        <a href="#">
                                            <i class="icon-material-outline-dashboard"></i> Dashboard</a>
                                    </li>
                                    <li><a href="#">
                                            <i class="icon-feather-bookmark"></i> Bookmark </a>
                                    </li>
                                    <li><a href="#">
                                            <i class="icon-feather-settings"></i> Account Settings</a>
                                    </li>
                                    <li><a href="#" style="color:#62d76b">
                                            <i class="icon-feather-star"></i> Upgrade To Premium</a>
                                    </li>
                                    <li>
                                        <a href="#" id="night-mode" class="btn-night-mode">
                                            <i class="icon-feather-moon"></i> Night mode
                                            <span class="btn-night-mode-switch">
                                                <span class="uk-switch-button"></span>
                                            </span>
                                        </a>
                                    </li>
                                    <ul class="menu-divider">
                                        <li><a href="#">
                                                <i class="icon-feather-help-circle"></i> Help</a>
                                        </li>
                                        <li><a href="#">
                                                <i class="icon-feather-log-out"></i> Sing Out</a>
                                        </li>
                                    </ul>


                            </ul></div>


                        </div>



                        <!-- icon search-->
                        <a class="uk-navbar-toggle uk-hidden@s" uk-toggle="target: .nav-overlay; animation: uk-animation-fade" href="#">
                            <i class="uil-search icon-small"></i>
                        </a>
                        <!-- User icons -->
                        <span class="uil-user icon-small uk-hidden@s" uk-toggle="target: .header-widget ; cls: is-active">
                            

                    </span></div>
                    <!-- End Right Side Content / End -->


                </nav>

            </div>
            <!-- container  / End -->

        </header>

        <!-- content -->
        <div class="page-content">
            <div class="page-content-inner">

                <div class="d-flex">
                    <nav id="breadcrumbs" class="mb-3">
                        <ul>
                            <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                            <li><a href="#"> Chat </a></li>
                            <li>All Message</li>
                        </ul>
                    </nav>
                </div>



                <div class="chats-container margin-top-0">

                    <div class="chats-container-inner">

                        <!-- chats -->
                        <div class="chats-inbox">
                            <div class="chats-headline">
                                <div class="input-with-icon">
                                    <input id="autocomplete-input" type="text" placeholder="Search">
                                    <i class="icon-material-outline-search"></i>
                                </div>
                            </div>

                            <ul>
                                <li>
                                    <a href="#">
                                        <div class="message-avatar"><i class="status-icon status-online"></i><img src="{{asset('templatefiles/avatar-1.jpg')}}" alt=""></div>

                                        <div class="message-by">
                                            <div class="message-by-headline">
                                                <h5>Jonathan Madano </h5>
                                                <span>4 hours ago</span>
                                            </div>
                                            <p>You: Yes, in an organization stature, this is a must</p>
                                            <span class="message-readed uil-check"> </span>
                                        </div>
                                    </a>
                                </li>

                                <li class="active-message">
                                    <a href="#">
                                        <div class="message-avatar"><i class="status-icon status-online"></i><img src="{{asset('templatefiles/avatar-2.jpg')}}" alt=""></div>

                                        <div class="message-by">
                                            <div class="message-by-headline">
                                                <h5>Stella Johnson </h5>
                                                <span>Yesterday</span>
                                            </div>
                                            <p>What are you doing?</p>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="message-avatar"><i class="status-icon status-offline"></i><img src="{{asset('templatefiles/avatar-3.jpg')}}" alt=""></div>

                                        <div class="message-by">
                                            <div class="message-by-headline">
                                                <h5> Alex Dolgove</h5>
                                                <span>2 days ago</span>
                                            </div>
                                            <p>Hello, I want to talk about my project if you don't mind!</p>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="message-avatar"><i class="status-icon status-offline"></i><img src="{{asset('templatefiles/avatar-4.jpg')}}" alt=""></div>

                                        <div class="message-by">
                                            <div class="message-by-headline">
                                                <h5>Marcin Kowalski</h5>
                                                <span>2 days ago</span>
                                            </div>
                                            <p>Hello</p>
                                            <span class="message-readed uil-check"> </span>
                                        </div>
                                    </a>
                                </li>

                                <li class="active-message">
                                    <a href="#">
                                        <div class="message-avatar"><i class="status-icon status-online"></i><img src="{{asset('templatefiles/avatar-2.jpg')}}" alt=""></div>

                                        <div class="message-by">
                                            <div class="message-by-headline">
                                                <h5>Adrian Mohani</h5>
                                                <span>Yesterday</span>
                                            </div>
                                            <p>How are you?</p>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="message-avatar"><i class="status-icon status-offline"></i><img src="{{asset('templatefiles/avatar-4.jpg')}}" alt=""></div>

                                        <div class="message-by">
                                            <div class="message-by-headline">
                                                <h5>Stella Johnson </h5>
                                                <span>Yesterday</span>
                                            </div>
                                            <p>Say hi to your new friend</p>
                                            <span class="message-readed uil-check"> </span>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="message-avatar"><i class="status-icon status-offline"></i><img src="{{asset('templatefiles/avatar-1.jpg')}}" alt=""></div>

                                        <div class="message-by">
                                            <div class="message-by-headline">
                                                <h5>Alex Dolgove</h5>
                                                <span>Yesterday</span>
                                            </div>
                                            <p>Hi Tom! Hate to break it to you but I'm actually on vacation</p>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="message-avatar"><i class="status-icon status-offline"></i><img src="{{asset('templatefiles/avatar-2.jpg')}}" alt=""></div>

                                        <div class="message-by">
                                            <div class="message-by-headline">
                                                <h5>Adrian Mohani</h5>
                                                <span>Yesterday</span>
                                            </div>
                                            <p>You: Yes, in an organization stature, this is a must</p>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="message-avatar"><i class="status-icon status-offline"></i><img src="{{asset('templatefiles/avatar-4.jpg')}}" alt=""></div>

                                        <div class="message-by">
                                            <div class="message-by-headline">
                                                <h5>Jonathan Madano </h5>
                                                <span>2 days ago</span>
                                            </div>
                                            <p>Yes, I received payment. Thanks for cooperation!</p>
                                            <span class="message-readed uil-check"> </span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- chats / End -->

                        <!-- Message Content -->
                        <div class="message-content">

                            <div class="chats-headline">

                                <div class="d-flex">
                                    <div class="avatar-parent-child">
                                        <img alt="Image placeholder" src="{{asset('templatefiles/avatar-1.jpg')}}" class="avatar  rounded-circle avatar-sm">
                                        <span class="avatar-child avatar-badge bg-success"></span>
                                    </div>
                                    <h4 class="ml-2"> Alex Dolgove <span>Online</span> </h4>
                                </div>

                                <div class="message-action">
                                    <a href="#" class="btn btn-icon btn-hover  btn-circle" uk-tooltip="filter" title="" aria-expanded="false">
                                        <i class="uil-outgoing-call"></i>
                                    </a>
                                    <a href="#" class="btn btn-icon btn-hover  btn-circle" uk-tooltip="filter" title="" aria-expanded="false">
                                        <i class="uil-video"></i>
                                    </a>
                                    <a href="#" class="btn btn-icon btn-hover  btn-circle" uk-tooltip="More" title="" aria-expanded="false">
                                        <i class="uil-ellipsis-h"></i>
                                    </a>
                                    <div uk-dropdown="pos: left ; mode: click ;animation: uk-animation-slide-bottom-small" class="uk-dropdown">
                                        <ul class="uk-nav uk-dropdown-nav">
                                            <li><a href="#"> Refresh </a></li>
                                            <li><a href="#"> Manage</a></li>
                                            <li><a href="#"> Setting</a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                            <!-- Message Content Inner -->
                            <div class="message-content-inner">

                                <!-- Time Sign -->
                                <div class="message-time-sign">
                                    <span>28 June, 2018</span>
                                </div>

                                <div class="message-bubble me">
                                    <div class="message-bubble-inner">
                                        <div class="message-avatar"><img src="{{asset('templatefiles/avatar-1.jpg')}}" alt="">
                                        </div>
                                        <div class="message-text">
                                            <p>How likely are you to recommend our company
                                                to your friends and family?</p>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="message-bubble">
                                    <div class="message-bubble-inner">
                                        <div class="message-avatar"><img src="{{asset('templatefiles/avatar-2.jpg')}}" alt="">
                                        </div>
                                        <div class="message-text">
                                            <p>Hey there, we’re just writing to let you know 👍</p>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="message-bubble me">
                                    <div class="message-bubble-inner">
                                        <div class="message-avatar"><img src="{{asset('templatefiles/avatar-1.jpg')}}" alt="">
                                        </div>
                                        <div class="message-text">
                                            <p>Ok, Understood! 😉</p>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>


                                <!-- Time Sign -->
                                <div class="message-time-sign">
                                    <span>Yesterday</span>
                                </div>

                                <div class="message-bubble me">
                                    <div class="message-bubble-inner">
                                        <div class="message-avatar"><img src="{{asset('templatefiles/avatar-1.jpg')}}" alt="">
                                        </div>
                                        <div class="message-text">
                                            <p> I just wanted to let you know You’ll receive notifications for all
                                                issues, pull requests!.</p>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="message-bubble">
                                    <div class="message-bubble-inner">
                                        <div class="message-avatar"><img src="{{asset('templatefiles/avatar-2.jpg')}}" alt="">
                                        </div>
                                        <div class="message-text">
                                            <p>You were automatically subscribed
                                                because you’ve been given access to the repository 😎</p>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="message-bubble me">
                                    <div class="message-bubble-inner">
                                        <div class="message-avatar"><img src="{{asset('templatefiles/avatar-1.jpg')}}" alt="">
                                        </div>
                                        <div class="message-text">
                                            <p>Ok But don't forget about last payment. 🙂</p>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="message-bubble">
                                    <div class="message-bubble-inner">
                                        <div class="message-avatar"><img src="{{asset('templatefiles/avatar-2.jpg')}}" alt="">
                                        </div>
                                        <div class="message-text w-auto">
                                            <!-- Typing Indicator -->
                                            <div class="typing-indicator">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <!-- Message Content Inner / End -->

                            <!-- Reply Area -->
                            <div class="message-reply">

                                <form class="d-flex align-items-center w-100">
                                    <div class="btn-box d-flex align-items-center mr-3">
                                        <a href="#" class="btn btn-icon  btn-default btn-circle d-inline-block mr-2" uk-tooltip="filter" title="" aria-expanded="false">
                                            <i class="uil-smile-wink"></i>
                                        </a>
                                        <a href="#" class="btn btn-icon  btn-default btn-circle d-inline-block  " uk-tooltip="filter" title="" aria-expanded="false">
                                            <i class="uil-link-alt"></i>
                                        </a>
                                    </div>

                                    <textarea cols="1" rows="1" placeholder="Your Message" data-autoresize=""></textarea>

                                    <button type="submit" class="send-btn d-inline-block btn btn-default">Send <i class="bx bx-paper-plane"></i></button>
                                </form>

                            </div>

                            <!-- 
                        <div class="message-reply">
                            <textarea cols="1" rows="1" placeholder="Your Message" data-autoresize></textarea>
                            <button class="btn btn-primary ripple-effect">Send</button>
                        </div>-->



                        </div>
                        <!-- Message Content -->

                    </div>
                </div>
                <!-- chats Container / End -->




                {{-- <!-- footer
                ================================================== -->
                <div class="footer">
                    <div class="uk-grid-collapse uk-grid" uk-grid="">
                        <div class="uk-width-expand@s uk-first-column">
                            <p>© 2019 <strong>Courseplus</strong>. All Rights Reserved. </p>
                        </div>
                        <div class="uk-width-auto@s">
                            <nav class="footer-nav-icon">
                                <ul>
                                    <li><a href="#"><i class="icon-brand-facebook"></i></a></li>
                                    <li><a href="#"><i class="icon-brand-dribbble"></i></a></li>
                                    <li><a href="#"><i class="icon-brand-youtube"></i></a></li>
                                    <li><a href="#"><i class="icon-brand-twitter"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div> --}}

            </div>

        </div>

        <!-- For Night mode -->
        <script>
            (function (window, document, undefined) {
                'use strict';
                if (!('localStorage' in window)) return;
                var nightMode = localStorage.getItem('gmtNightMode');
                if (nightMode) {
                    document.documentElement.className += ' night-mode';
                }
            })(window, document);


            (function (window, document, undefined) {

                'use strict';

                // Feature test
                if (!('localStorage' in window)) return;

                // Get our newly insert toggle
                var nightMode = document.querySelector('#night-mode');
                if (!nightMode) return;

                // When clicked, toggle night mode on or off
                nightMode.addEventListener('click', function (event) {
                    event.preventDefault();
                    document.documentElement.classList.toggle('night-mode');
                    if (document.documentElement.classList.contains('night-mode')) {
                        localStorage.setItem('gmtNightMode', true);
                        return;
                    }
                    localStorage.removeItem('gmtNightMode');
                }, false);

            })(window, document);
        </script>


        <!-- javaScripts
    ================================================== -->
        <script src="{{asset('templatefiles/framework.js')}}"></script>
        <script src="{{asset('templatefiles/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('templatefiles/simplebar.js')}}"></script>
        <script src="{{asset('templatefiles/main.js')}}"></script>
        <script src="{{asset('templatefiles/bootstrap-select.min.js')}}"></script>





</div><div id="backtotop" class=""><a href="#"></a></div></body></html>