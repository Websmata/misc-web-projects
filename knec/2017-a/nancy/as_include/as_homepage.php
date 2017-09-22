<?php include AS_THEME."as_header.php" ?>
<div id="tooplate_main_wrapper">
    <div id="tooplate_top"></div>
	
    <div id="tooplate_main">
        <div id="tooplate_content_wrapper">
        	<div id="tc_top"></div>
			
        	<div id="tooplate_content">
				<div id="contact_form">
               	
                <div class="post_box">
					<h2 class="meta">Sell an Item</h2>
                    <div class="cleaner"></div>
						<?php as_feedback_message();
						$database = new As_Dbconn();			
						
						$as_item_query = "SELECT * FROM as_item ORDER BY itemid ASC";			
						$results = $database->get_results($as_item_query ); 
						
						if ($database->as_num_rows( $as_item_query)<=0) { ?>
							<h2>The following errors before you start selling</h2>
							<ul>
								<li><a href="index.php?action=item_new">No Items found! Add an Item</a></li>							
							</ul>
						<?php } else { ?>
						<form role="form" method="post" name="Stock" action="index.php?action=sales_new" >
						<table class="tt_tb">
							<thead>
								<tr class="tt_tr">
									<th class="my_th">Title</th>
									<th class="my_th">Stock</th>
									<th class="my_th">Quantity</th>
									<th class="my_th">Price (Kshs)</th>
								</tr>
							</thead>
						</table>
						<table class="tt_tb" id="saleNow"></table>
						<input type="hidden" name="total_price" id="total_price" value="">
						<table class="tt_tb">
							<thead>
								<tr class="tt_tr">
									<th class="my_th"></th>
									<th class="my_th"></th>
									<th class="my_th">TOTAL</th>
									<th class="my_th" id="total_pricenow">.00</th>
								</tr>
							</thead>
						</table>
						</form>
						 
						<table class="my_data">
							<tr id="itemsselling">
								<td><input type="text" name="getItemTitle" id="getItemTitle"/></td>
								<td id="itemsearchreslt"></td>
							</tr>
						</table>
					<?php } ?>
                    <div class="cleaner"></div>
                </div>
                </div>
            </div>
			
            <div id="tc_bottom"></div>
        </div>         
        <div class="cleaner"></div>
    </div>
 <?php include AS_THEME."as_footer.php" ?>
  
