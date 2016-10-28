<footer>
    <div class="container">
        <div class="row">
            <div id="reset" class="col-lg-4 col-md-4 col-sm-6 col-xs-12 padding-left-none md-padding-left-none sm-padding-left-15 xs-padding-left-15">
                <div id="mini_res">
                    <h4>newsletter</h4>
                    <p>
                        By subscribing to our newsletter
                        you will always be up-to-date on our latest
                        updates!
                    </p>
                </div>
                <br>

                <form class="form_contact" id="hudai">
                    <input type="text" value="" id="newsletter" placeholder="Email Address">
                    <input type="button" id="sub" value="Subscribe" class="md-button">
                </form>
            </div>

            <script type="text/javascript">
                $(document).ready(function() {

                    $("#hudai").on('submit',function(e) {
                        e.preventDefault();
                    });

                    function zn()
                    {
                        sub = $("#newsletter").val();

                        if($.trim(sub) != '')
                        {
                            if(sub.indexOf('@') != '-1')
                            {
                                http = '<? echo base_url() ?>'+'site/newsletter_add/';

                                $.ajax({
                                    url :   http,
                                    method : 'POST',
                                    data: {'email':sub},
                                    success:function(data)
                                    {
                                        if(data == '1')
                                        {
                                            $("#reset").html('<h4>newsletter</h4><p style=color:lawngreen>Thank you for registering with our newsletter. You will get all the latest updates from us on a regular basis.</p>');
                                        }
                                    }
                                });

                            }
                            else
                            {
                                $("#mini_res").html('<h4>newsletter</h4><p>By subscribing to our newsletter you will always be up-to-date on our latest updates!</p><p style="color: red">Please give a valid email address to register.</p>');
                            }
                        }
                        else
                        {
                            $("#mini_res").html('<h4>newsletter</h4><p>By subscribing to our newsletter you will always be up-to-date on our latest updates!</p><p style="color: red">Please complete the form to register.</p>');
                        }
                    }

                    $("#newsletter").on('keyup',function(e) {
                        if(e.which == 13)
                        {
                            zn();
                        }
                    });

                    $("#sub").on('click',function() {
                       zn();
                    });


                });
            </script>

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <h4>Contact us</h4>
                <div class="footer-contact">
                    <ul>
                        <li><strong><i class="fa fa-phone"></i>Phone:</strong><span>+880-193-883-0000</span></li>
                        <li><strong><i class="fa fa-map-marker"></i>Address:</strong><span>Lighthouse Bangladesh<br>
                            41 Kemal Ataturk Avenue<br>
                            Banani, Dhaka - 1213<br>
                            Bangladesh</span></li>
                        <li><strong><i class="fa fa-envelope-o"></i>Email:</strong><span><a href="mailto:info@lighthousebangladesh.com">info@lighthousebangladesh.com</a></span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                <h4>Quick Links</h4>
                <div class="footer-contact">
                    <ul>
                        <li><i class="fa fa-link"></i><a href="<? echo base_url(); ?>">Home</a></li>
                        <li><i class="fa fa-link"></i><a href="<? echo base_url().'site/voyage' ?>">Voyage</a></li>
                        <li><i class="fa fa-link"></i><a href="<? echo base_url().'site/navigators' ?>">Navigators</a></li>
                        <li><i class="fa fa-link"></i><a href="<? echo base_url().'site/services' ?>">Services</a></li>
                        <li><i class="fa fa-link"></i><a href="<? echo base_url().'site/fortune' ?>">Fortune 100</a></li>
                        <li><i class="fa fa-link"></i><a href="<? echo base_url().'site/events' ?>">Events</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 padding-right-none md-padding-right-none sm-padding-right-15 xs-padding-right-15">
                <h4>Connected</h4>
                <p>Find us in the social media to stay updated.</p>
                <ul class="social margin-bottom-25 md-margin-bottom-25 sm-margin-bottom-20 xs-margin-bottom-20 xs-padding-top-10 clearfix">
                    <li><a class="sc-1" href="https://www.facebook.com/LighthouseBangladesh.CorpProg"></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<div class="clearfix"></div>
<section class="copyright-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                <p>Lighthouse Bangladesh &copy; 2015. Designed and Maintained By <a href=http://itechoid.com style="color:white">iTechoid.</a></p>
            </div>
        </div>
    </div>
</section>
<div class="back_to_top"> <img src="<? echo base_url().'files/' ?>images/arrow-up.png" alt="scroll up" /> </div>