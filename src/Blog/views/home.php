<?php

/**
 * Lists all blog posts
 */

require_once dirname(__DIR__)."/bootstrap.php";

/**
 * @var $posts \Blog\Entity\Post[] Retrieve the list of all blog posts  
 */
$repository = $entityManager->getRepository('Blog\Entity\Post');

/** 
 * @var $posts \Blog\Entity\Post[] Retrieve the list of
 * all blog posts 
 */
$tags = wordwrap(explode(',', $_GET['tags']), 3, ' ');

$results = isset($tags)? $repository->findPostWithTags($tags) 
	: $repository->findPostWithCommentCount();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My blog</title>
</head>
<body>

	<h1>My blog</h1>
	<?php foreach ($results as $result): 
			$post = $result[0];
			$commentCount = $result[1];
	?>
		<article>
			<h1>
				<a href="view-post.php?id=<?=$post->getId()?>">
					<?=htmlspecialchars($post->getTitle())?>
				</a>
			</h1>
			Date of publication: <?=$post->getPublicationDate()->format('Y-m-d H:i:s')?>
			<ul>
				<?php foreach ($post->getTags() as $tag): ?>
					<li>
						<a href="index.php?tags=<?=urlencode($tag)?>">
							<?=htmlspecialchars($tag)?>
						</a>
					</li>
				<?php endforeach ?>
			</ul>
			<ul>
			<?php if ($commentCount == 0): ?>
				<li>Be the first to comment this post.</li>
			<?php elseif ($commentCount == 1): ?>
				<li>One comment</li>
			<?php else: ?>
				<li><?= $commentCount ?> comments</li>
			<?php endif ?>
			</ul>
			<ul>
				<li>
					<a href="edit-post.php?id=<?=$post->getId()?>">Edit this post</a>
				</li>
				<li>
					<a href="delete-post.php?id=<?=$post->getId()?>">Delete this post</a>
				</li>
			</ul>
		</article>
	<?php endforeach ?>

	<?php if (empty($results)): ?>

		<p>No post, for now!</p>
	
	<?php endif ?>
	
	<a href="edit-post.php">Create a new post</a>
	<br/>
	<br/>
</body>
</html>

