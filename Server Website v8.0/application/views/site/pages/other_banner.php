<section id="secondary-banner" class="dynamic-image-3"><!--for other images just change the class name of this section block like, class="dynamic-image-2" and add css for the changed class-->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                <h2><? if(isset($event_title)) { echo $event_title; } else{ echo $title; } ?></h2>
                <h4><? echo $sentence ?></h4>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <ul class="breadcrumb">
                    <li><a href="<? echo base_url(); ?>">Home</a></li>
                    <li><? echo $title ?></li>
                </ul>
            </div>
        </div>
    </div>
</section>