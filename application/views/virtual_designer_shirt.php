<?php
//print_r($_SESSION['user_id']);
if ($_SERVER['HTTPS'] == "on")
{
	$https_url="https://www.stylior.com/stylior/";
	$bas_ul = "https://www.stylior.com/";
	$https_url_large_img="https://www.stylior.com/stylior/upload/products1/";
	$image_url = "https://www.stylior.com/stylior/site/";
}
else {
	$bas_ul = "http://www.stylior.com/";
	$https_url="http://www.stylior.com/";
	$https_url_large_img="http://www.stylior.com/upload/products1/";
	$image_url = "http://www.stylior.com/stylior/site/";
}

session_start();

//var start
function getIPAddress($deep_detect){
//$ip="86.96.201.72";
	 if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];

        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }

$geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip;
$addrDetailsArr = unserialize(file_get_contents($geopluginURL));
return $addrDetailsArr;

}

/*
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
*/


if(!isset($_SESSION['currencycode']))
{

	$addrDetailsArr = getIPAddress(false);
	if($addrDetailsArr['geoplugin_status']==404 || $addrDetailsArr['geoplugin_status']==200){
	$addrDetailsArr =getIPAddress(true);
	}

}

//end avr
/*Get user ip address details with geoplugin.net*/
// $geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip;
// $addrDetailsArr = unserialize(file_get_contents($geopluginURL));
//print_r($addrDetailsArr);
/*Get City name by return array*/
$city = $addrDetailsArr['geoplugin_city'];

/*Get Country name by return array*/
$country = $addrDetailsArr['geoplugin_countryName'];

$currency = $addrDetailsArr['geoplugin_currencyCode'];
//geoplugin_currencyCode]
/*Comment out these line to see all the posible details*/
/*echo '<pre>';
print_r($addrDetailsArr);
die();*/
if(!$country)
{
   $country='Not Define';
}
//echo '<strong>IP Address</strong>:- '.$ip.'<br/>';
//echo '<strong>Country</strong>:- '.$country.'<br/>';
//echo '<strong>currency</strong>:- '.$currency.'<br/>';
//$_SESSION['currencycode']=$currency;
//echo $ip;
//echo '<pre>';
//print_r($_SESSION['currencycode']);
//die();

if(!($_SESSION['currencycode']))
{
	//echo 'hi';
	//$currency = $_SESSION['currencycode'];
  $this->session->set_userdata('currencycode',$currency);
      //echo "sessionnotset";
	  	//echo '<script type="text/javascript">' .'changecurrency("'.$currency.'");' . '</script>';
}
else
{
	//echo 'hiytryrt';
	 $currency= $_SESSION['currencycode'];
	//echo '<script type="text/javascript">' .'changecurrency("'.$currency.'");' . '</script>';


}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> </title>
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	<link rel="stylesheet" href="<?= $bas_ul ?>site/css/bootstrap.css">
	<link rel="stylesheet" href="<?= $bas_ul ?>site/css/swiper.min.css">
	<link rel="stylesheet" href="<?= $bas_ul ?>/site/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= $bas_ul ?>/site/css/ionicons.min.css">
	<script src="https://www.stylior.com/site/js/remodal.js"></script>
	<link rel="stylesheet" href="https://www.stylior.com/stylior/site/css/remodal.css">
	<link rel="stylesheet" href="https://www.stylior.com/stylior/site/css/remodal-default-theme.css">
	<link rel="shortcut icon" href="<?= $bas_ul ?>stylior/site/images/favicon.jpg" sizes="32x32" />
	<!--  non-retina iPhone pre iOS 7 -->
	<link rel="apple-touch-icon" href="<?= $bas_ul ?>stylior/site/images/favicon.jpg" sizes="57x57" />
	<!--  non-retina iPad iOS 7 -->
<link rel="apple-touch-icon" href="<?= $bas_ul ?>stylior/site/images/favicon.jpg" sizes="76x76" />
	<link rel="stylesheet" href="<?= $bas_ul ?>site/css/3d-shirt.css">

</head>
<body>
<!-- Header Section Here -->
<!-- Content Section -->
<!-- start container-fluid Section -->

<div class="se-pre-con"  style="background: url(<?=base_url()."images/loading_new.gif";?>) no-repeat center"></div>
<div class="container-fluid">
	<div class="col-sm-12 col-xs-12 visible-xs visible-sm">
	<div class="stylior-logo-mobile back-to-home">
		<a href="https://www.stylior.com/">
			<img class="img-responsive"  src="https://www.stylior.com/stylior/site/images/relaunch/logo.png" alt="">
		</a>
	</div>
	</div>
