<?php
	
	require_once ('init.php');
	
	$todosQuery = $pdo->prepare("
		SELECT id, name, done, run
		FROM todos
		WHERE user = :user
	");
	
	$todosQuery -> execute([
		'user' => $_SESSION['user_id']
	]);

	$todos = $todosQuery->rowCount() ? $todosQuery : [];
	
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>To do</title>
		<link rel="preconnect" href="https://fonts.gstatic.com">		
		<link href=<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital@1&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/main.css">	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	</head>
		<body>
			<div class="Page">
				<div class="Header-Bar">
					<img  src="css/puntina.jpg" width="15%" height="15%" class="img2">
 					<div class="Menu">
						<h1>Make Your List</h1>
					</div>
                </div>
               <div class="All">
					<div class="List">
						<h1 class="Header"> To do. </h1>
						<?php if(!empty($todos)): ?>
						<ul class="Items">
							<?php foreach($todos as $todo): ?>
							<li>
                                <span class="Item<?php echo $todo['done'] ? '-done' : '-notdone' ?>"> 								
                                	<?php echo $todo['name']; ?> 
								</span> 

								<?php if(!$todo['done']): ?>
									<a href="mark.php?as=done&todo=<?php echo $todo['id']; ?>" class="done-button">Mark as done</a>
								<?php else: ?>
									<a href="mark.php?as=notdone&todo=<?php echo $todo['id']; ?>" class="not-button">Mark as notdone</a>
								<?php endif ; ?>


								
								<?php if(!$todo['run']): ?>
									<div class="start">
									<a href="mark.php?as=run&todo=<?php echo $todo['id']; ?>">Start</a>
									</div>
								<?php else: ?>
									<div class="running">
									<a href="mark.php?as=notrun&todo=<?php echo $todo['id']; ?>" >Running</a>
									</div>
								<?php endif ; ?>
								<div class="delete">
								<a href="delete.php?as=delete&todo=<?php echo $todo['id']; ?>"><img src="trash.png" width=8% height=8% ></a>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
						<?php else: ?>
						<p> You haven't added any todo yet.</p>
						<?php endif; ?>
						<form class="Item-add" action="add.php" method="POST">
							<input type="text" name="name" placeholder="Type a new  'to-do'  here." class="Input" autocomplete="off">
							<input type="submit" value="Add" class="Submit">
						</form>
                	</div>
                	<div class="Form">
                		<form method="post" name="logout">
                			<button type="submit" name="logout" class="Button" >Log Me Out!</button>
                		</form>
                	</div>
                </div>
                
                <?php
                require ('logout.php');
                ?>
			</div>
		</body>
</html>