<?php include('header.php'); ?>
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="content/scalti-logo.png" alt="Your Company">
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="#" method="POST">
      <div>
        <div class="flex items-center justify-between">
          <label class="block text-sm/6 font-medium text-gray-900">Order #</label>
        </div>
        <div class="mt-2">
          <input type="text" name="ordernumber" id="ordernumber"  required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
      </div>
    </form>

<?php


	if (isset($_GET["order"]) {
		$request="https://scalti.fr/orders/$_GET['order']"
	}else{
		$request="https://salti.fr/orders"
	}
	foreach ($orders as $order) { ?>
		<ul role="list" class="divide-y divide-gray-100">
		  <li class="flex justify-between gap-x-6 py-5">
		    <div class="flex min-w-0 gap-x-4">
		      <div class="min-w-0 flex-auto">
		        <p class="text-sm/6 font-semibold text-gray-900">Order #</p>
		       	<p class="mt-1 truncate text-xs/5 text-gray-500"$order["id"]</p>
		      </div>
		    </div>
		    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
		      <p class="text-sm/6 text-gray-900">$order["userid"]</p>
		      <p class="mt-1 text-xs/5 text-gray-500">$order["date"]</p>
		    </div>
		  </li>
		</ul>

<?php
	}
?>

  </div>
</div>

<?php include('footer.php'); ?>