<div >
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 left-panel design-left-panel  hidden-xs hidden-sm">
    
				<div class="navs-list ">
			<ul class="main-options">
				<li class="left-panel-option fabric_icon"  >
					<div class="row">
						<div class="col-md-6 left-panel-icon" id="selected_fabric_icon">
							<img src="<?= $bas_ul ?>stylior/site/images/shirt-icons/fabric.png" alt="">
						</div>
						<div class="col-md-6 left-panel-icon-info" id="selected_fabric">
							<h4>FABRIC</h4>
							<span></span>
						</div>
					</div>
				</li>
				<li class="left-panel-option sleeve_icon" >
					<div class="row">
						<div class="col-md-6 left-panel-icon" id="selected_sleeve_icon">
							<img src="<?= $bas_ul ?>stylior/site/images/shirt-icons/sleeve.png" alt="">
						</div>
						<div class="col-md-6 left-panel-icon-info" id="selected_sleeve">
							<h4>SLEEVES</h4>
							<span></span>
						</div>
					</div>
				</li>
				<li class="left-panel-option collar_icon"  >
					<div class="row">
						<div class="col-md-6 left-panel-icon" id="selected_collar_icon">
							<img src="<?= $bas_ul ?>stylior/site/images/shirt-icons/collar.png" alt="">
						</div>
						<div class="col-md-6 left-panel-icon-info" id="selected_collar">
							<h4>COLLAR</h4>
							<span></span>
						</div>
					</div>
				</li>
				<li class="left-panel-option cuffs_icon" >
					<div class="row">
						<div class="col-md-6 left-panel-icon" id="selected_cuff_icon" >
							<img src="<?= $bas_ul ?>stylior/site/images/shirt-icons/cuff.png" alt="">
						</div>
						<div class="col-md-6 left-panel-icon-info" id="selected_cuff">
							<h4>CUFFS</h4>
							<span> </span>
						</div>
					</div>
				</li>
				<li class="left-panel-option button_icon">
					<div class="row">
						<div class="col-md-6 left-panel-icon" id="selected_button_icon">
							<img src="<?= $bas_ul ?>stylior/site/images/shirt-icons/button.png" alt="">
						</div>
						<div class="col-md-6 left-panel-icon-info" id="selected_button">
							<h4>BUTTON</h4>
							<span> </span>
						</div>
					</div>
				</li>
				<li class="left-panel-option pocket_icon" >
					<div class="row">
						<div class="col-md-6 left-panel-icon" id="selected_pocket_icon">
							<img src="<?= $bas_ul ?>stylior/site/images/shirt-icons/pocket.png" alt="">
						</div>
						<div class="col-md-6 left-panel-icon-info" id="selected_pocket">
							<h4>POCKET</h4>
							<span> </span>
						</div>
					</div>
				</li>
				<li class="left-panel-option placket_icon">
					<div class="row">
						<div class="col-md-6 left-panel-icon" id="selected_placket_icon">
							<img src="<?= $bas_ul ?>stylior/site/images/shirt-icons/placket.png" alt="">
						</div>
						<div class="col-md-6 left-panel-icon-info" id="selected_placket">
							<h4>PLACKET</h4>
							<span>  </span>
						</div>
					</div>
				</li>
				<li class="left-panel-option back_icon" >
					<div class="row">
						<div class="col-md-6 left-panel-icon" id="selected_back_icon">
							<img src="<?= $bas_ul ?>stylior/site/images/shirt-icons/back.png" alt="">
						</div>
						<div class="col-md-6 left-panel-icon-info" id="selected_back">
							<h4>BACK</h4>
							<span>  </span>
						</div>
					</div>
				</li>
				<li class="left-panel-option bottom_icon" >
					<div class="row">
						<div class="col-md-6 left-panel-icon" id="selected_bottom_icon">
							<img src="<?= $bas_ul ?>stylior/site/images/shirt-icons/bottom.png" alt="">
						</div>
						<div class="col-md-6 left-panel-icon-info" id="selected_bottom">
							<h4>BOTTOM</h4>
							<span> </span>
						</div>
					</div>
				</li>
				<li class="left-panel-option contrast_icon" >
					<div class="row">
						<div class="col-md-6 left-panel-icon" >
							<img src="<?= $bas_ul ?>stylior/site/images/shirt-icons/innercontrast.png" alt="">
						</div>
						<div class="col-md-6 left-panel-icon-info">
							<h4>CONTRAST</h4>
							<span></span>
						</div>
					</div>
				</li>



				<li class="left-panel-option monogram_icon" >
					<div class="row">
						<div class="col-md-6 left-panel-icon">
							<img src="<?= $bas_ul ?>stylior/site/images/shirt-icons/monogram.png" alt="">
						</div>
						<div class="col-md-6 left-panel-icon-info" id="selected_monogram">
							<h4>MONOGRAM</h4>
							<span></span>
						</div>
					</div>
				</li>
			</ul>
		</div>
		</div><!-- end of desing-cloth-leftpane -->
 </div>

	<div class="col-sm-12 col-xs-12 left-panel visible-xs visible-sm">

		<ul class="main-options">
		<div class="swiper-container">
		<div class="swiper-wrapper">
				<div class="swiper-slide"   >
					<li class="left-panel-option fabric_icon"  >
						<div class="row">
							<div class="col-sm-12 col-xs-12 left-panel-icon" id="selected_fabric_icon_mobile">
								<img src="<?= $bas_ul ?>stylior/site/images/shirt-icons/fabric.png" alt="">
							</div>
							<div class="col-sm-12 col-xs-12 left-panel-icon-info">
								<h4>FABRIC</h4>
								<span></span>
							</div>
						</div>
					</li>
				</div>
				<div class="swiper-slide" >
					<li class="left-panel-option sleeve_icon"  >
						<div class="row">
							<div class="col-sm-12 col-xs-12 left-panel-icon" id="selected_sleeve_icon_mobile" >
								<img src="<?= $bas_ul ?>stylior/site/images/shirt-icons/sleeve.png" alt="">
							</div>
							<div class="col-sm-12 col-xs-12 left-panel-icon-info">
								<h4>SLEEVES</h4>
								<span></span>
							</div>
						</div>
					</li>
				</div>
				<div class="swiper-slide"  >
				<li class="left-panel-option collar_icon" >
					<div class="row">
						<div class="col-sm-12 col-xs-12 col-md-6 left-panel-icon" id="selected_collar_icon_mobile">
							<img src="<?= $bas_ul ?>stylior/site/images/shirt-icons/collar.png" alt="">
						</div>
						<div class="col-sm-12 col-xs-12 col-md-6 left-panel-icon-info">
							<h4>COLLAR</h4>
							<span></span>
						</div>
					</div>
				</li>
			</div>
				<div class="swiper-slide cuffs_icon">
					<li class="left-panel-option cuffs_icon"   >
						<div class="row">
							<div class="col-sm-12 col-xs-12 col-md-12 left-panel-icon" id="selected_cuff_icon_mobile" >
								<img src="<?= $bas_ul ?>stylior/site/images/shirt-icons/cuff.png" alt="">
							</div>
							<div class="col-sm-12 col-xs-12 col-md-12 left-panel-icon-info">
								<h4>CUFFS</h4>
								<span> </span>
							</div>
						</div>
					</li>
				</div>
				<div class="swiper-slide" >
					<li class="left-panel-option button_icon" >
						<div class="row">
							<div class="col-sm-12 col-xs-12 col-md-12 left-panel-icon" id="selected_button_icon_mobile">
								<img src="<?= $bas_ul ?>stylior/site/images/shirt-icons/button.png" alt="">
							</div>
							<div class="col-sm-12 col-xs-12 col-md-12 left-panel-icon-info">
								<h4>BUTTON</h4>
								<span> </span>
							</div>
						</div>
					</li>
				</div>
				<div class="swiper-slide" >
					<li class="left-panel-option pocket_icon" >
						<div class="row">
							<div class="col-sm-12 col-xs-12 col-md-12 left-panel-icon" id="selected_pocket_icon_mobile">
								<img src="<?= $bas_ul ?>stylior/site/images/shirt-icons/pocket.png" alt="">
							</div>
							<div class="col-sm-12 col-xs-12 col-md-12 left-panel-icon-info">
								<h4>POCKET</h4>
								<span> </span>
							</div>
						</div>
					</li>
				</div>
				<div class="swiper-slide" >
					<li class="left-panel-option placket_icon" >
						<div class="row">
							<div class="col-sm-12 col-xs-12 col-md-12 left-panel-icon" id="selected_placket_icon_mobile">
								<img src="<?= $bas_ul ?>stylior/site/images/shirt-icons/placket.png" alt="">
							</div>
							<div class="col-sm-12 col-xs-12 col-md-12 left-panel-icon-info">
								<h4>PLACKET</h4>
								<span>  </span>
							</div>
						</div>
					</li>
				</div>
				<div class="swiper-slide" >
					<li class="left-panel-option back_icon" >
						<div class="row">
							<div class="col-sm-12 col-xs-12 col-md-12 left-panel-icon" id="selected_back_icon_mobile">
								<img src="<?= $bas_ul ?>stylior/site/images/shirt-icons/back.png" alt="">
							</div>
							<div class="col-sm-12 col-xs-12 col-md-12 left-panel-icon-info">
								<h4>BACK</h4>
								<span>  </span>
							</div>
						</div>
					</li>
				</div>
				<div class="swiper-slide" >
					<li class="left-panel-option bottom_icon" >
						<div class="row">
							<div class="col-sm-12 col-xs-12 col-md-12 left-panel-icon" id="selected_bottom_icon_mobile">
								<img src="<?= $bas_ul ?>stylior/site/images/shirt-icons/bottom.png" alt="">
							</div>
							<div class="col-sm-12 col-xs-12 col-md-12 left-panel-icon-info">
								<h4>BOTTOM</h4>
								<span> </span>
							</div>
						</div>
					</li>
				</div>
				<div class="swiper-slide" >
					<li class="left-panel-option contrast_icon" >
						<div class="row">
							<div class="col-sm-12 col-xs-12 col-md-12 left-panel-icon">
								<img src="<?= $bas_ul ?>stylior/site/images/shirt-icons/innercontrast.png" alt="">
							</div>
							<div class="col-sm-12 col-xs-12 col-md-12 left-panel-icon-info">
								<h4>CONTRAST</h4>
								<span></span>
							</div>
						</div>
					</li>
				</div>
				<div class="swiper-slide" >
					<li class="left-panel-option monogram_icon" >
						<div class="row">
							<div class="col-sm-12 col-xs-12 col-md-12 left-panel-icon">
								<img src="<?= $bas_ul ?>stylior/site/images/shirt-icons/monogram.png" alt="">
							</div>
							<div class="col-sm-12 col-xs-12 col-md-12 left-panel-icon-info">
								<h4>MONOGRAM</h4>
								<span></span>
							</div>
						</div>
					</li>
				</div>
		</div>
		<!-- Add Pagination -->
		<!--<div class="swiper-pagination"></div>
		<div class="swiper-button-next"></div>

		<div class="swiper-button-prev"></div>-->
		 <div class="swiper-scrollbar"></div>
