@extends('backend.admin.layouts.app')
@section('title','Dashboard')
@section('secton')
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <h3>Profile Statistics</h3>
</div>
<div class="page-content">
    <section class="row prof-stats">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-md-3 col-sm-4">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Profile Views</h6>
                                    {{-- <ul class="nav navbar-nav">
                                        <li class="dropdown dropdown-notifications">
                                          <a href="#notifications-panel" class="dropdown-toggle" data-toggle="dropdown">
                                            <i data-count="0" class="glyphicon glyphicon-bell notification-icon"></i>
                                            
                                          </a>
                            
                                          <div class="dropdown-container">
                                            <div class="dropdown-toolbar">
                                              <div class="dropdown-toolbar-actions">
                                                <a href="#">Mark all as read</a>
                                              </div>
                                              <h3 class="dropdown-toolbar-title">Notifications (<span class="notif-count">0</span>)</h3>
                                            </div>
                                            <ul class="dropdown-menu">
                                            </ul>
                                            <div class="dropdown-footer text-center">
                                              <a href="#">View All</a>
                                            </div>
                                          </div>
                                        </li>
                                        <li><a href="#">Timeline</a></li>
                                        <li><a href="#">Friends</a></li>
                                      </ul> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3 col-sm-4">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Followers</h6>
                                    <h6 class="font-extrabold mb-0">183.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3 col-sm-4">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Following</h6>
                                    <h6 class="font-extrabold mb-0">80.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3 col-sm-4">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Saved Post</h6>
                                    <h6 class="font-extrabold mb-0">112</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--    <div class="row">-->
        <!--        <div class="col-12">-->
        <!--            <div class="card">-->
        <!--                <div class="card-header">-->
        <!--                    <h4>Profile Visit</h4>-->
        <!--                </div>-->
        <!--                <div class="card-body">-->
        <!--                    <div id="chart-profile-visit"></div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--    <div class="row">-->
        <!--        <div class="col-12 col-xl-4">-->
        <!--            <div class="card">-->
        <!--                <div class="card-header">-->
        <!--                    <h4>Profile Visit</h4>-->
        <!--                </div>-->
        <!--                <div class="card-body">-->
        <!--                    <div class="row">-->
        <!--                        <div class="col-6">-->
        <!--                            <div class="d-flex align-items-center">-->
        <!--                                <svg class="bi text-primary" width="32" height="32" fill="blue"-->
        <!--                                    style="width:10px">-->
        <!--                                    <use-->
        <!--                                        xlink:href="{{URL::asset('backend/admin/assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill')}}" />-->
        <!--                                </svg>-->
        <!--                                <h5 class="mb-0 ms-3">Europe</h5>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                        <div class="col-6">-->
        <!--                            <h5 class="mb-0">862</h5>-->
        <!--                        </div>-->
        <!--                        <div class="col-12">-->
        <!--                            <div id="chart-europe"></div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="row">-->
        <!--                        <div class="col-6">-->
        <!--                            <div class="d-flex align-items-center">-->
        <!--                                <svg class="bi text-success" width="32" height="32" fill="blue"-->
        <!--                                    style="width:10px">-->
        <!--                                    <use-->
        <!--                                        xlink:href="{{URL::asset('backend/admin/assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill')}}" />-->
        <!--                                </svg>-->
        <!--                                <h5 class="mb-0 ms-3">America</h5>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                        <div class="col-6">-->
        <!--                            <h5 class="mb-0">375</h5>-->
        <!--                        </div>-->
        <!--                        <div class="col-12">-->
        <!--                            <div id="chart-america"></div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="row">-->
        <!--                        <div class="col-6">-->
        <!--                            <div class="d-flex align-items-center">-->
        <!--                                <svg class="bi text-danger" width="32" height="32" fill="blue"-->
        <!--                                    style="width:10px">-->
        <!--                                    <use-->
        <!--                                        xlink:href="{{URL::asset('backend/admin/assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill')}}" />-->
        <!--                                </svg>-->
        <!--                                <h5 class="mb-0 ms-3">Indonesia</h5>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                        <div class="col-6">-->
        <!--                            <h5 class="mb-0">1025</h5>-->
        <!--                        </div>-->
        <!--                        <div class="col-12">-->
        <!--                            <div id="chart-indonesia"></div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--        <div class="col-12 col-xl-8">-->
        <!--            <div class="card">-->
        <!--                <div class="card-header">-->
        <!--                    <h4>Latest Comments</h4>-->
        <!--                </div>-->
        <!--                <div class="card-body">-->
        <!--                    <div class="table-responsive">-->
        <!--                        <table class="table table-hover table-lg">-->
        <!--                            <thead>-->
        <!--                                <tr>-->
        <!--                                    <th>Name</th>-->
        <!--                                    <th>Comment</th>-->
        <!--                                </tr>-->
        <!--                            </thead>-->
        <!--                            <tbody>-->
        <!--                                <tr>-->
        <!--                                    <td class="col-3">-->
        <!--                                        <div class="d-flex align-items-center">-->
        <!--                                            <div class="avatar avatar-md">-->
        <!--                                                <img src="{{URL::asset('backend/admin/assets/images/faces/5.jpg')}}">-->
        <!--                                            </div>-->
        <!--                                            <p class="font-bold ms-3 mb-0">Si Cantik</p>-->
        <!--                                        </div>-->
        <!--                                    </td>-->
        <!--                                    <td class="col-auto">-->
        <!--                                        <p class=" mb-0">Congratulations on your graduation!</p>-->
        <!--                                    </td>-->
        <!--                                </tr>-->
        <!--                                <tr>-->
        <!--                                    <td class="col-3">-->
        <!--                                        <div class="d-flex align-items-center">-->
        <!--                                            <div class="avatar avatar-md">-->
        <!--                                                <img src="{{URL::asset('backend/admin/assets/images/faces/2.jpg')}}">-->
        <!--                                            </div>-->
        <!--                                            <p class="font-bold ms-3 mb-0">Si Ganteng</p>-->
        <!--                                        </div>-->
        <!--                                    </td>-->
        <!--                                    <td class="col-auto">-->
        <!--                                        <p class=" mb-0">Wow amazing design! Can you make another-->
        <!--                                            tutorial for-->
        <!--                                            this design?</p>-->
        <!--                                    </td>-->
        <!--                                </tr>-->
        <!--                            </tbody>-->
        <!--                        </table>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <!--<div class="col-12 col-lg-3">-->
        <!--    <div class="card">-->
        <!--        <div class="card-body py-4 px-5">-->
        <!--            <div class="d-flex align-items-center">-->
        <!--                <div class="avatar avatar-xl">-->
        <!--                    <img src="{{URL::asset('backend/admin/assets/images/faces/1.jpg')}}" alt="Face 1">-->
        <!--                </div>-->
        <!--                <div class="ms-3 name">-->
        <!--                    <h5 class="font-bold">John Duck</h5>-->
        <!--                    <h6 class="text-muted mb-0">@johnducky</h6>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--    <div class="card">-->
        <!--        <div class="card-header">-->
        <!--            <h4>Recent Messages</h4>-->
        <!--        </div>-->
        <!--        <div class="card-content pb-4">-->
        <!--            <div class="recent-message d-flex px-4 py-3">-->
        <!--                <div class="avatar avatar-lg">-->
        <!--                    <img src="{{URL::asset('backend/admin/assets/images/faces/4.jpg')}}">-->
        <!--                </div>-->
        <!--                <div class="name ms-4">-->
        <!--                    <h5 class="mb-1">Hank Schrader</h5>-->
        <!--                    <h6 class="text-muted mb-0">@johnducky</h6>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="recent-message d-flex px-4 py-3">-->
        <!--                <div class="avatar avatar-lg">-->
        <!--                    <img src="{{URL::asset('backend/admin/assets/images/faces/5.jpg')}}">-->
        <!--                </div>-->
        <!--                <div class="name ms-4">-->
        <!--                    <h5 class="mb-1">Dean Winchester</h5>-->
        <!--                    <h6 class="text-muted mb-0">@imdean</h6>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="recent-message d-flex px-4 py-3">-->
        <!--                <div class="avatar avatar-lg">-->
        <!--                    <img src="{{URL::asset('backend/admin/assets/images/faces/1.jpg')}}">-->
        <!--                </div>-->
        <!--                <div class="name ms-4">-->
        <!--                    <h5 class="mb-1">John Dodol</h5>-->
        <!--                    <h6 class="text-muted mb-0">@dodoljohn</h6>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="px-4">-->
        <!--                <button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Start-->
        <!--                    Conversation</button>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--    <div class="card">-->
        <!--        <div class="card-header">-->
        <!--            <h4>Visitors Profile</h4>-->
        <!--        </div>-->
        <!--        <div class="card-body">-->
        <!--            <div id="chart-visitors-profile"></div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
    </section>
</div>
@endsection
@push('child-scripts')

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="//js.pusher.com/3.1/pusher.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="text/javascript">
  
      var notificationsWrapper   = $('.dropdown-notifications');
      var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
      var notificationsCountElem = notificationsToggle.find('i[data-count]');
      var notificationsCount     = parseInt(notificationsCountElem.data('count'));
      var notifications          = notificationsWrapper.find('ul.dropdown-menu');

      if (notificationsCount <= 0) {
        notificationsWrapper.hide();
      }

      // Enable pusher logging - don't include this in production
      // Pusher.logToConsole = true;

      var pusher = new Pusher('0ac3c578598b74ab89c3', {
        encrypted: true
      });

      // Subscribe to the channel we specified in our Laravel Event
      var channel = pusher.subscribe('status-liked');

      // Bind a function to a Event (the full Laravel class)
      channel.bind('App\\Events\\StatusLiked', function(data) {
        console.log(data);
        var existingNotifications = notifications.html();
        var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
        var newNotificationHtml = `
          <li class="notification active">
              <div class="media">
                <div class="media-left">
                  <div class="media-object">
                    <img src="https://api.adorable.io/avatars/71/`+avatar+`.png" class="img-circle" alt="50x50" style="width: 50px; height: 50px;">
                  </div>
                </div>
                <div class="media-body">
                  <strong class="notification-title">`+data.message+`</strong>
                  <!--p class="notification-desc">Extra description can go here</p-->
                  <div class="notification-meta">
                    <small class="timestamp">about a minute ago</small>
                  </div>
                </div>
              </div>
          </li>
        `;
        notifications.html(newNotificationHtml + existingNotifications);

        notificationsCount += 1;
        notificationsCountElem.attr('data-count', notificationsCount);
        notificationsWrapper.find('.notif-count').text(notificationsCount);
        notificationsWrapper.show();
      });
    </script>
   
        @endpush