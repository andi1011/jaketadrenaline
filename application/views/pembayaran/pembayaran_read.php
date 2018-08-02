<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
      
    </head>
    <body>
    <section class="content">
        <div class="row">
         <section class="col-lg-12 connectedSortable">
         <div class="box">
          <div class="box-body">
        <h2 style="margin-top:0px">Pembayaran Read</h2>
        <table class="table">
	    <tr><td>Id Pemesan</td><td><?php echo $id_pemesan; ?></td></tr>
	    <tr><td>Id Barang</td><td><?php echo $id_barang; ?></td></tr>
	    <tr><td>Tgl Pemesanan</td><td><?php echo $tgl_pemesanan; ?></td></tr>
	    <tr><td>Total Harga</td><td><?php echo $total_harga; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pembayaran') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
    </div>
    </div>
    </section>
    </div>
    </section>
        </body>
</html>