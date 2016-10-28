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
                    <?
                    if(sizeof($records) > 0)
                    {
                        ?>
                        <table class="table table-hover">
                            <thead>
                            <tr style="color: #319ad7">
                                <th><i class="fa fa-calendar fa-2x"></i> Event Date</th>
                                <th><i class="fa  fa-comments-o fa-2x"></i> Event Name</th>
                                <th><i class="fa fa-user fa-2x"></i> Conducted By</th>
                                <th><i class="fa fa-adjust fa-2x"></i> Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?

                            foreach($records as $r)
                            {
                                ?>
                                <tr>
                                    <td><? echo $r['date_start']?></i></td>
                                    <td><? echo $r['name']?></td>
                                    <td><? echo $r['conduct_by']?></td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="<? echo '#'.$r['c_id'] ?>" class="btn btn-danger">Delete</a>
                                        <div class="modal fade" id="<? echo $r['c_id']; ?>">
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
                                                        <a href="<? echo base_url().'controlle/delete_calender/'.$r['c_id'] ?>" class="btn btn-danger">Yes</a>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->


                                    </td>
                                </tr>
                                <?
                            }
                            ?>
                            </tbody>
                        </table>
                        <?
                    }
                    else
                    {
                        ?>
                        <div class="alert alert-info" style="text-align: center"><strong>There is no event in calender yet.</strong></div>
                        <?
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</div>