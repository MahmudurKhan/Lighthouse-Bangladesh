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
                        if(sizeof($newsletter))
                        {
                            ?>
                            <a href="<? echo base_url().'controlle/newsletter_csv' ?>" class="btn btn-info" style="float: left">Export to CSV</a>
                            <table class="table">
                                <tr>
                                    <td>ID</td><td>Email</td><td>Operation</td>
                                </tr>

                                <?

                                    foreach($newsletter as $n)
                                    {
                                        ?>
                                        <tr>
                                            <td><? echo $n['e_id'] ?></td><td><? echo $n['email'] ?></td>
                                            <td>
                                                <!--delete or not-->
                                                <a href="#" data-toggle="modal" data-target="<? echo '#'.$n['e_id'] ?>" class="btn btn-danger">Delete</a>

                                                <div class="modal fade" id="<? echo $n['e_id']; ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                                                                <h4 class="modal-title">Warning!</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete <strong><? echo $n['email'] ?></strong>?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                                <a href="<? echo base_url().'controlle/newsletter_delete/'.$n['e_id'] ?>" class="btn btn-danger">Yes</a>
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
                            <?
                        }
                        else
                        {
                            echo '<div class="alert alert-info" style="text-align: center">There is no newsletter sign up.</div>';
                        }
                    ?>


                </div>
            </div>
        </div>
        </section>
</div>