<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
	<div class="content-header-left">
		<h1><?php echo e($page_title); ?></h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo e(route('sizes.index')); ?>" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<?php if(session('message')): ?>
				<div class="callout callout-success">
					<?php echo e(session('message')); ?>

				</div>
			<?php endif; ?>
			<form action="<?php echo e(route('sizes.update', $sizes->id)); ?>" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>
				<?php echo e(method_field('PATCH')); ?>

				<div class="box box-info">
					<div class="box-body">
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Sizes <span style="color:red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="sizes" value="<?php echo e($sizes->sizes); ?>">
                                <?php $__errorArgs = ['sizes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span style="color: red"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Status</label>
							<div class="col-sm-9">
								<select name="status" class="form-control" id="">
									<option value="1" <?php echo e($sizes->status==1?'selected':''); ?>>Active</option>
									<option value="0" <?php echo e($sizes->status==0?'selected':''); ?>>In-Active</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left">Submit</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script>
	$(document).ready(function() {
		if ($(".texteditor").length > 0) {
			tinymce.init({
				selector: "textarea.texteditor",
				theme: "modern",
				height: 150,
				plugins: [
					"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
					"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
					"save table contextmenu directionality emoticons template paste textcolor"
				],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

			});
		}
		$("#regform").validate({
			rules: {
				sizes: "required"
			}
		});
	});
</script>

<script>
    /* document.addEventListener('DOMContentLoaded', function() {
        var formTable = document.getElementById('form-table');

        function attachRemoveRowListener() {
            var removeButtons = formTable.getElementsByClassName('remove-row');
            for (var i = 0; i < removeButtons.length; i++) {
                removeButtons[i].addEventListener('click', function() {
                    if (formTable.rows.length > 2) { // Check if there is more than one row excluding the template row
                        var row = this.closest('tr');
                        row.remove();
                    }
                });
            }
        }

        attachRemoveRowListener();

        var addButton = document.getElementById('add-row');
        addButton.addEventListener('click', function() {
            var templateRow = document.getElementById('row-template');
            var newRow = templateRow.cloneNode(true);
            newRow.removeAttribute('id');
            newRow.style.display = 'table-row';
            formTable.querySelector('tbody').insertBefore(newRow, templateRow);
            attachRemoveRowListener();
        });
    }); */



    // JavaScript/jQuery code
document.addEventListener('DOMContentLoaded', function() {
    var formTable = document.getElementById('form-table');
    var existingSizes = []; // Array to store existing sizes

    function attachRemoveRowListener() {
        var removeButtons = formTable.getElementsByClassName('remove-row');
        for (var i = 0; i < removeButtons.length; i++) {
            removeButtons[i].addEventListener('click', function() {
                if (formTable.rows.length > 1) { // Check if there is more than one row
                    this.closest('tr').remove();
                }
            });
        }
    }

    attachRemoveRowListener();

    var addButton = document.getElementById('add-row');
    addButton.addEventListener('click', function() {
        var row = document.createElement('tr');
        row.innerHTML = `
            <td><input type="text" autocomplete="off" name="sizes[]" class="form-control size-input" placeholder="Enter Sizes" required></td>
            <td><button type="button" class="remove-row btn btn-danger">Remove</button></td>
            <td><span class="size-error" style="color: red"></span></td> <!-- Error message container -->
        `;
        formTable.querySelector('tbody').appendChild(row);
        attachRemoveRowListener();

        // Attach an input event listener to the new input field for validation
        var newSizeInput = row.querySelector('.size-input');
        newSizeInput.addEventListener('input', function() {
            validateSizeInput(this, row);
        });
    });

    function validateSizeInput(input, row) {
        var sizeValue = input.value;
        var sizeError = row.querySelector('.size-error');

        // Check if the sizeValue is already in the existingSizes array
        if (existingSizes.includes(sizeValue)) {
            sizeError.textContent = 'This size is already in use.';
            input.setCustomValidity('This size is already in use.');
        } else {
            sizeError.textContent = ''; // Clear the error message
            input.setCustomValidity('');
        }
    }

    // Intercept form submission
    var form = document.getElementById('your-form-id'); // Replace 'your-form-id' with your actual form ID
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Add code here to handle the form submission, e.g., sending data via AJAX
    });
});
</script>










<script>
    $(document).ready(function() {
        $("#start_date, #end_date").datepicker({
            dateFormat: 'dd-mm-yy' // Customize the date format as needed
        });
    });
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\sizes\edit.blade.php ENDPATH**/ ?>