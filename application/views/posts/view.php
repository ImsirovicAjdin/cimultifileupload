<pre>
<?php // print_r($post); ?>
<?php // var_dump($post); ?>
</pre>
<h2><?php echo $post['title']; ?></h2>

<small class="badge badge-primary d-inline-block">Posted on: <?php echo $post['created_at']; ?></small><br>
<div class="d-block p-2">
	<?= $post['body']; ?>
</div>

<pre>
<?php
// print_r($data['post']); // throws: undefined variable: data
print_r($post);
?>
</pre>
<?php echo form_open('/posts/delete/'.$post['id']); ?> <!-- this post will submit to /posts/delete/   controller/action   -->
<input type="submit" value="delete" class="btn btn-danger">
</form>