</div>
</ul>
	</div>
 <!-- main option panel end -->
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 option-select nopadding ">

	<div class="filter-options" id="filter_options" >
	<div class="row filters" >
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 nopadding">
			<div class="dropdown">
  				<div class="dropbtn">Color</div>
  				<div class="dropdown-content">
    			<ul class="color_select_list"  style="list-style: none;">
					<?php
					foreach($fabric_colors as $value) {
						echo '<a href="javascript:filterData(`color`,`'.$value->id.'`);"><li value="'.$value->id.'" id="color_'.$value->id .'" >'.$value->colourname.'</li></a>';
						} ?>

  				</ul>

  				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 nopadding">
			<div class="dropdown">
  				<div class="dropbtn">Pattern</div>
  				<div class="dropdown-content">
    			<ul class="pattern_select_list"  style="list-style: none;">
    			<?php
				foreach($fabric_patterns as $value){
						echo '<a href="javascript:filterData(`pattern`,`'.$value->id.'`);"><li id="pattern_'.$value->id .'" value="'.$value->id.'">'.$value->designname.'</li></a>';
				}
    			?>
				</ul>
  				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 nopadding">
			<div class="dropdown">
  				<div class="dropbtn">Price</div>
  				<div class="dropdown-content">
					<ul  class="price_range_select" style="list-style: none;">
						<a href="javascript:filterData('range','ASC');"><option value="ASC">Low-to-High</option></a>
						<a href="javascript:filterData('range','DESC');"><option value="DESC">High-to-Low</option></a>
					</ul>

  				</div>
			</div>

		</div>

	</div>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding" id="clear_class">
		<div class="clear_class">
				<a  title="Reset filters" class="clear" href="javascript:filterData('clear',this);">Clear Filters</a>
		</div>
	</div>
	<div class="fabric-options" id="fabric_options" >
	<?php
	// echo "This is tersting";
	//print_r($fabric);
	//foreach($fabric as $fabric_options)
	$i = 0;
	foreach($fabric as $key => $value) {
     //	print_r($value);
    $product_id=$value[0]->id;
		$image=$value[0]->image;
		$texto_key=$key;
		$custom_key=$value[0]->custom_key;
		$product_name=$value[0]->pname;
		if($this->session->userdata('currencycode')=="" ||$this->session->userdata('currencycode') == 'INR')
		{
				//echo "INR ".$cmsf->price;
				$price=$value[0]->INR;
		}
		else if($this->session->userdata('currencycode') == 'USD')
		{
				//echo "USD ".$cmsf->USD;
				$price=$value[0]->USD;
		}
		else if($this->session->userdata('currencycode') == 'BHD')
		{
				//echo "BHD ".$cmsf->BHD;
				$price=$value[0]->BHD;
		}
		else if($this->session->userdata('currencycode') == 'SAR')
		{
				//echo "SAR ".$cmsf->SAR;
				$price=$value[0]->SAR;
		}
		else if($this->session->userdata('currencycode') == 'QAR')
		{
				//echo "QAR ".$cmsf->QAR;
				$price=$value[0]->QAR;
		}
		else if($this->session->userdata('currencycode') == 'EUR')
		{
				//echo "EUR ".$cmsf->EUR;
				$price=$value[0]->EUR;
		}
		else if($this->session->userdata('currencycode') == 'AED')
		{
				//echo "AED ".$cmsf->AED;
				$price=$value[0]->AED;
		}
		else if($this->session->userdata('currencycode') == 'AUD')
		{
				//echo "AUD ".$cmsf->AUD;
				$price=$value[0]->AUD;
		}
		else
		{
				//echo $this->session->userdata('currencycode')."";

				//echo ceil(( $image['result'][$i]->price / ( $this->session->userdata('currencyvalue') * ($this->session->userdata('multiplier')/100)) )/$this->session->userdata('ceiling'))*$this->session->userdata('ceiling');
		}
		if($i==0)
		{
			$default_price = $price ;
		}

		//$price=$value[0]->price;
		$threadCount=$value[0]->threadcount;
		$fabric_color=$value[0]->colour;
		$fabric_pattern=$value[0]->designid;
      ?>

	<div class="col-lg-6 col-md-6 col-sm-4 col-xs-6 displayfitler" data-color="<?= $fabric_color; ?>" data-pattern="<?= $fabric_pattern; ?>" data-price="<?= $price; ?>">
	 	<div class="fabric-details" id="<?= $custom_key;?>" >
			<a  class="swatchchangeOption" href="#" data-part="<?= $key;?>" data-key="<?= $custom_key;?>">
				<img class="img-responsive" src="<?= $image_url."".$image;?>">

			<div class="option-info">
					<h4 class="product-title-<?= $key; ?>" ><?= $product_name;?></h4>
					<span class="product-price-<?= $key; ?>" ><?= $this->session->userdata('currencycode') .' '.$price;?></span>
					<button class="fabric_swatch hidden-xs hidden-sm" data-image="<?= $image_url."".$image;?>" type="button"  data-toggle="modal" data-target="#shirtFabric">
						<i class="fa fa-search-plus fa-lg"></i>
					</button>
</a>
					<div style="display:none;">


						<span class="product-color-<?= $key; ?>" > <?= $fabric_color;?></span>
						<span class="product-pattern-<?= $key; ?>" > <?= $fabric_pattern;?></span>
						<!--<span class="product-threadcount-<?= $key; ?>" > <?= $threadCount;?></span>-->
				       	<span class="product-id-<?= $key; ?>" > <?= $product_id;?></span>

			       </div>
			</div>
		</div>
	</div>
	<?php
	$i++;
	} ?>
	</div>


	<!-- <a class="swatchchangeOption" href="#" data-part="ED543432" data-key="04700032-67">04700032-67-ED543432</a> -->
	<div class="sleeve-options" id="sleeves_options" style="display: none">
	<?
	foreach($sleeve as $sleeve_options)
				{

					?>
	<div class="col-lg-6 col-md-6 col-sm-4 col-xs-6 ">
		<div class="sleeve-details" id="<?= $sleeve_options->custom_key;?>">
			<a class="changeOption" href="#" data="part=<?= $sleeve_options->custom_key; ?>" data-key="Sleeve">
				<img class="img-responsive default" src="<?= $image_url."".$sleeve_options->image;?>">
				<img class="img-responsive active" src="<?= $image_url."".$sleeve_options->active_image;?>" style="display:none">
			</a>
			<div class="option-info">
			<h4><?= $sleeve_options->name;?></h4>
			</div>
		</div>
	</div>
	<? } ?>
	</div>
	<div class="collar-options" id="collar_options" style="display: none">
	<?
	foreach($collar as $collar_options)
	{ ?>
	<div class="col-lg-6 col-md-6 col-sm-4 col-xs-6 ">
		<div class="collar-details" id="<?= $collar_options->custom_key;?>">
		<a class="changeOption" href="#" data="part=<?= trim($collar_options->custom_key); ?>" data-key="Collar">
			<img class="img-responsive default" src="<?= $image_url."".$collar_options->image;?>">
			<img class="img-responsive active" src="<?= $image_url."".$collar_options->active_image;?>" style="display:none">

	   </a>
			<div class="option-info">
				<h4><?= $collar_options->name;?></h4>
			</div>
		</div>
	</div>
	<? } ?>
	</div>
	<div class="cuffs-options" id="cuffs_options" style="display: none">
	<?
	foreach($cuff as $cuff_options)
	{ ?>
	<div class="col-lg-6 col-md-6 col-sm-4 col-xs-6 ">
		<div class="cuffs-details" id="<?= $cuff_options->custom_key;?>">
		<a class="changeOption" href="#" data="part=<?= $cuff_options->custom_key; ?>" data-key="Cuff">
			<img class="img-responsive default" src="<?= $image_url."".$cuff_options->image;?>">
			<img class="img-responsive active" src="<?= $image_url."".$cuff_options->active_image;?>" style="display:none">

		</a>
			<div class="option-info">
				<h4><?= $cuff_options->name;?></h4>
			</div>
		</div>
	</div>
	<? } ?>
	</div>
	<div class="button-options" id="button_options" style="display: none">
		<?
		foreach($button as $button_options)
		{ ?>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
		<div class="button-details" id="<?= $button_options->custom_key;?>">
		<a  class="changeOption" href="#" data="part=<?= $button_options->custom_key; ?>" data-key="Button">

		<img class="img-responsive" src="<?= $image_url."".$button_options->image;?>">

		</a>
			<div class="option-info">
				<h4><?= $button_options->name;?></h4>
			</div>
		</div>
		</div>
		<? } ?>
	</div>
	<div class="pocket-options" id="pocket_options" style="display: none">

		<?

		foreach($pocket as $pocket_options)
		{ ?>
		<div class="col-lg-6 col-md-6 col-sm-4 col-xs-6">
		<div class="pocket-details" id="<?= $pocket_options->custom_key;?>">
			<a class="changeOption" href="#" data="part=<?= $pocket_options->custom_key; ?>" data-key="Pocket">
			<img class="img-responsive default" src="<?= $image_url."".$pocket_options->image;?>">
			<img class="img-responsive active" src="<?= $image_url."".$pocket_options->active_image;?>" style="display:none">

			</a>
			<div class="option-info">
				<h4><?= $pocket_options->name;?></h4>
			</div>
		</div>
		</div>
		<? } ?>
	</div>
	<div class="placket-options" id="placket_options" style="display: none">
		<?
		foreach($placket as $placket_options)
		{ ?>
		<div class="col-lg-6 col-md-6 col-sm-4 col-xs-6">
		<div class="placket-details" id="<?= $placket_options->custom_key;?>">

			<a class="changeOption" href="#" data="part=<?= $placket_options->custom_key; ?>" data-key="Placket">
				<img class="img-responsive default" src="<?= $image_url."".$placket_options->image;?>">
				<img class="img-responsive active" src="<?= $image_url."".$placket_options->active_image;?>" style="display:none;">

			</a>
			<div class="option-info">
				<h4><?= $placket_options->name;?></h4>
			</div>
		</div>
		</div>
		<? } ?>
	</div>
	<div class="back-options" id="back_options" style="display: none">
		<?
		foreach($back as $back_options)
		{ ?>
		<div class="col-lg-6 col-md-6 col-sm-4 col-xs-6">
		<div class="back-details" id="<?= $back_options->custom_key;?>">

			<a class="changeOption" href="#" data="part=<?= $back_options->custom_key; ?>" data-key="back_pleat">
			<img class="img-responsive default" src="<?= $image_url."".$back_options->image;?>">
			<img class="img-responsive active" src="<?= $image_url."".$back_options->active_image;?>" style="display:none;">
			</a>

			<div class="option-info">
				<h4><?= $back_options->name;?></h4>
			</div>

		</div>
		</div>
		<? } ?>
	</div>
	<div class="bottom-options" id="bottom_options" style="display: none">
		<?
		foreach($bottom as $bottom_options)
		{ ?>
		<div class="col-lg-6 col-md-6 col-sm-4 col-xs-6">
		<div class="bottom-details" id="<?= $bottom_options->custom_key;?>">
			<a class="changeOption" href="#" data="part=<?= $bottom_options->custom_key; ?>" data-key="bottom_hem">
			<img class="img-responsive default" src="<?= $image_url."".$bottom_options->image;?>">
			<img class="img-responsive active" src="<?= $image_url."".$bottom_options->active_image;?>" style="display:none">
			</a>
			<div class="option-info">
				<h4><?= $bottom_options->name;?></h4>
			</div>
		</div>
		</div>
		<? } ?>
	</div>


	<div class="contrast-options" id="contrast_options" style="display: none">
		<div class="contrast-fabric">

			<div class="contrast-fabric-options" id="contrast_fabric_options">

				<h4 class="choose-contrast-fabric">Choose contrast fabric</h4>

			<?
		foreach($innercontrast as $inner_contrast_options)
		{ ?>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<div class="contrast-fabric-details" id="<?= $inner_contrast_options->custom_key;?>">
					<a class="contrastChangeFabric" href="#" data="<?= $inner_contrast_options->custom_key; ?>" data-key="constrastfabric">
						<img class="img-responsive" src="<?= $image_url."".$inner_contrast_options->image;?>">
					</a>
					<div class="option-info">
						<h4><?= $inner_contrast_options->name;?></h4>
					</div>
				</div>
			</div>
		<? } ?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="contrast-type-button">
					Next
				</div>
			</div>
		</div>

	</div>

		<div class="contrast-type-options" id="contrast_type_options" style="display:none;">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="contrast-fabric-button">
					Back
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 option-info contrast-collar-options">
				<h4>Collar Contrast</h4>

					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<div class="contrast-collar-option">
						<a class="changeContrastOption" href="#" data="1" data-key="Collar">
						<img class="img-responsive" src="<?= $image_url; ?>upload/contrast-options/collar_inner.png">
						</a>
						<h4>Inner Contrast</h4>
					</div>
				</div>

					<!--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<div class="contrast-collar-option">
						<a class="changeContrastOption" href="#" data="2" data-key="Collar">
						<img class="img-responsive" src="<?= $image_url; ?>upload/colors/black.png">
						</a>
						<h4>Outer Contrast</h4>
					</div>
				</div>-->
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
					<div class="contrast-collar-option">
					<a class="changeContrastOption" href="#" data="0" data-key="Collar">
					<img class="img-responsive" src="<?= $image_url; ?>upload/contrast-options/collar_inner.png">
					</a>
					<h4>Full Contrast</h4>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				<div class="contrast-collar-option">
				<a class="changeContrastOption" href="#" data="-1" data-key="Collar">
				<img class="img-responsive" src="<?= $image_url; ?>upload/contrast-options/no_contrast_collar.png">
				</a>

				<h4>No Contrast</h4>
			</div>
		</div>
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 option-info contrast-cuff-options">
				<h4>Cuff Contrast</h4>

					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<div class="contrast-cuff-option">
				<a class="changeContrastOption" href="#" data="1" data-key="Cuff">
						<img class="img-responsive" src="<?= $image_url; ?>upload/contrast-options/cuff_inner.png">
						</a>
						<h4>Inner Contrast</h4>
					</div>
				</div>

					<!--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<div class="contrast-cuff-option">
						<a class="changeContrastOption" href="#" data="2" data-key="Cuff">
						<img class="img-responsive" src="<?= $image_url; ?>upload/colors/black.png">
						</a>
						<h4>Outer Contrast</h4>
					</div>
				</div>-->
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
					<div class="contrast-cuff-option">
					<a class="changeContrastOption" href="#" data="0" data-key="Cuff">
					<img class="img-responsive" src="<?= $image_url; ?>upload/contrast-options/cuff_full.png">
					</a>
					<h4>Full Contrast</h4>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				<div class="contrast-cuff-option">
				<a class="changeContrastOption" href="#" data="-1" data-key="Cuff">
				<img class="img-responsive" src="<?= $image_url; ?>upload/contrast-options/no_contrast_cuff.png">
				</a>

				<h4>No Contrast</h4>
			</div>
		</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 option-info contrast-placket-options">
				<h4>Placket Contrast</h4>

					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<div class="contrast-placket-option">
							<a class="changeContrastOption" href="#" data="1" data-key="Placket">
						<img class="img-responsive" src="<?= $image_url; ?>upload/contrast-options/placket_inner.png">
						</a>
						<h4>Inner Contrast</h4>
					</div>
				</div>

					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 optional_placket_contrast">
						<div class="contrast-placket-option">
						<a class="changeContrastOption" href="#" data="0" data-key="Placket">
						<img class="img-responsive" src="<?= $image_url; ?>upload/contrast-options/placket_outer.png">
						</a>

						<h4>Full Contrast</h4>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
					<div class="contrast-placket-option">
					<a class="changeContrastOption" href="#" data="-1" data-key="Placket">
					<img class="img-responsive" src="<?= $image_url; ?>upload/contrast-options/no_contrast_placket.png">
					</a>

					<h4>No Contrast</h4>
				</div>
			</div>
				<!--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
					<div class="contrast-placket-option">
					<a class="changeContrastOption" href="#" data="0" data-key="Placket">
					<img class="img-responsive" src="<?= $image_url; ?>upload/colors/black.png">
					</a>

					<h4>Full Contrast</h4>
				</div>
			</div>-->
			</div>


		</div>
	</div>


	<!--<div class="collar-contrast-options" id="collar_contrast_options" style="display: none">

	</div>
	<div class="placket-contrast-options" id="placket_contrast_options" style="display: none">

	</div>-->
	<div class="monogram-options" id="monogram_options" style="display: none">
		<div class="error_message"></div>
     <!-- mono start -->
	 <div class="monogram-font-options">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 option-info monogram-color">
				<h4>Monogram Color</h4>
				<div mono-color="Black" class="monogram-color-option col-lg-3 col-md-3 col-sm-3 col-xs-3  ">
					<img class="img-responsive" src="<?= $image_url; ?>upload/colors/black.png">
					<h4>Black</h4>
				</div>
				<div mono-color="Red" class="monogram-color-option col-lg-3 col-md-3 col-sm-3 col-xs-3  ">
					<img class="img-responsive" src="<?= $image_url; ?>upload/colors/blood_red.png">
					<h4>Red</h4>
				</div>
				<div mono-color="Grey" class="monogram-color-option col-lg-3 col-md-3 col-sm-3 col-xs-3  ">
					<img class="img-responsive" src="<?= $image_url; ?>upload/colors/grey.png">
					<h4>Grey</h4>
				</div>
				<div mono-color="Maroon" class="monogram-color-option col-lg-3 col-md-3 col-sm-3 col-xs-3  ">
					<img class="img-responsive" src="<?= $image_url; ?>upload/colors/plum_maroon.png">
					<h4>Maroon</h4>
				</div>
				<div mono-color="Blue" class="monogram-color-option col-lg-3 col-md-3 col-sm-3 col-xs-3  ">
					<img class="img-responsive" src="<?= $image_url; ?>upload/colors/royal_blue.png">
					<h4>Blue</h4>
				</div>
				<div mono-color="White" class="monogram-color-option col-lg-3 col-md-3 col-sm-3 col-xs-3  ">
					<img class="img-responsive" src="<?= $image_url; ?>upload/colors/white.png">
					<h4>White</h4>
				</div>
				<div mono-color="Navy" class="monogram-color-option col-lg-3 col-md-3 col-sm-3 col-xs-3  ">
					<img class="img-responsive" src="<?= $image_url; ?>upload/colors/navy.png">
					<h4>Navy</h4>
				</div>
			</div>


			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 option-info monogram-font">
				<h4>Monogram Font</h4>
				<div mono-font="Archibald" class="monogram-font-option col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
					<img class="img-responsive" src="<?= $image_url; ?>upload/fonts/archibald.png">
					<h4>Archibald</h4>
				</div>
				<div mono-font="Bodoni" class="monogram-font-option col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
					<img class="img-responsive" src="<?= $image_url; ?>upload/fonts/bodoni.png">
					<h4>Bodoni</h4>
				</div>
				<div mono-font="Caviar" class="monogram-font-option col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
					<img class="img-responsive" src="<?= $image_url; ?>upload/fonts/caviar.png">
					<h4>Caviar</h4>
				</div>
				<div mono-font="Cylburn" class="monogram-font-option col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
					<img class="img-responsive" src="<?= $image_url; ?>upload/fonts/cylburn.png">
					<h4>Cylburn</h4>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 option-info monogram-location">
				<h4>Monogram Location</h4>
				<div mono-location="Cuff-horizontal" class="monogram-location-option col-lg-3 col-md-3 col-sm-3 col-xs-3 mono-full-sleeve ">
					<img class="img-responsive" src="<?= $image_url; ?>upload/placements/cuff-name-horizontal.png">
					<h4>Cuff Horizontal </h4>
				</div>
				<div mono-location="Pocket" class="monogram-location-option col-lg-3 col-md-3 col-sm-3 col-xs-3  ">
					<img class="img-responsive" src="<?= $image_url; ?>upload/placements/pocket_embroidery_normal.png">
					<h4>Pocket</h4>
				</div>
				<div mono-location="Sleeve" class="monogram-location-option col-lg-3 col-md-3 col-sm-3 col-xs-3 mono-full-sleeve ">
					<img class="img-responsive" src="<?= $image_url; ?>upload/placements/sleeve_placket_top_embroidery_normal.png">
					<h4>Sleeve</h4>
				</div>
				<div mono-location="Cuff-normal" class="monogram-location-option col-lg-3 col-md-3 col-sm-3 col-xs-3 mono-full-sleeve ">
					<img class="img-responsive" src="<?= $image_url; ?>upload/placements/top_cuff_embroidery_normal.png">
					<h4>Cuff Normal</h4>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 option-info">
			<h4>Monogram Text</h4>
				<input type="text" name="monogram-name" id="monogram-name" placeholder="Type here" >
			</div>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 option-info">
			<button class="btn info-btn" id="btn_apply" onclick="applyMonogram('new');">Apply</button>
			<button class="btn info-btn" onclick="applyMonogram('reset');">Reset</button>
		</div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 option-info ">
			<h4>Monogram Summary</h4>
			<div class="summary_mono">
			</div>
			</div>
				<input type="hidden" name="mono-location-name" id="mono-location-name" value="" />
				<input type="hidden" name="mono-color-name" id="mono-color-name" value="" />
				<input type="hidden" name="mono-font-name" id="mono-font-name" value="" />
	 </div>
	 <!-- end mono -->


	</div>
