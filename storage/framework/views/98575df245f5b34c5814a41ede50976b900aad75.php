<?php if($orders && !$orders->isEmpty()): ?>
<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">    
    <div class="col p-4 d-flex flex-column position-static">
        <strong class="d-inline-block mb-2 text-primary">категория <span><?php echo e($o->name); ?></span></strong>
        <h3 class="mb-0">Адресс <span><?php echo e($o->adres); ?></span></h3>
      <?php switch($o->status):
          case ('Новая'): ?>
              <p>Новая</p>
              <?php break; ?>

          <?php case ('Принято в работу'): ?>
          <p>Принято в работу</p>
              <?php break; ?>             
              <?php case ('Выполнено'): ?>
          <p>Выполнено</p>
              <?php break; ?>

          <?php default: ?>
              
      <?php endswitch; ?>
        <p class="card-text mb-auto">Описание:<span><?php echo e($o->desc); ?></span></p><br>
        <?php if($o->status=="Новая"): ?>
        <div class="col-3">
            <a href="<?php echo e(route('deleteOrder', $o->id)); ?>" onclick="return confirm('Вы дейтсивтельно хотите удалить заявку?');"  class="btn btn-danger">Удалить</a>
          </div>
          <?php endif; ?>
      </div>

      
      <div class="col-auto d-none d-lg-block">
       <img src="/storage/<?php echo e($o->photo_start); ?>"}}  width="300px">  
  
      </div>
    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      
  <?php else: ?>

  <div class="text-centser">
      <h4>Заявок нет</h4>
  </div>
      
  <?php endif; ?><?php /**PATH C:\OpenServer\domains\ilians\resources\views/incl/order.blade.php ENDPATH**/ ?>