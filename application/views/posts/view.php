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
<?php echo form_open('/posts/delete/'.$post['id']); ?> <!-- this post will submit to /posts/delete/$post['id']   controller/action/param   -->
<input type="submit" value="Delete" class="btn btn-danger d-inline">
</form>
