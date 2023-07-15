<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
             <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </ul>
        </div>
        <?php endif; ?>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Edit article')); ?></div>
                
                <div class="card-body">
                <form method="POST" action="<?php echo e(route('articles.update', ['article' => $article->id])); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <?php echo method_field('PUT'); ?>

                    <div class="form-group row" style="margin-top: 15px;">
                        <label for="" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Title')); ?></label>

                        <div class="col-md-6">
                            <input id="text" type="text" class="form-control" placeholder="Name" value="<?php echo e($article->title); ?>" name="title">
                        </div>
                    </div>
                    <input id="text" type="hidden" class="form-control" value="<?php echo e(auth()->user()->id); ?>" name="user_id">
                    <input id="text" type="hidden" class="form-control" value="<?php echo e($article->id); ?>" name="id">

                    <div class="form-group row" style="margin-top: 15px;">
                        <label for="" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Text')); ?></label>

                        <div class="col-md-6">
                            <!-- <input class="form-control " id="fr_email" type="text" placeholder="state number" name="number"> -->
                            <textarea class="form-control" name="article" rows="9" cols="39" resize: none placeholder="Add your text here..."><?php echo e($article->article); ?></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Edit article')); ?></button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/project3/resources/views/editArticle.blade.php ENDPATH**/ ?>