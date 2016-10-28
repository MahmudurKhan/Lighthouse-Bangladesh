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
                    <? if(sizeof($list)) { ?>
                    <table class="table">
                        <tr>
                            <td>
                                Event Name
                            </td>
                            <td>
                                Start Date
                            </td>

                            <td>
                                End Date
                            </td>

                            <td>
                                Operation
                            </td>
                        </tr>
                        <?
                            foreach($list as $l)
                            {
                                ?>
                                <tr>
                                    <td>
                                        <? echo $l['name'] ?>
                                    </td>
                                    <td>
                                        <? echo $l['date_start'] ?>
                                    </td>

                                    <td>
                                        <? echo $l['date_end'] ?>
                                    </td>

                                    <td>
                                        <a href="<? echo base_url().'controlle/edit_event_view/'.$l['e_id'] ?>" class="btn btn-warning">Edit Information</a>

                                        <a href="<? echo base_url().'controlle/edit_banner_view/'.$l['e_id'] ?>" class="btn btn-success">Update Banner</a>

                                        <a href="<? echo base_url().'controlle/edit_profile_view/'.$l['e_id'] ?>" class="btn btn-warning">Update Profile file</a>

                                        <a href="<? echo base_url().'controlle/edit_leaflet_view/'.$l['e_id'] ?>" class="btn btn-success">Update Event Leaflet</a>

                                        <!--delete or not-->
                                        <a href="#" data-toggle="modal" data-target="<? echo '#'.$l['e_id'] ?>" class="btn btn-danger">Delete</a>
                                        <div class="modal fade" id="<? echo $l['e_id']; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                                                        <h4 class="modal-title">Warning!</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete <strong><? echo $l['name'] ?></strong>?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                        <a href="<? echo base_url().'controlle/delete_event/'.$l['e_id'] ?>" class="btn btn-danger">Yes</a>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    </td>
                                </tr>
                                <?
                            }
                        ?>
                    </table>
                    <?  } else {echo '<div class="alert alert-info" style="text-align: center"><strong>There is no event yet. Please create an event first.</strong></div>'; }  ?>
                </div>
            </div>
        </div>
    </section>
</div>