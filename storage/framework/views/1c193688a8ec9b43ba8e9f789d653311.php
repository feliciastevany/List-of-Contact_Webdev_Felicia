<?php $__env->startSection('body'); ?>
<!-- Contoh view.blade.php -->
<table class="table">
    <thead>
      <tr>

        <th scope="col">Full Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Message</th>
        <th scope="col">Delete</th>

      </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $msgData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <tr>
        <td> <?php echo e($data -> name); ?></td>
         <td><?php echo e($data -> email); ?></td>
        <td><?php echo e($data -> phone); ?></td>
         <td><?php echo e($data -> message); ?></td>

         <td>
                <form action="<?php echo e(route('delete.message', [$index])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
        </td>


    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>


<?php $__env->stopSection(); ?>

<?php echo $__env->make("template.main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\commerce - Week 1\resources\views/dataMessages.blade.php ENDPATH**/ ?>