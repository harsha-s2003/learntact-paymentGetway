<select class="form-control" name="student_name" id="student_name" required="">
		<option value="">Select Student Name</option>	
		<?php foreach($getStudent as $student ){ ?>
			<option value="<?= $student->student_name;?>"><?= $student->student_name;?></option>
		<?php } ?>										
</select>