<!-- BEGIN MENUBAR-->
<div id="menubar" class="menubar-inverse  animate">
    <div class="menubar-fixed-panel">
        <div>
            <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="expanded">
            <a href="<? echo base_url().'controlle/' ?>">
                <span class="text-lg text-bold text-primary ">LHB&nbsp;ADMIN</span>
            </a>
        </div>
    </div>
    <div class="nano has-scrollbar" style="height: 258px;"><div class="nano-content" tabindex="0" style="right: -15px;"><div class="menubar-scroll-panel" style="padding-bottom: 33px;">

                <!-- BEGIN MAIN MENU -->
                <ul id="main-menu" class="gui-controls">

                    <!-- BEGIN DASHBOARD -->
                    <li>
                        <a href="<? echo base_url().'controlle/' ?>" <? if($page_name == 'dashboard') {  ?> class="active"  <?  } ?>>
                            <div class="gui-icon"><i class="md md-home"></i></div>
                            <span class="title">Dashboard</span>
                        </a>
                    </li><!--end /menu-li -->
                    <!-- END DASHBOARD -->

                    <!-- BEGIN TABLES -->
                    <li>
                        <a>
                            <div class="gui-icon"><span class="glyphicon glyphicon-list-alt"></span></div>
                            <span class="title">Newsletter</span>
                        </a>

                        <!--start submenu -->
                        <ul style="display: none;">
                            <li><a href="<? echo base_url().'controlle/newsletter_list' ?>" <? if($page_name == 'newsletter_list') {  ?> class="active"  <?  } ?>><span class="title">Newsletter List</span></a></li>
                        </ul><!--end /submenu -->
                    </li>

                    <!--end /menu-li -->
                    <!-- END TABLES -->

                    <!-- BEGIN FORMS -->
                    <li class="gui-folder">
                        <a>
                            <div class="gui-icon"><span class="glyphicon glyphicon-apple"></span></div>
                            <span class="title">Events</span>
                        </a>
                        <!--start submenu -->
                        <ul style="display: none;">
                            <li><a href="<? echo base_url().'controlle/add_event_view' ?>" <? if($page_name == 'add_event') {  ?> class="active"  <?  } ?>><span class="title">Create Event</span></a></li>
                            <li><a href="<? echo base_url().'controlle/event_list' ?>" <? if($page_name == 'event_list') {  ?> class="active"  <?  } ?>><span class="title">Event List</span></a></li>
                        </ul><!--end /submenu -->
                    </li><!--end /menu-li -->

                    <!-- BEGIN FORMS -->
                    <li class="gui-folder">
                        <a>
                            <div class="gui-icon"><span class="glyphicon glyphicon-briefcase"></span></div>
                            <span class="title">Registration</span>
                        </a>
                        <!--start submenu -->
                        <ul style="display: none;">
                            <li><a href="<? echo base_url().'controlle/registration_view' ?>" <? if($page_name == 'reg_view') {  ?> class="active"  <?  } ?>><span class="title">Registration Search</span></a></li>
                            <li><a href="<? echo base_url().'controlle/full_registration_list' ?>" <? if($page_name == 'full_registration_list') {  ?> class="active"  <?  } ?>><span class="title">Registration List(All)</span></a></li>
                        </ul><!--end /submenu -->
                    </li><!--end /menu-li -->

                    <!-- BEGIN FORMS -->
                    <li class="gui-folder">
                        <a>
                            <div class="gui-icon"><span class="glyphicon glyphicon-calendar"></span></div>
                            <span class="title">Calender</span>
                        </a>
                        <!--start submenu -->
                        <ul style="display: none;">
                            <li><a href="<? echo base_url().'controlle/add_calender_view' ?>" <? if($page_name == 'add_calender') {  ?> class="active"  <?  } ?>><span class="title">Create Calender Event</span></a></li>
                            <li><a href="<? echo base_url().'controlle/calender_list' ?>" <? if($page_name == 'calender_list') {  ?> class="active"  <?  } ?>><span class="title">Calender Event List</span></a></li>
                        </ul><!--end /submenu -->
                    </li><!--end /menu-li -->


                    <!-- END FORMS -->
                </ul><!--end .main-menu -->
                <!-- END MAIN MENU -->

                <div class="menubar-foot-panel">
                    <small class="no-linebreak hidden-folded">
                        <span class="opacity-75">Lighthouse Bangladesh © 2015</span><br> <strong>Designed and Maintain by<a href="http://www.itechoid.com" style="color: #ffffff"> iTechoid</a></strong>
                    </small>
                </div>
            </div></div><div class="nano-pane" style="display: block;"><div class="nano-slider" style="height: 230px; transform: translate(0px, 0px);"></div></div></div><!--end .menubar-scroll-panel-->
</div><!--end #menubar-->
<!-- END MENUBAR -->