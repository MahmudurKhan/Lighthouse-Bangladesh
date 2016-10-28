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
                <div class="card-body">
                    <div id="pro">

                    </div>

                    <form class="form-horizontal" method="post" action="" role="form" id="add_calender" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="regular13" class="col-sm-2 control-label">Event Name*</label>
                            <div class="col-sm-10">
                                <input type="text" size="500" class="form-control" name="name" ><div class="form-control-line"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="regular13" class="col-sm-2 control-label">Conducted By*</label>
                            <div class="col-sm-10">
                                <input type="text" size="500" class="form-control" name="conduct_by"><div class="form-control-line"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="regular13" class="col-sm-2 control-label">Date Start*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="start_date" name="date_start"><div class="form-control-line"></div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <input type="submit" value="Yes" class="btn btn-danger">
                        </div>

                    </form>
                </div><!--end .card-body -->
            </div><!--end .card -->


        </div><!--end .section-body -->
    </section>
</div><!--end #content-->
<!-- END CONTENT -->
<a style="display: none" data-toggle="modal" id="alert_link" data-target="#alert">test</a>

<div class="modal fade" id="alert">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                <h4 class="modal-title">Warning!</h4>
            </div>
            <div class="modal-body">
                <p>Please fill up the form field properly</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    $(document).ready(function() {
        $(".summernote").summernote();

        $("#start_date").datetimepicker({
            timepicker:false,
            format:'d M,y'
        });

        $("#add_calender").on('submit',function(e) {

            data = $(this).serializeArray();

            event_name = data[0]['value'];
            conduct_by = data[1]['value'];
            date_start = data[2]['value'];

            if (($.trim(event_name) != '') && ($.trim(conduct_by) != '') && ($.trim(date_start) != '')) {
                $.ajax({
                    url: '<? echo base_url().'controlle/adding_calender' ?>',
                    method : 'POST',
                    data : {data:JSON.stringify({'name':event_name,'conduct_by':conduct_by,'date_start':date_start})},
                    success: function(data)
                    {
                        if(data == '1')
                        {
                            $("#pro").html('<div class="alert alert-info" style="text-align: center"><strong>Successfully added</strong></div>').show();

                            $("input[type=text]").val('');
                        }
                        else
                        {
                            $("#pro").html('<div class="alert alert-info" style="text-align: center"><strong>Error occured</strong></div>').show();
                        }
                    }
                });



            } else {

                $("#pro").html('<div class="alert alert-info" style="text-align: center"><strong>Fill up the form properly</strong></div>').show();

            }



            e.preventDefault();
        });
    });
</script>