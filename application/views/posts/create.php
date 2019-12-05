<h2><?= $title ?></h2>
<?php echo form_open('posts/create'); ?>
<form>
	<div class="form-group">
		<label>Title</label>
		<input type="text" class="form-control" placeholder="Add title" name="title" value="<?php echo $post['title']; ?>">
	</div>
	<div class="form-group">
		<label>Body</label>
		<textarea class="form-control" placeholder="Add Body" name="body">
			<?php echo $post['body']; ?>
		</textarea>
	</div>
	<button type="submit" class="btn btn-default">Submit</button>
</form>
