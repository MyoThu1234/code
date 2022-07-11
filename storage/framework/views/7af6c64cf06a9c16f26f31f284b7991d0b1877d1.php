<?php $__env->startSection('content'); ?>
    <div class="container">
        <ul>
            <?php if(session('article-delete')): ?>
            <div class="alert alert-success">
                <?php echo e(session('article-delete')); ?>

            </div>
            <?php endif; ?>
            <?php if(session('done')): ?>
            <div class="alert alert-success">
                <?php echo e(session('done')); ?>

            </div>
            <?php endif; ?>
            <?php $__currentLoopData = $categories->articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card mb-4">
                    <div class="card-header">
                        <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url("/article/delete/$article->id")); ?>" class="float-end text-danger" ><i class="fa-solid fa-xmark"></i></a>
                        <?php endif; ?>
                        <h6 class="text-primary"><?php echo e($article->user->name); ?></h6>
                        <small class="d-block"><?php echo e($article->day); ?></small>
                        <small ><?php echo e($article->clock); ?></small>
                        <small > <?php echo e($article->amPm); ?></small>
                    </div>
                    <div class="card-body">
                        <p><?php echo e($article->content); ?></p>
                        <div class="m-1 border p-3">
                            <img src="<?php echo e($article->image); ?>" alt="">
                        </div>
                    </div>
                    <div class="card-footer">
                        <form action="<?php echo e(url("/like/$article->id")); ?>" method="post">
                         <?php echo csrf_field(); ?>
                         <input type="hidden" value="<?php echo e($article->id); ?>" name="article_id">

                         
                         <button class="btn btn-danger"><i class="fa-brands fa-gratipay"></i> <?php echo e(count($article->like)); ?>Like</button>
                        </form>
                        <a href="<?php echo e(url("/comment/$article->id")); ?>" class="btn btn-secondary float-end"><i class="fas fa-comment me-1"></i>Comment</a>
                     </div>

                    
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myothu/Project/code/resources/views/category/index.blade.php ENDPATH**/ ?>