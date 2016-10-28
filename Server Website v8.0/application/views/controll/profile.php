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
                    <div id="hole">
                    </div>
                    <div class="form-group" id="num1">
                        <label for="regular13" class="col-sm-2 control-label">Enter new Email</label>
                        <div class="col-sm-10">
                            <input type="text" size="500" class="form-control" id="email" required><div class="form-control-line"></div>
                        </div>
                    </div>

                    <div class="form-group" id="num2">
                        <label for="regular13" class="col-sm-2 control-label">Enter new password</label>
                        <div class="col-sm-10">
                            <input type="text" size="500" class="form-control" id="password" required><div class="form-control-line"></div>
                        </div>
                    </div>

                    <div style="margin-top: 8px" class="col-sm-12" id="bnt">
                        <input type="button" value="Update" onclick="zn()" class="btn btn-block btn-success"/>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    //updating
    function zn()
    {
        user = $("#email").val();
        pass = $("#password").val();

        data = {};
        data['email'] = user;
        data['password'] = pass;

        if(($.trim(user) != '') && ($.trim(pass) != ''))
        {
            if(user.indexOf('@') != '-1')
            {
                http = '<? echo base_url().'controlle/update_profile' ?>';

                $.ajax({
                    url:http,
                    method:'POST',
                    data:{'trozan':JSON.stringify(data)},
                    success:function(data)
                    {
                        if(data == '1')
                        {
                            $("#hole").html('<div class="alert alert-success" role="alert">Successfully updated</div>');
                            $("#num1").hide();
                            $("#num2").hide();
                            $("#bnt").hide();
                        }
                        else
                        {
                            $("#hole").html('<div class="alert alert-danger" role="alert">Error Occurred</div>');
                        }
                    }
                });
            }
            else
            {
                $("#hole").html('<div class="alert alert-danger" role="alert">Please give a valid email address</div>');
            }
        }
        else
        {
            $("#hole").html('<div class="alert alert-danger" role="alert">Please fill the form properly</div>');
        }
    }
</script>