</div>

<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
	<div class="rendered-shirt">
<!-- 			<img class="img-responsive" src="img/mainshirtbox.png">
 -->

		<img class="img-responsive processimage" src="">
		<div class="back-face-icon">
			  <img src="https://www.stylior.com/stylior/site/images/rotate-icon.png"  id="backface">
		</div>
 	</div>
</div>
<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
	<div class="stylior-logo hidden-xs hidden-sm back-to-home">
		<a href="https://www.stylior.com/">
			<img class="img-responsive"  src="https://www.stylior.com/stylior/site/images/relaunch/logo.png" alt="">
		</a>
	</div>
	<div class="details-shirt">
		<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 nopadding">
			<div class="shirt-info">
				<ul>
          		<li ><h4 class="current_title">A Dream Solid White Shirt</h4></li>
           		<li><strong>Fabric :</strong> <span  class="current_fabric" >Egyptian Giza Cotton</span></li>
            	<li ><strong>Pattern :</strong><span class="current_pattern" > Solids</span></li>
            	<li ><strong>Colour :</strong> <span class="current_color">Whites</span></li>
            	<!--<li ><strong>Thread Count :</strong> <span class="current_threadcount" >120</span></li>-->
            	<li><strong>Price :</strong> <span  class="current_price" ><?= $this->session->userdata('currencycode') .' '.$default_price;?></span></li>
				<input type="hidden" name="current_product_id" id="current_product_id" value=""/>
				<input type="hidden" name="current_product_price" id="current_product_price" value=""/>
				</ul>
			</div>
	</div>
		<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 nopadding">
		<div class="summary-button">
		  <button type="button"  data-toggle="modal" data-target="#shirtSummary">SUMMARY</button>
		</div>

		<div class="add-measurement back-to-home">
		  <a href="#" onclick="addToCart('<?= $_SESSION['user_id']; ?>');">ADD MEASUREMENT</a>
		</div>
	</div>


	</div>
