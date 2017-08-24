<style>
    a{
        padding: 10px !important;
    }
</style>
<?php if ($this->session->flashdata('flashSuccess')): ?>
    <div class='flashMsg flashSuccess well'> <?= $this->session->flashdata('flashSuccess') ?> </div>
<?php endif ?>

<?php if ($this->session->flashdata('flashError')): ?>
    <div class='flashMsg flashError well'> <?= $this->session->flashdata('flashError') ?> </div>
<?php endif ?>
<div class="panel" id="p21">
    <div class="panel-heading">
        <span class="panel-title">Customers List</span>
        <span class="pull-right">
            <a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>index.php/CustomersController/add_customer">Add Customer</a>            
        </span>
    </div>
    <div class="">
        <div class="serch_frm"> 
            <?php echo form_open('CustomersController/', array('class' => 'form-inline')); ?>
            <div class="form-group">
                <div class="input select">
                    <select name="search_by" class="form-control" id="">
                        <option value="">Select Option</option> 
                        <option value="c_name">Name</option>                           
                        <option value="c_email">Email</option>                           
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="input text">
                    <input name="search_text" class="form-control" placeholder="Enter text to be search" type="text" id="UserSearchText">
                </div>                        
            </div>
            <div class="form-group">
                <div class="input select">
                    <select name="search_by_age" class="form-control" id="">
                        <option value="">Select Age</option> 
                        <option value="less_than_25">less than 25 years</option>                           
                        <option value="greater_than_25">greater than or equal to 25 years</option>                           
                    </select>
                </div>
            </div>
            <input name="search" class="btn btn-primary" type="submit" value=" Search ">                        
            <input name="clear" class="btn btn-danger" type="submit" value=" Clear Field">                  
            <?php echo form_close(); ?>                                           
        </div>
    </div>
    <div class="panel-body pn">       
        <table class="table mbn table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Zip</th>
                    <th>Telephone</th>
                    <th>DOB</th>
                </tr>
            </thead>
            <tbody>    
                <?php if (!empty($customers)): ?>
                    <?php foreach ($customers as $k => $acc): ?>                
                        <tr>
                            <td><?php echo $acc['c_id'] ?></td>
                            <td><?php echo $acc['c_name'] ?></td>
                            <td><?php echo $acc['c_email'] ?></td>
                            <td><?php echo $acc['c_address'] ?></td>
                            <td><?php echo $acc['c_zip'] ?></td>
                            <td><?php echo $acc['c_telephone'] ?></td>
                            <td><?php echo $acc['c_dob'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>    
                    <tr>
                        <td colspan="8">No Record found</td>
                    </tr>
                <?php endif; ?>    
            </tbody>
        </table>
        <div class="pagination">
            <?php echo $pagination; ?>
        </div>
    </div>
</div>
