<section class="content">
    <div class="container">
        <div class="inner-page">
            <img src="<? echo base_url().'files/' ?>images/calender.jpg" class="img-responsive" alt="Responsive image">
             <? /*
                if(sizeof($records) > 0)
                {
                    ?>
                <table class="table table-hover">
                    <thead>
                    <tr style="color: #319ad7">
                        <th><i class="fa fa-calendar fa-2x"></i> Event Date</th>
                        <th><i class="fa  fa-comments-o fa-2x"></i> Event Name</th>
                        <th><i class="fa fa-user fa-2x"></i> Conducted By</th>
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
                }*/
            ?>
        </div>
    </div>
    <!--container ends-->

</section>