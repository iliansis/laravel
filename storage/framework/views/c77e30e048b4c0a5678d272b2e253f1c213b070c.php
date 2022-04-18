
<?php $__env->startSection('main'); ?>

<section id="home">
  <div class="container h-100 align-items-center" >
      <div class="col-12">
          <h1> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit est esse laborum, autem, placeat veritatis quisquam molestiae earum consequuntur odit quibusdam velit ab? Excepturi perspiciatis, porro voluptatibus exercitationem sint tempora?</h1>
          <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur quo vero inventore facilis nisi ex, asperiores perferendis, ipsam ea iste quasi repellendus omnis cumque ut non ipsa corporis, accusamus qui.</p>
      </div>
  </div>
</section>

<section id="orders">
  <div class="col-4">
    <h5>Выполненных заявок:<span class="badge bg-secondary"><?php echo e($countOrder->count); ?></span></h5>
    <br>
  </div>
  <div class="container">
    <div class="row">
      <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-3">
          <div class="card" style="width: 18rem;">
            <div class="img">
              <div class="img1" style="background: url(/storage/<?php echo e($o->photo_start); ?>) center center no-repeat; background-size: cover;"></div>
              <div class="img2" style="background: url(/storage/<?php echo e($o->photo_end); ?>) center center no-repeat; background-size: cover;"></div>
            </div>         
          
              <div class="card-body">
                <h5 class="card-title">название проекта <p><?php echo e($o->adres); ?></p></h5>
                <h6 class="card-text">описание проекта <p><?php echo e($o->desc); ?></p></h6>
                <h6 class="card-text">категория <p><?php echo e($o->name); ?></p></h6>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div> 
      
  </div>
  </div>
</section>


 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OpenServer\domains\ilians\resources\views/welcome.blade.php ENDPATH**/ ?>