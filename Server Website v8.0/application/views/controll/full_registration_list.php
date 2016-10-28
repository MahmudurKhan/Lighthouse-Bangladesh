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
                    <? if(sizeof($reg)) { ?>
                        <h2>Registration List For All Events</h2>
                        <span><a href="<? echo base_url().'controlle/registration_all_to_csv/' ?>" class="btn btn-info">Export to CSV</a></span>
                        <table class="table">
                            <tr>
                                <td>
                                    Name
                                </td>
                                <td>
                                    Email
                                </td>

                                <td>
                                    Company Name
                                </td>
                                <td>
                                    Designation
                                </td>

                                <td>
                                    Phone
                                </td>

                                <td>
                                    Address
                                </td>

                                <td>
                                    Operation
                                </td>
                            </tr>
                            <?
                            foreach($reg as $r)
                            {
                                ?>
                                <tr>
                                    <td>
                                        <? echo $r['name'] ?>
                                    </td>
                                    <td>
                                        <? echo $r['email'] ?>
                                    </td>

                                    <td>
                                        <? echo $r['company_name'] ?>
                                    </td>

                                    <td>
                                        <? echo $r['designation'] ?>
                                    </td>

                                    <td>
                                        <? echo $r['phone'] ?>
                                    </td>

                                    <td>
                                        <? echo $r['address'] ?>
                                    </td>

                                    <td>
                                        <a href="#" data-toggle="modal" data-target="<? echo '#'.$r['r_id']; ?>" class="btn btn-danger">Delete</a>

                                        <div class="modal fade" id="<? echo $r['r_id']; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                                                        <h4 class="modal-title">Warning!</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete <strong><? echo $r['name'] ?></strong>?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                        <a href="<? echo base_url().'controlle/reg_delete_from_all/'.$r['r_id'] ?>" class="btn btn-danger">Yes</a>
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