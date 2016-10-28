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
                    <div class="progress" style="display: none">
                        <div class="progress-bar" id="res" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                        </div>
                    </div>

                    <form class="form-horizontal" method="post" action="" role="form" id="add_event" enctype="multipart/form-data">
                        <input type="text" value="<? echo $event['e_id'] ?>" id="event_id" style="display: none"/>

                        <div class="form-group">
                            <label for="textarea13" class="col-sm-2 control-label">Event Leaflet</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="userfile" required=""><div class="form-control-line"></div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <input type="submit" value="Add Leaflet of the event" class="btn btn-block btn-success"/>
                        </div>
                        <br><br>
                        <div class="col-sm-12">
                            <a class="btn btn-block btn-warning" href="<? echo base_url().'controlle/add_profile_view/'.$event['e_id'] ?>">Skip</a>
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

        //file upload
        $("#add_event").on('submit',function(e) {


            function uploadFile() {

                var fd = new FormData();
                fd.append("event_id",$("#event_id").val());
                fd.append("userfile",document.getElementById('userfile').files[0]);

                $("#add_event").hide();
                $(".progress").show();

                var xhr = new XMLHttpRequest();

                xhr.upload.addEventListener("progress", uploadProgress, false);
                xhr.upload.addEventListener("load", uploadComplete, false);
                xhr.upload.addEventListener("error", uploadFailed, false);
                xhr.upload.addEventListener("abort", uploadCanceled, false);

                http = '<? echo base_url().'controlle/update_leaflet' ?>';
                xhr.open("POST", http);
                xhr.onreadystatechange = function() {
                    if((xhr.readyState == 4) && (xhr.status == 200))
                    {
                        //alert(xhr.responseText);
                        window.location.replace('<? echo base_url().'controlle/add_profile_view/'.$event['e_id'] ?>');
                    }
                }

                xhr.setRequestHeader('Cache-Control','no-cache');

                xhr.send(fd);
            }

            function uploadProgress(evt) {
                if (evt.lengthComputable) {
                    var percentComplete = Math.round(evt.loaded * 100 / evt.total);
                    document.getElementById('res').style.width = percentComplete.toString() + '%';
                    document.getElementById('res').innerHTML = percentComplete.toString() + '%';
                }
                else {
                    document.getElementById('res').style.width = '0%';
                }
            }

            function uploadComplete(evt) {
                /* This event is raised when the server send back a response */


            }

            function uploadFailed(evt) {
                alert("There was an error attempting to upload the file.");
            }

            function uploadCanceled(evt) {
                alert("The upload has been canceled by the user or the browser dropped the connection.");
            }



            if((document.getElementById('userfile').files[0] != undefined))
            {
                uploadFile();
            }
            else
            {
                $("#alert_link").trigger('click');
            }



            e.preventDefault()
        });

    });
</script>