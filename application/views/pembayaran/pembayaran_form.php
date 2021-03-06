<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
       
    </head>
    <body>
    <section class="content">
        <div class="row">
         <section class="col-lg-12 connectedSortable">
         <div class="box">
          <div class="box-body">
        <h2 style="margin-top:0px">Pembayaran <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Pemesan <?php echo form_error('id_pemesan') ?></label>
            <input type="text" class="form-control" name="id_pemesan" id="id_pemesan" placeholder="Id Pemesan" value="<?php echo $id_pemesan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Barang <?php echo form_error('id_barang') ?></label>
            <input type="text" class="form-control" name="id_barang" id="id_barang" placeholder="Id Barang" value="<?php echo $id_barang; ?>" />
        </div>
    
        <div class="form-group">
            <label for="int">M <?php echo form_error('M') ?></label>
            <input type="number" min=0 class="form-control" name="M" id="M" value="<?php echo $M; ?>" />
        </div>
        <div class="form-group">
            <label for="int">L <?php echo form_error('L') ?></label>
            <input type="number" min=0 class="form-control" name="L" id="L" value="<?php echo $L; ?>" />
        </div>
        <div class="form-group">
            <label for="int">XL <?php echo form_error('XL') ?></label>
            <input type="number" min=0 class="form-control" name="XL" id="XL" value="<?php echo $XL; ?>" />
        </div>
        <div class="form-group">
            <label for="int">XXL <?php echo form_error('XXL') ?></label>
            <input type="number" min=0 class="form-control" name="XXL" id="XXL" value="<?php echo $XXL; ?>" />
        </div>
        <div class="form-group">
            <label for="int">XXXL <?php echo form_error('XXXL') ?></label>
            <input type="number" min=0 class="form-control" name="XXXL" id="XXXL" value="<?php echo $XXXL; ?>" />
        </div>
      
	    <div class="form-group">
            <label for="int">Total Harga <?php echo form_error('total_harga') ?></label>
            <input type="text" class="form-control" name="total_harga" id="total_harga" placeholder="Total Harga" value="<?php echo $total_harga; ?>" />
        </div>
	    <input type="hidden" name="id_pembayaran" value="<?php echo $id_pembayaran; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pembayaran') ?>" class="btn btn-default">Cancel</a>
	</form>
    </div>
    </div>
    </section>
    </div>
    </section>
    </body>
</html>