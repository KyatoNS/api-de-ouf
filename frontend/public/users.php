<?php include('header.php'); ?>
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="content/scalti-logo.png" alt="Scalti">
  </div>


  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
<div class="border-2 border-solid m-2 rounded p-3">
    <h2> Modify a user </h2>
	<form class="space-y-6" action="#" method="POST">
	<div>
        <div class="flex items-center justify-between">
          <label class="block text-sm/6 font-medium text-gray-200">User id to modify</label>
        </div>
        <div class="mt-2">
          <input type="text" name="useridmodify" id="useridmodify"  required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-200 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>

	<div>
        <div class="flex items-center justify-between">
          <label class="block text-sm/6 font-medium text-gray-200">New username</label>
        </div>
        <div class="mt-2">
          <input type="text" name="newusername" id="newusername"  required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-200 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>
      <div>
        <div class="flex items-center justify-between">
          <label class="block text-sm/6 font-medium text-gray-200">Password</label>
        </div>
        <div class="mt-2">
          <input type="text" name="newpassword" id="newpassword"  required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-200 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>
      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Modify</button>
      </div>
    </form>
</div>
<?php

$curl = curl_init();

	if (isset($_POST["useridmodify"]) && isset($_POST["newusername"]) || isset($_POST["newpassword"])) {
		if (isset($_POST["newusername"])){
			

				curl_setopt_array($curl, array(
				  CURLOPT_URL => 'http://webserver/users',
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => '',
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 0,
				  CURLOPT_FOLLOWLOCATION => true,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => 'PATCH',
				  CURLOPT_POSTFIELDS =>'{
				  "id_user": $_POST["useridmodify"]
		         	  "username": $_POST["newusername"]
			          }',
			          CURLOPT_HTTPHEADER => array(
			          ': ',
			          'Content-Type: application/json'
			           ),
		 		  ));


			curl_exec($curl);
			curl_close($curl);

		}

	if (isset($_POST["newpassword"])){
		$curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => 'http://webserver/users',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'PATCH',
			  CURLOPT_POSTFIELDS =>'{
	         	  "password": $_POST["newpassword"]
		          }',
		          CURLOPT_HTTPHEADER => array(
		          ': ',
		          'Content-Type: application/json'
		           ),
	 		  ));

		curl_exec($curl);
		curl_close($curl);

	}

}
?>

<div class="border-2 border-solid m-2 rounded p-3">
    <h2> Delete a user </h2>
     <form class="space-y-6" action="#" method="POST">
      <div>
        <div class="flex items-center justify-between">
          <label class="block text-sm/6 font-medium text-gray-200">User ID</label>
        </div>
        <div class="mt-2">
          <input type="text" name="useriddelete" id="useriddelete"  required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-200 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>
      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Delete</button>
      </div>
    </form>
</div>
<?php


	if (isset($_POST["useriddelete"])) {
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'http://webserver/users',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'DELETE',
		  CURLOPT_POSTFIELDS =>'{
         	  "id_user": $_POST["useridelete"]
	          }',
	          CURLOPT_HTTPHEADER => array(
	          ': ',
	          'Content-Type: application/json'
	           ),
 		));
	}

	curl_exec($curl);
	curl_close($curl);



?>


<div class="border-2 border-solid m-2 rounded p-3">
    <h2> Create a user </h2>
    <form class="space-y-6" action="#" method="POST">
      <div>
        <div class="flex items-center justify-between">
          <label class="block text-sm/6 font-medium text-gray-200">Username</label>
        </div>
        <div class="mt-2">
          <input type="text" name="usernamecreate" id="usernamecreate"  required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-200 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>
      <div>
        <div class="flex items-center justify-between">
          <label class="block text-sm/6 font-medium text-gray-200">Password</label>
        </div>
        <div class="mt-2">
          <input type="text" name="passwordcreate" id="passwordcreate"  required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-200 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>
      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
      </div>
    </form>
</div>
<?php


	if (isset($_POST["usernamecreate"]) && isset($_POST["passwordcreate"])) {
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'http://webserver/users',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => json_encode(array('username'=>$_POST["usernamecreate"], 'password'=>$_POST["passwordcreate"])),
	          CURLOPT_HTTPHEADER => array(
	          ': ',
	          'Content-Type: application/json'
	           ),
 		));
	}


	$response = curl_exec($curl);
	curl_close($curl);
	print_r($response);
?>
<div class="border-2 border-solid m-2 rounded p-3" >
    <form class="space-y-6" action="#" method="GET">
      <div>
        <div class="flex items-center justify-between">
          <label class="block text-sm/6 font-medium text-gray-200">Search by user id</label>
        </div>
        <div class="mt-2">
          <input type="text" name="userid" id="userid"  required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-200 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Search</button>
      </div>
    </form>
</div>
    <ul role="list" class="divide-y divide-gray-100 flex">

<?php

	$curl = curl_init();

	if (isset($_GET["userid"])) {
		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'http://webserver/users/'.$_GET["userid"],
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		));

	}
	 else {
		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'http://webserver/users',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		));
	}

	$response = curl_exec($curl);
	curl_close($curl);
	$responseArray = get_object_vars(json_decode($response))['users'];
	foreach ($responseArray as $userObject) :
	$user = get_object_vars($userObject);
?>
		  <li class="flex justify-between gap-x-6 py-5 m-2">
		    <div class="flex min-w-0 gap-x-4">
		      <div class="min-w-0 flex-auto border-2 border-solid p-4 rounded">
		       	<p class="text-sm/6 font-semibold text-gray-200"><?php echo $user['id_user']; ?></p>
		        <p class="text-sm/6 font-semibold text-gray-200"><?php echo $user['username']; ?></p>
		      </div>
		    </div>
		  </li>
<?php
	endforeach;
?>
     </ul>
  </div>
</div>

<?php include('footer.php'); ?>