</div>
	</div>
</div>
<!-- Footer Section Here -->
<!-- Modal -->
<div id="shirtSummary" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" id="shirtContent">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Shirt Summary</h4>
      </div>
			<div class="row">
      <div class="modal-body">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="rendered-shirt">
						<img class="img-responsive processimage" src="">
				 	</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="shirt-info">
						<ul>
		          		<li ><h4 class="current_title">A Dream Solid White Shirt</h4></li>
									<li ><strong>Pattern :</strong><span class="current_pattern" > Solids</span></li>
		            	<li ><strong>Colour :</strong> <span class="current_color">Whites</span></li>
									<!--<li ><strong>Thread Count :</strong> <span class="current_threadcount" >120</span></li>-->
									<li ><strong>Sleeves :</strong> <span class="current_sleeves">Full Sleeves</span></li>
									<li ><strong>Collar :</strong> <span class="current_collar">Regular</span></li>



						</ul>
				 	</div>
				</div>
      </div>
		</div>
    </div>

  </div>
</div>

<div id="shirtFabric" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content noradius" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body" id="shirtFabricImage">
				<img class="img-responsive" src="">

      </div>

    </div>

  </div>
</div>
<!-- mesurments start  -->
	<?php 	$uid=$_SESSION['user_id'];?>
	<div style="max-width:inherit !important;" class="remodal" data-remodal-id="shirt_measurements" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc" data-remodal-options="closeOnEscape:false,closeOnOutsideClick: false">
    <?php if(isset($uid)){	include("measurements-shirt.php");}?>
    </div>

