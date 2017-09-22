<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	
		
		<?php $as_db_query = "SELECT * FROM as_customer ORDER BY customerid DESC LIMIT 20";
			$database = new As_Dbconn();			
			$results = $database->get_results( $as_db_query );
		?>
	  <div id="content"> 
        
	  
        <div class="content_item">
		<br>
		  <h1> Customers</h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>Full Name</th>
				  <th>Mobile</th>
				  <th>Registered</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr>
				   <td><?php echo $row['customer_fullname'] ?></td>
		          <td><?php echo $row['customer_mobile'] ?></td>
				  <td><?php echo date("j/m/y", strtotime($row['customer_joined'])); ?></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
					<h1><?php echo $database->as_num_rows( $as_db_query ) ?> Customers
		 </h1>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
