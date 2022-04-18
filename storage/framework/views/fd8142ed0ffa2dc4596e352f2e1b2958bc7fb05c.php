
<?php $__env->startSection('main'); ?>
<section id="home">
    <div class="container h-100 align-items-center" >
        <div class="col-12">
            <h2>Профиль пользователя</h2>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur quo vero inventore facilis nisi ex, asperiores perferendis, ipsam ea iste quasi repellendus omnis cumque ut non ipsa corporis, accusamus qui.</p>
        </div>
    </div>
  </section>
  <br><br>


  
  <section id="zz">
    <div class="col-6">
        <h3>Оставьте свою заявку</h3>
        <form id="addOrder" action="/addOrder" method="POST" enctype="multipart/form-data">
          <?php echo csrf_field(); ?> <!-- <?php echo e(csrf_field()); ?> -->
          <input type="text" class="form-control" name="adres" placeholder="Адресс">
          <div class="invalid-feedback" id="adressError">                   
        </div><br>
        <input type="text" class="form-control"  name="desc" placeholder="Описание">
          <div class="invalid-feedback" id="adressError">                   
        </div><br>
        <select class="form-control" name="cats">
            <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($c->id); ?>"><?php echo e($c->name); ?></option>  
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>           
        </select >         
      <br>
      <input type="file" class="form-control"  name="photo_start" accept=".png, .jpg, .bmp" placeholder="Вставьте пожалуйста фото вашего проекта">
          <div class="invalid-feedback" id="fileError">                   
        </div><br>
      <button type="submit" class="btn btn-primary">Создать заявку</button>
        </form>
        
      <br>

      <br>  

</div> 
  </section>

  <h3>Фильтрация</h3>
  <select class="form-control" id="filter" name="filter">
    <option value="Все">Все</option>
    <option value="Новая">Новая</option>
    <option value="Принято в работу">Принято в работу</option>
    <option value="Выполнено">Выполнено</option>
  </select><br><br>

  <div id="orders"><?php echo $__env->make('incl.order', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OpenServer\domains\ilians\resources\views/profile.blade.php ENDPATH**/ ?>