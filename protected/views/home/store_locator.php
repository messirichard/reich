<?php
$session = new CHttpSession;
$session->open();
$login_member = $session['login_member'];
?> 
<?php
$session = new CHttpSession;
$session->open();
$login_member = $session['login_member'];
?>

<section class="default-sc inside-page product-details"> 
    <section class="top-product-detail">
        <div class="container defaults">
            <div class="tops">
                <div class="row">
                    <div class="col-md-40">
                        <div class="shn-back-products">
                            <a href="javascript:void(-1);"><i class="fa fa-long-arrow-left"></i> &nbsp;BACK</a> 
                            <span class="new-back-product"><div class="separators_linetop"></div> <span class="new-back-product">HOME / STORE LOCATOR
                            </span>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-20">
                        <div class="box-search">
                            <form class="form-inline">
                            <label for="inlineFormInputNN2">SEARCH</label>
                            <div class="blob-input">
                                <input type="text" class="form-control mb-2" id="inlineFormInputNN2" placeholder="">
                                <button type="submit" class="btn mb-2"><i class="fa fa-search"></i></button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="clear height-50"></div>
                <div class="clear height-20"></div>
                <div class="row">
                    <div class="col-md-60">
                        <div class="contactus-header-top">
                            Store Locator
                            <div class="clear height-30"></div>
                            <div class="contactus-header-mid">
                                Find Jackson Fashion Shoes, Clothing & Accessories near your location
                            </div>
                        </div>
                        <div class="clear height-40"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-60">
                        <div class="form-group select-store">
                            <div class="row justify-content-center">   
                                <div class="col-lg-15">
                                    <select class="form-control baru" id="">
                                        <option >SELECT PROVINCE</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>   
                                </div>
                                <div class="col-lg-15">
                                    <select class="form-control baru" id="">
                                        <option>SELECT CITY</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear height-50"></div>
                <div class="map-store">
                    
                </div>
                <div class="clear height-30"></div>
                <div class="clear height-30"></div>
                <div class="click-view">
                    Click “View Location” on your choosen location to display the map.
                </div>
                <div class="clear height-55"></div>
                <div class="penta-shoes">
                    PT. Penta Shoes
                </div>
                <div class="clear height-20"></div>
                <div class="alamat-penta">
                    The Icon Business Park Ruko C Blok G/3 Lantai 2 BSD City Tangerang <br>P. 0882-1091-9772
                </div>
                
                <div class="clear height-20"></div>
                <div class="clear height-20"></div>
                <div class="view-loc">
                    VIEW LOCATION
                </div>
                <div class="clear height-50"></div>
                <div class="clear height-20"></div>
                <div class="above-view-loc">
                    If you found difficulties finding the right experts near you or need further assistance , please call our customer service hotline at (031) 3889955
                </div>
                
                <div class="clear height-55"></div>
                <div class="row">
                    <div class="col-md-30" style="border-right: 2px #cccccc solid">
                        <div class="contact-follow">
                            Follow Us <br>
                            <div class="clear height-20"></div>
                            <i class="fa fa-instagram" aria-hidden="true"></i><span class="icon-followus"><i class="fa fa-facebook" aria-hidden="true"></i></span>
                        </div>
                    </div>
                    <div class="col-md-30">
                        <div class="contact-follow">
                            Our Merchant Partner <br>
                            <div class="clear height-20"></div>
                            <img src="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/images/design2-contact_84.jpg" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
        
    
        </div>
    </section>
</section>