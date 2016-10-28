<section class="content">
    <div class="container">
        <div class="inner-page about-us row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 padding-left-none padding-bottom-40 xs-padding-left-none xs-padding-right-none scroll_effect fadeInUp animated" style="visibility: visible;">
                <h3 class="margin-bottom-25">Dear Fortune Patron,</h3>
                <p>I am pleased to present LIGHTHOUSE BANGLADESH CORPORATE PROGRAM (LHB), a facilitation and management consulting company, before you. LHB has an array of best HRD professional experts in their respective fields, offering distinctive “people-process-performance” development services to the corporates. As such, Organizational Development is the core value of LHB in concurrence with the development of Corporate Leadership skills.</p>
                <p><span class="alternate-font">What is Fortune 100?</span></p>
                <p>It is an ‘Organizational Development” Mission with a Vision to take each organization to its next level growth for its ‘People-Process-Performance’ by LHB (Lighthouse Bangladesh)</p>
                <p><span class="alternate-font">Who is “Fortune 100”?</span></p>
                <p>An organization having the following core elements:</p>
                    <ul>
                   <li> Human Resource Passionate</li>
                    <li>Growth Centric</li>
                    <li> Proactive Approach</li>
                    <li> Sustenance Empowered</li>
                    <li> Challenge Pivoted</li>
                    <li> Brand Focused</li>
                    <li>CSR Oriented</li>

                </ul>
                <p><span class="alternate-font">For Fortune 100?</span></p>
                <p>We, Lighthouse Bangladesh offer the following services:</p>
                <ul><li>Prioritize business needs & align Business, HR and Learning Strategies</li>
                    <li>Analyze, develop and evaluate Organizational(Learning) Development needs & process</li>
                    <li>Strengthen Corporate Governance </li>
                </ul>

                <p><span class="alternate-font">What’s in it for YOU? </span></p>
                <p>A minimum subscription to register with Lighthouse Bangladesh Fortune 100 program.</p>
                <ul>
                    <li>Avail five corporate training programs in 2016 and enjoy one complementary corporate training.</li>
                    <li>   Discount on Participants on Vision 48.</li>
                    <li>   Discount round the year on the facility rental & Free use of Lounge</li>
                    <li>   Branding in LHB’s own social media (Website, Facebook and Newsletters)</li>
                    <li>   Free TNA & follow ups</li>

                </ul>

                <p>Looking ahead, we are focused on accelerating the execution of our growth strategy while continuing to build on the strength of our brand-in helping our clients, create innovation and in brining positive change to the communities in which we work and live.</p>

                <p>  I am incredibly excited about this journey and truly believe that the best is yet to come.</p>

                <p> Thank you very much.</p>
                <p><span class="alternate-font" style="font-size: 40px">Najmus Ahmed</span> </p>
                <p>Chief Executive Officer</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 padding-right-none padding-bottom-40 xs-padding-left-none xs-padding-right-none scroll_effect fadeInUp animated" style="visibility: visible;">
                <div class="right-container">
                    <img src="<? echo base_url().'files/' ?>images/fortune100.png">
                    <a class="btn btn-danger" data-target="#myModal" data-toggle="modal" href="#"><i class="fa fa-sign-in fa-lg"></i> Click Here To Register</a>


                    <!-- Modal -->

                </div>
            </div>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Registration</h4>
                        </div>
                        <div class="modal-body" id="res">
                            <table align="center" id="arkham" style="width: 100%">
                                <tr>
                                    <td colspan="2" id="min_res"></td>
                                </tr>
                                <tr>
                                    <td>Full Name*</td>
                                    <td><input size="500" type="text" id="full_name" placeholder="Full Name" style="width: 100%" class="form-control"/></td>
                                </tr>
                                <tr>
                                    <td>Phone*</td>
                                    <td><input size="500" type="text" id="phone" placeholder="Phone"  style="width: 100%" class="form-control"/></td>
                                </tr>
                                <tr>
                                    <td>Email*</td>
                                    <td><input size="500" type="text" id="email" style="width: 100%" placeholder="Email"  class="form-control"/></td>
                                </tr>
                                <tr>
                                    <td>Address*</td>
                                    <td><input size="500" type="text" id="address" style="width: 100%" placeholder="Address"  class="form-control"/></td>
                                </tr>
                                <tr>
                                    <td>Institution/Company Name*</td>
                                    <td><input size="500" type="text" id="c_name" placeholder="Institution/Company Name"  style="width: 100%" class="form-control"/></td>
                                </tr>
                                <tr>
                                    <td>Designation*</td>
                                    <td><input size="500" type="text" id="des" placeholder="Designation"  style="width: 100%" class="form-control"/></td>
                                </tr>
                                <tr><td colspan="2"><div class="col-md-5"></div><div class="col-md-4"><button id="reg" class="btn btn-success">Register</button></div><div class="col-md-3"></div></td></tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                //for registration purpose
                $("#reg").on('click',function() {

                    full_name = $("#full_name").val();
                    phone = $("#phone").val();
                    email = $("#email").val();
                    address = $("#address").val();
                    c_name = $("#c_name").val();
                    des = $("#des").val();

                    if(($.trim(full_name) != '') && ($.trim(phone) != '') && ($.trim(email) != '') && ($.trim(address) != '') && ($.trim(c_name) != '') && ($.trim(des) != ''))
                    {
                        if(email.indexOf('@') != '-1')
                        {
                            trozan = {'name':full_name,'email':email,'address':address,'company_name':c_name,'designation':des,'phone':phone};

                            http = '<? echo base_url().'site/send_fortu' ?>';

                            $.ajax({
                                url:http,
                                method:'POST',
                                data:{'trozan':JSON.stringify(trozan)},
                                success:function(data)
                                {
                                    if(data == '0')
                                    {
                                        $("#res").html('<div class="alert alert-success" role="alert">Successfully Registered</div>');
                                    }
                                    else
                                    {
                                        $("#res").html('<div class="alert alert-danger" role="alert">Please try again later</div>');
                                    }
                                }
                            });
                        }
                        else
                        {
                            $("#min_res").html('<div class="alert alert-danger" role="alert">Give a valid email address</div>');
                        }
                    }
                    else
                    {
                        $("#min_res").html('<div class="alert alert-danger" role="alert">Please fill up the form properly</div>');
                    }
                });
            </script>
            <!--<div class="clearfix"></div>
            <div class="margin-top-30 xs-margin-top-none padding-bottom-40">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 xs-padding-bottom-40 xs-padding-left-none xs-padding-right-none sm-padding-bottom-40 testimonials scroll_effect fadeInUp" data-wow-delay=".2s" style="visibility: hidden; -webkit-animation-delay: 0.2s; -webkit-animation-name: none;">
                    <h3 class="margin-bottom-25">TESTIMONIALS</h3>
                    <div class="testimonial">
                        <div class="bx-wrapper" style="max-width: 100%; margin: 0px auto;"><div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 61px;"><ul class="testimonial_slider" style="width: 515%; position: relative; -webkit-transition-duration: 0s; transition-duration: 0s; -webkit-transform: translate3d(-1091px, 0px, 0px);"><li style="float: left; list-style: none; position: relative; margin-right: 3px; width: 1088px;" class="bx-clone">
                                        <blockquote class="style1"><span>Happiness does not come from
                                    doing easy work but from the
                                    afterglow of satisfaction that
                                    comes after the achievement of
                                    a difficult task that demanded
                                    our best.</span> <strong>Theodore Isaac Rubin</strong> </blockquote>
                                    </li>
                                    <li style="float: left; list-style: none; position: relative; margin-right: 3px; width: 1088px;">
                                        <blockquote class="style1"><span>Happiness does not come from
                                    doing easy work but from the
                                    afterglow of satisfaction that
                                    comes after the achievement of
                                    a difficult task that demanded
                                    our best.</span> <strong>Theodore Isaac Rubin</strong> </blockquote>
                                    </li>
                                    <li style="float: left; list-style: none; position: relative; margin-right: 3px; width: 1088px;">
                                        <blockquote class="style1"><span>Happiness does not come from
                                    doing easy work but from the
                                    afterglow of satisfaction that
                                    comes after the achievement of
                                    a difficult task that demanded
                                    our best.</span> <strong>Theodore Isaac Rubin</strong> </blockquote>
                                    </li>
                                    <li style="float: left; list-style: none; position: relative; margin-right: 3px; width: 1088px;">
                                        <blockquote class="style1"><span>Happiness does not come from
                                    doing easy work but from the
                                    afterglow of satisfaction that
                                    comes after the achievement of
                                    a difficult task that demanded
                                    our best.</span> <strong>Theodore Isaac Rubin</strong> </blockquote>
                                    </li>
                                    <li style="float: left; list-style: none; position: relative; margin-right: 3px; width: 1088px;" class="bx-clone">
                                        <blockquote class="style1"><span>Happiness does not come from
                                    doing easy work but from the
                                    afterglow of satisfaction that
                                    comes after the achievement of
                                    a difficult task that demanded
                                    our best.</span> <strong>Theodore Isaac Rubin</strong> </blockquote>
                                    </li></ul></div></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            -->
        </div>
    </div>
    <!--container ends-->
</section>
<div class="clearfix"></div>