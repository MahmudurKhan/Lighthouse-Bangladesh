<section class="section-account">
    <div class="img-backdrop" style="background-image: url('<? echo base_url() ?>files/Admin/assets/img/img16.jpg')"></div>
    <div class="spacer"></div>
    <div class="card contain-sm style-transparent">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <br>
                    <span id="res" class="text-lg text-bold text-primary">Lighthouse Bangladesh ADMIN</span>
                    <br><br>
                    <form class="form floating-label" accept-charset="utf-8" method="post">
                        <div class="form-group" id="hidenew">
                            <input type="text" class="form-control" id="email" name="username">
                            <label for="username">Email Address</label>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-xs-6 text-left">
                                <input class="btn btn-primary btn-raised" type="button" id="log" value="Retrive"/>
                                <a class="btn btn-primary btn-raised" href="<? echo base_url().'sign_me_in' ?>">Back</a>
                            </div><!--end .col -->
                        </div><!--end .row -->
                    </form>
                </div><!--end .col -->

            </div><!--end .card -->
        </div></div></section>
<script type="text/javascript">
    $(document).ready(function() {
        $("#log").on('click',function() {
            user = $("#email").val();

            if(($.trim(user) != ''))
            {
                if(user.indexOf('@') != '-1')
                {
                    data = {'email':user};

                    http = '<? echo base_url().'sign_me_in/retrive' ?>';

                    xml = new XMLHttpRequest();
                    xml.onreadystatechange = function()
                    {
                        if(xml.status == 200 && xml.readyState == 4)
                        {
                            if(xml.responseText == '0')
                            {
                                $("#res").html("Invalid Email");
                            }
                            else
                            {
                                $("#res").html("Email Has Been Sent To Admin's Mail Address");
                                $("#hidenew").hide();
                                $("#log").hide();
                            }
                        }
                    }

                    packet = 'email='+data['email'];

                    xml.open('POST',http,false);
                    xml.setRequestHeader('Content-type','application/x-www-form-urlencoded');
                    xml.send(packet);

                }
                else
                {
                    $("#res").html('Please Give Valid Email Address');
                }
            }
            else
            {
                $("#res").html('Please Give Email Address Properly');
            }

        });
    });
</script>