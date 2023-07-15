<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Articles')); ?></div>

                <div class="card-body">
                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <h3 class="title"><?php echo e($article->title); ?></h3>

                    <div class="text"><?php echo e($article->article); ?>

                    
                    </div>  
                    <div class="button-link"> 
                        <a class="btn btn-primary" href="<?php echo e(route('articles.show', ['article' => $article->id])); ?>"><?php echo e(__('Read more')); ?></a>
                        <a class="btn btn-primary update" href="<?php echo e(route('articles.edit', ['article' => $article->id])); ?>"><?php echo e(__('Update article')); ?></a>

                        <form action="<?php echo e(route('articles.destroy', $article->id)); ?>" method="POST">
                         <?php echo csrf_field(); ?>

                         <?php echo method_field('DELETE'); ?>
                         <input name="id" type="hidden" value="<?php echo e($article->id); ?>">
                         <input name="user_id" type="hidden" value="<?php echo e($article->user_id); ?>">
                          <button class="btn btn-primary delete" type="submit" onclick="return confirm('Are you sure delete this record?')" class="btn btn-danger">
                            <i class="fa fa-btn fa-trash"></i><?php echo e(__('Delete article')); ?>

                        </button>
                        </form>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php echo $articles->links("pagination::bootstrap-4"); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/project3/resources/views/home.blade.php ENDPATH**/ ?>