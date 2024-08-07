<div>
    <label for="<?php echo e($id); ?>" class="block text-sm font-medium leading-6 text-gray-900"><?php echo e($label); ?></label>
    <div class="mt-2">
        <select
            id="<?php echo e($id); ?>"
            name="<?php echo e($name . ($multiple ? '[]' : '')); ?>"
            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'block w-full shadow-sm rounded-md border-0 py-1.5 ring-1 ring-inset focus:ring-2 focus:ring-inset sm:max-w-xs sm:text-sm sm:leading-6',
                'text-red-900 ring-red-300 focus:ring-red-500' => $errors->has($name),
                'text-gray-900 ring-gray-300 focus:ring-indigo-600' => ! $errors->has($name),
                'form-select' => ! $multiple,
                'form-multiselect' => $multiple,
            ]); ?>"
            <?php if($multiple): ?> multiple <?php endif; ?>
        >
            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option
                value="<?php echo e($item->$optionsValues); ?>"
                <?php if($valueIsCollection ? $value->contains($item->$optionsValues) : $item->$optionsValues == $value): echo 'selected'; endif; ?>
            >
                <?php echo e($item->$optionsTexts); ?>

            </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
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
</div>
<?php /**PATH /home/wecode/code/example-app/resources/views/components/select.blade.php ENDPATH**/ ?>