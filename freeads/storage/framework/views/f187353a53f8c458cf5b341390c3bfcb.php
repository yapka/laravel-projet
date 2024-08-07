<div>
    <label for="<?php echo e($id); ?>" class="block text-sm font-medium leading-6 text-gray-900"><?php echo e($label); ?></label>
    <div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['mt-2', 'relative rounded-md shadow-sm' => $errors->has($name) && $type !== 'file']); ?>">
        <input
            id="<?php echo e($id); ?>"
            name="<?php echo e($name); ?>"
            type="<?php echo e($type); ?>"
            <?php if($type !== 'file'): ?>
            value="<?php echo e(old($name) ?? $value); ?>"
            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'form-input block w-full rounded-md border-0 py-1.5 ring-1 ring-inset focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6',
                'pr-10 text-red-900 ring-red-300 placeholder:text-red-300 focus:ring-red-500' => $errors->has($name),
                'text-gray-900 shadow-sm ring-gray-300 placeholder:text-gray-400 focus:ring-indigo-600' => ! $errors->has($name),
            ]); ?>"
            <?php endif; ?>
        >
        <?php $__errorArgs = [$name && $type !== 'file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
            <svg class="w-5 h-5 text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
            </svg>
        </div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    <?php if($help): ?>
    <p class="mt-2 text-sm text-gray-500"><?php echo e($help); ?></p>
    <?php endif; ?>

    <?php if($type === 'file' && $value): ?>
    <p class="mt-3 text-sm text-gray-500">Fichier actuel : <?php echo e($value); ?></p>
    <?php if($isImage()): ?>
    <img class="max-w-full mt-2 max-h-48" src="<?php echo e(asset('storage/' . $value)); ?>" alt="Image <?php echo e($value); ?>">
    <?php endif; ?>
    <?php endif; ?>
</div>
<?php /**PATH /home/wecode/code/example-app/resources/views/components/input.blade.php ENDPATH**/ ?>