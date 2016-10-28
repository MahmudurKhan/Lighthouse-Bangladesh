<section class="content">
    <div class="container">
        <div class="inner-page">
            <?
                if(sizeof($records) > 0)
                {
                    foreach($records as $r)
                    {
                        ?>
                        <div class="row padding-bottom-40">
                            <h4><? echo $r['name'] ?> <small>CONDUCTED BY <? echo $r['conduct_by'] ?></small></h4>
                            <div class="col-lg-8 col-md-8 col-xs-12 left-content padding-left-none xs-padding-bottom-40 sm-padding-bottom-40">
                                <!--OPEN OF SLIDER-->
                                <div class="slider row col-lg-12 padding-left-none padding-right-none padding-bottom-20">

                                    <img src="<? echo base_url().'uploads/'.$r['image_banner'] ?>" />

                                </div>


                                <!--CLOSE OF SLIDER-->
                                <!--Slider End-->

                            </div>
                            <div class="col-lg-4 col-md-4 right-content padding-right-none xs-padding-left-none sm-padding-left-none">
                                <div class="right_site_job">
                                    <div class="job sm-padding-bottom-40 xs-padding-bottom-40 xs-padding-top-30">
                                        <h2>Overview</h2>
                                        <div><? echo $r['short_description'] ?></div>
                                        <a class="btn btn-danger" href="<? echo base_url().'site/event_details/'.$r['e_id'] ?>"><i class="fa fa-check fa-lg"></i> See Detail &amp; Register</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?
                    }
                }
                else
                {
                    echo '<div class="alert alert-info" style="text-align: center"><strong>There is no event updated yet.</strong></div>';
                }
            ?>




            <!------------------------------------------------------PAGINATION START--------------------------------------------->
            <!------------------------------------------------------------------------------------------------------------------->



            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pagiation-page" style="text-align:center">
                <h5>
                <?
                    echo $this->pagination->create_links();
                ?>
                </h5>
            </div>


            <!------------------------------------------------------PAGINATION END---------------------------------------------->
            <!------------------------------------------------------------------------------------------------------------------->

        </div>
    </div>
    <!--container ends-->

</section>