<?php include AS_THEME."as_header.php";
	$database = new As_Dbconn();			
	$as_db_query = "SELECT * FROM as_place ORDER BY placeid DESC LIMIT 20";
	$results = $database->get_results( $as_db_query );
?>

        <div class="page-top" id="templatemo_about">
        </div> <!-- /.page-header -->

        <div class="middle-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="widget-item">
                            <h3 class="widget-title"><?php echo $database->as_num_rows( $as_db_query ) ?> Places Available for Booking</h3>
							<?php foreach( $results as $row ) { ?>
                            <div class="post-small">
                                <div class="post-date">
                                    <span class="time">Price</span>
                                    <span><?php echo $row['place_price'] ?></span>
                                </div> 
                                <a href="index.php?page=book_place&&as_hotelid=<?php echo $row['placeid'] ?>">
									<div class="post-content">
										<h4><?php echo $row['place_title'] ?></h4>
										<span><?php echo $row['place_details'] ?></span>
										<p>Click to Book Now</p>
									</div>
								</a>
                            </div> 
							<?php } ?>
                        </div>
                    </div> 
                   
                    <div class="col-md-4">
                        <div class="widget-item">
                            <h3 class="widget-title">Our Services</h3>

                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="fa fa-cogs"></i>
                                </div>
                                <div class="service-content">
                                    <h4>Hotel Booking</h4>
                                    <p>You can book a place with us anytime and we will be at your service.</p>
                                </div>
                            </div>
                            
                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="fa fa-cogs"></i>
                                </div>
                                <div class="service-content">
                                    <h4>Safari Booking</h4>
                                    <p>You can book a place with us anytime and we will be at your service.</p>
                                </div>
                            </div>
                        </div> <!-- /.widget-item -->
                    </div> <!-- /.col-md-4 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div>
		<?php if ($myaccount){ ?>
        <div class="go-act">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="first-map"></div>
                    </div> <!-- /.col-md-4 -->
                    <div class="col-md-8">
                        <div class="act-btn">
                            <div class="inner">
                                <div class="price" style="font-size:50px;">
                                    +
                                </div> <!-- /.price -->
                                <div class="title">
                                    <h2>ADD A PLACE</h2>
                                    <span>Click to add more Hotels</span>
                                </div>
                            </div> <!-- /.inner -->
                            <a href="index.php?page=place_new" class="link">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div> <!-- /.act-btn -->
                    </div> <!-- /.col-md-8 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.go-act -->
        <?php } ?>
<?php include AS_THEME."as_footer.php" ?>
    
