<?php if (isset($component)) { $__componentOriginal1c2e2f4f77e507b499e79defc0d48b7e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1c2e2f4f77e507b499e79defc0d48b7e = $attributes; } ?>
<?php $component = App\View\Components\DefaultLayout::resolve(['title' => $post->title] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('default-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\DefaultLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="space-y-10 md:space-y-16">
        <?php if (isset($component)) { $__componentOriginalbe59bb4860554bf4e18abcc14efde964 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbe59bb4860554bf4e18abcc14efde964 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.post','data' => ['post' => $post]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('post'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['post' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($post)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbe59bb4860554bf4e18abcc14efde964)): ?>
<?php $attributes = $__attributesOriginalbe59bb4860554bf4e18abcc14efde964; ?>
<?php unset($__attributesOriginalbe59bb4860554bf4e18abcc14efde964); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbe59bb4860554bf4e18abcc14efde964)): ?>
<?php $component = $__componentOriginalbe59bb4860554bf4e18abcc14efde964; ?>
<?php unset($__componentOriginalbe59bb4860554bf4e18abcc14efde964); ?>
<?php endif; ?>
        <?php if(auth()->guard()->check()): ?>
        <form action="<?php echo e(route('posts.comment', ['post'=>$post])); ?>">
            <?php echo csrf_field(); ?>
            <div class="flex h-12">
                <input class="w-full px-5 rounded-lg bg-slate-50 text-slate-900 focus:outline focus:outline-2 focus:outline-indigo-500" type="text" name="comment" placeholder="Quelque chose à rajouter ? 🎉" autocomplete="off">
                <button class="flex items-center justify-center w-12 ml-2 bg-indigo-700 rounded-full shrink-0 text-indigo-50">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                    </svg>
                </button>
            </div>
            <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </form>
        <?php endif; ?>
        <div class="space-y-8">
            <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="flex p-6 rounded-lg bg-slate-50">
                <img class="object-cover w-10 h-10 rounded-full sm:w-12 sm:h-12" src="<?php echo e(Gravatar::get($comment->user->email)); ?>" alt="Image de profil de <?php echo e($comment->user->name); ?>">
                <div class="flex flex-col ml-4">
                    <div class="flex flex-col sm:flex-row sm:items-center">
                        <h2 class="text-2xl font-bold text-slate-900"><?php echo e($comment->user->name); ?></h2>
                        <time class="mt-2 text-xs sm:mt-0 sm:ml-4 text-slate-400" datetime="<?php echo e($comment->created_at); ?>"><?= ($comment->created_at)->format('d/m/Y H:i:s'); ?></time>
                    </div>
                    <p class="mt-4 text-slate-800 sm:leading-loose"><?php echo e($comment->content); ?></p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1c2e2f4f77e507b499e79defc0d48b7e)): ?>
<?php $attributes = $__attributesOriginal1c2e2f4f77e507b499e79defc0d48b7e; ?>
<?php unset($__attributesOriginal1c2e2f4f77e507b499e79defc0d48b7e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1c2e2f4f77e507b499e79defc0d48b7e)): ?>
<?php $component = $__componentOriginal1c2e2f4f77e507b499e79defc0d48b7e; ?>
<?php unset($__componentOriginal1c2e2f4f77e507b499e79defc0d48b7e); ?>
<?php endif; ?>
<?php /**PATH /home/wecode/code/example-app/resources/views/posts/show.blade.php ENDPATH**/ ?>