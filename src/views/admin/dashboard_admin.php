<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


include_once "src/controullers/admin/CTO_handl.php";

if ($_SESSION["role"] !== "admin") {
    header('location: error/404.php ');
}

if (!empty($_SESSION["login_success"])) {
    $secces = $_SESSION["login_success"];
}

?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProjectHub - Admin Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        dark: {
                            bg: '#1a1a1a',
                            card: '#2d2d2d',
                            text: '#ffffff'
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50 dark:bg-dark-bg transition-colors duration-200">
    <script>
        <?php if (!empty($secces)): ?>
            Swal.fire({
                title: 'success!',
                text: '<?php echo $secces; ?>',
                icon: 'success',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600'
                }
            });
        <?php endif;
        unset($_SESSION["login_success"]);
        ?>


    </script>
    <!-- Navigation Bar -->
    <nav class="bg-white dark:bg-dark-card shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="#" class="text-2xl font-bold text-blue-600">ProjectHub</a>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- Dark Mode Toggle -->
                    <button id="darkModeToggle"
                        class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                        <!-- Sun Icon -->
                        <svg class="w-6 h-6 hidden dark:block text-gray-200" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <!-- Moon Icon -->
                        <svg class="w-6 h-6 block dark:hidden text-gray-700" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </button>
                    <div class="flex space-x-4">
                        <a href="#" class="nav-link active" onclick="showTab('dashboard')">Dashboard</a>
                        <a href="#" class="nav-link" onclick="showTab('users')">Users</a>
                        <a href="#" class="nav-link" onclick="showTab('projects')">Projects</a>
                        <a href="#" class="nav-link" onclick="showTab('CTOs')">CTOs</a>
                        <a href="#" class="nav-link" onclick="showTab('settings')">Settings</a>
                        <a href="/logOut" class="nav-link">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-6xl mx-auto px-4 py-8">
        <!-- Dashboard Overview -->
        <div id="dashboard-section" class="tab-content">
            <h1 class="text-4xl font-bold text-center mb-8">Welcome,<?= $_SESSION["fullname"] ?></h1>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                    <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300 mb-2">Total Users</h3>
                    <p class="text-3xl font-bold text-blue-600"><?= $total_members ?></p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">+<?= $total_members ?> this month</p>
                </div>
                <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                    <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300 mb-2">Active Projects</h3>
                    <p class="text-3xl font-bold text-green-600"><?= $active_projects ?></p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">+<?= $active_projects ?> this month</p>
                </div>
                <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                    <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300 mb-2">Completed Projects</h3>
                    <p class="text-3xl font-bold text-purple-600"><?= $complete_projects ?></p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">+<?= $complete_projects ?> this month</p>
                </div>
                <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                    <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300 mb-2">Total Tasks</h3>
                    <p class="text-3xl font-bold text-orange-600"><?= $total_taches ?></p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">+<?= $total_taches ?> this month</p>
                </div>
            </div>

            <!-- System Status -->
            <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-4">System Status</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600 dark:text-gray-300">Server Status</span>
                            <span class="text-green-600">Operational</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-600 rounded-full h-2">
                            <div class="bg-green-600 h-2 rounded-full" style="width: 98%"></div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600 dark:text-gray-300">Database Status</span>
                            <span class="text-green-600">Healthy</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-600 rounded-full h-2">
                            <div class="bg-green-600 h-2 rounded-full" style="width: 95%"></div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600 dark:text-gray-300">Storage Usage</span>
                            <span class="text-blue-600">75%</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-600 rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full" style="width: 75%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <!-- Charts Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Project Statistics Chart -->
                <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-4">Project Statistics</h3>
                    <canvas id="projectStatsChart"></canvas>
                </div>
                <!-- Task Distribution Chart -->
                <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-4">Task Distribution</h3>
                    <canvas id="taskDistributionChart"></canvas>
                </div>
            </div>

        </div>

        <!-- Users Section -->
        <div id="users-section" class="tab-content hidden">
            <h1 class="text-4xl font-bold text-center mb-8">User Management</h1>
            <div class="flex justify-end mb-6">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php
                $membe = new _member();
                $members = $membe->display();
                if ($members == null) {
                    $members = [];
                }
                foreach ($members as $member):

                    ?>
                    <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                        <div class="flex items-center mb-4">
                            <div
                                class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white text-xl font-bold">
                                MR
                            </div>
                            <div class="ml-4">
                                <h3 class="text-xl font-semibold"><?= $member["fullname"] ?></h3>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <p class="text-gray-600 dark:text-gray-300"><?= $member["email"] ?></p>
                        </div>
                        <div class="mt-4 flex justify-end space-x-2">
                            <form action="/delete_by_admin" method="POST">
                                <input type="text" name="member_id" value="<?= $member["member_id"] ?>" class="hidden"
                                    required>

                                <button name="deactive"
                                    class="text-red-600 dark:text-red-500 hover:text-red-800">Deactivate</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
        <!-- CTOs Section -->

        <div id="CTOs-section" class="tab-content hidden">
            <h1 class="text-4xl font-bold text-center mb-8">CTOs Management</h1>
            <div class="flex justify-end mb-6">
            </div>
            <div class="flex justify-end mb-6">
                <button onclick="showModal('CTOModal')"
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                    Add New CTO
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php
                $CT = new add_CTO();
                $CTOs = $CT->display_CTO();
                if ($CTOs == null) {
                    $CTOs = [];
                }
                foreach ($CTOs as $CTO):

                    ?>
                    <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                        <div class="flex items-center mb-4">
                            <div
                                class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white text-xl font-bold">
                                MR
                            </div>
                            <div class="ml-4">
                                <h3 class="text-xl font-semibold"><?= $CTO["fullname"] ?></h3>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <p class="text-gray-600 dark:text-gray-300"><?= $CTO["email"] ?></p>
                        </div>
                        <div class="mt-4 flex justify-end space-x-2">
                            <form action="/delete_by_admin" method="POST">
                                <input type="text" name="cto_id" value="<?= $CTO["cto_id"] ?>" class="hidden" required>

                                <button name="deactive_CTO"
                                    class="text-red-600 dark:text-red-500 hover:text-red-800">Deactivate</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>

        <!-- Projects Section -->
        <div id="projects-section" class="tab-content hidden">
            <h1 class="text-4xl font-bold text-center mb-8">Project Management</h1>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php
                $proj = new all_projets();
                $projets = $proj->display();
                if ($projets == null) {
                    $projets = [];
                }
                foreach ($projets as $projet):

                    ?>
                    <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                        <h3 class="text-xl font-semibold mb-2"><?= $projet["title"] ?></h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4"><?= $projet["description"] ?></p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-sm text-blue-600"><?= $projet["visibility"] ?></span>
                            <span class="text-sm text-blue-600"><?= $projet["fullname"] ?></span>
                            <span
                                class="text-sm bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-300 px-2 py-1 rounded"><?= $projet["status"] ?></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex space-x-2">
                                <form action="/delete_by_admin" method="POST">
                                    <input type="text" name="projet_id" value="<?= $projet["id"] ?>" class="hidden" required>

                                    <button name="deactive_projet"
                                        class="text-red-600 dark:text-red-500 hover:text-red-800">Deactivate</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>


        <!-- Settings Section -->
        <div id="settings-section" class="tab-content hidden">
            <h1 class="text-4xl font-bold text-center mb-8">System Settings</h1>
            <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6">
                <div class="space-y-6">
                    <div class="pb-6 border-b">
                        <h3 class="text-xl font-semibold mb-4">Email Settings</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 dark:text-gray-300 mb-2">SMTP Server</label>
                                <input type="text" class="w-full p-2 border rounded-lg" value="smtp.example.com">
                            </div>
                            <div>
                                <label class="block text-gray-700 dark:text-gray-300 mb-2">SMTP Port</label>
                                <input type="text" class="w-full p-2 border rounded-lg" value="587">
                            </div>
                        </div>
                    </div>

                    <div class="pb-6 border-b">
                        <h3 class="text-xl font-semibold mb-4">Security Settings</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="font-medium">Two-Factor Authentication</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Require 2FA for all admin
                                        accounts</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer" checked>
                                    <div
                                        class="w-11 h-6 bg-gray-200 dark:bg-gray-600 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600">
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold mb-4">Backup Settings</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="font-medium">Automatic Backups</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Daily backups at 00:00 UTC</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer" checked>
                                    <div
                                        class="w-11 h-6 bg-gray-200 dark:bg-gray-600 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600">
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex justify-end space-x-2">
                    <button type="button" onclick="hideModal('settings-section')"
                        class="px-4 py-2 border rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        Cancel
                    </button>
                    <button
                        class="px-4 py-2 bg-blue-600 dark:bg-blue-500 text-white rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600 transition-colors">
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="CTOModal" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white dark:bg-dark-card rounded-lg p-6 w-full max-w-md">
            <h3 class="text-xl font-bold mb-4">Add New CTO</h3>
            <form action="/add_CTO" method="post" id="CTOModalForm" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1" for="taskProject">CTO</label>
                    <select id="taskProject" name="CTO_id" required
                        class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600">
                        <option name="">Select a CTO</option>
                        <?php
                        $CT = new add_CTO();
                        $CTOs = $CT->display_members();
                        var_dump($CTOs);
                        if ($CTOs == null) {
                            $CTOs = [];
                        }
                        foreach ($CTOs as $CTO): ?>
                            <option value="<?= htmlspecialchars($CTO['member_id']) ?>">
                                <?= htmlspecialchars($CTO['fullname']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="hideModal('CTOModal')"
                        class="px-4 py-2 text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-100">
                        Cancel
                    </button>
                    <button type="submit" name="CTO_create" value="category"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Add CTO
                    </button>
                </div>
            </form>
        </div>
    </div>
    <style>
        .nav-link {
            @apply text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 px-3 py-2 rounded-md text-sm font-medium transition-colors;
        }

        .nav-link.active {
            @apply text-blue-600 dark:text-blue-400;
        }

        /* Dark mode styles */
        .dark .bg-white {
            @apply bg-dark-card text-gray-100;
        }

        .dark .text-gray-600 {
            @apply text-gray-300;
        }

        .dark .text-gray-500 {
            @apply text-gray-400;
        }

        .dark .border {
            @apply border-gray-600;
        }

        .dark .hover\:bg-gray-50:hover {
            @apply hover:bg-gray-700;
        }
    </style>

    <script>
        // Dark mode functionality
        const darkModeToggle = document.getElementById('darkModeToggle');

        // Check for saved dark mode preference
        if (localStorage.getItem('darkMode') === 'true' ||
            (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }

        // Toggle dark mode
        darkModeToggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('darkMode', document.documentElement.classList.contains('dark'));

            // Reinitialize charts if on dashboard
            if (!document.getElementById('dashboard-section').classList.contains('hidden')) {
                initializeCharts();
            }
        });

        // Tab Navigation
        function showTab(tabName) {
            document.querySelectorAll('.tab-content').forEach(tab => tab.classList.add('hidden'));
            document.getElementById(tabName + '-section').classList.remove('hidden');

            // Update active nav link
            document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
            event.target.classList.add('active');

            // Initialize charts when dashboard tab is shown
            if (tabName === 'dashboard') {
                initializeCharts();
            }
        }

        // Initialize Charts Function
        function initializeCharts() {
            // Project Statistics Chart
            const projectStats = document.getElementById('projectStatsChart').getContext('2d');
            new Chart(projectStats, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Completed Projects',
                        data: [<?= $complete_projects + 1 ?>, <?= $complete_projects - 7 ?>, <?= $complete_projects + 3 ?>, <?= $complete_projects - 2 ?>, <?= $complete_projects + 4 ?>],
                        borderColor: '#10B981',
                        tension: 0.4,
                        fill: false
                    }, {
                        label: 'Active Projects',
                        data: [<?= $active_projects ?>, <?= $active_projects + 5 ?>, <?= $active_projects - 1 ?>, <?= $active_projects + 4 ?>, <?= $active_projects - 2 ?>, <?= $active_projects + 5 ?>],
                        borderColor: '#3B82F6',
                        tension: 0.4,
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        },
                        title: {
                            display: true,
                            text: 'Project Progress Over Time'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Number of Projects'
                            }
                        }
                    }
                }
            });

            // Task Distribution Chart
            const taskDist = document.getElementById('taskDistributionChart').getContext('2d');
            new Chart(taskDist, {
                type: 'doughnut',
                data: {
                    labels: ['To Do', 'In Progress', 'Completed'],
                    datasets: [{
                        data: [<?= $todo ?>, <?= $doing ?>, <?= $done ?>],
                        backgroundColor: [
                            '#EF4444', // Red for To Do
                            '#F59E0B', // Yellow for In Progress
                            '#3B82F6', // Blue for Review
                            '#10B981'  // Green for Completed
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        },
                        title: {
                            display: true,
                            text: 'Current Task Status Distribution'
                        }
                    },
                    cutout: '60%'
                }
            });
        }

        // Initialize charts on page load if dashboard is active
        document.addEventListener('DOMContentLoaded', function () {
            if (!document.getElementById('dashboard-section').classList.contains('hidden')) {
                initializeCharts();
            }
        });

        // Modal Management
        function showModal(modalName) {
            document.getElementById(modalName).classList.remove('hidden');
        }

        function hideModal(modalName) {
            document.getElementById(modalName).classList.add('hidden');
        }

        // Close modals when clicking outside
        window.addEventListener('click', (e) => {
            document.querySelectorAll('.modal').forEach(modal => {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });

        // Prevent modal close when clicking inside
        document.querySelectorAll('.modal > div').forEach(modalContent => {
            modalContent.addEventListener('click', (e) => {
                e.stopPropagation();
            });
        });
    </script>
</body>

</html>