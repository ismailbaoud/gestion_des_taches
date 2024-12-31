<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProjectHub - Member Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Drag and Drop library -->
    <script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.12/lib/draggable.bundle.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
                        <a href="#" class="nav-link active">My Tasks</a>
                        <a href="#" class="nav-link" onclick="showProfileModal()">Profile</a>
                        <a href="#" class="nav-link">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-6xl mx-auto px-4 py-8">
        <!-- Welcome Section -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-center mb-4">Welcome Back, <span class="text-blue-600">John Doe</span></h1>
            <p class="text-center text-gray-600 dark:text-gray-300">Here are your assigned tasks</p>
        </div>

        <!-- Task Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300 mb-2">Todo</h3>
                <p class="text-3xl font-bold text-blue-600">5</p>
            </div>
            <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300 mb-2">In Progress</h3>
                <p class="text-3xl font-bold text-green-600">3</p>
            </div>
            <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300 mb-2">Completed</h3>
                <p class="text-3xl font-bold text-purple-600">12</p>
            </div>
        </div>

        <!-- Kanban Board -->
        <div class="flex flex-col md:flex-row gap-6">
            <!-- Todo Column -->
            <div class="flex-1">
                <div class="bg-gray-100 dark:bg-gray-800 rounded-lg p-4">
                    <h2 class="text-lg font-semibold mb-4">Todo</h2>
                    <div class="kanban-column" data-status="todo">
                        <!-- Task Card -->
                        <div class="task-card bg-white dark:bg-dark-card rounded-lg shadow-md p-4 mb-4 cursor-move">
                            <div class="flex justify-between items-start mb-3">
                                <h3 class="text-lg font-semibold">Frontend Development</h3>
                                <span class="text-sm text-blue-600 dark:text-blue-400">E-Commerce</span>
                            </div>
                            <p class="text-gray-600 dark:text-gray-300 mb-3">Implement new user interface components</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500 dark:text-gray-400">Due: Dec 31, 2024</span>
                                <span class="px-2 py-1 bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded text-sm">High Priority</span>
                            </div>
                        </div>
                        <!-- More todo tasks here -->
                    </div>
                </div>
            </div>

            <!-- In Progress Column -->
            <div class="flex-1">
                <div class="bg-gray-100 dark:bg-gray-800 rounded-lg p-4">
                    <h2 class="text-lg font-semibold mb-4">In Progress</h2>
                    <div class="kanban-column" data-status="in-progress">
                        <!-- Task Card -->
                        <div class="task-card bg-white dark:bg-dark-card rounded-lg shadow-md p-4 mb-4 cursor-move">
                            <div class="flex justify-between items-start mb-3">
                                <h3 class="text-lg font-semibold">API Integration</h3>
                                <span class="text-sm text-blue-600 dark:text-blue-400">Mobile App</span>
                            </div>
                            <p class="text-gray-600 dark:text-gray-300 mb-3">Connect payment gateway API endpoints</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500 dark:text-gray-400">Due: Dec 28, 2024</span>
                                <span class="px-2 py-1 bg-yellow-100 dark:bg-yellow-900 text-yellow-600 dark:text-yellow-300 rounded text-sm">Medium Priority</span>
                            </div>
                        </div>
                        <!-- More in-progress tasks here -->
                    </div>
                </div>
            </div>

            <!-- Completed Column -->
            <div class="flex-1">
                <div class="bg-gray-100 dark:bg-gray-800 rounded-lg p-4">
                    <h2 class="text-lg font-semibold mb-4">Completed</h2>
                    <div class="kanban-column" data-status="completed">
                        <!-- Task Card -->
                        <div class="task-card bg-white dark:bg-dark-card rounded-lg shadow-md p-4 mb-4 cursor-move">
                            <div class="flex justify-between items-start mb-3">
                                <h3 class="text-lg font-semibold">Database Schema</h3>
                                <span class="text-sm text-blue-600 dark:text-blue-400">CRM System</span>
                            </div>
                            <p class="text-gray-600 dark:text-gray-300 mb-3">Design and implement database schema</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500 dark:text-gray-400">Completed: Dec 20, 2024</span>
                                <span class="px-2 py-1 bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-300 rounded text-sm">Completed</span>
                            </div>
                        </div>
                        <!-- More completed tasks here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Task Detail Modal -->
    <div id="taskDetailModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white dark:bg-dark-card rounded-lg p-6 w-full max-w-md">
            <div class="flex justify-between items-start mb-4">
                <h3 class="text-xl font-bold">Task Details</h3>
                <button onclick="hideTaskModal()" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="space-y-4">
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 mb-2">Task Name</label>
                    <p id="taskName" class="font-semibold">Frontend Development</p>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 mb-2">Project</label>
                    <p id="taskProject" class="text-blue-600 dark:text-blue-400">E-Commerce Platform</p>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 mb-2">Description</label>
                    <p id="taskDescription" class="text-gray-600 dark:text-gray-300">Implement new user interface components</p>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 mb-2">Due Date</label>
                    <p id="taskDueDate" class="text-gray-600 dark:text-gray-300">Dec 31, 2024</p>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 mb-2">Status</label>
                    <select id="taskStatus" class="w-full p-2 border dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-lg">
                        <option value="todo">Todo</option>
                        <option value="in-progress">In Progress</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>
            </div>
            <div class="mt-6 flex justify-end">
                <button onclick="hideTaskModal()" class="px-4 py-2 bg-blue-600 dark:bg-blue-500 text-white rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600">
                    Save Changes
                </button>
            </div>
        </div>
    </div>

    <!-- Profile Modal -->
    <div id="profileModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white dark:bg-dark-card rounded-lg p-6 w-full max-w-md max-h-[90vh] flex flex-col">
            <div class="flex justify-between items-start mb-6">
                <h3 class="text-xl font-bold">My Profile</h3>
                <button onclick="hideProfileModal()" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <div class="overflow-y-auto flex-1 custom-scrollbar">
                <!-- Profile Picture -->
                <div class="flex justify-center mb-6">
                    <div class="relative">
                        <div class="w-24 h-24 bg-blue-600 rounded-full flex items-center justify-center text-white text-3xl font-bold">
                            JD
                        </div>
                        <button class="absolute bottom-0 right-0 bg-blue-600 text-white rounded-full p-2 hover:bg-blue-700">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Profile Information -->
                <form class="space-y-4">
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 mb-2">Full Name</label>
                        <input type="text" value="John Doe" class="w-full p-2 border dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-lg" readonly>
                    </div>
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 mb-2">Email</label>
                        <input type="email" value="john.doe@example.com" class="w-full p-2 border dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-lg" readonly>
                    </div>
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 mb-2">Role</label>
                        <input type="text" value="Developer" class="w-full p-2 border dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-lg" readonly>
                    </div>
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 mb-2">Department</label>
                        <input type="text" value="Engineering" class="w-full p-2 border dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-lg" readonly>
                    </div>
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 mb-2">Join Date</label>
                        <input type="text" value="January 1, 2024" class="w-full p-2 border dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-lg" readonly>
                    </div>

                    <!-- Statistics -->
                    <div class="grid grid-cols-2 gap-4 mt-6">
                        <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4 text-center">
                            <p class="text-gray-600 dark:text-gray-300 text-sm">Total Tasks</p>
                            <p class="text-2xl font-bold text-blue-600 dark:text-blue-400">20</p>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4 text-center">
                            <p class="text-gray-600 dark:text-gray-300 text-sm">Completed</p>
                            <p class="text-2xl font-bold text-green-600 dark:text-green-300">12</p>
                        </div>
                    </div>

                    <!-- Change Password Section -->
                    <div class="mt-6">
                        <button type="button" onclick="togglePasswordSection()" class="text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-500 font-medium flex items-center">
                            <span>Change Password</span>
                            <svg id="passwordArrow" class="w-4 h-4 ml-1 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="passwordSection" class="hidden mt-4 space-y-4 transition-all duration-300">
                            <div>
                                <label class="block text-gray-700 dark:text-gray-300 mb-2">Current Password</label>
                                <input type="password" class="w-full p-2 border dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-lg">
                            </div>
                            <div>
                                <label class="block text-gray-700 dark:text-gray-300 mb-2">New Password</label>
                                <input type="password" class="w-full p-2 border dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-lg">
                            </div>
                            <div>
                                <label class="block text-gray-700 dark:text-gray-300 mb-2">Confirm New Password</label>
                                <input type="password" class="w-full p-2 border dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-lg">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="flex justify-end space-x-2 mt-6 pt-4 border-t">
                <button type="button" onclick="hideProfileModal()" class="px-4 py-2 border dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600">
                    Close
                </button>
                <button type="submit" class="px-4 py-2 bg-blue-600 dark:bg-blue-500 text-white rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600">
                    Save Changes
                </button>
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
        });

        // Initialize Draggable
        document.addEventListener('DOMContentLoaded', () => {
            const containers = document.querySelectorAll('.kanban-column');
            
            if (window.Draggable) {
                new window.Draggable.Sortable(containers, {
                    draggable: '.task-card',
                    handle: '.task-card',
                    mirror: {
                        constrainDimensions: true,
                    }
                }).on('sortable:stop', (event) => {
                    const task = event.data.dragEvent.data.source;
                    const newStatus = event.data.newContainer.dataset.status;
                    
                    // Here you would typically make an API call to update the task status
                    console.log(`Task moved to ${newStatus}`);
                    
                    // Update task styling based on new status
                    updateTaskStyle(task, newStatus);
                });
            }
        });

        // Show task detail modal
        function showTaskModal(taskId) {
            document.getElementById('taskDetailModal').classList.remove('hidden');
            // Here you would typically fetch task details from the server
        }

        // Hide task detail modal
        function hideTaskModal() {
            document.getElementById('taskDetailModal').classList.add('hidden');
        }

        // Update task card styling based on status
        function updateTaskStyle(taskElement, status) {
            const statusBadge = taskElement.querySelector('.status-badge');
            if (statusBadge) {
                statusBadge.className = 'px-2 py-1 rounded text-sm';
                switch (status) {
                    case 'todo':
                        statusBadge.classList.add('bg-gray-100', 'text-gray-600');
                        statusBadge.textContent = 'Todo';
                        break;
                    case 'in-progress':
                        statusBadge.classList.add('bg-yellow-100', 'text-yellow-600');
                        statusBadge.textContent = 'In Progress';
                        break;
                    case 'completed':
                        statusBadge.classList.add('bg-green-100', 'text-green-600');
                        statusBadge.textContent = 'Completed';
                        break;
                }
            }
        }

        // Click handler for task cards
        document.querySelectorAll('.task-card').forEach(card => {
            card.addEventListener('click', (e) => {
                if (!e.target.closest('.status-badge')) {
                    showTaskModal(card.dataset.taskId);
                }
            });
        });

        // Profile Modal Functions
        function showProfileModal() {
            document.getElementById('profileModal').classList.remove('hidden');
        }

        function hideProfileModal() {
            document.getElementById('profileModal').classList.add('hidden');
        }

        function togglePasswordSection() {
            const passwordSection = document.getElementById('passwordSection');
            const passwordArrow = document.getElementById('passwordArrow');
            passwordSection.classList.toggle('hidden');
            passwordSection.classList.toggle('show');
            passwordArrow.classList.toggle('rotate-180');
        }

        // Close modals when clicking outside
        window.addEventListener('click', (e) => {
            const profileModal = document.getElementById('profileModal');
            const taskDetailModal = document.getElementById('taskDetailModal');
            
            if (e.target === profileModal) {
                hideProfileModal();
            }
            if (e.target === taskDetailModal) {
                hideTaskModal();
            }
        });

        // Prevent modal close when clicking inside the modal content
        document.querySelectorAll('.modal > div').forEach(modalContent => {
            modalContent.addEventListener('click', (e) => {
                e.stopPropagation();
            });
        });
    </script>
</body>
</html>
