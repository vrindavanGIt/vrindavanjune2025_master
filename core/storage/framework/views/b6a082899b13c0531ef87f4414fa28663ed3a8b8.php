
<?php
    $cart = Session::has('cart') ? Session::get('cart') : [];
    $total =0;
    $cartTotal=0;
    $option_price = 0;
?>

<div class="card cart__table">
    <div class="card-body pt-0 pb-0">
        <h5>ITEMS IN YOUR  CART</h5>
        <div class="table-responsive shopping-cart">
            <table class="table table-bordered">

              <thead>
                <tr>
                  <th><?php echo e(__('Product Name')); ?></th>
                  <th><?php echo e(__('Product Price')); ?></th>
                  <th class="text-center"><?php echo e(__('Quantity')); ?></th>
                  <th class="text-center"><?php echo e(__('Subtotal')); ?></th>
                  <th class="text-center"><a class="btn btn-sm btn-primary" href="<?php echo e(route('front.cart.clear')); ?>"><span><?php echo e(__('Clear Cart')); ?></span></a></th>
                </tr>
              </thead>

              <tbody id="cart_view_load" data-target="<?php echo e(route('cart.get.load')); ?>">

                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                // dd($item['qty']);

                    $cartTotal +=  ($item['main_price']  + $item['attribute_price']) * $item['qty'];

                ?>
                <tr>
                    <td class="product-name">
                      <div class="product-item"><a class="product-thumb" href="<?php echo e(route('front.product',$item['slug'])); ?>"><img src="<?php echo e(asset('assets/images/'.$item['photo'])); ?>" alt="Product"></a>
                        <div class="product-info">
                          <h4 class="product-title"><a href="<?php echo e(route('front.product',$item['slug'])); ?>">
                            <?php echo e(strlen(strip_tags($item['name'])) > 45 ? substr(strip_tags($item['name']), 0, 45) . '...' : strip_tags($item['name'])); ?>


                        </a></h4>

                          <?php $__currentLoopData = $item['attribute']['option_name']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionkey => $option_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <span><em><?php echo e($item['attribute']['names'][$optionkey]); ?>:</em> <?php echo e($option_name); ?> (<?php echo e(PriceHelper::setCurrencyPrice($item['attribute']['option_price'][$optionkey])); ?>)</span>

                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                      </div>
                    </td>
                    <td class="product-price text-center text-lg"><?php echo e(PriceHelper::setCurrencyPrice($item['main_price'])); ?></td>

                    <td class="product-quantity1 text-center">
                        
                     
                        <div class="qtySelector product-quantity">
                        <span class="decreaseQtycart cartsubclick" data-id="<?php echo e($key); ?>" data-target="<?php echo e(PriceHelper::GetItemId($key)); ?>"><i class="fas fa-minus"></i></span>
                        <input type="text" disabled class="qtyValue cartcart-amount" value="<?php echo e($item['qty']); ?>">
                        <span class="increaseQtycart cartaddclick" data-id="<?php echo e($key); ?>" data-target="<?php echo e(PriceHelper::GetItemId($key)); ?>"><i class="fas fa-plus"></i></span>
                          <input type="hidden" value="3333" id="current_stock">
                      </div>
                     

                    </td>
                    <td class="product-subtotal text-center text-lg" ><?php echo e(PriceHelper::setCurrencyPrice($item['main_price'] * $item['qty'])); ?></td>

                    <td class="product-remove text-center"><a class="remove-from-cart" href="<?php echo e(route('front.cart.destroy',$key)); ?>" data-toggle="tooltip" title="Remove item"><i class="icon-x"></i></a></td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </tbody>
            </table>
          </div>
    </div>
</div>


  <div class="card cart__btns">
      <div class="card-body pt-0 pb-0">
        <div class="shopping-cart-footer">
            

            <div class="text-right text-lg column <?php echo e(Session::has('coupon') ? '' : 'd-none'); ?>"><span class="text-muted"><?php echo e(__('Discount')); ?> (<?php echo e(Session::has('coupon') ? Session::get('coupon')['code']['title'] : ''); ?>) : </span><span class="text-gray-dark"><?php echo e(PriceHelper::setCurrencyPrice(Session::has('coupon') ? round(Session::get('coupon')['discount'],2) : 0)); ?></span></div>

            <div class="text-right column text-lg"><span class="text-muted"><?php echo e(__('Subtotal')); ?>: </span><span class="text-gray-dark" id="subtotal"><?php echo e(PriceHelper::setCurrencyPrice($cartTotal - (Session::has('coupon') ? round(Session::get('coupon')['discount'],2) : 0))); ?></span></div>


        </div>
        <div class="shopping-cart-footer">
            <div class="column"><a class="btn btn-primary " href="<?php echo e(route('front.shopbycategory')); ?>"><span><i class="icon-arrow-left"></i> <?php echo e(__('Back to Shopping')); ?></span></a></div>
            <div class="column"><a class="btn btn-primary" href="<?php echo e(route('front.checkout.billing')); ?>"><span><?php echo e(__('Checkout')); ?></span></a></div>
        </div>
      </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>

    $(document).ready(function(){
     function visitor_info($type){

        $.getJSON("https://api.ipify.org/?format=json", function(e) {



                $.ajax({

                url : "<?php echo e(route('front.activity.log')); ?>",
                type : 'POST',
                dataType : 'json',
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",

                    'ip':e.ip,
                    'type':$type,
                    'cart_total':$('#subtotal').text(),

                        },
                success:function(data){
                var response=data;
                console.log(response);
                // console.log(response);


                },

                });

                });
            }
        visitor_info(2);
        });
</script>

<?php /**PATH /home/r4cwncamkd2i/public_html/vrindavantulsimala.com/core/resources/views/includes/cart.blade.php ENDPATH**/ ?>