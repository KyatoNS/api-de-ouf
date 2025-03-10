<?php include('header.php'); ?>

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="content/scalti-logo.png" alt="Scalti">
    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight">Authentication</h2>
  </div>
  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="#" method="POST">
      <div class="flex items-center justify-between">
        <label for="username" class="block text-sm/6 font-medium p-2">username</label>
	<input type="username" name="username" id="username" autocomplete="username" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">

      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm/6 font-medium p-2">Password</label>
          <input type="password" name="password" id="password" autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
      </div>
    </form>
  </div>
</div>
<?php include('footer.php');


if (isset($_POST["username"]) && isset($_POST["password"])){
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => 'http://webserver/authenticate',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS =>json_encode(array("username"=>$_POST["username"], "password"=>$_POST["password"])),
	  CURLOPT_HTTPHEADER => array(
	    ': ',
	    'Content-Type: application/json'
	  ),
	));

	$response = curl_exec($curl);

	curl_close($curl);
	/*print_r($response);
*/
	$_SESSION["token"] = get_object_vars(json_decode($response))["token"];

	echo $_SESSION["token"];
	
}

	echo $reponse;
	if(isset($_SESSION["token"])){
		echo "Token : ".$_SESSION["token"];
	}
?>
