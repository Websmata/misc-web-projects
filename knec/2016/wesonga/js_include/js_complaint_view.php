<?php 

	$itemid = $results['item'];
	$js_db_query = "SELECT * FROM js_item WHERE itemid = '$itemid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $itemid, $item_title, $item_content, $item_postedby, $item_posted) = $database->get_row( $js_db_query );
}
		
?>

<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content"> 
        
	  
        <div class="content_item">
		<br>
		  
			<div class="main_content">
				<div class="detail_info">
				<h1>Complaint: <?php echo js_type_item($item_title) ?></h1> 
          <br><hr>
				<table>
				<tr><td>
				</td><td>
				<h2>Content: <?php echo $item_content ?></h2>
				<h2>Received on: <?php echo date("j/m/y", strtotime($item_posted)); ?></h2>
				</td></tr>
				</table>
				<hr>
				<center><h2><a href="index.php?action=item_edit&&js_itemid=<?php echo $itemid ?>">Edit this Item</a>
				 | <a href="index.php?action=item_delete&&js_itemid=<?php echo $itemid ?>" onclick="return confirm('Are you sure you want to delete this item from the system? \nBe careful, this action can not be reversed.')">Delete this Item</a></h2></center>
				 
				<br>
				
				</div>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
