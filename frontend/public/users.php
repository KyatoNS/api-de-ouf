<?php include('header.php'); ?>
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="content/scalti-logo.png" alt="Your Company">
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="#" method="GET">
      <div>
        <div class="flex items-center justify-between">
          <label class="block text-sm/6 font-medium text-gray-900">user</label>
        </div>
        <div class="mt-2">
          <input type="text" name="userid" id="userid"  required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
      </div>
    </form>
    <ul role="list" class="divide-y divide-gray-100 flex">

<?php

	$curl = curl_init();

	if (isset($_GET["userid"])) {
		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'http://webserver/users/'.$_GET['userid'],
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
		      <div class="min-w-0 flex-auto border-2 border-solid p-4">
		       	<p class="text-sm/6 font-semibold text-gray-900"><?php echo $user['id_user']; ?></p>
		        <p class="text-sm/6 font-semibold text-gray-900"><?php echo $user['username']; ?></p>
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
