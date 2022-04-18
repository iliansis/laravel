
<?php $__env->startSection('main'); ?>
<section id="home">
    <div class="container h-100 align-items-center" >
        <div class="col-12">
            <h2>Панель администратора</h2>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur quo vero inventore facilis nisi ex, asperiores perferendis, ipsam ea iste quasi repellendus omnis cumque ut non ipsa corporis, accusamus qui.</p>
        </div>
    </div>
  </section>
<br><br>

<section id="zz">
<div class="col-6">
    <h3>Категории</h3>
    <div class="row">
        <div class="col-3">id категории</div>
        <div class="col-4">Имя категории</div>
        <div class="col-5">Удалить категорию</div>
    </div> <br>
    <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row">
        <div class="col-3">
            <div class="text-center">
                <?php echo e($c->id); ?>

            </div>
         </div>
        <div class="col-4"><?php echo e($c->name); ?></div>  
        <div class="col-4"><a href="<?php echo e(route('deleteCats', $c->id)); ?>" onclick="return confirm('Вы дейтсивтельно хотите удалить заявку?');"  class="btn btn-danger">Удалить</a></div><br><br>  <br>   
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <h5>Создание новой категории</h5>
    <form id="addCats" action="/addCats" method="POST" >
      <?php echo csrf_field(); ?> <!-- <?php echo e(csrf_field()); ?> -->
      <input type="text" class="form-control" name="name" placeholder="Имя категории">
      <div class="invalid-feedback" id="nameError">                   
    </div><br>    
  <br> 
  <button type="submit" class="btn btn-primary">Добавить категорию</button>
    </form>
    
  <br>

  <br>  

</div> 
</section>


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

      <?php if(($o->status=="Новая")): ?>
         
      <select class="form-control" data-id="<?php echo e($o->id); ?>" id="change" name="change">      
        <option value="Новая">Новая</option>
        <option value="Принято в работу">Принято в работу</option>
        <option value="Выполнено">Выполнено</option>
        </select><br><br>
        <?php endif; ?>

      
        <form id="change"  data-id="<?php echo e($o->id); ?>" action="/change" method="POST" enctype="multipart/form-data">                  
         <div id="formDesc<?php echo e($o->id); ?>" style="display: none;" >        
                <input class="form-control" type="text" name="com" placeholder="Комментарий"><br>
                <button class="btn btn-primary" type="submit">Отправить данные</button>
            </div>
          

           <div id="formPhoto<?php echo e($o->id); ?>" style="display: none;">
            <input class="form-control"  accept=" .png, .jpeg, .jpg" type="file" name="photo_end" placeholder="Вставьте фотографию"><br>
            <button class="btn btn-primary"  type="submit">Отправить данные</button>
           </div>
          </form>               



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

 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\ilians\resources\views/admin.blade.php ENDPATH**/ ?>