<!--  measurements end -->




</body>

<script src="<?= $bas_ul ?>site/js/jquery-2.1.1.js"></script>
<script src="<?= $bas_ul ?>site/js/bootstrap.min.js"></script>
<script src="<?= $bas_ul ?>site/js/swiper.min.js"></script>
<script src=https://www.stylior.com/stylior/site/js/remodal.js></script>
<script src="<?= $bas_ul ?>site/js/3d-shirt.js"></script>
<script src="<?= $bas_ul ?>site/js/shirt_new_3d_custom.php"></script>

<script type="text/javascript">

function showExistingMeasure(measureid){
  $(".bodymeasure").hide();
  $('#bodymeasure-'+measureid).show();

}


// <!-- Events -->
  $(document).on('opening', '.remodal', function () {
    console.log('opening');
  });

  $(document).on('opened', '.remodal', function () {
    console.log('opened');
  });

  $(document).on('closing', '.remodal', function (e) {
    console.log('closing' + (e.reason ? ', reason: ' + e.reason : ''));
  });

  $(document).on('closed', '.remodal', function (e) {
    console.log('closed' + (e.reason ? ', reason: ' + e.reason : ''));
  });

  $(document).on('confirmation', '.remodal', function () {
    console.log('confirmation');
  });

  $(document).on('cancellation', '.remodal', function () {
    console.log('cancellation');
  });

  //The second way to initialize:
  $('[data-remodal-id=modal2]').remodal({
    modifier: 'with-red-theme'
  });


