<?php include('header.php'); ?>
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="content/scalti-logo.png" alt="Scalti">
  </div>
  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
	<div class="border-2 border-solid m-2 rounded p-3 border-gray-600">
    	<h2> Modify an order </h2>
	<form class="space-y-6" method="POST">
	<div>
        <div class="flex items-center justify-between">
          <label class="block text-sm/6 font-medium text-gray-200">Order# to modify</label>
        </div>
        <div class="mt-2">
          <input type="text" name="useridmodify" id="useridmodify"  required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>

	<div>
        <div class="flex items-center justify-between">
          <label class="block text-sm/6 font-medium text-gray-200">New price</label>
        </div>
        <div class="mt-2">
          <input type="text" name="newprice" id="newprice"  required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>
      <div>
        <div class="flex items-center justify-between">
          <label class="block text-sm/6 font-medium text-gray-200">New date</label>
        </div>
        <div class="mt-2">
          <input type="text" name="newdate" id="newdate"  required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>
      <div>

      <div>
        <div class="flex items-center justify-between">
          <label class="block text-sm/6 font-medium text-gray-200">New user id to assign </label>
        </div>
        <div class="mt-2">
          <input type="text" name="neworderiduser" id="neworderiduser"  required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>
      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Modify</button>
      </div>
    </form>
</div>
</div>
<?php



	if (isset($_POST["ordersidmodify"]) && isset($_POST["newprice"]) || isset($_POST["newdate"]) || isset($_POST["neworderiduser"])) {
		if (isset($_POST["newprice"])){
			$curl = curl_init();

				curl_setopt_array($curl, array(
				  CURLOPT_URL => 'http://webserver/orders',
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => '',
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 0,
				  CURLOPT_FOLLOWLOCATION => true,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => 'PATCH',
				  CURLOPT_POSTFIELDS =>json_encode(array("id_user"=>$_POST["useridmodify"], "username"=>$_POST["newprice"])),
			          CURLOPT_HTTPHEADER => array(
			          ': ',
			          'Content-Type: application/json'
			           ),
		 		  ));


			curl_exec($curl);
			curl_close($curl);

		}

	if (isset($_POST["newdate"])){
		$curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => 'http://webserver/orders',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'PATCH',
			  CURLOPT_POSTFIELDS =>json_encode(array("is_user"=>$_POST["useridmodify"], "password"=>$_POST["newdate"])),
		          CURLOPT_HTTPHEADER => array(
		          ': ',
		          'Content-Type: application/json'
		           ),
	 		  ));

		curl_exec($curl);
		curl_close($curl);

	}

}


	if (isset($_POST["neworderiduser"])){
		$curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => 'http://webserver/orders',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'PATCH',
			  CURLOPT_POSTFIELDS =>json_encode(array("is_user"=>$_POST["useridmodify"], "password"=>$_POST["newdate"])),
		          CURLOPT_HTTPHEADER => array(
		          ': ',
		          'Content-Type: application/json'
		           ),
	 		  ));

		curl_exec($curl);
		curl_close($curl);

	}
?>

<div class="border-2 border-solid m-2 rounded p-3 border-gray-600">
    <h2> Delete an order</h2>
     <form class="space-y-6" method="POST">
      <div>
        <div class="flex items-center justify-between">
          <label class="block text-sm/6 font-medium text-gray-200">Order #</label>
        </div>
        <div class="mt-2">
          <input type="text" name="useriddelete" id="useriddelete"  required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>
      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Delete</button>
      </div>
    </form>
</div>
<?php

	$curl = curl_init();

	if (isset($_POST["useriddelete"])) {
		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'http://webserver/orders/'.$_POST["useriddelete"],
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'DELETE',
 		));
	}

	curl_exec($curl);
	curl_close($curl);



?>


<div class="border-2 border-solid m-2 rounded p-3 border-gray-600">
    <h2> Create an order </h2>
    <form class="space-y-6" method="POST">
      <div>
        <div class="flex items-center justify-between">
          <label class="block text-sm/6 font-medium text-gray-200">Price</label>
        </div>
        <div class="mt-2">
          <input type="text" name="pricecreate" id="pricecreate"  required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>
      <div>
        <div class="flex items-center justify-between">
          <label class="block text-sm/6 font-medium text-gray-200">Date</label>
        </div>
        <div class="mt-2">
          <input type="text" name="datecreate" id="datecreate"  required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>
      <div>
      <div>
        <div class="flex items-center justify-between">
          <label class="block text-sm/6 font-medium text-gray-200">User Id</label>
        </div>
        <div class="mt-2">
          <input type="text" name="useridcreate" id="useridcreate"  required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>
      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
      </div>
    </form>
</div>
</div>
<?php

	$curl = curl_init();

	if (isset($_POST["pricecreate"]) && isset($_POST["datecreate"]) && isset($_POST["useridcreate"])) {
		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'http://webserver/orders',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS =>json_encode(array("prix"=>$_POST["pricecreate"], "date"=>$_POST["datecreate"], "id_user"=>$_POST["useridcreate"])),
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
<div class="border-2 border-solid m-2 rounded p-3 border-gray-600" >
    <form class="space-y-6" method="GET">
      <div>
        <div class="flex items-center justify-between">
          <label class="block text-sm/6 font-medium text-gray-200">Search by order#</label>
        </div>
        <div class="mt-2">
          <input type="text" name="orderid" id="orderid"  required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
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

	if (isset($_GET["orderid"])) {
		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'http://webserver/orders/'.$_GET["orderid"],
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
		  CURLOPT_URL => 'http://webserver/orders',
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
	$responseArray = get_object_vars(json_decode($response))['orders'];
	foreach ($responseArray as $userObject) :
	$order = get_object_vars($userObject);
?>
		  <li class="flex justify-between gap-x-6 py-5 m-2">
		    <div class="flex min-w-0 gap-x-4">
		      <div class="min-w-0 flex-auto border-2 border-solid p-4 rounded">
		       	<p class="text-sm/6 font-semibold text-gray-200">Order #<?php echo $order['id_order']; ?></p>
		        <p class="text-sm/6 font-semibold text-gray-200">Prix : <?php echo $order['prix']; ?></p>
		        <p class="text-sm/6 font-semibold text-gray-200"> Date : <?php echo $order['date']; ?></p>
		        <p class="text-sm/6 font-semibold text-gray-200">ID user : <?php echo $order['id_user']; ?></p>
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
