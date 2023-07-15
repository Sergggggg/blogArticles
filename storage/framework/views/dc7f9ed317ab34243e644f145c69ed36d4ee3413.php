<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
                <div> 
                    <a class="btn btn-primary" href="<?php echo e(route('home')); ?>"><?php echo e(__('Back to home')); ?></a>
                </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Article')); ?></div>

                <div class="card-body">
                
                    <h3 class="title"><?php echo e($article['title']); ?></h3>

                    <div class="full_text"><?php echo e($article['article']); ?>

                    
                    </div>  
                   
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/project3/resources/views/showArticle.blade.php ENDPATH**/ ?>