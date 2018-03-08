<div ng-controller="mainController">
	<a href="<?php echo base_url();?>about">about</a>
	{{message}}
	<br>
	<button ng-click="loadUsers()">load</button><br>
		<div>
			<input type="text" ng-model="newUser.username"><br>
			<input type="text" ng-model="newUser.email" ><br>
		</div>
	<button ng-click="addUser();">add</button>
	<button ng-click="updateUser();">update</button>
	<button ng-click="deleteUser();">delete</button>
	<div ng-repeat='user in users'>
		<span>{{user.id}} </span>
		<span>{{user.email}} </span>
		<span>{{user.username}} </span>
		<button ng-click="selectUser(user);">Select</button>
	</div>
</div>