jQuery(document).ready(function($){
  var tabItems = $('.cd-tabs-navigation a'),
    tabContentWrapper = $('.cd-tabs-content');

  tabItems.on('click', function(event){
    event.preventDefault();
    var selectedItem = $(this);
    if( !selectedItem.hasClass('selected') ) {
      var selectedTab = selectedItem.data('content'),
        selectedContent = tabContentWrapper.find('li[data-content="'+selectedTab+'"]'),
        slectedContentHeight = selectedContent.innerHeight();

      tabItems.removeClass('selected');
      selectedItem.addClass('selected');
      selectedContent.addClass('selected').siblings('li').removeClass('selected');
      //animate tabContentWrapper height when content changes
      tabContentWrapper.animate({
        'height': slectedContentHeight
      }, 200);
    }
  });

  //hide the .cd-tabs::after element when tabbed navigation has scrolled to the end (mobile version)
  checkScrolling($('.cd-tabs nav'));
  $(window).on('resize', function(){
    checkScrolling($('.cd-tabs nav'));
    tabContentWrapper.css('height', 'auto');
  });
  $('.cd-tabs nav').on('scroll', function(){
    checkScrolling($(this));
  });

  function checkScrolling(tabs){
    var totalTabWidth = parseInt(tabs.children('.cd-tabs-navigation').width()),
      tabsViewport = parseInt(tabs.width());
    if( tabs.scrollLeft() >= totalTabWidth - tabsViewport) {
      tabs.parent('.cd-tabs').addClass('is-ended');
    } else {
      tabs.parent('.cd-tabs').removeClass('is-ended');
    }
  }
});



/*avr measurements functions here.*/
var shritDimension={"HEIGHTinch":"","WEIGHTkg":"","pocket":"NO","Monogram":"NO","MonoLocation":"","Monofontstyle":"","Monocolor":"","Monotext":"None","fitype":"NO","standardsize":"NO","length":"NO","shoulder":"","neck":"","length":"","chest":"","waist":"","sleeve":""};
/***********
****** to get standard measurements based on size selection
****** stylior.com : 18 Oct 2016
*/

