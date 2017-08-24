<script type="text/javascript">
    $(document).ready(function() {
        $("#add_customer").bValidator();
    });
</script>
<div class="admin-form">    
    <?php echo form_open('CustomersController/add_customer', array('id' => 'add_customer')); ?>   
    <div class="wizard clearfix steps-justified steps-show-icons steps-bg" role="application" id="">
        <div class="steps clearfix">
            <ul role="tablist">
                <li role="tab" class="first done" aria-disabled="false" aria-selected="false">
                    <a href="#"><span class="number">1.</span> 
                        <i class="fa fa-users pr5"></i> Add Customer
                    </a>
                </li>                  
            </ul>
        </div>
        <div class="content clearfix">                
            <section class="wizard-section body current" id="" role="tabpanel" aria-labelledby="" aria-hidden="false">                    								 
                <div class="section">
                    <div class="row">
                        <label class="col-sm-4 col-md-offset-2">Name</label>
                        <div class="col-sm-6">
                            <input type="text" name="c_name" id="name" class="gui-input" placeholder="Name..." data-bvalidator="alpha,required" data-bvalidator-msg="Plese enter user name.">					
                        </div>
                    </div>
                </div>
                <div class="section">
                    <div class="row">
                        <label class="col-sm-4 col-md-offset-2">Email-Id</label>
                        <div class="col-sm-6">
                            <input type="text" name="c_email" id="email" class="gui-input" placeholder="Email-Id..." data-bvalidator="email,required">					
                        </div>
                    </div>
                </div>
                <div class="section">
                    <div class="row">
                        <label class="col-sm-4 col-md-offset-2">Address</label>
                        <div class="col-sm-6">
                            <textarea name="c_address" class="gui-textarea" placeholder="Address.." data-bvalidator="required"></textarea>
                        </div>
                    </div>
                </div>                    
                <div class="section">
                    <div class="row">
                        <label class="col-sm-4 col-md-offset-2">Zip Code</label>
                        <div class="col-sm-6">
                            <input type="text" name="c_zip" class="gui-input" placeholder="Zip..." data-bvalidator="digit,required" data-bvalidator-msg="Plese enter user name.">					
                        </div>
                    </div>
                </div>

                <div class="section">
                    <div class="row">
                        <label class="col-sm-4 col-md-offset-2">Contact No</label>
                        <div class="col-sm-6">
                            <input type="text" name="c_telephone" class="gui-input" placeholder="Contact No ..." data-bvalidator="digit,required" data-bvalidator-msg="Plese enter user name.">					
                        </div>
                    </div>
                </div>
                <div class="section">
                    <div class="row">
                        <label class="col-sm-4 col-md-offset-2">Date Of Birth</label>
                        <div class="col-sm-6">
                            <input type="date"  class=""  name="c_dob" value=""/>                            
                        </div>
                    </div>
                </div>
                
            </section>
        </div>
        <div class="actions clearfix">
            <button type="submit" class="btn btn-primary">Submit</button>               
        </div>
    </div>
    <!-- End: Wizard -->
    <?php echo form_close(); ?>
</div>
