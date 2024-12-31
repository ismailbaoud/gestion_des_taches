<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProjectHub - CTO Dashboard</title>
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.tailwindcss.com">
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
                        <a href="#" class="nav-link active" onclick="showTab('projects')">Projects</a>
                        <a href="#" class="nav-link" onclick="showTab('team')">Team</a>
                        <a href="#" class="nav-link" onclick="showTab('tasks')">Tasks</a>
                        <a href="#" class="nav-link" onclick="showTab('categories')">Categories</a>
                        <a href="#" class="nav-link">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-6xl mx-auto px-4 py-8">
        <!-- Projects Section -->
        <div id="projects-section" class="tab-content">
            <h1 class="text-4xl font-bold text-center mb-8">Project Management</h1>
            <div class="flex justify-end mb-6">
                <button onclick="showModal('createProject')" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                    Create New Project
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Sample Project Cards -->
                <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-2">E-Commerce Platform</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">A full-featured online shopping platform with modern UI/UX.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-blue-600 dark:text-blue-400">Web Development</span>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Active</span>
                    </div>
                    <div class="mt-4 flex justify-end space-x-2">
                        <button class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">Edit</button>
                        <button class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300">Delete</button>
                    </div>
                </div>
                <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-2">E-Commerce Platform</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">A full-featured online shopping platform with modern UI/UX.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-blue-600 dark:text-blue-400">Web Development</span>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Active</span>
                    </div>
                    <div class="mt-4 flex justify-end space-x-2">
                        <button class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">Edit</button>
                        <button class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300">Delete</button>
                    </div>
                </div>
                <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-2">E-Commerce Platform</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">A full-featured online shopping platform with modern UI/UX.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-blue-600 dark:text-blue-400">Web Development</span>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Active</span>
                    </div>
                    <div class="mt-4 flex justify-end space-x-2">
                        <button class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">Edit</button>
                        <button class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Section -->
        <div id="team-section" class="tab-content hidden">
            <h1 class="text-4xl font-bold text-center mb-8">Team Management</h1>
            <div class="flex justify-end mb-6">
                <button onclick="showModal('addMember')" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                    Add Team Member
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Sample Team Member Card -->
                <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white text-xl font-bold">
                            JD
                        </div>
                        <div class="ml-4">
                            <h3 class="text-xl font-semibold">John Doe</h3>
                            <p class="text-gray-600 dark:text-gray-300">Developer</p>
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">john.doe@example.com</p>
                    <div class="flex justify-end space-x-2">
                        <button class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">Edit</button>
                        <button class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300">Remove</button>
                    </div>
                </div>
                <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white text-xl font-bold">
                            JD
                        </div>
                        <div class="ml-4">
                            <h3 class="text-xl font-semibold">John Doe</h3>
                            <p class="text-gray-600 dark:text-gray-300">Developer</p>
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">john.doe@example.com</p>
                    <div class="flex justify-end space-x-2">
                        <button class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">Edit</button>
                        <button class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300">Remove</button>
                    </div>
                </div>
                <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white text-xl font-bold">
                            JD
                        </div>
                        <div class="ml-4">
                            <h3 class="text-xl font-semibold">John Doe</h3>
                            <p class="text-gray-600 dark:text-gray-300">Developer</p>
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">john.doe@example.com</p>
                    <div class="flex justify-end space-x-2">
                        <button class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">Edit</button>
                        <button class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300">Remove</button>
                    </div>
                </div>
                <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white text-xl font-bold">
                            JD
                        </div>
                        <div class="ml-4">
                            <h3 class="text-xl font-semibold">John Doe</h3>
                            <p class="text-gray-600 dark:text-gray-300">Developer</p>
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">john.doe@example.com</p>
                    <div class="flex justify-end space-x-2">
                        <button class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">Edit</button>
                        <button class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300">Remove</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tasks Section -->
        <div id="tasks-section" class="tab-content hidden">
            <h1 class="text-4xl font-bold text-center mb-8">Task Management</h1>
            <div class="flex justify-end mb-6">
                <button onclick="showModal('createTask')" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                    Create New Task
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Sample Task Card -->
                <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-2">Frontend Development</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Implement new user interface components</p>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-sm text-blue-600 dark:text-blue-400">E-Commerce Platform</span>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Due: Dec 31, 2024</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-300 px-2 py-1 rounded">In Progress</span>
                        <div class="flex space-x-2">
                            <button class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">Edit</button>
                            <button class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories Section -->
        <div id="categories-section" class="tab-content hidden">
            <h1 class="text-4xl font-bold text-center mb-8">Categories Management</h1>
            <div class="flex justify-end mb-6">
                <button onclick="showModal('createCategory')" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                    Create Category
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Sample Category Card -->
                <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-2">Web Development</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Projects related to web applications and services</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-blue-600 dark:text-blue-400">5 Projects</span>
                        <div class="flex space-x-2">
                            <button class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">Edit</button>
                            <button class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300">Delete</button>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-2">Web Development</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Projects related to web applications and services</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-blue-600 dark:text-blue-400">5 Projects</span>
                        <div class="flex space-x-2">
                            <button class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">Edit</button>
                            <button class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300">Delete</button>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-2">Web Development</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Projects related to web applications and services</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-blue-600 dark:text-blue-400">5 Projects</span>
                        <div class="flex space-x-2">
                            <button class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">Edit</button>
                            <button class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300">Delete</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modals -->
    <!-- Create Project Modal -->
    <div id="createProjectModal" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white dark:bg-dark-card rounded-lg p-6 w-full max-w-md">
            <h3 class="text-xl font-bold mb-4">Create New Project</h3>
            <form id="createProjectForm" class="space-y-4">
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 mb-2">Project Name</label>
                    <input type="text" name="projectName" class="w-full p-2 border dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-lg" required>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 mb-2">Category</label>
                    <select name="category" class="w-full p-2 border dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-lg" required>
                        <option value="web">Web Development</option>
                        <option value="mobile">Mobile App</option>
                        <option value="desktop">Desktop App</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 mb-2">Description</label>
                    <textarea name="description" class="w-full p-2 border dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-lg" rows="3" required></textarea>
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="hideModal('createProject')" class="px-4 py-2 border dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 dark:bg-blue-500 text-white rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600">Create</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Team Member Modal -->
    <div id="addMemberModal" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white dark:bg-dark-card rounded-lg p-6 w-full max-w-md">
            <h3 class="text-xl font-bold mb-4">Add Team Member</h3>
            <form id="addMemberForm" class="space-y-4">
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 mb-2">Full Name</label>
                    <input type="text" name="fullName" class="w-full p-2 border dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-lg" required>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 mb-2">Email</label>
                    <input type="email" name="email" class="w-full p-2 border dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-lg" required>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 mb-2">Role</label>
                    <select name="role" class="w-full p-2 border dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-lg" required>
                        <option value="developer">Developer</option>
                        <option value="designer">Designer</option>
                        <option value="manager">Project Manager</option>
                    </select>
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="hideModal('addMember')" class="px-4 py-2 border dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 dark:bg-blue-500 text-white rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600">Add Member</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Create Task Modal -->
    <div id="createTaskModal" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white dark:bg-dark-card rounded-lg p-6 w-full max-w-md">
            <h3 class="text-xl font-bold mb-4">Create New Task</h3>
            <form id="createTaskForm" class="space-y-4">
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 mb-2">Task Name</label>
                    <input type="text" name="taskName" class="w-full p-2 border dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-lg" required>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 mb-2">Project</label>
                    <select name="project" class="w-full p-2 border dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-lg" required>
                        <option value="1">E-Commerce Platform</option>
                        <option value="2">Mobile App</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 mb-2">Assign To</label>
                    <select name="assignee" class="w-full p-2 border dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-lg" required>
                        <option value="1">John Doe</option>
                        <option value="2">Jane Smith</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 mb-2">Due Date</label>
                    <input type="date" name="dueDate" class="w-full p-2 border dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-lg" required>
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="hideModal('createTask')" class="px-4 py-2 border dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 dark:bg-blue-500 text-white rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600">Create Task</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Create Category Modal -->
    <div id="createCategoryModal" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white dark:bg-dark-card rounded-lg p-6 w-full max-w-md">
            <h3 class="text-xl font-bold mb-4">Create Category</h3>
            <form id="createCategoryForm" class="space-y-4">
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 mb-2">Category Name</label>
                    <input type="text" name="categoryName" class="w-full p-2 border dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-lg" required>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 mb-2">Description</label>
                    <textarea name="description" class="w-full p-2 border dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-lg" rows="3" required></textarea>
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="hideModal('createCategory')" class="px-4 py-2 border dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 dark:bg-blue-500 text-white rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600">Create</button>
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

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../../../public/assets/js/theme.js"></script>
    <script src="../../../public/assets/js/cto.js"></script>
</body>
</html>