$('select#size_select').change(function(){
var selected_size=$("#size_select option:selected").text();
var     base_url = '<?php echo $bas_ul; ?>';

if(selected_size!=undefined){
      console.log("var testing."+selected_size+"url"+base_url);
      $.ajax({
        url: base_url+"home/get_tbl_size/"+selected_size+"/10",
        type:'GET',
        data:
          {
            size : selected_size,
            category :  '10'
          },
        success: function(response) {
          console.log(response.length);
          if(response !== null && response !== undefined && response.length > 100){
          var var_result= $.parseJSON(response);
          var measurement = $.parseJSON(var_result.measurement);
          $("#lum_input_required1").val(measurement.shoulder);
          $("#lum_input_required2").val(measurement.neck);
          $("#lum_input_required3").val(measurement.sleeve);
          $("#lum_input_required5").val(measurement.shirt_length);
          $("#lum_input_required6").val(measurement.chest);
          $("#lum_input_required8").val(measurement.waist);
          }
          else{

          $("#lum_input_required1").val("");
          $("#lum_input_required2").val("");
          $("#lum_input_required3").val("");
          $("#lum_input_required5").val("");
          $("#lum_input_required6").val("");
          $("#lum_input_required8").val("");

          }


        }
      });
  }
});

/*********
***end of standard measurement function...
*/

/*  jQuery.validator.setDefaults({
    debug: true,
    success: "valid"
  });
*/

$("#quick_save").click(function(){

   var measureid ="";
    if("<?= $_GET['update'] ?>"=="shirt"){
     measureid = '<?php echo $_GET['mid'];?>';
    }

    var height_select=$('#height_select').val();
    var size_select=$('#size_select').val();
    var body_weight=$('#body_weight').val();
    var yourfit=$('input[name="yourfit"]:checked').val();
    var yourlength=$('input[name="yourlength"]:checked').val();
    //console.log("height_select:"+height_select+"body_weight:"+body_weight+"yourfit:"+yourfit+"yourlength:"+yourlength);   //alert($('input[name="yourlength"]:checked').val());
    shritDimension.HEIGHTinch=height_select;
    shritDimension.standardsize=size_select;
    shritDimension.WEIGHTkg=body_weight;
    shritDimension.fitype=yourfit;
    shritDimension.length=yourlength;
    /*added by var for standard measurements*/
    shritDimension.shoulder=$("#lum_input_required1").val();
    shritDimension.neck=$("#lum_input_required2").val();
    shritDimension.sleeve=$("#lum_input_required3").val();
    shritDimension.shirt_length=$("#lum_input_required5").val();
    shritDimension.chest=$("#lum_input_required6").val();
    shritDimension.waist=$("#lum_input_required8").val();
    /*end by var*/
    //ajax call to server420
    var result ="imagedata";
    //var imgData = getBase64Image($('#saveImg').attr('src')));
    base_url = '<?php echo $bas_ul; ?>';
    // var exact_price = $("#prd_price").val();
    // var product_id = $("#prd_id").val();
      var subcatid='<?php echo $_SESSION['subcatid']; ?>';
    var ordertype;
    //alert("tyoe"+subcatid);
    if(subcatid=="10")
    {
     ordertype="shirt";
    }
    else if(subcatid=="11")
    {
     ordertype="pant";
    }
    //var fabric_nameshirt = $("#prd_namme").val();
    var loginUser='<?php echo $_SESSION['user_id']; ?>';
    console.log(base_url);
    if(loginUser)
    {
      $.ajax({
          url: base_url+"cart/updatecart",
          type: 'POST',
          data:
          {
            details_up : JSON.stringify(shritDimension),
            measureid :  measureid,
             },
          success: function(response) {
              console.log("AVR"+response);

              console.log(response);
               window.location.href= base_url+"cart/lum_view_cart";
          }
        });
    }

  });

/** Add Measurement data collect from here.
*******
*****
***/
base_url = '<?= $bas_ul ?>';

$("#add-mesurement").on("click",function(){
        //alert("var testing");
        console.log("thid is data tesitng");

        var data = $(".mesure-form").serialize();
          console.log("var Data"+data);

           $.ajax({
            url:base_url+'cart/new_mvalue' ,
            method: "POST",
            data: {'data': $(".mesure-form").serialize(),
                  'subcatid':10,
            },
            success:function(data){
              //console.log("this is data"+data);
             location.href='<? echo $bas_ul?>/cart/lum_view_cart';

            }
           });

});

/*change the instruction on body part*/
/*date 14 sep 2016*/

$(".entry").on("click",function(){
var base_url='<? echo $bas_ul?>';
var current_id=this.id;
var i = $(this).find(" input");
var name = $(i).attr("name");
var m = name.substring(14, 16);
$("#guideDescription").html("");
$("#guideDescription-standard").html("");
  $.ajax({
  url:base_url+'home/getbodypart' ,
  method: "POST",
  data: {'bid': m},
  success:function(data){
  data = JSON.parse(data);
  var youtubeurl = base_url+""+data.youtubeurl;
  var description = "<p>"+data.desc+"</p>";

  var source_video='<video id="lum_input_required_video1" class="lum_video-new" controls><source src="'+youtubeurl+'" type="video/mp4"><source src="'+youtubeurl+'" type="video/ogg"></video>'+description;


  if(current_id == "entry-standard"){
      $("#guideDescription-standard").append(source_video);
  }
  else{
      $("#guideDescription").append(source_video);
  }
	  var vidd = document.getElementById("lum_input_required_video1");
	  vidd.play();


  }
  });
});


function getSelectedMeasure(idtype,number){
    $("#"+idtype).val(number);
}



$(".measure-outer").on("click",function()
{

    $("#"+$(this).attr("rel")).trigger("click");
    $('.measure-outer').each(function() {

      if(!$("#"+$(this).attr("rel")).is(':checked'))
      {

        $(this).css({"border": ""});
        $("."+$(this).attr("rel")).remove();

      }
      else
      {
        $("."+$(this).attr("rel")).remove();
        $(this).css({"border": "1px solid lightgray"});
        //$(this).css({"background": "#15A6D6","color":"#fff"});

      }
      });

});

$(".back-to-home").on('click', function(){

	var     base_url = '<? echo $bas_ul ?>';
	var loginUser='<?php echo $_SESSION['user_id']; ?>';
	if(loginUser)
	{
		user = loginUser;
	}
	else {
		user = "guest";
	}
	var image = 		$("img.processimage").attr('src');
	console.log(base_url);
	//var option = srce.substr(0, srce.indexOf('.')) + "_600x600.jpg";
				$.ajax({
				url: base_url+"custom/savedata",
				type: 'POST',
				data:
				{
					user : user,
					image :  image,
					subcatid : 10 ,
				},
				success: function(response) {
						//console.log(response);
						// window.location.href= base_url;
				}
			});

});



</script>
</html>
