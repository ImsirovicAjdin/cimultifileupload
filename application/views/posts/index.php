<h1 style="padding-top: 20px">
	<?= $title ?>
</h1>
<?php foreach($posts as $post) : ?>
	<h3><?php echo $post['title']; ?></h3>
	<small class="badge badge-primary d-incline-block">Posted on: <?php echo $post['created_at']; ?></small><br>
	<?php echo $post['body']; ?>
<?php endforeach; ?>
