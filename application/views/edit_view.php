<html>
<head>
<title>Edit News Entry</title>
</head>
<body>

<?php echo validation_errors(); ?>

<?php if (isset($error)) echo $error; ?>

<?php foreach ($post as $entry) :?>

<?php echo form_open('news/edit/'.$entry->id); ?>


<h4>Title</h4>
<input type="text" required name="title" value="<?php echo $entry->title ?>" size="50"/>
<h4>Content</h4>
<textarea name="content" required value="" cols="40" rows="10"><?php echo $entry->content ?></textarea>
<br/>
<input type="submit" value="Create Post" /-->
<?php endforeach; ?>
</form>

</body>
</html>