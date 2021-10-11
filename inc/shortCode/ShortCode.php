<?php   

namespace CasautoSellerListing\shortCode;



class ShortCode{
    function __construct()
    {
        add_shortcode('seller-listing', array($this, 'handleShortCode'));
        add_action( 'wp_enqueue_scripts', array($this, 'enqueueFrontEnd') );
    } 
    function enqueueFrontEnd(){
        wp_enqueue_script('seller-listing_js',  plugin_dir_url('/')  . 'casauto-seller-listing/build/index.js', array('wp-element'));
        wp_enqueue_style('seller-listing_css', plugin_dir_url('/')  . 'casauto-seller-listing/build/index.css');
    }
    function handleShortCode(){
        global $wpdb;
        $userId = get_current_user_id();
      //  var_dump($userId); exit;
      
       $sql = $wpdb->prepare("SELECT * FROM wp_casautodev.wp_postmeta  pm join wp_posts p on pm.post_id = p.ID 
                                    where p.post_type = 'product' 
                                    and pm.meta_key = 'user_id' 
                                    and pm.meta_value = $userId");
        $products = $wpdb->get_results($sql);
       $isSeller  = get_user_meta(get_current_user_id(), 'is_seller');
      if($isSeller === "1"){

          if(count($products) > 0){
              ob_start(); ?>
                <!-- <div class="casauto-seller-listing casauto-seller-listing-wrapper" >
           <pre style="display: none;"><?php // echo wp_json_encode($products) ?></pre>
            
           </div> -->
           <div class="casauto-ol-wrapper " >
         
           <table id="sales_listing" class="shop_table shop_table_responsive my_account_orders  display responsive nowrap " cellspacing="0" style="width:100%" >
               <thead>
                   <tr role="row">
                       <th >
                         Make
                          </th>
                       <th>Model</th>
                       <th>Year</th>
                       <th>Status</th>
   
                   </tr>
               </thead>
               <tbody>
                   <?php foreach ($products as $product) {
                      
                       $postTitleArray = explode(" ", $product->post_title);
                      
                       
                       $make = $postTitleArray[0];
                       $model = $postTitleArray[1];
                       $year = $postTitleArray[2];
   
                   ?>
   
   
                       <tr>
                          <td><?php echo $make ?></td> 
                          <td><?php echo $model ?></td> 
                          <td><?php echo $year ?></td> 
                          <td><?php echo $product->post_status ?></td> 
   
                       </tr>
   
                   <?php } ?>
               </tbody>
           </table>
           </div>
              <?php return ob_get_clean();
          }else{
           ob_start(); ?>
               <h3>Not Vehicle Listings yet</h3>
          <?php return ob_get_clean();
          }
      } else{
          return "<h3>You are not a seller yet</h3>";
      }
    }
}
