<?php
require_once("../db/User_CRUD/updateUser.php")
    ?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Edit User";
include("adminHead.php");
?>

<body class="dark:bg-gray-900">

    <?php
    $users_hover = "class='flex items-center p-2 text-white rounded-lg bg-orange-600 dark:text-white hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-700 group'";
    include("adminSideBar.php");
    ?>

    <main class=" mt-14 p-12 ml-0  smXl:ml-64  ">

        <div class="relative overflow-x-auto  sm:rounded-lg">
            <form action="../db/User_CRUD/updateUser.php" class="p-4 md:p-5" method="POST"
                enctype="multipart/form-data">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <input type="hidden" name="user_id" id="user-id" value=<?php echo $userData['user_id'] ?>>
                    <div class=" col-span-2">
                        <label for="first-name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First
                            Name</label>
                        <input type="text" name="first_name" id="first-name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="first name" required="" value="<?php echo $userData['first_name'] ?>">
                    </div>
                    <div class="col-span-2">
                        <label for="last-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last
                            Name</label>
                        <input type="text" name="last_name" id="last-name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="last name" required="" value="<?php echo $userData['last_name'] ?>">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="email" required="" value="<?php echo $userData['email'] ?>">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="******" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="bio"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bio</label>
                        <textarea id="bio" name="bio" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Write bio here"><?php echo $userData['bio'] ?></textarea>
                    </div>
                    <div class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="user_avatar">Upload file</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="user_avatar_help" id="user_avatar" name="user_avatar" type="file">
                    </div>
                </div>
                <button type="submit"
                    class="text-white inline-flex items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    Edit User
                </button>
            </form>
        </div>
    </main>

    <script src="../../js/dashboard.js"></script>
    <script src="../../js/theme.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>

</html>