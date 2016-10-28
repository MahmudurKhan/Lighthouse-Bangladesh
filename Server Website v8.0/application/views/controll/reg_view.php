<!-- BEGIN CONTENT-->
<div id="content">
    <section>

        <div class="section-body contain-lg">
            <!-- BEGIN INTRO -->
            <div class="row">
            </div><!--end .row -->
            <!-- END INTRO -->

            <!-- BEGIN HORIZONTAL FORM - BASIC ELEMENTS-->
            <div class="card">
                <div id="res" class="card-body">
                    <? if(sizeof($list) > 0) { ?>
                    <form method="POST" id="test" action="<? echo base_url().'controlle/registration_find' ?>">
                        <div class="form-group" id="jakel">

                        </div>
                        <div class="form-group">
                            <label for="textarea13" class="col-sm-2 control-label">Registration list for:</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="event_id" name="event_id">
                                    <option value="-1">Select Any Event</option>
                                    <?
                                        foreach($list as $l)
                                        {
                                            ?>
                                            <option value="<? echo $l['e_id'] ?>"><? echo $l['name'] ?></option>
                                            <?
                                        }
                                    ?>
                                </select>
                                <div class="form-control-line"></div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="col-sm-12">
                            <input type="submit" id="go" style="float: right" value="Search" class="btn btn-success"/>
                        </div>
                    </form>
                    <?  } else {echo '<div class="alert alert-info" style="text-align: center"><strong>There is no event yet. Please create an event first.</strong></div>'; }  ?>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    $("#test").on('submit',function(e) {
        if($("#event_id").val() == '-1')
        {
            $("#jakel").html('<div class="alert alert-danger" role="alert" style="text-align: center">Choose an event from the following list</div>');
            e.preventDefault();
        }
    });
</script>
