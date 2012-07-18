<html>
<head>
<title>Create News Entry</title>
</head>
<body>

<?php echo validation_errors(); ?>

<?php if (isset($error)) echo $error; ?>

<?php echo form_open('news/create'); ?>

<h4>Title</h4>
<input type="text" required name="title" value="<?php echo set_value('title', ''); ?>" size="50"/>
<h4>Content</h4>
<textarea name="content" required cols="40" rows="10"></textarea>
<br/>
<input type="submit" value="Create Post" />
</form>

</body>
</html>
