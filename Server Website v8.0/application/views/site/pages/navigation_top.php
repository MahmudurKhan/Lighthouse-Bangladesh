<!--Header Start-->
<header data-spy="affix" data-offset-top="1" class="clearfix">
    <section class="toolbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 left_bar">
                    <ul class="left-none">
                        <li><a href="https://www.facebook.com/LighthouseBangladesh.CorpProg"><i class="fa fa-facebook"></i> Facebook</a></li>
                        <li><a href="mailto:info@lighthousebangladesh.com"><i class="fa fa-envelope-o"></i> info@lighthousebangladesh.com</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 ">
                    <ul class="right-none pull-right company_info">
                        <li><a href="tel:+8801938830000"><i class="fa fa-phone"></i> +880-193-883-0000</a></li>
                        <li class="address"><a href="<? echo base_url().'site/contact' ?>"><i class="fa fa-map-marker"></i> 41 Kemal Ataturk Avenue, Banani
                                Dhaka-1213</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="toolbar_shadow"></div>
    </section>
    <div class="bottom-header" >
        <div class="container">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle Navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        <a class="navbar-brand" href="<? echo base_url(); ?>"><span class="logo"></span><img src="<? echo base_url().'files/' ?>images/logo_head.png"></a></div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav pull-right">
                            <li <? if($page_name == 'home') { ?> class="active"  <?  } ?>><a href="<? echo base_url(); ?>">Home</a></li>
                            <li <? if($page_name == 'voyage') { ?> class="active"  <?  } ?>><a href="<? echo base_url().'site/voyage'; ?>">Voyage</a></li>
                            <li <? if($page_name == 'navigators') { ?> class="active"  <?  } ?>><a href="<? echo base_url().'site/navigators'; ?>">Navigators</a></li>
                            <li <? if($page_name == 'service') { ?> class="active"  <?  } ?>><a href="<? echo base_url().'site/services'; ?>">Services</a></li>
                            <li <? if($page_name == 'fortune') { ?> class="active"  <?  } ?>><a href="<? echo base_url().'site/fortune'; ?>">Fortune 100</a></li>

                            <li <? if($page_name == 'events'){ ?> class="active" <? } ?><? if($page_name == 'calender'){ ?> class="active" <? } ?>><a href="#" class="dropdown-toggle" data-toggle="dropdown">Events <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<? echo base_url().'site/events'; ?>">See All Events</a></li>
                                    <li><a href="<? echo base_url().'site/calender'; ?>">Vision 48</a></li>
                                </ul>
                            </li>
                            <li <? if($page_name == 'contact') { ?> class="active"  <?  } ?>><a href="<? echo base_url().'site/contact'; ?>">Contact</a></li>


                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </div>
        <div class="header_shadow"></div>
    </div>
</header>
<div class="clearfix"></div>

<!------------------------------------------------------NAVIGATION END----------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------->


<!------------------------------------------------------BODY START--------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------->

<!--Header End-->
