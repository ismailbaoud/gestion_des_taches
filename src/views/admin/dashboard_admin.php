<?php session_start();
if($_SESSION["role"] !== "admin"){
    header('location:../../../error/404.php');
}?>
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
    <!-- Navigation Bar -->
    <nav class="bg-white dark:bg-dark-card shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="#" class="text-2xl font-bold text-blue-600">ProjectHub</a>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- Dark Mode Toggle -->
                    <button id="darkModeToggle" class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                        <!-- Sun Icon -->
                        <svg class="w-6 h-6 hidden dark:block text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <!-- Moon Icon -->
                        <svg class="w-6 h-6 block dark:hidden text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </button>
                    <div class="flex space-x-4">
                        <a href="#" class="nav-link active" onclick="showTab('dashboard')">Dashboard</a>
                        <a href="#" class="nav-link" onclick="showTab('users')">Users</a>
                        <a href="#" class="nav-link" onclick="showTab('projects')">Projects</a>
                        <a href="#" class="nav-link" onclick="showTab('settings')">Settings</a>
                        <a href="../../controullers/logOut.php" class="nav-link">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-6xl mx-auto px-4 py-8">
        <!-- Dashboard Overview -->
        <div id="dashboard-section" class="tab-content">
            <h1 class="text-4xl font-bold text-center mb-8">Welcome,<?=$_SESSION["fullname"]?></h1>
            
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                    <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300 mb-2">Total Users</h3>
                    <p class="text-3xl font-bold text-blue-600">150</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">+12 this month</p>
                </div>
                <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                    <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300 mb-2">Active Projects</h3>
                    <p class="text-3xl font-bold text-green-600">45</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">+8 this month</p>
                </div>
                <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                    <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300 mb-2">Completed Projects</h3>
                    <p class="text-3xl font-bold text-purple-600">89</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">+15 this month</p>
                </div>
                <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                    <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300 mb-2">Total Tasks</h3>
                    <p class="text-3xl font-bold text-orange-600">567</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">+48 this month</p>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-4">Recent Projects</h3>
                    <div class="space-y-4">
                        <div class="bg-white dark:bg-dark-card rounded-lg p-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <h4 class="text-lg font-semibold">E-Commerce Platform</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-2">A full-featured online shopping platform</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-blue-600">Web Development</span>
                                <span class="text-sm text-gray-500 dark:text-gray-400">Active</span>
                            </div>
                        </div>
                        <div class="bg-white dark:bg-dark-card rounded-lg p-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <h4 class="text-lg font-semibold">Mobile App</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-2">Cross-platform mobile application</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-blue-600">Mobile Development</span>
                                <span class="text-sm text-gray-500 dark:text-gray-400">In Progress</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-4">Recent Users</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-700 p-2 rounded-lg transition-colors">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white text-sm">JD</div>
                                <div class="ml-3">
                                    <p class="font-semibold">John Doe</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Developer</p>
                                </div>
                            </div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">2 hours ago</span>
                        </div>
                        <div class="flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-700 p-2 rounded-lg transition-colors">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center text-white text-sm">SJ</div>
                                <div class="ml-3">
                                    <p class="font-semibold">Sarah Johnson</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Designer</p>
                                </div>
                            </div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">5 hours ago</span>
                        </div>
                    </div>
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
                <button onclick="showModal('addUser')" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                    Add New User
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white text-xl font-bold">
                            JD
                        </div>
                        <div class="ml-4">
                            <h3 class="text-xl font-semibold">John Doe</h3>
                            <p class="text-gray-600 dark:text-gray-300">Developer</p>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <p class="text-gray-600 dark:text-gray-300">john.doe@example.com</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Joined: Jan 1, 2024</p>
                    </div>
                    <div class="mt-4 flex justify-end space-x-2">
                        <button class="text-blue-600 dark:text-blue-400 hover:text-blue-800">Edit</button>
                        <button class="text-red-600 dark:text-red-500 hover:text-red-800">Deactivate</button>
                    </div>
                </div>
                
            </div>
        </div>

        <!-- Projects Section -->
        <div id="projects-section" class="tab-content hidden">
            <h1 class="text-4xl font-bold text-center mb-8">Project Management</h1>
            <div class="flex justify-end mb-6">
                <button onclick="showModal('createProject')" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                    Create New Project
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                    <h3 class="text-xl font-semibold mb-2">E-Commerce Platform</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">A full-featured online shopping platform with modern UI/UX.</p>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-sm text-blue-600">Web Development</span>
                        <span class="text-sm bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-300 px-2 py-1 rounded">Active</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex -space-x-2">
                            <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white text-sm">JD</div>
                            <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center text-white text-sm">SK</div>
                            <div class="w-8 h-8 bg-purple-600 rounded-full flex items-center justify-center text-white text-sm">+3</div>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-blue-600 dark:text-blue-400 hover:text-blue-800">Edit</button>
                            <button class="text-red-600 dark:text-red-500 hover:text-red-800">Archive</button>
                        </div>
                    </div>
                </div>
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
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Require 2FA for all admin accounts</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer" checked>
                                    <div class="w-11 h-6 bg-gray-200 dark:bg-gray-600 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
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
                                    <div class="w-11 h-6 bg-gray-200 dark:bg-gray-600 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex justify-end space-x-2">
                    <button class="px-4 py-2 border rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        Cancel
                    </button>
                    <button class="px-4 py-2 bg-blue-600 dark:bg-blue-500 text-white rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600 transition-colors">
                        Save Changes
                    </button>
                </div>
            </div>
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
                        data: [12, 19, 15, 25, 22, 30],
                        borderColor: '#10B981',
                        tension: 0.4,
                        fill: false
                    }, {
                        label: 'Active Projects',
                        data: [8, 15, 20, 18, 24, 28],
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
                    labels: ['To Do', 'In Progress', 'Review', 'Completed'],
                    datasets: [{
                        data: [25, 40, 15, 20],
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
        document.addEventListener('DOMContentLoaded', function() {
            if (!document.getElementById('dashboard-section').classList.contains('hidden')) {
                initializeCharts();
            }
        });

        // Modal Management
        function showModal(modalName) {
            document.getElementById(modalName + 'Modal').classList.remove('hidden');
        }

        function hideModal(modalName) {
            document.getElementById(modalName + 'Modal').classList.add('hidden');
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